<x-app-layout>
    @php
        $seoTitle = 'Buscar mi Reserva | Charros Brew Bar';
        $seoDescription = 'Busca y consulta tus reservaciones en Charros Brew Bar. Ingresa tu correo para ver detalles de tu reserva, fecha del evento y número de confirmación.';
        $seoKeywords = 'buscar reserva charros, consultar reservacion sport bar, mis reservas charros jalisco, estado de reserva';
        $ogType = 'website';
    @endphp

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buscar Reservaciones por Correo') }}
        </h2>
    </x-slot>

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-900 overflow-hidden py-16">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wMyI+PHBhdGggZD0iTTM2IDE0YzAtMS4xLjktMiAyLTJoMmMxLjEgMCAyIC45IDIgMnYyYzAgMS4xLS45IDItMiAyaC0yYy0xLjEgMC0yLS45LTItMnYtMnptMCAwIi8+PC9nPjwvZz48L3N2Zz4=')] opacity-10"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center space-y-4">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-white/10 backdrop-blur-sm mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h1 class="text-4xl font-black text-white md:text-5xl drop-shadow-lg">
                    Buscar mis <span class="text-gray-300">Reservaciones</span>
                </h1>
                <p class="text-xl text-gray-100 max-w-2xl mx-auto">
                    Ingresa tu correo electrónico para ver todas tus reservaciones
                </p>
            </div>
        </div>
    </div>

    <!-- Search Form Section -->
    <div class="relative -mt-8 pb-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-12 border border-gray-100">
                <div class="flex items-center gap-3 pb-6 border-b-2 border-gray-200 mb-8">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 text-white">
                            <path d="M3 4a2 2 0 0 0-2 2v1.161l8.441 4.221a1.25 1.25 0 0 0 1.118 0L19 7.162V6a2 2 0 0 0-2-2H3Z" />
                            <path d="m19 8.839-7.77 3.885a2.75 2.75 0 0 1-2.46 0L1 8.839V14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.839Z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Buscar por correo electrónico</h3>
                </div>
                @php
                $email = $email ?? '';
                @endphp
                <form method="GET" action="{{ route('reservation.searchByEmail') }}" class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Correo electrónico</label>
                        <input 
                            type="email" 
                            id="email"
                            name="email" 
                            class="block w-full rounded-xl border-2 border-gray-200 px-4 py-4 shadow-sm focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition-all duration-200 text-base" 
                            placeholder="ejemplo@correo.com" 
                            value="{{ $email }}"
                            required>
                    </div>
                    <div class="flex justify-center pt-4">
                        <button 
                            type="submit" 
                            class="group inline-flex items-center justify-center gap-3 rounded-full bg-gradient-to-r from-gray-600 to-gray-800 px-12 py-4 leading-6 font-bold text-white hover:from-gray-700 hover:to-gray-900 hover:scale-105 focus:ring-4 focus:ring-gray-500/50 focus:outline-hidden transition-all duration-300 shadow-xl text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 group-hover:scale-110 transition-transform">
                                <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z" clip-rule="evenodd" />
                            </svg>
                            <span>Buscar Reservaciones</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Correo reenviado con éxito',
                text: @json(session('success')),
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('home') }}";
                }
            });
        });
    </script>
    @endif
    @endpush


    @if (!empty($email))
    <div class="pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-gray-600 to-gray-800 px-8 py-6">
                    @if ($businessDayId)
                    @php
                    $selectedBusinessDay = $businessDays->firstWhere('id', $businessDayId);
                    @endphp
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-8 h-8 text-white">
                            <path fill-rule="evenodd" d="M5.75 2a.75.75 0 0 1 .75.75V4h7V2.75a.75.75 0 0 1 1.5 0V4h.25A2.75 2.75 0 0 1 18 6.75v8.5A2.75 2.75 0 0 1 15.25 18H4.75A2.75 2.75 0 0 1 2 15.25v-8.5A2.75 2.75 0 0 1 4.75 4H5V2.75A.75.75 0 0 1 5.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                        </svg>
                        <h3 class="text-2xl font-bold text-white">Reservaciones para {{ $selectedBusinessDay->description }}</h3>
                    </div>
                    @else
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-8 h-8 text-white">
                            <path fill-rule="evenodd" d="M1 4.75C1 3.784 1.784 3 2.75 3h14.5c.966 0 1.75.784 1.75 1.75v10.5A1.75 1.75 0 0 1 17.25 17H2.75A1.75 1.75 0 0 1 1 15.25V4.75Zm1.75-.25a.25.25 0 0 0-.25.25v10.5c0 .138.112.25.25.25h14.5a.25.25 0 0 0 .25-.25V4.75a.25.25 0 0 0-.25-.25H2.75Z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M5 10a.75.75 0 0 1 .75-.75h8.5a.75.75 0 0 1 0 1.5h-8.5A.75.75 0 0 1 5 10Zm0 3a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 0 1.5h-5.5A.75.75 0 0 1 5 13Zm0-6a.75.75 0 0 1 .75-.75h8.5a.75.75 0 0 1 0 1.5h-8.5A.75.75 0 0 1 5 7Z" clip-rule="evenodd" />
                        </svg>
                        <h3 class="text-2xl font-bold text-white">Tus Reservaciones</h3>
                    </div>
                    @endif
                </div>

                @if($reservations->isEmpty())
                <div class="p-12 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-100 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-10 h-10 text-gray-400">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">No se encontraron reservaciones</h4>
                    <p class="text-gray-600">No hay reservaciones futuras asociadas a este correo electrónico.</p>
                    <p class="text-gray-600">Si tienes alguna duda o dificultad para encontrar tu reservación, por favor <a href="{{ route('contacto') }}">contáctanos</a>.</p>
                </div>
                @else
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Cliente</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Día de Juego</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Área</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($reservations as $reservation)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">{{ strtoupper(substr($reservation->name ?? 'N', 0, 1)) }}</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-900">{{ $reservation->name ?? 'N/A' }}</p>
                                            <p class="text-xs text-gray-500">{{ $reservation->email ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="space-y-1">
                                        <p class="text-sm font-bold text-gray-900">{{ $reservation->businessDay->date->format('d-m-Y') ?? 'N/A' }}</p>
                                        <p class="text-xs text-gray-600">{{ $reservation->businessDay->description }}</p>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-800">
                                        {{ $reservation->area->name ?? 'N/A' }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    @if($reservation->status === 'confirmed')
                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                                        </svg>
                                        Confirmada
                                    </span>
                                    @else
                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM6.75 9.25a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Z" clip-rule="evenodd" />
                                        </svg>
                                        Pendiente
                                    </span>
                                    @endif
                                </td>
                                @if($reservation->status === 'confirmed')
                                <td class="px-6 py-5 text-center">
                                    <a href="{{ route('reservation.resendEmail', $reservation->id) }}" 
                                       class="group inline-flex items-center justify-center gap-2 rounded-full bg-gray-600 px-5 py-2.5 text-sm font-bold text-white hover:bg-gray-700 hover:scale-105 focus:ring-4 focus:ring-gray-500/50 focus:outline-hidden transition-all duration-300 shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 group-hover:scale-110 transition-transform">
                                            <path d="M3 4a2 2 0 0 0-2 2v1.161l8.441 4.221a1.25 1.25 0 0 0 1.118 0L19 7.162V6a2 2 0 0 0-2-2H3Z" />
                                            <path d="m19 8.839-7.77 3.885a2.75 2.75 0 0 1-2.46 0L1 8.839V14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.839Z" />
                                        </svg>
                                        <span>Reenviar</span>
                                    </a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
