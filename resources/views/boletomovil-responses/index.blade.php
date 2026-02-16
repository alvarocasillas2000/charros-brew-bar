<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Respuestas de Boletomovil') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-2xl border border-gray-100">
                <div class="px-6 py-5 bg-gradient-to-r from-blue-600 to-blue-800 border-b border-blue-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('dashboard') }}" class="text-white/90 hover:text-white text-sm flex items-center gap-2 hover:scale-105 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                            </svg>
                            <span class="hidden sm:inline">Volver</span>
                        </a>
                        <div class="h-8 w-px bg-white/30"></div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white">Respuestas de Boletomovil</h3>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    @if($responses->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reservación</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event ID</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Orden</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @php
                                        $seenReservations = [];
                                    @endphp
                                    @foreach($responses as $response)
                                        @php
                                            $isDuplicate = isset($seenReservations[$response->reservation_id]);
                                            $seenReservations[$response->reservation_id] = true;
                                        @endphp
                                        <tr class="{{ $isDuplicate ? 'bg-yellow-50 hover:bg-yellow-100 border-l-4 border-yellow-500' : 'hover:bg-gray-50' }}">
                                            <td class="px-4 py-3 whitespace-nowrap text-sm">
                                                @if($response->reservation)
                                                    <a href="{{ route('reservation.details.with-notes', $response->reservation->transaction_id) }}" 
                                                       class="text-blue-600 hover:text-blue-800 hover:underline {{ $isDuplicate ? 'font-bold' : '' }}">
                                                        {{ $response->reservation_id }}
                                                    </a>
                                                    @if($isDuplicate)
                                                        <span class="ml-1 text-yellow-600 text-xs">⚠️</span>
                                                    @endif
                                                @else
                                                    <span class="text-gray-400">N/A</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm">
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    {{ $response->request_type === 'type1' ? 'bg-purple-100 text-purple-800' : 'bg-indigo-100 text-indigo-800' }}">
                                                    {{ $response->request_type === 'type1' ? 'LMP' : 'SDC' }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm">
                                                @if($response->reservation && $response->reservation->businessDay)
                                                    <a href="{{ route('business-days.show', $response->reservation->businessDay->id) }}" 
                                                       class="text-blue-600 hover:text-blue-800 hover:underline">
                                                        {{ $response->reservation->businessDay->description }}
                                                    </a>
                                                @else
                                                    <span class="text-gray-400">N/A</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm">
                                                @if($response->successful)
                                                    <span class="px-2.5 py-1 inline-flex items-center text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $response->http_status ?? 'N/A' }} - Exitoso
                                                    </span>
                                                @else
                                                    <span class="px-2.5 py-1 inline-flex items-center text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        {{ $response->http_status ?? 'N/A' }} - Fallido
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                                @if($response->successful && $response->response_body)
                                                    @php
                                                        $body = json_decode($response->response_body, true);
                                                        $purchaseId = $body['purchase']['id'] ?? null;
                                                    @endphp
                                                    {{ $purchaseId ?? 'N/A' }}
                                                @else
                                                    <span class="text-gray-400">N/A</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600">
                                                {{ $response->created_at->format('d/m/Y H:i') }}
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm">
                                                <button type="button" 
                                                        onclick="showDetails({{ $response->id }})"
                                                        class="text-blue-600 hover:text-blue-900 font-medium">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg> Ver
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6">
                            {{ $responses->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-400 mx-auto mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                            </svg>
                            <p class="text-gray-500 text-lg">No hay respuestas de Boletomovil registradas</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for details -->
    <div id="detailsModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-lg bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-900">Detalles de la Respuesta</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="modalContent" class="mt-4">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>

    <script>
        function showDetails(responseId) {
            const response = @json($responses->items());
            const item = response.find(r => r.id === responseId);
            
            if (!item) return;

            let content = `
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Email:</label>
                        <p class="text-gray-900">${item.email || 'N/A'}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Response Body:</label>
                        <pre class="mt-1 p-3 bg-gray-100 rounded text-xs overflow-x-auto">${item.response_body || 'N/A'}</pre>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Error Message:</label>
                        <p class="text-red-600">${item.error_message || 'N/A'}</p>
                    </div>
                </div>
            `;

            document.getElementById('modalContent').innerHTML = content;
            document.getElementById('detailsModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('detailsModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('detailsModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</x-app-layout>
