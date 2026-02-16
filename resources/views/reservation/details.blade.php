<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la Reserva') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Header with back button -->
            @auth
            <div class="mb-6">
                <a href="javascript:history.back()" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 text-sm transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                    <span>Volver</span>
                </a>
            </div>
            @endauth

            <!-- Main card -->
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <!-- Header section with status -->
                <div class="bg-gradient-to-r from-blue-700 to-blue-800 px-6 py-8 text-white">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-2xl font-bold mb-2">Reservación #{{ $reservation->id }}</h3>
                            <!-- <p class="text-blue-100 text-sm">{{ $reservation->transaction_id ?? 'Sin ID de transacción' }}</p> -->
                        </div>
                        <div>
                            @php
                                $statusColors = [
                                    'confirmed' => 'bg-green-500',
                                    'confirmada' => 'bg-green-500',
                                    'pending' => 'bg-yellow-500',
                                    'pendiente' => 'bg-yellow-500',
                                    'cancelled' => 'bg-red-500',
                                    'cancelada' => 'bg-red-500',
                                    'completed' => 'bg-green-600',
                                    'completada' => 'bg-green-600',
                                    '_translate' => ($reservation->status = [
                                        'confirmed' => 'confirmada',
                                        'pending' => 'pendiente',
                                        'cancelled' => 'cancelada',
                                        'completed' => 'completada',
                                    ][$reservation->status ?? 'pending'] ?? 'pendiente'),
                                ];
                                $statusColor = $statusColors[$reservation->status ?? 'pending'] ?? 'bg-gray-500';
                            @endphp
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold {{ $statusColor }} text-white shadow-lg">
                                {{ ucfirst($reservation->status ?? 'Pendiente') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <!-- Customer information -->
                    <div class="mb-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                            Información del Cliente
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <label class="text-xs font-medium text-gray-500 uppercase tracking-wider block mb-1">Nombre</label>
                                <p class="text-gray-900 font-medium">{{ $reservation->name }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <label class="text-xs font-medium text-gray-500 uppercase tracking-wider block mb-1">Correo Electrónico</label>
                                <p class="text-gray-900 font-medium break-all">{{ $reservation->email }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <label class="text-xs font-medium text-gray-500 uppercase tracking-wider block mb-1">Teléfono</label>
                                <p class="text-gray-900 font-medium">{{ $reservation->phone }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Reservation details -->
                    <div class="mb-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" /><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75" /></svg>
                            Detalles de la Reservación
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <label class="text-xs font-medium text-gray-500 uppercase tracking-wider block mb-1">Día de Juego</label>
                                <p class="text-gray-900 font-medium">{{ $reservation->businessDay->date->format('d/m/Y') }}</p>
                                @if($reservation->businessDay->description)
                                    <p class="text-sm text-gray-600 mt-1">{{ $reservation->businessDay->description }}</p>
                                @endif
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <label class="text-xs font-medium text-gray-500 uppercase tracking-wider block mb-1">Área</label>
                                <p class="text-gray-900 font-medium">{{ $reservation->area->name }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <label class="text-xs font-medium text-gray-500 uppercase tracking-wider block mb-1">Cantidad de Personas</label>
                                <p class="text-gray-900 font-medium text-2xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg> {{ $reservation->people_count }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment information -->
                    <div class="border-t border-gray-200 pt-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Información de Pago
                        </h4>
                        <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-lg p-6 border border-green-200">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label class="text-xs font-medium text-gray-600 uppercase tracking-wider block mb-2">Costo Total</label>
                                    <p class="text-3xl font-bold text-gray-900">${{ number_format($reservation->total_cost, 2) }}</p>
                                </div>
                                @if($reservation->businessDay->day_type === "1")
                                <div>
                                    <label class="text-xs font-medium text-gray-600 uppercase tracking-wider block mb-2">Consumo Incluido</label>
                                    <p class="text-3xl font-bold text-green-600">
                                        ${{ number_format(($reservation->total_cost) - ($reservation->people_count * config('reservations.base_ticket_cost')), 2) }}
                                    </p>
                                </div>
                                @endif

                                <!-- <div>
                                    <label class="text-xs font-medium text-gray-600 uppercase tracking-wider block mb-2">Costo por Entrada</label>
                                    <p class="text-3xl font-bold text-gray-700">
                                        ${{ $reservation->businessDay->ticket_price }}
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">x {{ $reservation->people_count }} personas</p>
                                </div> -->
                            </div>

                            
                            @if($reservation->payment)
                            <div class="mt-6 pt-6 border-t border-gray-300">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Estado del Pago</p>
                                        <p class="text-xs text-gray-500 mt-1">Actualizado: {{ $reservation->payment->updated_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                    @php
                                        $paymentStatus = $reservation->payment->status ?? 'pending';
                                        $statusMap = [
                                            'completed'  => ['class' => 'bg-green-100 text-green-800', 'icon' => 'fa-check-circle',   'label' => 'Completado'],
                                            'paid'       => ['class' => 'bg-green-100 text-green-800', 'icon' => 'fa-credit-card',    'label' => 'Pagado'],
                                            'pending'    => ['class' => 'bg-yellow-100 text-yellow-800','icon' => 'fa-clock',          'label' => 'Pendiente'],
                                            'processing' => ['class' => 'bg-yellow-100 text-yellow-800','icon' => 'fa-spinner fa-spin', 'label' => 'En proceso'],
                                            'failed'     => ['class' => 'bg-red-100 text-red-800',     'icon' => 'fa-xmark-circle',   'label' => 'Fallido'],
                                            'refunded'   => ['class' => 'bg-blue-100 text-blue-800',   'icon' => 'fa-arrow-rotate-left','label' => 'Reembolsado'],
                                            'cancelled'  => ['class' => 'bg-red-100 text-red-800',     'icon' => 'fa-ban',            'label' => 'Cancelado'],
                                        ];
                                        $meta = $statusMap[$paymentStatus] ?? ['class' => 'bg-gray-100 text-gray-800', 'icon' => 'fa-info-circle', 'label' => ucfirst($paymentStatus)];
                                    @endphp

                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold {{ $meta['class'] }}">
                                        <i class="fa-solid {{ $meta['icon'] }} mr-2"></i>
                                        {{ $meta['label'] }}
                                    </span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    @auth
                    <!-- Reservation notes -->
                    <div class="mt-8">
                        @if(session('success'))
                            <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg>
                                Notas de la Reservación
                            </h4>
                            <!-- Add a note button -->
                            <a href="{{ route('reservations.notes.create', $reservation->id) }}" class="bg-blue-600 text-white px-4 py-1 text-sm rounded hover:bg-blue-700 inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                                Agregar Nota
                            </a>
                        </div>
                        @if($reservation->notes->isEmpty())
                            <p class="text-gray-600">No hay notas para esta reservación.</p>
                        @else
                            <div class="space-y-4">
                                @foreach($reservation->notes as $note)
                                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                        <p class="text-gray-900">{{ $note->note }}</p>
                                        <p class="text-xs text-gray-500 mt-2">Creada el {{ $note->created_at->format('d/m/Y H:i') }}{{ $note->created_by ? ' por ' . $note->created_by : '' }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    @endauth

                    <!-- Additional info -->
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9" /></svg>
                                Creada: {{ $reservation->created_at->format('d/m/Y H:i') }}
                            </span>
                            @if($reservation->updated_at && $reservation->updated_at != $reservation->created_at)
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                Actualizada: {{ $reservation->updated_at->format('d/m/Y H:i') }}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>