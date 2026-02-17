<x-app-layout>
    @php
        $seoTitle = 'Reserva tu Mesa | Charros Brew Bar';
        $seoDescription = 'Reserva tu mesa en Charros Brew Bar y disfruta del béisbol profesional con la mejor vista. Incluye comida y bebidas. Proceso de reserva rápido y seguro para los juegos de Charros de Jalisco.';
        $seoKeywords = 'reservar mesa sport bar, reservación Charros Brew Bar, comprar boletos charros jalisco, mesas vip estadio béisbol, reserva con comida incluida guadalajara';
        $ogImage = asset('assets/img/sportbarlogo.png');
        $ogType = 'website';
    @endphp

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Charros Brew Bar') }}
        </h2>
    </x-slot>

    @push('structured-data')
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ReservationAction",
      "name": "Reserva en Charros Brew Bar",
      "description": "Sistema de reservaciones para mesas en Charros Brew Bar con vista al estadio",
      "url": "{{ route('reservation.show') }}",
      "provider": {
        "@type": "SportsActivityLocation",
        "name": "Charros Brew Bar",
        "telephone": "+52-33-1250-0826"
      }
    }
    </script>
    @endpush

    @push('scripts')
    <script>
        // Configuración pasada desde Laravel
        window.reservationConfig = {
            baseTicketCost: {{ config('reservations.base_ticket_cost') }},
            minPeoplePerReservation: {{ config('reservations.min_people_per_reservation') }}
        };
    </script>
    <script src="js\reserva.js"></script>
    
    <!-- <script>
            const mp = new MercadoPago('APP_USR-c3b62b80-f935-4bf0-a90b-5889536ca049');
            const bricksBuilder = mp.bricks();

            mp.bricks().create("wallet", "wallet_container", {
                initialization: {
                    preferenceId: "<PREFERENCE_ID>",
                },
                customization: {
                    theme: 'default',
                }
            });

            document.getElementById("checkout-btn").addEventListener("click", function () {
                $("#checkout-btn").attr("disabled", true);

                const orderData = {
                    quantity: document.getElementById("quantity").value,
                    description: document.getElementById("product-description").innerHTML,
                    price: document.getElementById("unit-price").innerHTML,
                };

                fetch("http://localhost:8000/create-payment", {
                    method: "POST",
                    headers: {
                    "Content-Type": "application/json",
                    },
                    body: JSON.stringify(orderData),
                })
                    .then(function (response) {
                    return response.json();
                    })
                    .then(function (preference) {
                    createCheckoutButton(preference.id);

                    $(".shopping-cart").fadeOut(500);
                    setTimeout(() => {
                        $(".container_payment").show(500).fadeIn();
                    }, 500);
                    })
                    .catch(function () {
                    alert("Unexpected error");
                    $("#checkout-btn").attr("disabled", false);
                    });
                });
        </script> -->
    @endpush
    <!-- Add this style block to enable smooth scrolling -->
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

    <!-- Page Container -->
    <div
        id="page-container"
        class="mx-auto flex min-h-dvh w-full min-w-[320px] flex-col bg-gradient-to-b from-gray-50 to-white">
        <!-- Page Content -->
        <main id="page-content" class="flex max-w-full flex-auto flex-col">
            <!-- Hero -->
            <div class="relative bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-900 overflow-hidden">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wMyI+PHBhdGggZD0iTTM2IDE0YzAtMS4xLjktMiAyLTJoMmMxLjEgMCAyIC45IDIgMnYyYzAgMS4xLS45IDItMiAyaC0yYy0xLjEgMC0yLS45LTItMnYtMnptMCAwIi8+PC9nPjwvZz48L3N2Zz4=')] opacity-10"></div>

                <!-- Hero Content -->
                <div class="relative container mx-auto px-4 pt-20 lg:px-8 lg:pt-32 xl:max-w-6xl">
                    <div class="text-center space-y-6 animate-fade-in">
                        <h2 class="mb-4 text-4xl font-black text-balance text-white md:text-6xl drop-shadow-lg">
                            Reserva tu lugar en <span class="text-gray-300">Charros Brew Bar</span>
                        </h2>
                        <h3 class="mx-auto text-xl font-medium text-gray-100 md:text-2xl md:leading-relaxed lg:w-2/3">
                            Asegura tu lugar para disfrutar del mejor ambiente mientras ves los juegos de Charros de Jalisco.
                        </h3>
                    </div>
                    <div class="flex flex-wrap justify-center gap-6 pt-12 pb-20">
                        <a href="#next-games" class="group inline-flex items-center justify-center gap-3 rounded-full border-2 border-white bg-white px-8 py-5 leading-6 font-bold text-gray-900 hover:bg-gray-50 hover:scale-105 focus:ring-4 focus:ring-white/50 focus:outline-hidden transition-all duration-300 shadow-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6 opacity-70 group-hover:opacity-100 transition-opacity">
                                <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" />
                            </svg>
                            <span>Haz tu reserva ahora</span>
                        </a>
                        <a
                            href="{{ route('reservation.searchByEmail') }}"
                            class="group inline-flex items-center justify-center gap-3 rounded-full border-2 border-white/30 bg-white/10 backdrop-blur-sm px-8 py-5 leading-6 font-bold text-white hover:bg-white/20 hover:scale-105 focus:ring-4 focus:ring-white/30 focus:outline-hidden transition-all duration-300 shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>¿Ya tienes una reserva?</span>
                        </a>
                    </div>
                </div>
                <!-- END Hero Content -->
                <!-- Reservation Form Section -->
                <div class="bg-white pt-32 rounded-t-[3rem] -mt-12 relative z-10 shadow-2xl" id="reservation-form">
                    <!-- Map img -->
                    <div class="flex justify-center px-4 -mt-20">
                        <div class="relative group">
                            <div class="absolute inset-0 bg-gray-600/20 rounded-2xl blur-2xl group-hover:blur-3xl transition-all duration-300"></div>
                            <img 
                                src="{{ asset('assets/img/mapv4.jpg') }}" 
                                alt="Mapa de Charros Brew Bar" 
                                class="relative w-full max-w-md md:max-w-2xl lg:max-w-3xl h-auto rounded-2xl shadow-2xl object-cover border-4 border-white transform group-hover:scale-[1.02] transition-transform duration-300"
                                style="aspect-ratio: 16/9;"
                            />
                        </div>
                    </div>
                    <div class="container mx-auto px-4 py-20 lg:px-8 lg:py-32 xl:max-w-6xl">
                        <div class="text-center space-y-4" id="next-games">
                            <h2 class="mb-4 text-4xl font-black text-gray-900 md:text-5xl">
                                Próximos juegos
                            </h2>
                            <h3 class="mx-auto text-xl font-medium text-gray-700 md:leading-relaxed lg:w-2/3">
                                ¡Elige el día en el que apoyarás a los Charros de Jalisco!
                            </h3>
                        </div>
                        <!-- GRID with Games -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 pt-12">
                            @foreach($businessDays as $day)
                            <div class="flex justify-center">
                                <div
                                    class="day-card group bg-white shadow-lg hover:shadow-2xl rounded-2xl p-8 w-full border-2 border-gray-100 hover:border-gray-400 hover:bg-gradient-to-br hover:from-gray-50 hover:to-white transition-all duration-300 cursor-pointer transform hover:-translate-y-2 data-[selected=true]:bg-gradient-to-br data-[selected=true]:from-gray-600 data-[selected=true]:to-gray-800 data-[selected=true]:border-gray-500 data-[selected=true]:shadow-2xl data-[selected=true]:scale-105"
                                    data-day-id="{{ $day->id }}">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div class="w-14 h-14 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300 group-data-[selected=true]:bg-white group-data-[selected=true]:from-white group-data-[selected=true]:to-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-7 h-7 text-white group-data-[selected=true]:text-gray-600">
                                                <path fill-rule="evenodd" d="M5.75 2a.75.75 0 0 1 .75.75V4h7V2.75a.75.75 0 0 1 1.5 0V4h.25A2.75 2.75 0 0 1 18 6.75v8.5A2.75 2.75 0 0 1 15.25 18H4.75A2.75 2.75 0 0 1 2 15.25v-8.5A2.75 2.75 0 0 1 4.75 4H5V2.75A.75.75 0 0 1 5.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-black text-gray-900 group-hover:text-gray-800 transition-colors group-data-[selected=true]:text-white">
                                                {{ \Carbon\Carbon::parse($day->date)->format('d/m/Y') }}
                                            </h3>
                                            <p class="text-sm text-gray-500 font-medium group-data-[selected=true]:text-gray-100">{{ \Carbon\Carbon::parse($day->date)->locale('es')->isoFormat('dddd') }}</p>
                                        </div>
                                    </div>
                                    <p class="text-base text-gray-700 leading-relaxed group-data-[selected=true]:text-white">{{ $day->description ?? 'Día disponible' }}</p>
                                    <div class="mt-4 pt-4 border-t border-gray-200 flex items-center justify-between group-data-[selected=true]:border-white/30">
                                        <span class="text-sm font-semibold text-gray-600 group-data-[selected=true]:text-white">Seleccionar fecha</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-600 group-hover:translate-x-1 transition-transform group-data-[selected=true]:text-white">
                                            <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- END GRID with Games -->
                        <div class="text-center pt-20 space-y-4">
                            <h2 class="mb-4 text-4xl font-black text-gray-900 md:text-5xl">
                                Reserva tu lugar
                            </h2>
                            <h3 class="mx-auto text-xl font-medium text-gray-700 md:leading-relaxed lg:w-2/3">
                                Completa el formulario para asegurar tu lugar en el evento.
                            </h3>
                        </div>
                        <form action="{{ route('reservation.store') }}" method="POST" id="reservation_form" class="max-w-4xl mx-auto mt-16 bg-gradient-to-br from-white to-gray-50 rounded-3xl shadow-2xl p-8 lg:p-12 border border-gray-100">
                            @csrf
                            <div class="space-y-8">
                                <!-- Personal Information Section -->
                                <div class="space-y-6">
                                    <div class="flex items-center gap-3 pb-4 border-b-2 border-gray-200">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-white">
                                                <path d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-bold text-gray-900">Información Personal</h3>
                                    </div>
                                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                        <div class="sm:col-span-1">
                                            <label for="nombre" class="block text-sm font-bold text-gray-700 mb-2">Nombre completo</label>
                                            <input type="text" id="nombre" name="nombre" class="block w-full rounded-xl border-2 border-gray-200 px-4 py-3 shadow-sm focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition-all duration-200 text-base" placeholder="Juan Pérez" required />
                                        </div>
                                        <div class="sm:col-span-1">
                                            <label for="correo" class="block text-sm font-bold text-gray-700 mb-2">Correo electrónico</label>
                                            <input type="email" id="correo" name="correo" class="block w-full rounded-xl border-2 border-gray-200 px-4 py-3 shadow-sm focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition-all duration-200 text-base" placeholder="ejemplo@correo.com" required />
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="telefono" class="block text-sm font-bold text-gray-700 mb-2">Número de teléfono</label>
                                            <input type="number" id="telefono" name="telefono" class="block w-full rounded-xl border-2 border-gray-200 px-4 py-3 shadow-sm focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition-all duration-200 text-base" placeholder="3312345678" min="1" required />
                                        </div>
                                    </div>
                                </div>

                                <!-- Reservation Details Section -->
                                <div class="space-y-6">
                                    <div class="flex items-center gap-3 pb-4 border-b-2 border-gray-200">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-white">
                                                <path fill-rule="evenodd" d="M5.75 2a.75.75 0 0 1 .75.75V4h7V2.75a.75.75 0 0 1 1.5 0V4h.25A2.75 2.75 0 0 1 18 6.75v8.5A2.75 2.75 0 0 1 15.25 18H4.75A2.75 2.75 0 0 1 2 15.25v-8.5A2.75 2.75 0 0 1 4.75 4H5V2.75A.75.75 0 0 1 5.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-bold text-gray-900">Detalles de la Reserva</h3>
                                    </div>
                                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                        <div class="sm:col-span-1">
                                            <label for="fecha" class="block text-sm font-bold text-gray-700 mb-2">Fecha de la reserva</label>
                                            <select id="fecha" name="fecha" class="block w-full rounded-xl border-2 border-gray-200 px-4 py-3 shadow-sm focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition-all duration-200 text-base" required>
                                                <option value="" disabled selected>Selecciona una fecha</option>
                                                @foreach($businessDays as $day)
                                                <option value="{{ $day->id }}">
                                                    {{ \Carbon\Carbon::parse($day->date)->format('d/m/Y') }} ({{ $day->description ?? 'Día disponible' }})
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <label for="area" class="block text-sm font-bold text-gray-700 mb-2">Área</label>
                                            <select id="area" name="area_id" class="block w-full rounded-xl border-2 border-gray-200 px-4 py-3 shadow-sm focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition-all duration-200 text-base" required disabled>
                                                <option value="" disabled selected>Primero selecciona una fecha</option>
                                            </select>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="personas" class="block text-sm font-bold text-gray-700 mb-2">Número de personas</label>
                                            <div class="flex items-center gap-4">
                                                <input type="number" id="personas" min="{{ config('reservations.min_people_per_reservation') }}" value="{{ config('reservations.min_people_per_reservation') }}" name="personas" class="block w-full rounded-xl border-2 border-gray-200 px-4 py-3 shadow-sm focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition-all duration-200 text-base" required />
                                                <div class="flex items-center gap-3 text-sm text-gray-600 whitespace-nowrap">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-600">
                                                        <path d="M10 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM1.49 15.326a.78.78 0 0 1-.358-.442 3 3 0 0 1 4.308-3.516 6.484 6.484 0 0 0-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 0 1-2.07-.655ZM16.44 15.98a4.97 4.97 0 0 0 2.07-.654.78.78 0 0 0 .357-.442 3 3 0 0 0-4.308-3.517 6.484 6.484 0 0 1 1.907 3.96 2.32 2.32 0 0 1-.026.654ZM18 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM5.304 16.19a.844.844 0 0 1-.277-.71 5 5 0 0 1 9.947 0 .843.843 0 0 1-.277.71A6.975 6.975 0 0 1 10 18a6.974 6.974 0 0 1-4.696-1.81Z" />
                                                    </svg>
                                                    <span class="font-medium">Min. {{ config('reservations.min_people_per_reservation') }}</span>
                                                    <button type="button" id="showMapBtn" class="inline-flex items-center gap-1 px-3 py-1.5 bg-gray-600 hover:bg-gray-700 text-white text-xs font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg hover:scale-105">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                                            <path fill-rule="evenodd" d="M8.157 2.175a1.5 1.5 0 0 0-1.147 0l-4.084 1.69A1.5 1.5 0 0 0 2 5.251v10.877a1.5 1.5 0 0 0 2.074 1.386l3.51-1.453 4.26 1.763a1.5 1.5 0 0 0 1.146 0l4.083-1.69A1.5 1.5 0 0 0 18 14.748V3.873a1.5 1.5 0 0 0-2.073-1.386l-3.51 1.452-4.26-1.763ZM7.58 5a.75.75 0 0 1 .75.75v6.5a.75.75 0 0 1-1.5 0v-6.5A.75.75 0 0 1 7.58 5Zm5.59 2.75a.75.75 0 0 0-1.5 0v6.5a.75.75 0 0 0 1.5 0v-6.5Z" clip-rule="evenodd" />
                                                        </svg>
                                                        Ver mapa
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Panel de Disponibilidad -->
                                <div id="availability-panel" class="hidden">
                                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 border-2 border-gray-300 rounded-2xl p-6 shadow-lg">
                                        <div class="flex items-center gap-3 mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 text-gray-700">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z" clip-rule="evenodd" />
                                            </svg>
                                            <h3 class="text-lg font-bold text-gray-900">Detalles de Disponibilidad</h3>
                                        </div>
                                        <div id="availability-details" class="space-y-3">
                                            <!-- Los detalles se cargarán aquí -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Terms and Conditions -->
                                <div class="bg-gray-50 rounded-2xl p-6 border-2 border-gray-200">
                                    <div class="flex items-start gap-3">
                                        <input type="checkbox" id="terminos" name="terminos" required class="mt-1 h-5 w-5 text-gray-600 border-2 border-gray-300 rounded focus:ring-gray-500 cursor-pointer">
                                        <label for="terminos" class="text-sm text-gray-700 leading-relaxed cursor-pointer">
                                            Acepto los <a href="{{ route('terminos') }}" target="_blank" class="text-gray-700 font-bold underline hover:text-gray-800">términos y condiciones</a> del servicio de reservas de Charros Brew Bar.
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-center pt-6">
                                    <button type="submit" class="group inline-flex items-center justify-center gap-3 rounded-full bg-gradient-to-r from-gray-600 to-gray-800 px-12 py-5 leading-6 font-bold text-white hover:from-gray-700 hover:to-gray-900 hover:scale-105 focus:ring-4 focus:ring-gray-500/50 focus:outline-hidden transition-all duration-300 shadow-2xl text-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 group-hover:scale-110 transition-transform">
                                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Confirmar Reserva</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- <div id="wallet_container"></div> -->
                    </div>
                </div>
                <!-- END Reservation Form Section -->

                <!-- Map Modal -->
                <div id="mapModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Background overlay -->
                        <div class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-75 backdrop-blur-sm" id="mapModalOverlay"></div>

                        <!-- Modal panel -->
                        <div class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                            <div class="bg-gradient-to-r from-gray-600 to-gray-800 px-6 py-4 flex items-center justify-between">
                                <h3 class="text-2xl font-bold text-white flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-7 h-7">
                                        <path fill-rule="evenodd" d="M8.157 2.175a1.5 1.5 0 0 0-1.147 0l-4.084 1.69A1.5 1.5 0 0 0 2 5.251v10.877a1.5 1.5 0 0 0 2.074 1.386l3.51-1.453 4.26 1.763a1.5 1.5 0 0 0 1.146 0l4.083-1.69A1.5 1.5 0 0 0 18 14.748V3.873a1.5 1.5 0 0 0-2.073-1.386l-3.51 1.452-4.26-1.763ZM7.58 5a.75.75 0 0 1 .75.75v6.5a.75.75 0 0 1-1.5 0v-6.5A.75.75 0 0 1 7.58 5Zm5.59 2.75a.75.75 0 0 0-1.5 0v6.5a.75.75 0 0 0 1.5 0v-6.5Z" clip-rule="evenodd" />
                                    </svg>
                                    Mapa de Charros Brew Bar
                                </h3>
                                <button type="button" id="closeMapModal" class="text-white hover:text-gray-200 transition-colors focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-7 h-7">
                                        <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="bg-white px-6 py-6">
                                <div class="relative">
                                    <img 
                                        src="{{ asset('assets/img/mapv4.jpg') }}" 
                                        alt="Mapa de Charros Brew Bar" 
                                        class="w-full h-auto rounded-xl shadow-lg"
                                    />
                                </div>
                                <div class="mt-6 bg-gray-50 rounded-xl p-4 border-2 border-gray-200">
                                    <p class="text-sm text-gray-900 leading-relaxed">
                                        <span class="font-bold">Nota:</span> Este mapa muestra la distribución de las áreas disponibles en Charros Brew Bar. Selecciona tu área preferida en el formulario de reserva.
                                    </p>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-6 py-4 flex justify-end">
                                <button type="button" id="closeMapModalBtn" class="inline-flex items-center gap-2 px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-md hover:shadow-lg">
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Map Modal -->
</x-app-layout>
