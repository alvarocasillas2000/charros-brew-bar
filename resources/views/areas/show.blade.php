<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de Área') }}
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
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('areas.index') }}" class="text-white/90 hover:text-white text-sm flex items-center gap-2 hover:scale-105 transition-transform">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                                <span class="hidden sm:inline">Volver</span>
                            </a>
                            <div class="h-8 w-px bg-white/30"></div>
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                                </div>
                                <h3 class="text-lg font-bold text-white">{{ $area->area->name ?? 'Detalles del Área' }}</h3>
                            </div>
                        </div>
                        
                        <a href="{{ route('areas.edit', $area->id) }}" 
                           class="inline-flex items-center gap-2 px-3 py-1.5 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-emerald-600 hover:to-green-700 text-white rounded-lg text-xs font-medium shadow-sm hover:shadow-md hover:scale-105 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg>
                            <span>Editar Área</span>
                        </a>
                    </div>
                </div>

                <div class="p-6">
                    <!-- Area Information Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-200 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" /></svg>
                                </div>
                                <div class="text-xs font-medium text-blue-600 uppercase tracking-wide">Día de Juego</div>
                            </div>
                            <div class="text-lg font-bold text-gray-900">{{ $area->businessday->description }}</div>
                            <div class="text-xs text-gray-600 mt-1">{{ $area->businessday->date->format('d/m/Y') }}</div>
                        </div>

                        <div class="bg-gradient-to-br from-purple-50 to-pink-50 border border-purple-200 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 rounded-lg bg-purple-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                                </div>
                                <div class="text-xs font-medium text-purple-600 uppercase tracking-wide">Zona</div>
                            </div>
                            <div class="text-lg font-bold text-gray-900">{{ $area->area->name }}</div>
                        </div>

                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 border border-green-200 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 rounded-lg bg-green-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </div>
                                <div class="text-xs font-medium text-green-600 uppercase tracking-wide">Costo por Persona</div>
                            </div>
                            <div class="text-lg font-bold text-gray-900">${{ number_format($area->cost_per_person, 2) }}</div>
                        </div>

                        <div class="bg-gradient-to-br from-orange-50 to-amber-50 border border-orange-200 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 rounded-lg bg-orange-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                                </div>
                                <div class="text-xs font-medium text-orange-600 uppercase tracking-wide">Capacidad Máxima</div>
                            </div>
                            <div class="text-lg font-bold text-gray-900">{{ $area->max_capacity }} personas</div>
                        </div>

                        <div class="bg-gradient-to-br from-red-50 to-rose-50 border border-red-200 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 rounded-lg bg-red-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" /></svg>
                                </div>
                                <div class="text-xs font-medium text-red-600 uppercase tracking-wide">Reservado</div>
                            </div>
                            <div class="text-lg font-bold text-gray-900">{{ $area->actual_reserved_quantity }} personas</div>
                        </div>

                        <div class="bg-gradient-to-br from-teal-50 to-cyan-50 border border-teal-200 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 rounded-lg bg-teal-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </div>
                                <div class="text-xs font-medium text-teal-600 uppercase tracking-wide">Disponible</div>
                            </div>
                            <div class="text-lg font-bold text-gray-900">{{ $area->max_capacity - $area->actual_reserved_quantity }} personas</div>
                        </div>
                    </div>

                    <!-- Reservations Section -->
                    <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl border border-gray-200 p-6 mb-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                            </div>
                            <h4 class="text-lg font-bold text-gray-900">Reservaciones del Área</h4>
                        </div>

                        @if($reservations->isEmpty())
                            <div class="py-20 text-center">
                                <div class="mx-auto max-w-md">
                                    <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center mb-6">
                                        <i class="fa-regular fa-calendar-xmark text-4xl text-gray-400"></i>
                                    </div>
                                    <h4 class="text-2xl font-bold text-gray-900 mb-3">No hay reservaciones</h4>
                                    <p class="text-gray-600">Aún no hay reservaciones registradas para esta área.</p>
                                </div>
                            </div>
                        @else
                            <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                            <tr>
                                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">#</th>
                                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Nombre</th>
                                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Teléfono</th>
                                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Personas</th>
                                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Estado</th>
                                                <th class="px-4 py-3 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-100">
                                            @foreach ($reservations as $reservation)
                                                <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-200 group">
                                                    <td class="px-4 py-3">
                                                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gradient-to-br from-blue-600 to-blue-800 text-white text-xs font-bold shadow-sm">
                                                            {{ $reservation->id }}
                                                        </span>
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center gap-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                                                            <span class="text-sm font-medium text-gray-900">{{ $reservation->name ?? 'N/A' }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center gap-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" /></svg>
                                                            <span class="text-sm text-gray-700">{{ $reservation->phone ?? 'N/A' }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-orange-100 to-amber-100 text-orange-800 border border-orange-200">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                                                            {{ $reservation->people_count ?? 'N/A' }}
                                                        </span>
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        @if($reservation->status === 'confirmed')
                                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-sm">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg> Confirmado
                                                            </span>
                                                        @elseif($reservation->status === 'pending')
                                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-gradient-to-r from-yellow-500 to-amber-600 text-white shadow-sm">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> Pendiente
                                                            </span>
                                                        @elseif($reservation->status === 'cancelled')
                                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-gradient-to-r from-red-500 to-rose-600 text-white shadow-sm">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg> Cancelado
                                                            </span>
                                                        @else
                                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-gradient-to-r from-gray-500 to-gray-600 text-white shadow-sm">
                                                                {{ $reservation->status ?? 'N/A' }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-3 text-right">
                                                        @if($reservation->transaction_id)
                                                            <a href="{{ route('reservation.details.with-notes', $reservation->transaction_id) }}" 
                                                               class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-lg text-xs font-medium shadow-sm hover:shadow-md hover:scale-105 transition-all duration-200">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                                                <span class="hidden sm:inline">Ver detalles</span>
                                                            </a>
                                                        @else
                                                            <span class="text-gray-400 text-xs">Sin detalles</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>