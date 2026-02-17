<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reenviar Correo') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Correo reenviado con éxito</h3>
                <p class="text-gray-700">El correo ha sido reenviado exitosamente a su dirección de correo electrónico.</p>
                <a href="{{ route('reservation.search') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
            </div>
        </div>
    </div>
</x-app-layout>
