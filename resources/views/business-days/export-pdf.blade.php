<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservaciones - {{ $businessDay->date->format('d/m/Y') }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #333;
        }

        .header h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #1a1a1a;
        }

        .header .subtitle {
            font-size: 14px;
            color: #666;
        }

        .info-section {
            margin-bottom: 20px;
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 4px;
        }

        .info-section strong {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table thead {
            background-color: #2c3e50;
            color: white;
        }

        table th {
            padding: 10px 8px;
            text-align: left;
            font-weight: bold;
            font-size: 11px;
            text-transform: uppercase;
        }

        table tbody tr {
            border-bottom: 1px solid #ddd;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f0f0f0;
        }

        table td {
            padding: 8px;
            font-size: 11px;
        }

        .status-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: bold;
        }

        .status-completed {
            background-color: #d4edda;
            color: #155724;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }

        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 10px;
            color: #666;
        }

        .summary {
            margin-top: 20px;
            padding: 15px;
            background-color: #e8f4f8;
            border-left: 4px solid #3498db;
        }

        .summary-item {
            margin-bottom: 5px;
        }

        @media print {
            body {
                padding: 0;
            }

            .no-print {
                display: none;
            }

            @page {
                margin: 15mm;
            }
        }
    </style>
</head>

<body>
    <div class="header" style="display: flex; flex-direction: row; ">
        <img src="{{ url('/assets/img/sportbarlogo.png') }}" alt="logo sportbar" style="max-height:100px; display:block; align-self:center; margin-right:20px;">
        <div style="flex: 1; display: flex; flex-direction: column; justify-content: center; align-items: center; margin-left: 20px; text-align: center;">
            <h1>Reporte de Reservaciones</h1>
            <div class="subtitle">Charros Sport Bar</div>
        </div>
        <img src="{{ url('/assets/img/ch_campeones.png') }}" alt="charros campeones" style="max-height: 100px; display: block; align-self: center; margin-left: 20px;">
    </div>

    <div class="info-section">
        <p><strong>Fecha del Día de Juego:</strong> {{ $businessDay->date->format('d/m/Y') }}</p>
        @if($businessDay->description)
        <p><strong>Descripción:</strong> {{ $businessDay->description }}</p>
        @endif
        <p><strong>Fecha de Generación:</strong> {{ now('America/Mexico_City')->format('d/m/Y H:i:s') }}</p>
    </div>

    @if($businessDay->reservations->count() > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Área</th>
                <th>Personas</th>
                <th>Costo Total</th>
                <th>Consumo Incluido</th>
                <th>Estado</th>
                <th>Notas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($businessDay->reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->name }}</td>
                <td>{{ $reservation->email }}</td>
                <td>{{ $reservation->phone }}</td>
                <td>{{ $reservation->area->name ?? 'N/A' }}</td>
                <td>{{ $reservation->people_count }}</td>
                <td>${{ number_format($reservation->total_cost, 2) }}</td>
                <td>
                    <?php
                    $baseTicketCost = config('reservations.base_ticket_cost', 0);
                    $consumoIncluido = $reservation->total_cost - ($baseTicketCost * $reservation->people_count);
                    ?>
                    ${{ number_format($consumoIncluido, 2) }}
                </td>
                <td>
                    <span class="status-badge status-{{ $reservation->status ?? 'pending' }}">
                        {{ ucfirst($reservation->status ?? 'N/A') }}
                    </span>
                </td>
                <td>
                    @if($reservation->notes && $reservation->notes->count() > 0)
                        <div style="font-size: 10px;">
                            @foreach($reservation->notes as $note)
                                <div style="margin-bottom: 5px; padding: 4px; background-color: #f0f8ff; border-left: 2px solid #3498db;">
                                    <div style="font-weight: bold; margin-bottom: 2px;">{{ $note->note }}</div>
                                    <div style="color: #666; font-size: 9px;">
                                        {{ $note->created_at->format('d/m/Y H:i') }}{{ $note->created_by ? ' - ' . $note->created_by : '' }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <span style="color: #999; font-style: italic; font-size: 10px;">Sin notas</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <h3 style="margin-bottom: 10px;">Resumen</h3>
        <div class="summary-item">
            <strong>Total de Reservaciones:</strong> {{ $businessDay->reservations->count() }}
        </div>
        <div class="summary-item">
            <strong>Total de Personas:</strong> {{ $businessDay->reservations->sum('people_count') }}
        </div>
        <div class="summary-item">
            <strong>Ingreso Total:</strong> ${{ number_format($businessDay->reservations->sum('total_cost'), 2) }}
        </div>
    </div>
    @else
    <p style="text-align: center; padding: 40px; color: #666;">No hay reservaciones para este día.</p>
    @endif

    <div class="footer">
        <p>Este documento fue generado automáticamente el {{ now()->format('d/m/Y') }} a las {{ now()->format('H:i:s') }}</p>
        <p>Charros Sport Bar - Sistema de Gestión de Reservaciones</p>
    </div>

    <div class="no-print" style="margin-top: 30px; text-align: center;">
        <button onclick="window.print()" style="padding: 10px 20px; background-color: #3498db; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 16px; height: 16px; display: inline; vertical-align: middle; margin-right: 4px;"><path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" /></svg> Imprimir / Guardar como PDF
        </button>
        <button onclick="window.history.back()" style="padding: 10px 20px; background-color: #95a5a6; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; margin-left: 10px;">
            Cerrar
        </button>
    </div>
</body>

</html>