<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nuevo Día de Juego') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg p-6">
                <div class="flex items-center gap-4 mb-4">
                    <a href="{{ route('business-days.index') }}" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg> Volver
                    </a>
                    <h3 class="text-lg font-semibold text-gray-900">Nuevo Día Juego</h3>
                </div>

                <form action="{{ route('business-days.store') }}" method="POST">
                    @csrf

                    <div class="flex flex-col sm:flex-row gap-6">
                        <div class="mb-6">
                            <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Fecha:</label>
                            <input type="date" id="date" name="date"
                                value="{{ old('date') }}"
                                class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                            @error('date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Disponible para venta?</label>
                            <div class="mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="is_business_day" value="1"
                                        {{ old('is_business_day', '1') == '1' ? 'checked' : '' }}
                                        class="form-radio h-4 w-4 text-blue-600 transition duration-150 ease-in-out">
                                    <span class="ml-2 text-gray-700">Sí</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" name="is_business_day" value="0"
                                        {{ old('is_business_day') == '0' ? 'checked' : '' }}
                                        class="form-radio h-4 w-4 text-blue-600 transition duration-150 ease-in-out">
                                    <span class="ml-2 text-gray-700">No</span>
                                </label>
                            </div>
                            @error('is_business_day')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Descripción:</label>
                        <textarea id="description" name="description" rows="3"
                            class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Opcional">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 mt-6">
                        <button type="submit"
                            class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                            </svg> <span>Guardar Día de Juego</span>
                        </button>

                        <a href="{{ route('business-days.index') }}"
                            class="inline-flex items-center justify-center gap-2 bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg> <span>Cancelar</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>