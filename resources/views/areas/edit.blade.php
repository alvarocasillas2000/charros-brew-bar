<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Área') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-2xl border border-gray-100">
                <!-- Header -->
                <div class="px-6 py-5 bg-gradient-to-r from-gray-600 to-gray-800 border-b border-gray-700">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('business-days.show', $area->business_day_id) }}" class="text-white/90 hover:text-white flex items-center gap-2 hover:scale-105 transition-transform text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg> Volver
                            </a>
                            <div class="h-8 w-px bg-white/30"></div>
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                                </div>
                                <h3 class="text-lg font-bold text-white">Editar Configuración de Área</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-6 md:p-8">
                    <!-- Area Info Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        <div class="relative group">
                            <div class="absolute inset-0 bg-gradient-to-br from-gray-600 to-gray-800 rounded-xl opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                            <div class="relative p-4 border-2 border-gray-200 rounded-xl hover:border-gray-300 transition-all duration-300 bg-gradient-to-br from-white to-gray-50">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" /></svg>
                                    </div>
                                    <div class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Día de Juego</div>
                                </div>
                                <div class="text-lg font-bold text-gray-900">{{ $area->businessday->description }}</div>
                                <div class="text-xs text-gray-500 mt-1">{{ \Carbon\Carbon::parse($area->businessday->date)->format('d/m/Y') }}</div>
                            </div>
                        </div>

                        <div class="relative group">
                            <div class="absolute inset-0 bg-gradient-to-br from-gray-600 to-gray-800 rounded-xl opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                            <div class="relative p-4 border-2 border-gray-200 rounded-xl hover:border-gray-300 transition-all duration-300 bg-gradient-to-br from-white to-gray-50">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                                    </div>
                                    <div class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Nombre del Área</div>
                                </div>
                                <div class="text-lg font-bold text-gray-900">{{ $area->area->name }}</div>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('areas.update', $area->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Cost Per Person -->
                        <div class="relative">
                            <label for="cost_per_person" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-dollar-sign text-green-600"></i>
                                Costo por Persona
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 font-medium">$</span>
                                <input type="number" 
                                       step="0.01" 
                                       name="cost_per_person" 
                                       id="cost_per_person" 
                                       value="{{ old('cost_per_person', $area->cost_per_person) }}" 
                                       class="pl-8 w-full border-2 border-gray-300 rounded-lg shadow-sm focus:border-gray-500 focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition-all duration-200 py-3 text-lg font-semibold"
                                       required>
                            </div>
                            @error('cost_per_person')
                                <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Ingrese el precio que pagará cada persona por esta área</p>
                        </div>

                        <!-- Max Capacity -->
                        <div class="relative">
                            <label for="max_capacity" class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-users text-gray-600"></i>
                                Capacidad Máxima
                            </label>
                            <input type="number" 
                                   name="max_capacity" 
                                   id="max_capacity" 
                                   value="{{ old('max_capacity', $area->max_capacity) }}" 
                                   min="1"
                                   class="w-full border-2 border-gray-300 rounded-lg shadow-sm focus:border-gray-500 focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition-all duration-200 py-3 text-lg font-semibold"
                                   required>
                            @error('max_capacity')
                                <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Número máximo de personas permitidas en esta área</p>
                        </div>

                        <!-- Current Stats -->
                        <div class="bg-gradient-to-br from-gray-50 to-gray-50 border-2 border-gray-200 rounded-xl p-6">
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-8 h-8 rounded-lg bg-gray-600 flex items-center justify-center">
                                    <i class="fas fa-chart-bar text-white text-sm"></i>
                                </div>
                                <h4 class="text-sm font-bold text-gray-900">Estadísticas Actuales</h4>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white rounded-lg p-3 border border-gray-100">
                                    <div class="text-xs text-gray-600 mb-1">Lugares Reservados</div>
                                    <div class="text-2xl font-bold text-gray-600">{{ $area->actual_reserved_quantity ?? 0 }}</div>
                                </div>
                                <div class="bg-white rounded-lg p-3 border border-gray-100">
                                    <div class="text-xs text-gray-600 mb-1">Espacios Disponibles</div>
                                    <div class="text-2xl font-bold text-green-600">{{ $area->actual_available ?? 0 }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                            <button type="submit" 
                                    class="flex-1 inline-flex items-center justify-center gap-2 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-[1.02]">
                                <i class="fas fa-save"></i>
                                <span>Guardar Cambios</span>
                            </button>
                            <a href="{{ route('business-days.show', $area->business_day_id) }}" 
                               class="flex-none inline-flex items-center justify-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-6 rounded-lg transition-all duration-200">
                                <i class="fas fa-times"></i>
                                <span>Cancelar</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
