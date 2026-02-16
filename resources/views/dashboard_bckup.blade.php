<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Summary Cards -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white shadow-xl rounded-lg p-4 flex flex-col items-center w-full ">
                    <div class="text-2xl font-bold text-blue-600">{{ $stats['reservations_today'] ?? 0 }}</div>
                    <div class="text-gray-600 text-center">Reservas hechas hoy</div>
                </div>
                <div class="bg-white shadow-xl rounded-lg p-4 flex flex-col items-center w-full">
                    <div class="text-2xl font-bold text-pink-600">{{ $stats['future_reservations'] ?? 0 }}</div>
                    <div class="text-gray-600 text-center">Reservas para próximos juegos</div>
                </div>
                <div class="bg-white shadow-xl rounded-lg p-4 flex flex-col items-center w-full">
                    <div class="text-2xl font-bold text-purple-600">{{ $stats['business_days'] ?? 0 }}</div>
                    <div class="text-gray-600 text-center">Juegos disponibles para reservar</div>
                </div>
            </div>
            <!-- Quick Actions -->
            <div class="flex flex-wrap gap-4 mb-6 justify-center ">
                <a href="{{ route('areas.index') }}" class="bg-yellow-500 hover:bg-yellow-600 shadow-xl text-white px-4 py-2 rounded">Gestionar Áreas</a>
                <a href="{{ route('business-days.index') }}" class="bg-purple-500 hover:bg-purple-600 shadow-xl text-white px-4 py-2 rounded">Gestionar Días de Juego</a>
            </div>
        </div>
    </div>

    <div class="py-6 flex justify-end">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Filtrar por días de juego</h3>
                <form method="GET" action="{{ route('dashboard') }}" class="flex flex-col sm:flex-row gap-2 items-start sm:items-end">
                    <select name="businessDayId" class="border rounded pr-16 mb-2 sm:mb-0">
                        <option value="0">Todos los juegos</option>
                        @foreach ($businessDays as $businessDay)
                            <option value="{{ $businessDay->id }}" {{ $businessDayId == $businessDay->id ? 'selected' : '' }}>
                                {{ \Illuminate\Support\Carbon::parse($businessDay->date)->translatedFormat('d M') }} | {{ $businessDay->description ?? $businessDay->id }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Buscar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Area Availability -->
    <div class="py-2">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-6">
                <h3 class="text-lg font-semibold mb-4">Disponibilidad de Áreas</h3>
                @php
                    $areaNames = ['Premier', 'Caliente', 'General'];
                @endphp
                <!-- add business day name -->
                @if ($businessDayId && $businessDays->firstWhere('id', $businessDayId))
                    <div class="mb-4">
                        <span class="font-semibold text-gray-700">
                            Día de juego seleccionado: {{ $businessDays->firstWhere('id', $businessDayId)->description }}
                        </span>
                    </div>
                @endif
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @php
                        $lastBusinessDayId = null;
                    @endphp
                    @foreach ($areas as $index => $area)
                        @php
                            $isFull = $area->is_available == ($area->max_capacity ?? 0);
                            $isEmpty = $area->is_available == 0;
                            $showBusinessDay = false;
                            if ($businessDayId == 0 && isset($area->businessDay) && isset($area->businessDay->description)) {
                                if ($lastBusinessDayId !== $area->businessDay->id || $index % 3 == 0) {
                                    $showBusinessDay = true;
                                    $lastBusinessDayId = $area->businessDay->id;
                                }
                            }
                        @endphp
                        @if ($showBusinessDay)
                            <div class="mb-2 text-sm text-gray-700 col-span-1 sm:col-span-2 md:col-span-3">
                                {{ $area->businessDay->description }}
                            </div>
                        @endif
                        <div class="border rounded p-4 flex flex-col items-center w-full
                            @if (isset($isFull) && $isFull)
                                bg-green-50
                            @elseif (isset($isEmpty) && $isEmpty)
                                bg-red-50
                            @else
                                bg-yellow-50
                            @endif
                        ">
                            <div class="font-bold text-lg text-center">Zona {{ isset($areaNames) && isset($index) && count($areaNames) > 0 ? $areaNames[$index % count($areaNames)] : 'N/A' }}</div>
                            <div class="text-sm text-gray-600 text-center">Capacidad: {{ $area->max_capacity ?? 'N/A' }}</div>
                            <div class="text-sm text-gray-600 text-center">Reservas: {{ $area->reserved_quantity ?? 0 }}</div>
                            <div class="mt-2">
                                <span class="px-2 py-1 rounded text-center
                                    @if (isset($isFull) && $isFull)
                                        bg-green-200 text-green-800
                                    @elseif (isset($isEmpty) && $isEmpty)
                                        bg-red-200 text-red-800
                                    @else
                                        bg-yellow-200 text-yellow-800
                                    @endif
                                ">
                                    @if (isset($isFull) && $isFull)
                                        Totalmente disponible
                                    @elseif (isset($isEmpty) && $isEmpty)
                                        Ocupada
                                    @else
                                        Disponibilidad parcial
                                    @endif
                                    ({{ $area->is_available ?? 'N/A' }})
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Reservation Table -->
    <div class="py-6 pb-12">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if ($businessDayId)
                    @php
                        $selectedBusinessDay = $businessDays->firstWhere('id', $businessDayId);
                    @endphp
                    <h3 class="text-lg font-semibold mb-4">Áreas reservadas para el {{$selectedBusinessDay->description }}</h3>
                @endif
                <div class="overflow-x-auto">
                <table class="table-auto w-full min-w-[600px]">
                    <thead>
                        <tr>
                            <th class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                            <th class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Área</th>
                            <th class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Día de Juego</th>
                            <th class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Personas</th>
                            <th class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td class="px-2 sm:px-6 py-4">{{ $reservation->id }}</td>
                                <td class="px-2 sm:px-6 py-4">{{ $reservation->name ?? 'N/A' }}</td>
                                <td class="px-2 sm:px-6 py-4">{{ $reservation->area->name ?? 'N/A' }}</td>
                                <td class="px-2 sm:px-6 py-4">{{ $reservation->businessDay->date->format('d-m-Y') ?? 'N/A' }}</td>
                                <td class="px-2 sm:px-6 py-4">{{ $reservation->people_count ?? 'N/A' }}</td>
                                <td class="px-2 sm:px-6 py-4">{{ $reservation->status ?? 'N/A' }}</td>
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    @if($reservation->transaction_id)
                                        <a href="{{ route('reservation.details', $reservation->transaction_id) }}" class="text-blue-600 hover:text-blue-900 ml-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                            </svg> Más info
                                        </a>
                                    @else
                                        <span class="text-gray-500 ml-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                            </svg> Sin detalles
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    @if ($businessDayId == 0)
        <div class="py-6">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Reservas por Día de Juego</h3>
                    <div class="w-full overflow-x-auto">
                      <canvas id="reservationsChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Chart.js CDN -->
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Preparar datos para el gráfico desde PHP
        var reservationLabels = {!! json_encode($businessDays->pluck('description')->toArray()) !!};
        var reservationCounts = {!! json_encode(
            $businessDays
            ->where('is_business_day', 1)
            ->values()
            ->map(function($day) use ($reservations) {
                return $reservations->where('business_day_id', $day->id)->count();
            })
            ->toArray()
        ) !!};
        var reservationLabels = {!! json_encode(
            $businessDays
            ->where('is_business_day', 1)
            ->values()
            ->pluck('description')
            ->toArray()
        ) !!};
        var ctx = document.getElementById('reservationsChart').getContext('2d');
        var reservationsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: reservationLabels,
                datasets: [{
                    label: 'Reservas',
                    data: reservationCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    @endpush
</x-app-layout>
