<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-bold text-2xl text-gray-900 leading-tight flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                        </svg>
                    </div>
                    {{ __('Dashboard') }}
                </h2>
                <p class="text-sm text-gray-600 mt-1 ml-10">Panel de control - Charros Sport Bar</p>
            </div>
            <div class="text-sm text-gray-500 flex items-center gap-2 ml-10 sm:ml-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>
                <span>{{ now()->format('d/m/Y H:i') }}</span>
            </div>
        </div>
    </x-slot>

    <!-- Summary Cards -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Today's Reservations Card -->
                <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium text-gray-600 mb-2">Reservas confirmadas de hoy</div>
                            <div class="text-3xl font-bold text-gray-900">{{ $stats['reservations_today'] ?? 0 }}</div>
                            <div class="text-xs text-gray-500 mt-2">Actualizadas en tiempo real</div>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Future Reservations Card -->
                <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium text-gray-600 mb-2">Reservas futuras</div>
                            <div class="text-3xl font-bold text-gray-900">{{ $stats['future_reservations'] ?? 0 }}</div>
                            <div class="text-xs text-gray-500 mt-2">Próximos juegos</div>
                        </div>
                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-emerald-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5M12 12.75h.008v.008H12v-.008zM12 15h.008v.008H12V15zM12 17.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zM7.5 15h.008v.008H7.5V15zM9.75 12.75h.008v.008H9.75v-.008zM7.5 12.75h.008v.008H7.5v-.008zM9.75 17.25h.008v.008H9.75v-.008zM7.5 17.25h.008v.008H7.5v-.008zM14.25 12.75h.008v.008h-.008v-.008zM16.5 12.75h.008v.008H16.5v-.008zM14.25 15h.008v.008h-.008V15zM16.5 15h.008v.008H16.5V15zM14.25 17.25h.008v.008h-.008v-.008zM16.5 17.25h.008v.008H16.5v-.008z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Available Games Card -->
                <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-medium text-gray-600 mb-2">Juegos disponibles</div>
                            <div class="text-3xl font-bold text-gray-900">{{ $stats['business_days'] ?? 0 }}</div>
                            <div class="text-xs text-gray-500 mt-2">Para reservar</div>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-purple-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 9.563C9 9.252 9.252 9 9.563 9h4.874c.311 0 .563.252.563.563v4.874c0 .311-.252.563-.563.563H9.564A.562.562 0 019 14.437V9.564z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mb-8 bg-gradient-to-r from-gray-50 to-white shadow-lg rounded-xl border border-gray-200 p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Acciones Rápidas</h3>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="{{ route('areas.index') }}" 
                       class="group relative overflow-hidden bg-gradient-to-br from-blue-50 to-indigo-50 hover:from-blue-100 hover:to-indigo-100 border-2 border-blue-200 rounded-xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-600 opacity-5 rounded-full"></div>
                        <div class="relative flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-600 to-blue-700 flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">Gestionar Áreas</div>
                                <div class="text-xs text-gray-600 mt-0.5">Ver disponibilidad</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('business-days.index') }}" 
                       class="group relative overflow-hidden bg-gradient-to-br from-purple-50 to-pink-50 hover:from-purple-100 hover:to-pink-100 border-2 border-purple-200 rounded-xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-purple-600 opacity-5 rounded-full"></div>
                        <div class="relative flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-600 to-purple-700 flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">Días de Juego</div>
                                <div class="text-xs text-gray-600 mt-0.5">Administrar eventos</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('reservation.show') }}" 
                       class="group relative overflow-hidden bg-gradient-to-br from-green-50 to-emerald-50 hover:from-green-100 hover:to-emerald-100 border-2 border-green-200 rounded-xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-green-600 opacity-5 rounded-full"></div>
                        <div class="relative flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-green-600 to-green-700 flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">Nueva Reserva</div>
                                <div class="text-xs text-gray-600 mt-0.5">Crear reservación</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl border border-gray-200 p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Filtrar por días de juego</h3>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-end">
                    <div class="flex-1">
                        <label for="businessDayId" class="block text-sm font-medium text-gray-700 mb-2">Seleccionar juego</label>
                        <select id="businessDayFilter" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200 text-sm">
                            <option value="0">Todos los juegos</option>
                            @foreach ($businessDays as $businessDay)
                                <option value="{{ $businessDay->id }}" {{ $businessDayId == $businessDay->id ? 'selected' : '' }}>
                                    📅 {{ \Illuminate\Support\Carbon::parse($businessDay->date)->translatedFormat('d M Y') }} | {{ $businessDay->description ?? $businessDay->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center text-xs text-gray-500 gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <span>Filtrado automático</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Area Availability -->
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl border border-gray-200 p-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-green-600 flex items-center justify-center shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Disponibilidad de Áreas</h3>
                    </div>
                    <div class="flex items-center gap-4 text-xs">
                        <div class="flex items-center gap-1.5">
                            <div class="w-4 h-4 bg-green-200 rounded-full"></div>
                            <span class="text-gray-600 font-medium">Disponible</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <div class="w-4 h-4 bg-yellow-200 rounded-full"></div>
                            <span class="text-gray-600 font-medium">Parcial</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <div class="w-4 h-4 bg-red-200 rounded-full"></div>
                            <span class="text-gray-600 font-medium">Ocupada</span>
                        </div>
                    </div>
                </div>
                
                @php
                    $areaNames = ['Premier', 'Caliente', 'General'];
                    $areaIcons = ['fas fa-crown', 'fas fa-fire', 'fas fa-users'];
                @endphp
                
                @if ($businessDayId && $businessDays->firstWhere('id', $businessDayId))
                    <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg" id="selectedBusinessDayDisplay">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-blue-600 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <span class="font-semibold text-blue-800">
                                Día de juego seleccionado: <span class="business-day-text">{{ $businessDays->firstWhere('id', $businessDayId)->description }}</span>
                            </span>
                        </div>
                    </div>
                @else
                    <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg" id="selectedBusinessDayDisplay" style="display: none;">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-blue-600 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <span class="font-semibold text-blue-800">
                                Día de juego seleccionado: <span class="business-day-text"></span>
                            </span>
                        </div>
                    </div>
                @endif
                
                @if(count($areas) == 0)
                    <div class="mb-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-600 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                            <span class="font-semibold text-yellow-800">
                                No se encontraron áreas para mostrar. 
                                @if($businessDayId)
                                    Verifica que el juego seleccionado tenga áreas configuradas.
                                @else
                                    Verifica que existan juegos futuros con áreas configuradas.
                                @endif
                            </span>
                        </div>
                    </div>
                @endif
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @php
                        $lastBusinessDayId = null;
                    @endphp
                    @foreach ($areas as $index => $area)
                        @php
                            // Calculate availability status correctly
                            $maxCapacity = $area->max_capacity ?? 0;
                            $reservedQuantity = $area->actual_reserved_quantity ?? 0; // Use the dynamically calculated value
                            $availableSpaces = $area->is_available ?? 0;
                            
                            // Status logic:
                            // - Full capacity available: reserved_quantity == 0
                            // - No spaces available: available spaces == 0 
                            // - Partial availability: some spaces taken but some available
                            $isFullyAvailable = $reservedQuantity == 0 && $maxCapacity > 0;
                            $isFullyOccupied = $availableSpaces == 0;
                            $isPartiallyAvailable = !$isFullyAvailable && !$isFullyOccupied;
                            
                            $showBusinessDay = false;
                            if ($businessDayId == 0 && isset($area->businessDay) && isset($area->businessDay->description)) {
                                if ($lastBusinessDayId !== $area->businessDay->id) {
                                    $showBusinessDay = true;
                                    $lastBusinessDayId = $area->businessDay->id;
                                }
                            }
                            
                            // Calculate occupancy percentage
                            $occupancyPercentage = $maxCapacity > 0 ? ($reservedQuantity / $maxCapacity) * 100 : 0;
                        @endphp
                        
                        @if ($showBusinessDay)
                            <div class="col-span-1 md:col-span-2 mb-4" data-business-day-id="{{ $area->business_day_id }}">
                                <h4 class="text-sm font-medium text-gray-700 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-blue-500 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>
                                    {{ $area->businessDay->description }}
                                </h4>
                                <hr class="mt-2 border-gray-200">
                            </div>
                        @endif
                        
                        <div class="relative border-2 rounded-xl p-6 transition-all duration-300 hover:shadow-lg transform hover:-translate-y-1
                            @if ($isFullyAvailable)
                                border-green-300 bg-gradient-to-br from-green-50 to-green-100
                            @elseif ($isFullyOccupied)
                                border-red-300 bg-gradient-to-br from-red-50 to-red-100
                            @else
                                border-yellow-300 bg-gradient-to-br from-yellow-50 to-yellow-100
                            @endif
                        " data-business-day-id="{{ $area->business_day_id }}">
                            <!-- Status Badge -->
                            <div class="absolute top-3 right-3">
                                <span class="px-2 py-1 rounded-full text-xs font-medium
                                    @if ($isFullyAvailable)
                                        bg-green-200 text-green-800
                                    @elseif ($isFullyOccupied)
                                        bg-red-200 text-red-800
                                    @else
                                        bg-yellow-200 text-yellow-800
                                    @endif
                                ">
                                    @if ($isFullyAvailable)
                                        ✅ Disponible
                                    @elseif ($isFullyOccupied)
                                        ❌ Ocupada
                                    @else
                                        ⚠️ Parcial
                                    @endif
                                </span>
                            </div>
                            
                            <!-- Area Header -->
                            <div class="flex items-center mb-4">
                                <div class="p-2 rounded-lg mr-3
                                    @if ($isFullyAvailable)
                                        bg-green-200
                                    @elseif ($isFullyOccupied)
                                        bg-red-200
                                    @else
                                        bg-yellow-200
                                    @endif
                                ">
                                    <i class="{{ isset($areaIcons) && isset($index) && count($areaIcons) > 0 ? $areaIcons[$index % count($areaIcons)] : 'fas fa-map-marker-alt' }} text-lg
                                        @if ($isFullyAvailable)
                                            text-green-700
                                        @elseif ($isFullyOccupied)
                                            text-red-700
                                        @else
                                            text-yellow-700
                                        @endif
                                    "></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg text-gray-900">
                                        @if($area->area && $area->area->name)
                                            {{ $area->area->name }}
                                        @else
                                            Zona {{ isset($areaNames) && isset($index) && count($areaNames) > 0 ? $areaNames[$index % count($areaNames)] : ($index + 1) }}
                                        @endif
                                    </h4>
                                    @if($area->businessDay)
                                        <p class="text-xs text-gray-500">{{ $area->businessDay->description }}</p>
                                    @endif
                                </div>
                            </div>
                            
                                <!-- Area Stats -->
                            <div class="space-y-3">
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                        </svg>
                                        Capacidad máxima
                                    </span>
                                    <span class="font-semibold text-gray-900">{{ $maxCapacity }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                                        </svg>
                                        Lugares confirmados
                                    </span>
                                    <span class="font-semibold text-gray-900">{{ $reservedQuantity }}</span>
                                </div>
                                
                                
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Espacios libres
                                    </span>
                                    <span class="font-semibold 
                                        @if ($isFullyAvailable)
                                            text-green-700
                                        @elseif ($isFullyOccupied)
                                            text-red-700
                                        @else
                                            text-yellow-700
                                        @endif
                                    ">{{ $availableSpaces }}</span>
                                </div>
                                
                                <!-- Progress Bar -->
                                <div class="mt-4">
                                    <div class="flex justify-between text-xs text-gray-600 mb-1">
                                        <span>Ocupación</span>
                                        <span>{{ round($occupancyPercentage) }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="h-2 rounded-full transition-all duration-300
                                            @if ($occupancyPercentage >= 90)
                                                bg-red-500
                                            @elseif ($occupancyPercentage >= 70)
                                                bg-yellow-500
                                            @else
                                                bg-green-500
                                            @endif
                                        " style="width: {{ $occupancyPercentage }}%"></div>
                                    </div>
                                </div>
                                
                                <!-- Additional Info -->
                                @if($area->cost_per_person)
                                <div class="mt-3 pt-3 border-t border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Costo por persona
                                        </span>
                                        <span class="font-semibold text-green-600">${{ number_format($area->cost_per_person, 2) }}</span>
                                    </div>
                                <div class="flex justify-end">
                                    <a href="{{ route('areas.show', $area->id) }}" class="text-indigo-600 text-sm hover:underline">Ver detalles del área</a>
                                </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Reservation Table -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-indigo-600 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                            </svg>
                            <h3 class="text-lg font-semibold text-gray-900 reservations-table-header">
                                @if ($businessDayId)
                                    @php
                                        $selectedBusinessDay = $businessDays->firstWhere('id', $businessDayId);
                                    @endphp
                                    Reservas futuras para {{ $selectedBusinessDay->description }}
                                @else
                                    Todas las Reservas Futuras
                                @endif
                            </h3>
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Actualizado: {{ now('America/Mexico_City')->format('H:i') }} (CDT)</span>
                        </div>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    @if(count($reservations) > 0)
                        <table class="w-full min-w-[800px] reservations-table">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                        </svg>ID
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>Cliente
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>Área
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>Día de Juego
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                        </svg>Personas
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                        </svg>Status
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($reservations as $reservation)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200" data-reservation-business-day-id="{{ $reservation->business_day_id }}">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                                    #{{ $reservation->id }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="bg-gray-100 p-2 rounded-full mr-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $reservation->name ?? 'Sin nombre' }}
                                                    </div>
                                                    @if($reservation->email)
                                                        <div class="text-xs text-gray-500">{{ $reservation->email }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-green-500 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                </svg>
                                                <span class="text-sm text-gray-900">{{ $reservation->area->name ?? 'N/A' }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-blue-500 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                                </svg>
                                                <div>
                                                    <span class="text-sm text-gray-900 block">{{ $reservation->businessDay->description ?? 'N/A' }}</span>
                                                    <span class="text-xs text-gray-500">{{ $reservation->businessDay->date ? $reservation->businessDay->date->format('d/m/Y') : 'N/A' }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-purple-500 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                                </svg>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                    {{ $reservation->people_count ?? 'N/A' }}
                                                </span>
                                            </div>
                                        </td>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $statusColors = [
                                                    'confirmed' => 'bg-green-100 text-green-800',
                                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                                    'cancelled' => 'bg-red-100 text-red-800',
                                                    'completed' => 'bg-blue-100 text-blue-800'
                                                ];
                                                $statusIcons = [
                                                    'confirmed' => 'fas fa-check-circle',
                                                    'pending' => 'fas fa-clock',
                                                    'cancelled' => 'fas fa-times-circle',
                                                    'completed' => 'fas fa-flag-checkered'
                                                ];
                                                $status = $reservation->status ?? 'pending';
                                            @endphp
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$status] ?? 'bg-gray-100 text-gray-800' }}">
                                                <i class="{{ $statusIcons[$status] ?? 'fas fa-question-circle' }} mr-1"></i>
                                                {{ ucfirst($status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            @if($reservation->transaction_id)
                                                <a href="{{ route('reservation.details.with-notes', $reservation->transaction_id) }}" 
                                                   class="inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                    Ver detalles
                                                </a>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1.5 bg-gray-300 text-gray-600 text-xs font-medium rounded-lg cursor-not-allowed">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                                    </svg>
                                                    Sin detalles
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center py-12 reservations-empty-state">
                            <div class="w-24 h-24 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No hay reservas futuras</h3>
                            <p class="text-gray-500 mb-6">
                                @if ($businessDayId)
                                    No se encontraron reservas futuras para el juego seleccionado.
                                @else
                                    Aún no hay reservas registradas para juegos futuros.
                                @endif
                            </p>
                            <a href="{{ route('reservation.show') }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                Crear primera reserva
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    @if ($businessDayId == 0)
        <div class="py-6 pb-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white shadow-lg rounded-xl border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-indigo-600 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                            </svg>
                            <h3 class="text-lg font-semibold text-gray-900">Análisis de Reservas por Juego</h3>
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            <span>Vista general de actividad</span>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-4 mb-6">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-500 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                            </svg>
                            <p class="text-sm text-gray-700">
                                Este gráfico muestra la distribución de reservas por día de juego y área. 
                                Cada barra representa un juego, dividido por colores según el área (Premier, Caliente, General).
                                Usa esta información para identificar los juegos y áreas más populares y optimizar la capacidad.
                            </p>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-transparent rounded-lg opacity-50"></div>
                        <div class="relative w-full overflow-x-auto p-4">
                            <canvas id="reservationsChart" class="max-h-96"></canvas>
                        </div>
                    </div>
                    
                    <!-- Chart Statistics -->
                    <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="bg-gradient-to-br from-green-50 to-green-100 border border-green-200 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-green-700 mb-1">{{ $reservations->where('status', 'confirmed')->count() }}</div>
                            <div class="text-green-600 text-sm font-medium">Reservas Confirmadas</div>
                        </div>
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-blue-700 mb-1">{{ $businessDays->where('is_business_day', 1)->count() }}</div>
                            <div class="text-blue-600 text-sm font-medium">Juegos Activos</div>
                        </div>
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 border border-purple-200 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-purple-700 mb-1">
                                {{ $businessDays->where('is_business_day', 1)->count() > 0 ? round($reservations->where('status', 'confirmed')->count() / $businessDays->where('is_business_day', 1)->count(), 1) : 0 }}
                            </div>
                            <div class="text-purple-600 text-sm font-medium">Promedio por Juego</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Chart.js CDN -->
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Preparar datos para el gráfico separados por área
        @php
            // Get active business days
            $activeBusinessDays = $businessDays->where('is_business_day', 1)->values();
            
            // Get all unique areas
            $allAreas = $reservations->pluck('area.name')->unique()->filter()->values();
            
            // Prepare chart data
            $chartData = [];
            foreach ($allAreas as $areaName) {
                $areaData = [
                    'label' => $areaName,
                    'data' => []
                ];
                
                foreach ($activeBusinessDays as $day) {
                    $count = $reservations
                        ->where('business_day_id', $day->id)
                        ->where('status', 'confirmed')
                        ->where('area.name', $areaName)
                        ->count();
                    $areaData['data'][] = $count;
                }
                
                $chartData[] = $areaData;
            }
        @endphp
        
        var reservationLabels = {!! json_encode($activeBusinessDays->pluck('description')->toArray()) !!};
        
        var areaColors = {
            'Premier': { bg: 'rgba(234, 179, 8, 0.8)', border: 'rgba(234, 179, 8, 1)' },
            'Caliente': { bg: 'rgba(239, 68, 68, 0.8)', border: 'rgba(239, 68, 68, 1)' },
            'General': { bg: 'rgba(59, 130, 246, 0.8)', border: 'rgba(59, 130, 246, 1)' }
        };
        
        var chartDataRaw = {!! json_encode($chartData) !!};
        
        var datasets = chartDataRaw.map(function(areaData, index) {
            var colors = areaColors[areaData.label] || { 
                bg: 'rgba(' + (100 + index * 50) + ', ' + (150 - index * 20) + ', ' + (200 - index * 30) + ', 0.8)', 
                border: 'rgba(' + (100 + index * 50) + ', ' + (150 - index * 20) + ', ' + (200 - index * 30) + ', 1)' 
            };
            
            return {
                label: areaData.label,
                data: areaData.data,
                backgroundColor: colors.bg,
                borderColor: colors.border,
                borderWidth: 2,
                borderRadius: 0,
                borderSkipped: false,
            };
        });
        
        var ctx = document.getElementById('reservationsChart').getContext('2d');
        var reservationsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: reservationLabels,
                datasets: datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                size: 14,
                                weight: '500'
                            },
                            color: '#374151',
                            padding: 15,
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(17, 24, 39, 0.95)',
                        titleColor: '#ffffff',
                        bodyColor: '#ffffff',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1,
                        cornerRadius: 8,
                        displayColors: true,
                        callbacks: {
                            title: function(context) {
                                return 'Juego: ' + context[0].label;
                            },
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y + ' reservas';
                            },
                            footer: function(context) {
                                var total = 0;
                                context.forEach(function(item) {
                                    total += item.parsed.y;
                                });
                                return 'Total: ' + total + ' reservas';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        stacked: true,
                        ticks: {
                            stepSize: 1,
                            color: '#6B7280',
                            font: {
                                size: 12
                            }
                        },
                        grid: {
                            color: 'rgba(156, 163, 175, 0.3)',
                            borderDash: [2, 2]
                        },
                        title: {
                            display: true,
                            text: 'Número de Reservas',
                            color: '#374151',
                            font: {
                                size: 13,
                                weight: '600'
                            }
                        }
                    },
                    x: {
                        stacked: true,
                        ticks: {
                            color: '#6B7280',
                            font: {
                                size: 12
                            },
                            maxRotation: 45
                        },
                        grid: {
                            display: false
                        }
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeInOutQuart'
                }
            }
        });
        
        // Add loading state animation
        document.addEventListener('DOMContentLoaded', function() {
            // Animate stats cards
            const cards = document.querySelectorAll('[class*="transform hover:-translate-y-1"]');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'all 0.6s ease-out';
                    
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                }, index * 150);
            });
            
            // Add dynamic filtering functionality
            const businessDayFilter = document.getElementById('businessDayFilter');
            const allAreas = document.querySelectorAll('[data-business-day-id]');
            const allReservations = document.querySelectorAll('[data-reservation-business-day-id]');
            const selectedBusinessDayDisplay = document.getElementById('selectedBusinessDayDisplay');
            
            businessDayFilter.addEventListener('change', function() {
                const selectedBusinessDayId = this.value;
                
                // Filter areas
                allAreas.forEach(area => {
                    const areaBusinessDayId = area.getAttribute('data-business-day-id');
                    if (selectedBusinessDayId === '0' || areaBusinessDayId === selectedBusinessDayId) {
                        area.style.display = 'block';
                    } else {
                        area.style.display = 'none';
                    }
                });
                
                // Filter reservations
                let visibleReservationCount = 0;
                allReservations.forEach(reservation => {
                    const reservationBusinessDayId = reservation.getAttribute('data-reservation-business-day-id');
                    if (selectedBusinessDayId === '0' || reservationBusinessDayId === selectedBusinessDayId) {
                        reservation.style.display = 'table-row';
                        visibleReservationCount++;
                    } else {
                        reservation.style.display = 'none';
                    }
                });
                
                // Show/hide empty state
                const reservationTable = document.querySelector('.reservations-table');
                const emptyState = document.querySelector('.reservations-empty-state');
                
                if (visibleReservationCount === 0) {
                    if (reservationTable) reservationTable.style.display = 'none';
                    if (emptyState) emptyState.style.display = 'block';
                } else {
                    if (reservationTable) reservationTable.style.display = 'table';
                    if (emptyState) emptyState.style.display = 'none';
                }
                
                // Update selected business day display
                if (selectedBusinessDayDisplay) {
                    if (selectedBusinessDayId === '0') {
                        selectedBusinessDayDisplay.style.display = 'none';
                    } else {
                        const selectedOption = businessDayFilter.options[businessDayFilter.selectedIndex];
                        const businessDayText = selectedOption.text.replace('📅 ', '');
                        selectedBusinessDayDisplay.querySelector('.business-day-text').textContent = businessDayText;
                        selectedBusinessDayDisplay.style.display = 'block';
                    }
                }
                
                // Update table header
                const tableHeader = document.querySelector('.reservations-table-header');
                if (tableHeader) {
                    if (selectedBusinessDayId === '0') {
                        tableHeader.textContent = 'Todas las Reservas Futuras';
                    } else {
                        const selectedOption = businessDayFilter.options[businessDayFilter.selectedIndex];
                        const businessDayText = selectedOption.text.replace('📅 ', '');
                        tableHeader.textContent = `Reservas futuras para ${businessDayText}`;
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
