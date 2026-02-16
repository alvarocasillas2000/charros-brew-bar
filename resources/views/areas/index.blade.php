<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Áreas') }}
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
                <div class="px-6 py-5 bg-gradient-to-r from-blue-600 to-blue-800 border-b border-blue-700">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('dashboard') }}" class="text-white/90 hover:text-white text-sm flex items-center gap-2 hover:scale-105 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                            <span class="hidden sm:inline">Volver</span>
                        </a>
                        <div class="h-8 w-px bg-white/30"></div>
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                            </div>
                            <h3 class="text-lg font-bold text-white">Disponibilidad</h3>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <!-- Filter Section -->
                    <div class="mb-6 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200 p-5 shadow-sm">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-gray-900">Filtrar por día de juego</h3>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-end">
                            <div class="flex-1">
                                <label for="businessDayFilter" class="block text-sm font-medium text-gray-700 mb-2">Seleccionar juego</label>
                                <select id="businessDayFilter" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200 text-sm">
                                    <option value="">Todos los juegos</option>
                                    @foreach ($businessDays as $businessDay)
                                        <option value="{{ $businessDay->id }}" {{ $businessDayId == $businessDay->id ? 'selected' : '' }}>
                                            📅 {{ \Illuminate\Support\Carbon::parse($businessDay->date)->translatedFormat('d M Y') }} | {{ $businessDay->description }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex items-center text-xs text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                                <span>Filtrado automático</span>
                            </div>
                        </div>
                    </div>

                    @if(session('success'))
                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(()=> show = false, 5000)" class="mb-6">
                            <div class="flex items-start gap-3 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 text-green-800 px-5 py-4 rounded-lg shadow-sm">
                                <div class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </div>
                                <div class="flex-1 text-sm font-medium">{{ session('success') }}</div>
                                <button @click="show = false" class="text-green-700 hover:text-green-900 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                </button>
                            </div>
                        </div>
                    @endif

                    @if(session('error'))
                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(()=> show = false, 5000)" class="mb-6">
                            <div class="flex items-start gap-3 bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 text-red-800 px-5 py-4 rounded-lg shadow-sm">
                                <div class="w-8 h-8 rounded-full bg-red-500 flex items-center justify-center flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" /></svg>
                                </div>
                                <div class="flex-1 text-sm font-medium">{{ session('error') }}</div>
                                <button @click="show = false" class="text-red-700 hover:text-red-900 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                </button>
                            </div>
                        </div>
                    @endif

                    <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Juego</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Fecha</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Zona</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Precio</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Reservado</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Disponible</th>
                                        <th class="px-4 py-3 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    @foreach($areas as $area)
                                    <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 cursor-pointer transition-all duration-200 group" onclick="window.location='{{ route('areas.show', $area->id) }}'">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center gap-2">
                                                <div class="w-7 h-7 rounded-lg bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center shadow-sm group-hover:shadow-md group-hover:scale-110 transition-all duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M9 9.563C9 9.252 9.252 9 9.563 9h4.874c.311 0 .563.252.563.563v4.874c0 .311-.252.563-.563.563H9.564A.562.562 0 019 14.437V9.564z" /></svg>
                                                </div>
                                                <span class="text-xs font-medium text-gray-900">{{ $area->businessDay->description }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center gap-1.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" /></svg>
                                                <span class="text-xs font-semibold text-gray-900">{{ $area->businessDay->date->format('d/m/Y') }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-lg text-xs font-semibold bg-gradient-to-r from-purple-100 to-indigo-100 text-purple-800 border border-purple-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                                                {{ $area->area->name }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="text-xs font-bold text-green-700">${{ number_format($area->cost_per_person, 2) }}</span>
                                        </td>
                                        <td class="px-4 py-3 text-xs font-bold"
                                            style="background-color: rgba(0, 56, 158, {{ $area->max_capacity ? number_format($area->actual_reserved_quantity / $area->max_capacity, 2, '.', '') : 0 }});">
                                            <div class="flex items-center gap-1.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-4 h-4" style="filter: drop-shadow(1px 1px 2px rgba(0,0,0,0.8));"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                                                <span style="color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.8);">{{ $area->actual_reserved_quantity }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-xs font-bold"
                                            style="background-color: rgba(0, 158, 56, {{ $area->max_capacity ? number_format(1 - ($area->actual_reserved_quantity / $area->max_capacity), 2, '.', '') : 1 }});">
                                            <div class="flex items-center gap-1.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-4 h-4" style="filter: drop-shadow(1px 1px 2px rgba(0,0,0,0.8));"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                <span style="color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.8);">{{ $area->max_capacity - $area->actual_reserved_quantity }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-right" onclick="event.stopPropagation()">
                                            <div class="relative inline-block" x-data="{ open: false }">
                                                <button @click="open = !open" @click.away="open = false" 
                                                    class="inline-flex items-center justify-center w-9 h-9 text-gray-600 hover:text-white bg-gray-100 hover:bg-gradient-to-r hover:from-blue-600 hover:to-blue-700 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" /></svg>
                                                </button>
                                                
                                                <div x-show="open" 
                                                     x-transition:enter="transition ease-out duration-100"
                                                     x-transition:enter-start="transform opacity-0 scale-95"
                                                     x-transition:enter-end="transform opacity-100 scale-100"
                                                     x-transition:leave="transition ease-in duration-75"
                                                     x-transition:leave-start="transform opacity-100 scale-100"
                                                     x-transition:leave-end="transform opacity-0 scale-95"
                                                     class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-2xl ring-1 ring-black ring-opacity-5 z-10 overflow-hidden border border-gray-100"
                                                     style="display: none;">
                                                    <div class="py-2">
                                                        <a href="{{ route('areas.show', $area->id) }}" 
                                                           class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 hover:text-blue-700 transition-colors">
                                                            <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                                            </div>
                                                            <span class="font-medium">Ver detalles</span>
                                                        </a>
                                                        <a href="{{ route('areas.edit', $area->id) }}" 
                                                           class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-yellow-50 hover:to-orange-50 hover:text-yellow-700 transition-colors">
                                                            <div class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg>
                                                            </div>
                                                            <span class="font-medium">Editar</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-between px-4 py-4 bg-gradient-to-r from-gray-50 to-white rounded-lg border border-gray-200">
                        <div class="text-sm text-gray-600">
                            Mostrando <span class="font-semibold text-blue-600">{{ $areas->firstItem() }}</span> 
                            a <span class="font-semibold text-blue-600">{{ $areas->lastItem() }}</span> 
                            de <span class="font-semibold text-blue-600">{{ $areas->total() }}</span> resultados
                        </div>
                        <div>
                            {{ $areas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Business Day Filter
        const businessDayFilter = document.getElementById('businessDayFilter');
        
        if (businessDayFilter) {
            businessDayFilter.addEventListener('change', function() {
                const selectedBusinessDayId = this.value;
                const url = new URL(window.location.href);
                
                if (selectedBusinessDayId) {
                    url.searchParams.set('business_day_id', selectedBusinessDayId);
                } else {
                    url.searchParams.delete('business_day_id');
                }
                
                window.location.href = url.toString();
            });
        }
    </script>
</x-app-layout>