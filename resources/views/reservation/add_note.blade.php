<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Nota a la Reservación') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <!-- Back button -->
            <div class="mb-6">
                <a href="{{ route('reservation.details', $reservation->transaction_id) }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 text-sm transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                    <span>Volver a la reservación</span>
                </a>
            </div>

            <!-- Main card -->
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="bg-gradient-to-r from-gray-700 to-gray-800 px-6 py-6 text-white">
                    <h3 class="text-xl font-bold flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg>
                        Nueva Nota para Reservación #{{ $reservation->id }}
                    </h3>
                    <p class="text-gray-100 text-sm mt-2">{{ $reservation->name }} - {{ $reservation->businessDay->date->format('d/m/Y') }}</p>
                </div>

                <div class="p-6">
                    <form action="{{ route('reservations.notes.store', $reservation->id) }}" method="POST">
                        @csrf
                        
                        <div class="mb-6">
                            <label for="note" class="block text-sm font-medium text-gray-700 mb-2">
                                Nota <span class="text-red-500">*</span>
                            </label>
                            <textarea 
                                id="note" 
                                name="note" 
                                rows="6"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition-colors @error('note') border-red-500 @enderror"
                                placeholder="Escribe una nota sobre esta reservación..."
                                required
                            >{{ old('note') }}</textarea>
                            
                            @error('note')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                            <p class="mt-2 text-sm text-gray-500">
                                Máximo 1000 caracteres
                            </p>
                        </div>

                        <div class="flex items-center gap-4">
                            <button 
                                type="submit" 
                                class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition-colors font-medium flex items-center gap-2"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" /></svg>
                                Guardar Nota
                            </button>
                            
                            <a 
                                href="{{ route('reservation.details', $reservation->transaction_id) }}" 
                                class="text-gray-600 hover:text-gray-900 px-6 py-3 transition-colors"
                            >
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

