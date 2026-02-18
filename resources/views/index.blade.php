<x-app-layout>
  @php
  $seoTitle = 'Charros Brew Bar | Vista Privilegiada al Estadio';
  $seoDescription = 'Disfruta del béisbol de Charros de Jalisco en nuestro Sport Bar con vista privilegiada al estadio. Reserva tu mesa y disfruta de comida, bebidas y la mejor atmósfera deportiva en Guadalajara, México.';
  $seoKeywords = 'sport bar guadalajara, charros de jalisco, estadio de béisbol, reservar mesa sport bar, vista al campo béisbol, bebidas y botanas guadalajara, eventos deportivos gdl, sport bar zapopan, beisbol profesional mexico';
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
      "@type": "SportsActivityLocation",
      "name": "Charros Brew Bar",
      "description": "Sport Bar con vista privilegiada al estadio de Charros de Jalisco. Disfruta de comida, bebidas y béisbol profesional.",
      "image": "{{ asset('assets/img/sportbarlogo.png') }}",
      "url": "{{ url('/') }}",
      "telephone": "+52-33-1250-0826",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Estadio Charros de Jalisco",
        "addressLocality": "Guadalajara",
        "addressRegion": "Jalisco",
        "addressCountry": "MX"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "20.6597",
        "longitude": "-103.3496"
      },
      "priceRange": "$$",
      "servesCuisine": "Mexican",
      "hasMenu": "{{ route('menu') }}",
      "acceptsReservations": "True"
    }
  </script>
  @endpush


  @push('scripts')
  <script src="{{ asset('js/slider.js') }}"></script>
  @endpush
  @push('head')
  @foreach([
  'balls.webp',
  'beer.webp',
  'boneless.webp',
  'caliente.webp',
  'field.webp',
  'people.webp',
  'people2.webp',
  'people3.webp',
  'people4.webp',
  'people5.webp',
  'people6.webp',
  'steak.webp',
  'steakbeer.webp',
  'table.webp',
  'wings.webp',
  'wings2.webp',
  ] as $img)
  <link rel="preload" as="image" href="{{ asset('assets/img/slider/' . $img) }}" imagesrcset="{{ asset('assets/img/slider/' . $img) }}">
  @endforeach
  @endpush


  <div
    id="page-container"
    class="mx-auto flex min-h-dvh w-full min-w-[320px] flex-col bg-gray-100">

    <!-- Page Container -->
    <div
      id="page-container"
      class="mx-auto flex min-h-dvh w-full min-w-[320px] flex-col bg-gray-100">
      <!-- Page Content -->
      <main id="page-content" class="flex max-w-full flex-auto flex-col">
        <!-- Hero -->
        <div class="bg-gradient-to-tr from-gray-950 via-gray-900 to-gray-950">
          <!-- Hero Content -->
          <div
            class="container mx-auto px-4 pt-12 lg:px-8 lg:pt-20 xl:max-w-6xl">
            <!-- Logo -->
            <div class="flex justify-center h-56 sm:h-64 md:h-80 animate-fade-in">
              <img
                src="{{ asset('assets/img/sportbarlogo.png') }}"
                alt="Charros Brew Bar Logo - Sport Bar en Estadio Charros de Jalisco Guadalajara"
                class="mx-auto mb-4 object-contain drop-shadow-2xl" />
            </div>

            <div class="text-center space-y-6">
              <h2
                class="mb-6 text-4xl font-black text-balance text-white md:text-6xl tracking-tight leading-tight drop-shadow-lg animate-slide-up">
                Charros Brew Bar <br>
                <span class="text-yellow-300">Una nueva experiencia</span> en el béisbol
              </h2>
              <h3
                class="mx-auto text-xl font-medium text-gray-100 md:text-2xl md:leading-relaxed lg:w-3/4 animate-slide-up-delay">
                Disfruta del juego de <span class="font-bold text-white">Charros de Jalisco</span> desde nuestra vista privilegiada, mientras disfrutas de las bebidas y botanas que tenemos para ti.
              </h3>
            </div>

            <div class="flex flex-wrap justify-center gap-6 pt-12 pb-20">
              <a href="{{ route('reservation.show') }}" class="group">
                <button
                  type="button"
                  class="gold-button text-xl shadow-yellow-400/30">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-check group-hover:scale-110 transition-transform">
                    <path d="M8 2v4" />
                    <path d="M16 2v4" />
                    <rect width="18" height="18" x="3" y="4" rx="2" />
                    <path d="M3 10h18" />
                    <path d="m9 16 2 2 4-4" />
                  </svg>
                  <span class="">¡Reserva Ya!</span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right group-hover:translate-x-1 transition-transform">
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </button>
              </a>
            </div>

            <!-- Carousel Container -->
            <div class="relative mx-5 -mb-24 rounded-2xl bg-white p-3 shadow-2xl sm:-mb-48 lg:mx-32 overflow-hidden border-4 border-yellow-400/30">
              <div
                id="carousel-slide"
                class="flex transition-transform duration-500 ease-in-out w-full"
                style="min-width: 0;">
                @foreach([
                ['balls.webp', 'Muro de pelotas de béisbol en Charros Brew Bar'],
                ['beer.webp', 'Cerveza fría servida en Charros Brew Bar'],
                ['boneless.webp', 'Deliciosos boneless - botanas en Sport Bar'],
                ['caliente.webp', 'Ambiente deportivo durante partido de Charros'],
                ['field.webp', 'Vista privilegiada al campo de béisbol desde Sport Bar'],
                ['people.webp', 'Fans disfrutando del béisbol en Charros Brew Bar'],
                ['people2.webp', 'Grupo de amigos viendo partido de béisbol'],
                ['people3.webp', 'Clientes disfrutando comida y bebidas en Sport Bar'],
                ['people4.webp', 'Ambiente familiar en Charros Brew Bar Guadalajara'],
                ['people5.webp', 'Aficionados celebrando en el estadio'],
                ['people6.webp', 'Experiencia única viendo béisbol profesional'],
                ['steak.webp', 'Cortes de carne premium en Sport Bar'],
                ['steakbeer.webp', 'Carne asada acompañada de cerveza artesanal'],
                ['table.webp', 'Mesas con vista al estadio de béisbol'],
                ['wings.webp', 'Alitas picantes estilo búfalo'],
                ['wings2.webp', 'Variedad de alitas y salsas en menú'],
                ] as [$img, $alt])
                <img
                  src="{{ asset('assets/img/slider/' . $img) }}"
                  alt="{{ $alt }}"
                  class="w-full flex-shrink-0 aspect-[3/2] rounded-lg object-cover border-4 border-white transition-all duration-600" />
                @endforeach
              </div>

              <button id="prevBtn"
                class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/60 backdrop-blur-sm text-white p-3 rounded-full hover:bg-black/80 transition-all duration-300 text-xl w-12 h-12 flex items-center justify-center z-10 hover:scale-110 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left">
                  <path d="m15 18-6-6 6-6" />
                </svg>
              </button>
              <button id="nextBtn"
                class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/60 backdrop-blur-sm text-white p-3 rounded-full hover:bg-black/80 transition-all duration-300 text-xl w-12 h-12 flex items-center justify-center z-10 hover:scale-110 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
                  <path d="m9 18 6-6-6-6" />
                </svg>
              </button>

              <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-2 z-10" id="carousel-nav"></div>
            </div>
          </div>
          <!-- END Hero Content -->
        </div>
        <!-- END Hero -->

        <!-- Features Section -->
        <div class="bg-gradient-to-b from-white to-gray-50 pt-48">
          <div
            class="container mx-auto space-y-16 px-4 py-20 lg:px-8 lg:py-32 xl:max-w-6xl">
            <!-- Heading -->
            <div class="text-center space-y-4">
              <h2 class="mb-6 text-4xl font-black text-gray-900 md:text-5xl">
                ¡Una experiencia <span class="text-yellow-500">completa</span>!
              </h2>
              <h3
                class="mx-auto text-xl font-medium text-gray-700 md:text-2xl md:leading-relaxed lg:w-3/4">
                Nos esforzamos por ofrecer una experiencia completa para que puedas disfrutar del juego de Charros de Jalisco como nunca antes.
              </h3>
            </div>
            <!-- END Heading -->

            <!-- Features -->
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3 md:gap-10">
              <div class="group py-8 text-center hover:scale-105 transition-transform duration-300">
                <div
                  class="relative mb-8 mx-auto inline-flex h-20 w-20 items-center justify-center">
                  <div
                    class="absolute inset-0 -m-4 rounded-2xl bg-gradient-to-br from-yellow-300 to-yellow-500 opacity-20 group-hover:opacity-30 transition-opacity blur-xl"></div>
                  <div
                    class="absolute inset-0 -m-3 rounded-2xl bg-gradient-to-br from-yellow-400 to-yellow-600 group-hover:scale-110 transition-transform"></div>
                  <span
                    class="relative text-2xl font-semibold text-white group-hover:scale-125 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hamburger">
                      <path d="M12 16H4a2 2 0 1 1 0-4h16a2 2 0 1 1 0 4h-4.25" />
                      <path d="M5 12a2 2 0 0 1-2-2 9 7 0 0 1 18 0 2 2 0 0 1-2 2" />
                      <path d="M5 16a2 2 0 0 0-2 2 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 2 2 0 0 0-2-2q0 0 0 0" />
                      <path d="m6.67 12 6.13 4.6a2 2 0 0 0 2.8-.4l3.15-4.2" />
                    </svg>
                  </span>
                </div>
                <h4 class="mb-4 text-2xl font-bold text-gray-900">Comida</h4>
                <p class="text-base leading-relaxed text-gray-600 px-4">
                  Disfruta de una amplia variedad de platillos y botanas que tenemos para ti, para que puedas disfrutar del juego sin preocupaciones.
                </p>
              </div>
              <div class="group py-8 text-center hover:scale-105 transition-transform duration-300">
                <div
                  class="relative mb-8 mx-auto inline-flex h-20 w-20 items-center justify-center">
                  <div
                    class="absolute inset-0 -m-4 rounded-2xl bg-gradient-to-br from-yellow-300 to-yellow-500 opacity-20 group-hover:opacity-30 transition-opacity blur-xl"></div>
                  <div
                    class="absolute inset-0 -m-3 rounded-2xl bg-gradient-to-br from-yellow-400 to-yellow-600 group-hover:scale-110 transition-transform"></div>
                  <span
                    class="relative text-2xl font-semibold text-white group-hover:scale-125 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 256 256">
                      <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24ZM72.09,195.91c.82-1,1.64-1.93,2.42-2.91A8,8,0,1,0,62,183l-1.34,1.62a87.82,87.82,0,0,1,0-113.24L62,73A8,8,0,1,0,74.51,63c-.78-1-1.6-2-2.42-2.91a87.84,87.84,0,0,1,111.82,0c-.82,1-1.64,1.92-2.42,2.91A8,8,0,1,0,194,73l1.34-1.62a87.82,87.82,0,0,1,0,113.24L194,183a8,8,0,1,0-12.48,10c.78,1,1.6,1.95,2.42,2.91a87.84,87.84,0,0,1-111.82,0Zm23.8-50.59a104.5,104.5,0,0,1-4.48,17.35,8,8,0,0,1-15.09-5.34,87.1,87.1,0,0,0,3.79-14.65,8,8,0,1,1,15.78,2.64Zm0-34.64a8,8,0,0,1-6.57,9.21A8.52,8.52,0,0,1,88,120a8,8,0,0,1-7.88-6.68,87.1,87.1,0,0,0-3.79-14.65,8,8,0,0,1,15.09-5.34A104.5,104.5,0,0,1,95.89,110.68Zm78.91,56.86a8,8,0,0,1-10.21-4.87,104.5,104.5,0,0,1-4.48-17.35,8,8,0,1,1,15.78-2.64,87.1,87.1,0,0,0,3.79,14.65A8,8,0,0,1,174.8,167.54Zm-14.69-56.86a104.5,104.5,0,0,1,4.48-17.35,8,8,0,0,1,15.09,5.34,87.1,87.1,0,0,0-3.79,14.65A8,8,0,0,1,168,120a8.52,8.52,0,0,1-1.33-.11A8,8,0,0,1,160.11,110.68Z"></path>
                    </svg>
                  </span>
                </div>
                <h4 class="mb-4 text-2xl font-bold text-gray-900">Vista Privilegiada</h4>
                <p class="text-base leading-relaxed text-gray-600 px-4">
                  Una de las mejores vistas del estadio de Charros de Jalisco, para que puedas disfrutar del juego como nunca antes.
                </p>
              </div>
              <div class="group py-8 text-center hover:scale-105 transition-transform duration-300">
                <div
                  class="relative mb-8 mx-auto inline-flex h-20 w-20 items-center justify-center">
                  <div
                    class="absolute inset-0 -m-4 rounded-2xl bg-gradient-to-br from-yellow-300 to-yellow-500 opacity-20 group-hover:opacity-30 transition-opacity blur-xl"></div>
                  <div
                    class="absolute inset-0 -m-3 rounded-2xl bg-gradient-to-br from-yellow-400 to-yellow-600 group-hover:scale-110 transition-transform"></div>
                  <span
                    class="relative text-3xl font-bold text-white group-hover:scale-125 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-party-popper">
                      <path d="M5.8 11.3 2 22l10.7-3.79" />
                      <path d="M4 3h.01" />
                      <path d="M22 8h.01" />
                      <path d="M15 2h.01" />
                      <path d="M22 20h.01" />
                      <path d="m22 2-2.24.75a2.9 2.9 0 0 0-1.96 3.12c.1.86-.57 1.63-1.45 1.63h-.38c-.86 0-1.6.6-1.76 1.44L14 10" />
                      <path d="m22 13-.82-.33c-.86-.34-1.82.2-1.98 1.11c-.11.7-.72 1.22-1.43 1.22H17" />
                      <path d="m11 2 .33.82c.34.86-.2 1.82-1.11 1.98C9.52 4.9 9 5.52 9 6.23V7" />
                      <path d="M11 13c1.93 1.93 2.83 4.17 2 5-.83.83-3.07-.07-5-2-1.93-1.93-2.83-4.17-2-5 .83-.83 3.07.07 5 2Z" />
                    </svg>
                  </span>
                </div>
                <h4 class="mb-4 text-2xl font-bold text-gray-900">Ambiente Único</h4>
                <p class="text-base leading-relaxed text-gray-600 px-4">
                  Disfruta de un ambiente único y lleno de energía, disfrutando además de otros encuentros deportivos en nuestras pantallas.
                </p>
              </div>
            </div>
            <!-- END Features -->
          </div>
        </div>
        <!-- END Features Section -->

        <!-- Experience Highlights -->
        <div class="bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950">
          <div class="container mx-auto space-y-12 px-4 py-16 lg:px-8 lg:py-24 xl:max-w-6xl">
            <div class="text-center space-y-4">
              <span class="gold-badge">Novedades 2026</span>
              <h2 class="text-4xl font-black text-white md:text-5xl">
                Más que un juego: <span class="text-yellow-400">experiencias</span>
              </h2>
              <p class="mx-auto text-lg font-medium text-gray-200 md:text-xl lg:w-3/4">
                Sumamos detalles que elevan cada visita: más comodidad, más sabor y más momentos para compartir.
              </p>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
              <div class="gold-card p-8 text-center">
                <div class="mx-auto mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-yellow-400 text-gray-900 shadow-lg shadow-yellow-400/30">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-7 w-7">
                    <circle cx="12" cy="12" r="9" />
                    <path d="M12 7v5l3 2" />
                  </svg>
                </div>
                <h4 class="mb-3 text-xl font-bold text-white">Reservas inteligentes</h4>
                <p class="text-sm leading-relaxed text-gray-200">Confirmaciones en minutos y recordatorios antes del juego.</p>
              </div>

              <div class="gold-card p-8 text-center">
                <div class="mx-auto mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-yellow-400 text-gray-900 shadow-lg shadow-yellow-400/30">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7">
                    <path d="M12 2l2.6 5.3 5.9.8-4.3 4.1 1 5.8L12 15.7 6.8 18.9l1-5.8-4.3-4.1 5.9-.8L12 2z" />
                  </svg>
                </div>
                <h4 class="mb-3 text-xl font-bold text-white">Combos dorados</h4>
                <p class="text-sm leading-relaxed text-gray-200">Promos especiales en botanas y bebidas durante la serie.</p>
              </div>

              <div class="gold-card p-8 text-center">
                <div class="mx-auto mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-yellow-400 text-gray-900 shadow-lg shadow-yellow-400/30">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-7 w-7">
                    <path d="M4 6h16v12H4z" />
                    <path d="M8 6V4h8v2" />
                    <path d="M9 12h6" />
                    <path d="M9 15h6" />
                  </svg>
                </div>
                <h4 class="mb-3 text-xl font-bold text-white">Eventos tematicos</h4>
                <p class="text-sm leading-relaxed text-gray-200">Noches retro, invitados y activaciones sorpresa.</p>
              </div>

              <div class="gold-card p-8 text-center">
                <div class="mx-auto mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-yellow-400 text-gray-900 shadow-lg shadow-yellow-400/30">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-7 w-7">
                    <path d="M16 11a4 4 0 1 0-8 0" />
                    <path d="M6 20a6 6 0 0 1 12 0" />
                    <path d="M17.5 8.5a3.5 3.5 0 1 0-3.5-3.5" />
                  </svg>
                </div>
                <h4 class="mb-3 text-xl font-bold text-white">Zona familiar</h4>
                <p class="text-sm leading-relaxed text-gray-200">Espacios comodos para venir con amigos y familia.</p>
              </div>
            </div>
          </div>
        </div>
        <!-- END Experience Highlights -->

        <!-- How it works -->
        <div class="relative bg-gray-50 overflow-hidden">
          <div class="absolute mt-14 mb-14 inset-0 skew-y-2 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900"></div>
          <div
            class="relative container mx-auto space-y-16 px-4 py-20 lg:px-8 lg:py-32 xl:max-w-7xl">
            <!-- Heading -->
            <div class="text-center space-y-4">
              <h2 class="text-4xl font-black text-white md:text-5xl drop-shadow-lg">
                ¿Cómo <span class="text-yellow-300">reservar</span>?
              </h2>
              <p class="text-xl text-gray-100 max-w-2xl mx-auto">Sigue estos simples pasos y asegura tu lugar</p>
            </div>
            <!-- END Heading -->

            <!-- Steps -->
            <div
              class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-8 lg:grid-cols-3">
              <div
                class="group rounded-3xl bg-white/10 backdrop-blur-sm p-8 shadow-2xl transition-all duration-300 hover:bg-white/20 hover:scale-105 hover:-translate-y-2 border border-white/10">
                <svg height="56" viewBox="0 0 33.033 33.549" width="56" xmlns="http://www.w3.org/2000/svg"
                  class="hi-outline hi-cube mb-6 inline-block h-14 w-14 text-yellow-300 group-hover:text-yellow-200 transition-colors group-hover:scale-110 duration-300"
                  fill="currentColor">
                  <g transform="translate(-607.873 -577.167)">
                    <path d="M638.546,610.716a1,1,0,0,1-.942-1.334c1.785-5.044,1.745-8.637-.12-10.679-3.26-3.568-11.186-1.6-11.266-1.574l-1.247.318V586l.016-.087a3.188,3.188,0,0,0-.274-2.085.7.7,0,0,0-.609-.226.774.774,0,0,0-.657.247,3.155,3.155,0,0,0-.346,2.033l.011.144v15.115l-1.155-.18c-1.766-.279-2.336.02-2.408.158-.459.9,2.05,4.66,5.264,7.888a1,1,0,0,1-1.418,1.412c-1.681-1.689-7.053-7.412-5.627-10.208.645-1.265,2.182-1.425,3.344-1.359V586.094a4.926,4.926,0,0,1,.822-3.55,2.768,2.768,0,0,1,2.17-.939,2.678,2.678,0,0,1,2.144.944,4.94,4.94,0,0,1,.723,3.624v8.757c2.643-.466,8.781-1.085,11.987,2.42,2.406,2.629,2.585,6.9.532,12.7A1,1,0,0,1,638.546,610.716Z" />
                    <path d="M612.733,586.792a2.2,2.2,0,0,1-1.562-.646l-3.005-3.005a1,1,0,0,1,1.414-1.414l3.006,3.005a.211.211,0,0,0,.3,0l6.522-6.521a1,1,0,0,1,1.414,1.414l-6.523,6.522A2.2,2.2,0,0,1,612.733,586.792Z" />
                    <path d="M639.392,587.543a1,1,0,0,1-.707-.293l-8.376-8.376a1,1,0,0,1,1.414-1.414l8.376,8.376a1,1,0,0,1-.707,1.707Z" />
                    <path d="M631.016,587.543a1,1,0,0,1-.707-1.707l8.376-8.376a1,1,0,0,1,1.414,1.414l-8.376,8.376A1,1,0,0,1,631.016,587.543Z" />
                  </g>
                </svg>
                <div class="space-y-3">
                  <span class="inline-block px-3 py-1 bg-yellow-400/20 rounded-full text-sm font-bold text-yellow-100">Paso 1</span>
                  <h4 class="text-xl font-bold text-white">
                    Ingresa a nuestra web y elige tu mesa
                  </h4>
                  <p class="text-base leading-relaxed text-gray-100">
                    En la sección de reserva podrás ver nuestras mesas disponibles y elegir la que más te convenga.
                  </p>
                </div>
              </div>
              <div
                class="group rounded-3xl bg-white/10 backdrop-blur-sm p-8 shadow-2xl transition-all duration-300 hover:bg-white/20 hover:scale-105 hover:-translate-y-2 border border-white/10">
                <svg
                  stroke="currentColor"
                  fill="none"
                  height="56"
                  width="56"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                  class="hi-outline hi-cube mb-6 inline-block h-14 w-14 text-yellow-300 group-hover:text-yellow-200 transition-colors group-hover:scale-110 duration-300">
                  <polyline
                    clip-rule="evenodd"
                    fill="none"
                    fill-rule="evenodd"
                    points="21.2,5.6 11.2,15.2 6.8,10.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1" />
                  <path
                    d="M19.9,13c-0.5,3.9-3.9,7-7.9,7c-4.4,0-8-3.6-8-8c0-4.4,3.6-8,8-8c1.4,0,2.7,0.4,3.9,1l1.5-1.5C15.8,2.6,14,2,12,2  
                        C6.5,2,2,6.5,2,12c0,5.5,4.5,10,10,10c5.2,0,9.4-3.9,9.9-9H19.9z"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                    fill="currentColor" />
                </svg>
                <div class="space-y-3">
                  <span class="inline-block px-3 py-1 bg-yellow-400/20 rounded-full text-sm font-bold text-yellow-100">Paso 2</span>
                  <h4 class="text-xl font-bold text-white">
                    Confirma tu reserva y realiza el pago
                  </h4>
                  <p class="text-base leading-relaxed text-gray-100">
                    Realiza el pago por medio de tarjeta de crédito o débito, y recibe tu confirmación de reserva. Recibirás un correo con todos los detalles.
                  </p>
                </div>
              </div>
              <div
                class="group rounded-3xl bg-white/10 backdrop-blur-sm p-8 shadow-2xl transition-all duration-300 hover:bg-white/20 hover:scale-105 hover:-translate-y-2 sm:col-span-2 lg:col-span-1 border border-white/10">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="56" height="56"
                  class="hi-outline hi-cube mb-6 inline-block h-14 w-14 text-yellow-300 group-hover:text-yellow-200 transition-colors group-hover:scale-110 duration-300"
                  fill="currentColor">
                  <path d="M12,0C5.4,0,0,5.4,0,12s5.4,12,12,12s12-5.4,12-12S18.6,0,12,0z M11.9,2c-0.1,0.9-0.3,1.8-0.6,2.6l-0.2-0.2 c-0.2-0.2-0.5-0.2-0.7,0c-0.2,0.2-0.2,0.5,0,0.7L11,5.6c-0.4,0.9-1,1.8-1.7,2.6L8.4,7.3c-0.2-0.2-0.5-0.2-0.7,0 C7.5,7.5,7.5,7.8,7.7,8l0.9,0.9C7.9,9.6,7,10.2,6.1,10.7l-0.6-0.6c-0.2-0.2-0.5-0.2-0.7,0c-0.2,0.2-0.2,0.5,0,0.7l0.3,0.3 c-1,0.4-2.1,0.7-3.2,0.8C2,6.5,6.5,2,11.9,2z M11.1,22c-4.8-0.4-8.6-4.2-9-9c1.4-0.1,2.7-0.5,3.9-1l1,1c0.2,0.2,0.5,0.2,0.7,0 c0.2-0.2,0.2-0.5,0-0.7l-0.8-0.8c0.9-0.5,1.7-1.1,2.4-1.8l0.5,0.5c0.2,0.2,0.5,0.2,0.7,0c0.2-0.2,0.2-0.5,0-0.7L10,8.9 c0.7-0.8,1.3-1.6,1.7-2.6l0.9,0.9c0.2,0.2,0.5,0.2,0.7,0c0.2-0.2,0.2-0.5,0-0.7l-1.2-1.2c0.4-1,0.7-2.2,0.8-3.3c4.8,0.4,8.6,4.2,9,9 c-1.2,0.1-2.3,0.4-3.3,0.8l-1.4-1.4c-0.2-0.2-0.5-0.2-0.7,0c-0.2,0.2-0.2,0.5,0,0.7l1.1,1.1c-0.9,0.5-1.8,1-2.6,1.7l-0.7-0.7 c-0.2-0.2-0.5-0.2-0.7,0c-0.2,0.2-0.2,0.5,0,0.7l0.7,0.7c-0.7,0.7-1.3,1.6-1.8,2.4l-1-1c-0.2-0.2-0.5-0.2-0.7,0s-0.2,0.5,0,0.7 l1.2,1.2C11.5,19.3,11.2,20.6,11.1,22z M12.1,22c0.1-1.1,0.4-2.2,0.8-3.2L13,19c0.2,0.2,0.5,0.2,0.7,0c0.2-0.2,0.2-0.5,0-0.7 l-0.4-0.4c0.5-0.9,1.1-1.7,1.8-2.5l0.8,0.8c0.2,0.2,0.5,0.2,0.7,0c0.2-0.2,0.2-0.5,0-0.7l-0.7-0.7c0.8-0.7,1.6-1.2,2.6-1.7l0.3,0.3 c0.2,0.2,0.5,0.2,0.7,0c0.2-0.2,0.2-0.5,0-0.7c0.8-0.3,1.7-0.5,2.6-0.6C22,17.5,17.5,22,12.1,22z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                  <polyline clip-rule="evenodd" fill="none" fill-rule="evenodd" points="21.2,5.6 11.2,15.2 6.8,10.8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>

                <div class="space-y-3">
                  <span class="inline-block px-3 py-1 bg-yellow-400/20 rounded-full text-sm font-bold text-yellow-100">Paso 3</span>
                  <h4 class="text-xl font-bold text-white">
                    Te esperamos en el estadio
                  </h4>
                  <p class="text-base leading-relaxed text-gray-100">
                    Vístete con tu jersey y ven a disfrutar del juego de Charros de Jalisco. Tu reserva incluye consumo en bebidas y botanas.
                  </p>
                </div>
              </div>
            </div>
            <!-- END Steps -->
            <div class="text-center pt-8">
              <a href="{{ route('reservation.show') }}" class="inline-block group">
                <button
                  type="button"
                  class="gold-button text-lg shadow-yellow-400/30">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" data-slot="icon" class="inline-block size-6 opacity-70 group-hover:opacity-100 transition-opacity">
                    <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" />
                  </svg>
                  <span>Haz tu reserva ahora</span>
                </button>
              </a>
            </div>
          </div>
        </div>
        <!-- How it works -->
        <!-- 
        Pricing Section -->
        <div class="bg-gradient-to-b from-gray-50 to-white">
          <div
            class="container mx-auto space-y-16 px-4 py-20 lg:px-8 lg:py-32 xl:max-w-5xl">
            <!-- Heading -->
            <div class="text-center space-y-4">
              <h2 class="mb-4 text-4xl font-black text-gray-900 md:text-5xl">
                Elige tu mesa <span class="text-yellow-500">ideal</span>
              </h2>
              <h3
                class="mx-auto text-xl font-medium text-gray-700 md:leading-relaxed lg:w-3/4">
                Disfrutar de un juego de Charros de Jalisco nunca fue tan fácil. Elige tu mesa y disfruta de una experiencia única.
              </h3>
            </div>
            <!-- END Heading -->

            <!-- Pricing Plans -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:gap-10">
              <!-- Developer Plan -->
              <div
                class="group flex flex-col rounded-3xl border-2 border-gray-200 bg-white shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div class="grow p-8 lg:p-10 space-y-6">
                  <div class="inline-flex items-center gap-2 bg-yellow-100 px-4 py-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-700">
                      <path fill-rule="evenodd" d="M4.5 2A1.5 1.5 0 003 3.5v13A1.5 1.5 0 004.5 18h11a1.5 1.5 0 001.5-1.5v-13A1.5 1.5 0 0015.5 2h-11zm4.5 9a3 3 0 100-6 3 3 0 000 6zm7 7h-11v-1.5a1.5 1.5 0 011.5-1.5h8a1.5 1.5 0 011.5 1.5V18z" clip-rule="evenodd" />
                    </svg>
                    <span
                      class="text-sm font-bold tracking-wider text-yellow-800 uppercase">
                      Zona General
                    </span>
                  </div>
                  <div class="space-y-2">
                    <span class="text-xs text-gray-600">Desde</span>
                    <div class="flex items-baseline gap-2">
                      <span class="text-5xl font-black text-gray-900 lg:text-6xl">$250</span>
                      <span class="text-lg font-semibold text-gray-600">por persona</span>
                    </div>
                    <p class="text-base text-gray-600 leading-relaxed">
                      Incluye
                      <span class="font-bold text-gray-800">reembolso del 100% en consumo *</span>
                    </p>
                  </div>
                  <div class="space-y-3 pt-4 border-t border-gray-200">
                    <div class="flex items-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-green-600">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                      </svg>
                      <span class="text-sm text-gray-700">Excelente ubicación y vista al campo</span>
                    </div>
                    <div class="flex items-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-green-600">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                      </svg>
                      <span class="text-sm text-gray-700">Alimentos y bebidas incluidos</span>
                    </div>
                    <div class="flex items-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-green-600">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                      </svg>
                      <span class="text-sm text-gray-700">Servicio de calidad</span>
                    </div>
                  </div>
                </div>
                <div class="rounded-b-3xl bg-gradient-to-r from-gray-50 to-gray-100 p-6 lg:p-8">
                  <a
                    href="{{ route('reservation.show') }}"
                    class="group inline-flex w-full items-center justify-center gap-2 rounded-full border-2 border-gray-800 bg-gray-800 px-8 py-4 leading-6 font-bold text-white hover:bg-gray-700 hover:border-gray-700 hover:scale-105 focus:ring-4 focus:ring-gray-500/25 focus:outline-hidden transition-all duration-300 shadow-lg">
                    <span>Reservar ahora</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 group-hover:translate-x-1 transition-transform">
                      <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" />
                    </svg>
                  </a>
                </div>
              </div>
              <!-- END Developer Plan -->

              <!-- Agency Plan -->
              <div
                class="relative group flex flex-col rounded-3xl border-2 border-gray-400 bg-gradient-to-br from-gray-600 to-gray-800 shadow-2xl hover:shadow-3xl hover:scale-105 transition-all duration-300">
                <div class="absolute inset-0 bg-gradient-to-tr from-gray-400/20 to-transparent rounded-3xl"></div>
                <div
                  class="absolute -top-4 -right-4 flex items-center justify-center">
                  <div class="relative">
                    <div class="absolute inset-0 bg-yellow-400 rounded-full blur-xl opacity-75 animate-pulse"></div>
                    <div class="relative bg-yellow-400 rounded-full p-3">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6 text-gray-900">
                        <path
                          fill-rule="evenodd"
                          d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                          clip-rule="evenodd" />
                      </svg>
                    </div>
                  </div>
                </div>
                <div class="relative grow p-8 lg:p-10 space-y-6">
                  <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-yellow-300">
                      <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm font-bold tracking-wider text-white uppercase">Mesa VIP</span>
                  </div>
                  <div class="space-y-2">
                    <span class="text-xs text-gray-100">Desde</span>
                    <div class="flex items-baseline gap-2">
                      <span class="text-5xl font-black text-white lg:text-6xl">$500</span>
                      <span class="text-lg font-semibold text-gray-100">por persona</span>
                    </div>
                    <p class="text-base text-gray-100 leading-relaxed">
                      Con
                      <span class="font-bold text-white">vista privilegiada más cercana al campo</span> y
                      <span class="font-bold text-white">reembolso de del 100% en consumo en juegos seleccionados. *</span>
                    </p>
                  </div>
                  <div class="space-y-3 pt-4 border-t border-white/20">
                    <div class="flex items-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-yellow-300">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                      </svg>
                      <span class="text-sm text-white font-medium">Ubicación premium</span>
                    </div>
                    <div class="flex items-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-yellow-300">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                      </svg>
                      <span class="text-sm text-white font-medium">Mejor vista al campo</span>
                    </div>
                    <div class="flex items-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-yellow-300">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                      </svg>
                      <span class="text-sm text-white font-medium">Mayor consumo incluido</span>
                    </div>
                  </div>
                </div>
                <div class="relative rounded-b-3xl bg-white/10 backdrop-blur-sm p-6 lg:p-8 border-t border-white/20">
                  <a
                    href="{{ route('reservation.show') }}"
                    class="group inline-flex w-full items-center justify-center gap-2 rounded-full border-2 border-white bg-white px-8 py-4 leading-6 font-bold text-gray-900 hover:bg-gray-50 hover:scale-105 focus:ring-4 focus:ring-white/50 focus:outline-hidden transition-all duration-300 shadow-xl">
                    <span>Reservar VIP</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 group-hover:translate-x-1 transition-transform">
                      <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" />
                    </svg>
                  </a>
                </div>
              </div>
              <p>*Aplican restricciones</p>
              <!-- END Agency Plan -->
            </div>
            <!-- END Pricing Plans -->
          </div>
        </div>
        <!-- END Pricing Section -->

        <!-- Stats Section -->
        <div class="relative bg-gradient-to-br from-gray-900 via-gray-900 to-gray-900 overflow-hidden">
          <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wMyI+PHBhdGggZD0iTTM2IDE0YzAtMS4xLjktMiAyLTJoMmMxLjEgMCAyIC45IDIgMnYyYzAgMS4xLS45IDItMiAyaC0yYy0xLjEgMC0yLS45LTItMnYtMnptMCAwIi8+PC9nPjwvZz48L3N2Zz4=')] opacity-20"></div>
          <div class="relative container mx-auto px-4 py-20 lg:px-8 lg:py-32 xl:max-w-7xl">
            <div class="text-center mb-16 space-y-4">
              <h2 class="text-4xl font-black text-white md:text-5xl drop-shadow-lg">
                Legado de <span class="text-yellow-400">campeones</span>
              </h2>
              <p class="text-xl text-gray-200 max-w-2xl mx-auto">Forma parte de nuestra historia</p>
            </div>
            <div
              class="grid grid-cols-1 gap-8 text-center sm:grid-cols-3 lg:gap-12">
              <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-br from-yellow-400/20 to-yellow-600/20 rounded-3xl blur-xl group-hover:blur-2xl transition-all duration-300"></div>
                <dl class="relative space-y-4 px-8 py-16 lg:py-20 bg-white/5 backdrop-blur-sm rounded-3xl border border-yellow-400/30 hover:bg-white/10 hover:scale-105 transition-all duration-300">
                  <dt class="text-7xl font-black text-yellow-400 drop-shadow-[0_0_15px_rgba(251,191,36,0.5)] animate-pulse">★★★★</dt>
                  <dd class="space-y-2">
                    <p class="text-2xl font-bold text-white">4 Campeonatos</p>
                    <p class="text-base font-semibold tracking-wide text-yellow-300 uppercase">
                      Liga Mexicana del Pacífico
                    </p>
                  </dd>
                </dl>
              </div>
              <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-br from-gray-400/20 to-gray-600/20 rounded-3xl blur-xl group-hover:blur-2xl transition-all duration-300"></div>
                <dl class="relative space-y-4 px-8 py-16 lg:py-20 bg-white/5 backdrop-blur-sm rounded-3xl border border-gray-400/30 hover:bg-white/10 hover:scale-105 transition-all duration-300">
                  <dt class="text-7xl font-black text-gray-400 drop-shadow-[0_0_15px_rgba(96,165,250,0.5)]">★★</dt>
                  <dd class="space-y-2">
                    <p class="text-2xl font-bold text-white">2 Campeonatos</p>
                    <p class="text-base font-semibold tracking-wide text-gray-300 uppercase">
                      Liga Mexicana de Béisbol
                    </p>
                  </dd>
                </dl>
              </div>
              <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-br from-green-400/20 to-green-600/20 rounded-3xl blur-xl group-hover:blur-2xl transition-all duration-300"></div>
                <dl class="relative space-y-4 px-8 py-16 lg:py-20 bg-white/5 backdrop-blur-sm rounded-3xl border border-green-400/30 hover:bg-white/10 hover:scale-105 transition-all duration-300">
                  <dt class="text-7xl font-black text-green-400 drop-shadow-[0_0_15px_rgba(74,222,128,0.5)]">★</dt>
                  <dd class="space-y-2">
                    <p class="text-2xl font-bold text-white">1 Campeonato</p>
                    <p class="text-base font-semibold tracking-wide text-green-300 uppercase">
                      Liga Mexicana de Softbol
                    </p>
                  </dd>
                </dl>
              </div>
            </div>
            <div class="text-center mt-16">
              <p class="text-lg text-gray-200 max-w-3xl mx-auto leading-relaxed">
                Forma parte de la historia viviendo la emoción del béisbol profesional mexicano en <br> <span class="font-bold text-white">Charros Brew Bar</span>
              </p>
            </div>
          </div>
        </div>
        <!-- Stats Section -->


      </main>
      <!-- END Page Content -->
    </div>
    <!-- END Page Container --> <!-- Aquí va el contenido de tu página -->
  </div>
</x-app-layout>