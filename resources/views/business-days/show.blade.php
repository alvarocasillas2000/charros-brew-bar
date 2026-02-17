<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle Día de Juego') }}
        </h2>
    </x-slot>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-2xl border border-gray-100">
                <div class="px-6 py-5 bg-gradient-to-r from-gray-600 to-gray-800 border-b border-gray-700">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('business-days.index') }}" class="text-white/90 hover:text-white flex items-center gap-2 hover:scale-105 transition-transform text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg> Volver
                            </a>
                            <div class="h-8 w-px bg-white/30"></div>
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" /></svg>
                                </div>
                                <h3 class="text-lg font-bold text-white">{{ $businessDay->date->format('d/m/Y') }}</h3>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-2">
                            <a href="{{ route('business-days.edit', $businessDay->id) }}" 
                               class="inline-flex items-center justify-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-3 rounded-lg text-xs shadow-md hover:shadow-lg hover:scale-105 transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg> <span>Editar</span>
                            </a>
                            <a href="{{ route('business-days.export-csv', $businessDay->id) }}" 
                               class="inline-flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-3 rounded-lg text-xs shadow-md hover:shadow-lg hover:scale-105 transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg> <span class="hidden sm:inline">Exportar</span> CSV
                            </a>
                            <a href="{{ route('business-days.export-pdf', $businessDay->id) }}" 
                               class="inline-flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-3 rounded-lg text-xs shadow-md hover:shadow-lg hover:scale-105 transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg> <span class="hidden sm:inline">Exportar</span> PDF
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                        <div class="relative group">
                            <div class="absolute inset-0 bg-gradient-to-br from-gray-600 to-gray-800 rounded-xl opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                            <div class="relative p-4 border-2 border-gray-200 rounded-xl hover:border-gray-300 transition-all duration-300 bg-gradient-to-br from-white to-gray-50">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" /></svg>
                                    </div>
                                    <div class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Fecha</div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="text-lg font-bold text-gray-900">{{ $businessDay->date->format('d/m/Y') }}</div>
                                    <div class="text-xs text-gray-500 self-end mb-1">{{ \Carbon\Carbon::parse($businessDay->date)->locale('es')->isoFormat('dddd') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-0 bg-gradient-to-br from-green-600 to-emerald-800 rounded-xl opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                            <div class="relative p-4 border-2 border-gray-200 rounded-xl hover:border-green-300 transition-all duration-300 bg-gradient-to-br from-white to-gray-50">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-green-600 to-emerald-800 flex items-center justify-center shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    </div>
                                    <div class="text-xs font-semibold text-gray-600 uppercase tracking-wide">¿Disponible para venta?</div>
                                </div>
                                <div class="text-lg font-bold text-gray-900">
                                    @if($businessDay->is_business_day)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-bold bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg> Sí
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-bold bg-gradient-to-r from-red-500 to-rose-600 text-white shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg> No
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-0 bg-gradient-to-br from-gray-600 to-gray-800 rounded-xl opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                            <div class="relative p-4 border-2 border-gray-200 rounded-xl hover:border-gray-300 transition-all duration-300 bg-gradient-to-br from-white to-gray-50">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" /></svg>
                                    </div>
                                    <div class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Descripción</div>
                                </div>
                                <div class="text-sm font-semibold text-gray-900">{{ $businessDay->description ?? '-' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Area Availability Section -->
                    <div class="mb-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-lg bg-green-600 flex items-center justify-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900">Disponibilidad de Áreas</h4>
                        </div>
                        
                        <div class="flex items-center gap-4 text-xs mb-6">
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

                        @php
                            $areaNames = ['Premier', 'Caliente', 'General'];
                            // Heroicons SVG for areas: trophy (premier), fire (caliente), users (general)
                            $areaIcons = [
                                '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" /></svg>',
                                '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" /></svg>',
                                '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>'
                            ];
                        @endphp
                        
                        @if(count($areas) == 0)
                            <div class="mb-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-600 mr-2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" /></svg>
                                    <span class="font-semibold text-yellow-800">
                                        No se encontraron áreas configuradas para este día de juego.
                                    </span>
                                </div>
                            </div>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach ($areas as $index => $area)
                                    @php
                                        // Calculate availability status correctly
                                        $maxCapacity = $area->max_capacity ?? 0;
                                        $reservedQuantity = $area->actual_reserved_quantity ?? 0;
                                        $availableSpaces = $area->is_available ?? 0;
                                        
                                        // Status logic
                                        $isFullyAvailable = $reservedQuantity == 0 && $maxCapacity > 0;
                                        $isFullyOccupied = $availableSpaces == 0;
                                        $isPartiallyAvailable = !$isFullyAvailable && !$isFullyOccupied;
                                        
                                        // Calculate occupancy percentage
                                        $occupancyPercentage = $maxCapacity > 0 ? ($reservedQuantity / $maxCapacity) * 100 : 0;
                                    @endphp
                                    
                                    <div class="relative border-2 rounded-xl p-6 transition-all duration-300 hover:shadow-lg transform hover:-translate-y-1
                                        @if ($isFullyAvailable)
                                            border-green-300 bg-gradient-to-br from-green-50 to-green-100
                                        @elseif ($isFullyOccupied)
                                            border-red-300 bg-gradient-to-br from-red-50 to-red-100
                                        @else
                                            border-yellow-300 bg-gradient-to-br from-yellow-50 to-yellow-100
                                        @endif
                                    ">
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
                                                <div class="
                                                    @if ($isFullyAvailable)
                                                        text-green-700
                                                    @elseif ($isFullyOccupied)
                                                        text-red-700
                                                    @else
                                                        text-yellow-700
                                                    @endif
                                                ">
                                                    {!! $areaIcons[$index % count($areaIcons)] !!}
                                                </div>
                                            </div>
                                            <div>
                                                <h4 class="font-bold text-lg text-gray-900">
                                                    @if($area->area && $area->area->name)
                                                        {{ $area->area->name }}
                                                    @else
                                                        Zona {{ $areaNames[$index % count($areaNames)] }}
                                                    @endif
                                                </h4>
                                            </div>
                                        </div>
                                        
                                        <!-- Area Stats -->
                                        <div class="space-y-3">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-600 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                                                    Capacidad máxima
                                                </span>
                                                <span class="font-semibold text-gray-900">{{ $maxCapacity }}</span>
                                            </div>
                                            
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-600 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3v.75m-9-13.5v.75m0 3v.75m0 3v.75m0 3v.75m.75 0a3 3 0 01-3-3V5.625a2.625 2.625 0 012.625-2.625h10.5A2.625 2.625 0 0121 5.625v12.75a3 3 0 01-3 3H7.5z" /></svg>
                                                    Lugares confirmados
                                                </span>
                                                <span class="font-semibold text-gray-900">{{ $reservedQuantity }}</span>
                                            </div>
                                            
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-600 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
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
                                            <div class="mt-3 pt-3 border-t border-gray-200 space-y-2">
                                                @if($area->cost_per_person)
                                                <div class="flex justify-between items-center">
                                                    <span class="text-sm text-gray-600 flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                        Costo por persona
                                                    </span>
                                                    <span class="font-semibold text-green-600">${{ number_format($area->cost_per_person, 2) }}</span>
                                                </div>
                                                @endif
                                                <div class="flex justify-end">
                                                    <a href="{{ route('areas.edit', $area->id) }}" 
                                                       class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gray-600 hover:bg-gray-700 text-white rounded-lg text-xs font-medium shadow-sm hover:shadow-md transition-all duration-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg>
                                                        <span>Editar área</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900">Reservaciones del día</h4>
                    </div>

                    @if($businessDay->reservations && $businessDay->reservations->count())
                        <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">#</th>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Cliente</th>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Zona</th>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Personas</th>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Total</th>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                                            <th class="px-4 py-3 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-100">
                                        @foreach($businessDay->reservations as $reservation)
                                            <tr class="hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-50 transition-all duration-200 group">
                                                <td class="px-4 py-3">
                                                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-gradient-to-br from-gray-600 to-gray-800 text-white text-xs font-bold shadow-sm group-hover:shadow-md group-hover:scale-110 transition-all duration-200">
                                                        {{ $reservation->id }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="flex items-center gap-2">
                                                        <div class="w-7 h-7 rounded-full bg-gradient-to-br from-gray-600 to-gray-600 flex items-center justify-center text-white text-xs font-bold shadow-sm">
                                                            {{ strtoupper(substr($reservation->name ?? $reservation->user->name ?? 'N', 0, 1)) }}
                                                        </div>
                                                        <span class="text-xs font-medium text-gray-900">{{ $reservation->name ?? $reservation->user->name ?? 'N/A' }}</span>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded-lg text-xs font-semibold bg-gradient-to-r from-gray-100 to-gray-100 text-gray-800 border border-gray-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                                                        {{ $reservation->area->name ?? 'N/A' }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="flex items-center gap-1.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                                                        <span class="text-xs font-semibold text-gray-900">{{ $reservation->people_count ?? '-' }}</span>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <span class="text-xs font-bold text-green-700">${{ number_format($reservation->total_cost ?? 0, 2) }}</span>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <span class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-semibold bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-200">
                                                        {{ $reservation->status ?? 'N/A' }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3 text-right">
                                                    @if(!empty($reservation->transaction_id))
                                                        <a href="{{ route('reservation.details.with-notes', $reservation->transaction_id) }}" 
                                                           class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white rounded-lg text-xs font-medium shadow-md hover:shadow-lg hover:scale-105 transition-all duration-200">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                                            <span class="hidden sm:inline">Ver</span>
                                                        </a>
                                                    @else
                                                        <span class="text-gray-400 text-xs italic">Sin detalles</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="py-16 text-center">
                            <div class="mx-auto max-w-md">
                                <div class="w-16 h-16 mx-auto rounded-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" /></svg>
                                </div>
                                <h5 class="text-lg font-bold text-gray-900 mb-2">No hay reservaciones</h5>
                                <p class="text-sm text-gray-600">No se encontraron reservaciones para este día.</p>
                            </div>
                        </div>
                    @endif
                
                    @if($businessDay->reservations && $businessDay->reservations->count())
                    <div class="mt-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-green-600 to-emerald-800 flex items-center justify-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900">Resumen de Ventas</h4>
                        </div>
                        
                        <!-- Total Sales Card -->
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 border-2 border-green-200 rounded-xl p-8 shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden max-w-md">
                            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-green-600 opacity-5 rounded-full"></div>
                            <div class="relative">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-12 h-12 rounded-lg bg-green-600 flex items-center justify-center shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" /></svg>
                                    </div>
                                    <div class="text-sm font-semibold text-green-600 uppercase tracking-wide">Ventas Totales</div>
                                </div>
                                <div class="text-4xl font-bold text-gray-900 mb-2">
                                    ${{ number_format($businessDay->reservations->where('status', 'confirmed')->sum('total_cost'), 2) }}
                                </div>
                                <div class="text-sm text-gray-600">Ingreso total del día de juego</div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
