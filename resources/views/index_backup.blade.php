<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Charros Sport Bar') }}
    </h2>
  </x-slot>


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
        <div class="bg-blue-900">
          <!-- Header -->

          <!-- END Header -->

          <!-- Hero Content -->
          <div
            class="container mx-auto px-4 pt-8 lg:px-8 lg:pt-16 xl:max-w-6xl">
            <!-- Add logo  -->
            <div class="flex justify-center h-64 sm:h-64 md:h-96 ">
              <img
                src="{{ asset('assets/img/sportbarlogo.png') }}"
                alt="Logo"
                class="mx-auto mb-4 object-cover" />
            </div>

            <div class="text-center">
              <h2
                class="mb-4 text-3xl font-extrabold text-balance text-white md:text-5xl">
                Charros Sport Bar <br>
                Una nueva experiencia en el béisbol
              </h2>
              <h3
                class="mx-auto text-lg font-medium text-gray-400 md:text-xl md:leading-relaxed lg:w-2/3">
                Disfruta del juego de Charros de Jalisco desde nuestra vista privilegiada, mientras disfrutas de las bebidas y botanas que tenemos para ti.
              </h3>
            </div>
            <div class="flex flex-wrap justify-center gap-4 pt-10 pb-16">
              <button
                type="button"
                class="inline-flex items-center justify-center gap-2 rounded-full border text-2xl border-blue-800 bg-blue-800 px-10 py-8 leading-6 font-semibold text-white hover:border-blue-700/50 hover:bg-blue-700/50 hover:text-white focus:ring-3 focus:ring-blue-500/50 focus:outline-hidden active:border-blue-700 active:bg-blue-700">
                <a href="{{ route('reservation.show') }}">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                  </svg>
                  <span class="">Reserva ya!</span>
                </a>
              </button>

            </div>
            <!-- <div
              class="relative mx-5 -mb-20 rounded-xl bg-white p-2 shadow-lg sm:-mb-40 lg:mx-32">
              <img
                src="assets/img/4E2A6779.JPG"
                alt="Hero Image"
                class="mx-auto aspect-3/2 w-full rounded-lg object-cover" />
            </div> -->
            <!-- Carousel Container -->
            <div class="relative mx-5 -mb-20 rounded-xl bg-white p-2 py-2 shadow-lg sm:-mb-40 lg:mx-32 overflow-hidden">
              <div
                id="carousel-slide"
                class="flex transition-transform duration-500 ease-in-out w-full"
                style="min-width: 0;">
                @foreach([
                ['balls.webp', 'murodepelotas'],
                ['beer.webp', 'cerveza'],
                ['boneless.webp', 'boneless'],
                ['caliente.webp', 'caliente'],
                ['field.webp', 'field'],
                ['people.webp', 'people'],
                ['people2.webp', 'people'],
                ['people3.webp', 'people'],
                ['people4.webp', 'people'],
                ['people5.webp', 'people'],
                ['people6.webp', 'people'],
                ['steak.webp', 'steak'],
                ['steakbeer.webp', 'steakbeer'],
                ['table.webp', 'table'],
                ['wings.webp', 'wings'],
                ['wings2.webp', 'wings2'],
                ] as [$img, $alt])
                <img
                  src="{{ asset('assets/img/slider/' . $img) }}"
                  alt="{{ $alt }}"
                  class="w-full flex-shrink-0 aspect-[3/2] rounded-lg object-cover border-4 border-white transition-all duration-600" />
                @endforeach
              </div>

              <button id="prevBtn"
                class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/50 text-white p-2 rounded-full hover:bg-black/80 transition-colors duration-300 text-xl w-10 h-10 flex items-center justify-center z-10">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
              </button>
              <button id="nextBtn"
                class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/50 text-white p-2 rounded-full hover:bg-black/80 transition-colors duration-300 text-xl w-10 h-10 flex items-center justify-center z-10">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
              </button>

              <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2" id="carousel-nav"></div>
            </div>
          </div>
          <!-- END Hero Content -->
        </div>
        <!-- END Hero -->

        <!-- Features Section -->
        <div class="bg-white pt-40">
          <div
            class="container mx-auto space-y-16 px-4 py-16 lg:px-8 lg:py-32 xl:max-w-6xl">
            <!-- Heading -->
            <div class="text-center">
              <h2 class="mb-4 text-3xl font-extrabold md:text-4xl">
                ¡Una experiencia completa!
              </h2>
              <h3
                class="mx-auto text-lg font-medium text-gray-600 md:text-xl md:leading-relaxed lg:w-2/3">
                Nos esforzamos por ofrecer una experiencia completa para que puedas disfrutar del juego de Charros de Jalisco como nunca antes.
              </h3>
            </div>
            <!-- END Heading -->

            <!-- Features -->
            <div class="grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-12">
              <div class="py-5 text-center">
                <div
                  class="relative mb-12 ml-3 inline-flex h-16 w-16 items-center justify-center">
                  <div
                    class="absolute inset-0 -m-3 translate-x-1 translate-y-1 rounded-full bg-blue-300"></div>
                  <div
                    class="absolute inset-0 -m-3 rounded-full bg-blue-600/75"></div>
                  <span
                    class="relative text-xl font-semibold text-white opacity-90 transition duration-150 ease-out group-hover:scale-125 group-hover:opacity-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline" style="color: #ffffff;">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.87c1.355 0 2.697.055 4.024.165C17.155 8.51 18 9.473 18 10.608v2.513m-3-4.87v-1.5m-6 1.5v-1.5m12 9.75l-1.5.75a3.354 3.354 0 01-3 0 3.354 3.354 0 00-3 0 3.354 3.354 0 01-3 0 3.354 3.354 0 00-3 0 3.354 3.354 0 01-3 0L3 16.5m15-3.38a48.474 48.474 0 00-6-.37c-2.032 0-4.034.125-6 .37m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.17c0 .62-.504 1.124-1.125 1.124H4.125A1.125 1.125 0 013 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 016 13.12M12.265 3.11a.375.375 0 11-.53 0L12 2.845l.265.265zm-3 0a.375.375 0 11-.53 0L9 2.845l.265.265zm6 0a.375.375 0 11-.53 0L15 2.845l.265.265z" />
                    </svg>
                  </span>
                </div>
                <h4 class="mb-2 text-xl font-bold">Comida</h4>
                <p class="text-left leading-relaxed text-gray-600">
                  Disfruta de una amplia variedad de platillos y botanas que tenemos para ti, para que puedas disfrutar del juego sin preocupaciones.
                </p>
              </div>
              <div class="py-5 text-center">
                <div
                  class="relative mb-12 ml-3 inline-flex h-16 w-16 items-center justify-center">
                  <div
                    class="absolute inset-0 -m-3 translate-x-1 translate-y-1 rounded-full bg-blue-300"></div>
                  <div
                    class="absolute inset-0 -m-3 rounded-full bg-blue-600/75"></div>
                  <span
                    class="relative text-xl font-semibold text-white opacity-90 transition duration-150 ease-out group-hover:scale-125 group-hover:opacity-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 9.563C9 9.252 9.252 9 9.563 9h4.874c.311 0 .563.252.563.563v4.874c0 .311-.252.563-.563.563H9.564A.562.562 0 019 14.437V9.564z" />
                    </svg>
                  </span>
                </div>
                <h4 class="mb-2 text-xl font-bold">Vista</h4>
                <p class="text-left leading-relaxed text-gray-600">
                  Una de las mejores vistas del estadio de Charros de Jalisco, para que puedas disfrutar del juego como nunca antes.
                </p>
              </div>
              <div class="py-5 text-center">
                <div
                  class="relative mb-12 ml-3 inline-flex h-16 w-16 items-center justify-center">
                  <div
                    class="absolute inset-0 -m-3 translate-x-1 translate-y-1 rounded-full bg-blue-300"></div>
                  <div
                    class="absolute inset-0 -m-3 rounded-full bg-blue-600/75"></div>
                  <span
                    class="relative text-xl font-semibold text-white opacity-90 transition duration-150 ease-out group-hover:scale-125 group-hover:opacity-100">:)</span>
                </div>
                <h4 class="mb-2 text-xl font-bold">Ambiente</h4>
                <p class="text-left leading-relaxed text-gray-600">
                  Disfruta de un ambiente único y lleno de energía, disfrutando además de otros encuentros deportivos en nuestras pantallas.
                </p>
              </div>
            </div>
            <!-- END Features -->
          </div>
        </div>
        <!-- END Features Section -->

        <!-- How it works -->
        <div class="relative bg-white">
          <div class="absolute inset-0 skew-y-1 bg-blue-900"></div>
          <div
            class="relative container mx-auto space-y-16 px-4 py-16 lg:px-8 lg:py-32 xl:max-w-7xl">
            <!-- Heading -->
            <div class="text-center">
              <h2 class="text-3xl font-extrabold text-white md:text-4xl">
                ¿Cómo reservar?
              </h2>
            </div>
            <!-- END Heading -->

            <!-- Steps -->
            <div
              class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-3">
              <div
                class="rounded-3xl bg-white/5 p-10 shadow-xs transition hover:bg-white/10">
                <!-- Falta un SVG aqui -->
                <svg height="48" viewBox="0 0 33.033 33.549" width="48" xmlns="http://www.w3.org/2000/svg"
                  class="hi-outline hi-cube mb-5 inline-block h-12 w-12 text-blue-300"
                  fill="currentColor">
                  <g transform="translate(-607.873 -577.167)">
                    <path d="M638.546,610.716a1,1,0,0,1-.942-1.334c1.785-5.044,1.745-8.637-.12-10.679-3.26-3.568-11.186-1.6-11.266-1.574l-1.247.318V586l.016-.087a3.188,3.188,0,0,0-.274-2.085.7.7,0,0,0-.609-.226.774.774,0,0,0-.657.247,3.155,3.155,0,0,0-.346,2.033l.011.144v15.115l-1.155-.18c-1.766-.279-2.336.02-2.408.158-.459.9,2.05,4.66,5.264,7.888a1,1,0,0,1-1.418,1.412c-1.681-1.689-7.053-7.412-5.627-10.208.645-1.265,2.182-1.425,3.344-1.359V586.094a4.926,4.926,0,0,1,.822-3.55,2.768,2.768,0,0,1,2.17-.939,2.678,2.678,0,0,1,2.144.944,4.94,4.94,0,0,1,.723,3.624v8.757c2.643-.466,8.781-1.085,11.987,2.42,2.406,2.629,2.585,6.9.532,12.7A1,1,0,0,1,638.546,610.716Z" />
                    <path d="M612.733,586.792a2.2,2.2,0,0,1-1.562-.646l-3.005-3.005a1,1,0,0,1,1.414-1.414l3.006,3.005a.211.211,0,0,0,.3,0l6.522-6.521a1,1,0,0,1,1.414,1.414l-6.523,6.522A2.2,2.2,0,0,1,612.733,586.792Z" />
                    <path d="M639.392,587.543a1,1,0,0,1-.707-.293l-8.376-8.376a1,1,0,0,1,1.414-1.414l8.376,8.376a1,1,0,0,1-.707,1.707Z" />
                    <path d="M631.016,587.543a1,1,0,0,1-.707-1.707l8.376-8.376a1,1,0,0,1,1.414,1.414l-8.376,8.376A1,1,0,0,1,631.016,587.543Z" />
                  </g>
                </svg>
                <h4 class="mb-2 text-lg font-bold text-white">
                  1. Ingresa a nuestra web y elige tu mesa
                </h4>
                <p class="text-sm leading-relaxed text-white/75">
                  En la seccion de reserva podrás ver nuestras mesas disponibles y elegir la que más te convenga.
                </p>
              </div>
              <div
                class="rounded-3xl bg-white/5 p-10 shadow-xs transition hover:bg-white/10">
                <svg
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                  class="hi-outline hi-cube mb-5 inline-block h-12 w-12 text-blue-300">
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
                <h4 class="mb-2 text-lg font-bold text-white">
                  2. Confirma tu reserva y realiza el pago
                </h4>
                <p class="text-sm leading-relaxed text-white/75">
                  Realiza el pago por medio de tarjeta de crédito o débito, y recibe tu confirmación de reserva. Recibirás un correo con todos los detalles.
                </p>
              </div>
              <div
                class="rounded-3xl bg-white/5 p-10 shadow-xs transition hover:bg-white/10 sm:col-span-2 lg:col-span-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48"
                  class="hi-outline hi-cube mb-5 inline-block h-12 w-12 text-blue-300"
                  fill="currentColor">
                  <path d="M12,0C5.4,0,0,5.4,0,12s5.4,12,12,12s12-5.4,12-12S18.6,0,12,0z M11.9,2c-0.1,0.9-0.3,1.8-0.6,2.6l-0.2-0.2 c-0.2-0.2-0.5-0.2-0.7,0c-0.2,0.2-0.2,0.5,0,0.7L11,5.6c-0.4,0.9-1,1.8-1.7,2.6L8.4,7.3c-0.2-0.2-0.5-0.2-0.7,0 C7.5,7.5,7.5,7.8,7.7,8l0.9,0.9C7.9,9.6,7,10.2,6.1,10.7l-0.6-0.6c-0.2-0.2-0.5-0.2-0.7,0c-0.2,0.2-0.2,0.5,0,0.7l0.3,0.3 c-1,0.4-2.1,0.7-3.2,0.8C2,6.5,6.5,2,11.9,2z M11.1,22c-4.8-0.4-8.6-4.2-9-9c1.4-0.1,2.7-0.5,3.9-1l1,1c0.2,0.2,0.5,0.2,0.7,0 c0.2-0.2,0.2-0.5,0-0.7l-0.8-0.8c0.9-0.5,1.7-1.1,2.4-1.8l0.5,0.5c0.2,0.2,0.5,0.2,0.7,0c0.2-0.2,0.2-0.5,0-0.7L10,8.9 c0.7-0.8,1.3-1.6,1.7-2.6l0.9,0.9c0.2,0.2,0.5,0.2,0.7,0c0.2-0.2,0.2-0.5,0-0.7l-1.2-1.2c0.4-1,0.7-2.2,0.8-3.3c4.8,0.4,8.6,4.2,9,9 c-1.2,0.1-2.3,0.4-3.3,0.8l-1.4-1.4c-0.2-0.2-0.5-0.2-0.7,0c-0.2,0.2-0.2,0.5,0,0.7l1.1,1.1c-0.9,0.5-1.8,1-2.6,1.7l-0.7-0.7 c-0.2-0.2-0.5-0.2-0.7,0c-0.2,0.2-0.2,0.5,0,0.7l0.7,0.7c-0.7,0.7-1.3,1.6-1.8,2.4l-1-1c-0.2-0.2-0.5-0.2-0.7,0s-0.2,0.5,0,0.7 l1.2,1.2C11.5,19.3,11.2,20.6,11.1,22z M12.1,22c0.1-1.1,0.4-2.2,0.8-3.2L13,19c0.2,0.2,0.5,0.2,0.7,0c0.2-0.2,0.2-0.5,0-0.7 l-0.4-0.4c0.5-0.9,1.1-1.7,1.8-2.5l0.8,0.8c0.2,0.2,0.5,0.2,0.7,0c0.2-0.2,0.2-0.5,0-0.7l-0.7-0.7c0.8-0.7,1.6-1.2,2.6-1.7l0.3,0.3 c0.2,0.2,0.5,0.2,0.7,0c0.2-0.2,0.2-0.5,0-0.7c0.8-0.3,1.7-0.5,2.6-0.6C22,17.5,17.5,22,12.1,22z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                  <polyline clip-rule="evenodd" fill="none" fill-rule="evenodd" points="21.2,5.6 11.2,15.2 6.8,10.8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>

                <h4 class="mb-2 text-lg font-bold text-white">
                  3. Te esperamos en el estadio
                </h4>
                <p class="text-sm leading-relaxed text-white/75">
                  Vístete con tu jersey y ven a disfrutar del juego de Charros de Jalisco. Tu reserva incluye consumo en bebidas y botanas.
                </p>
              </div>
            </div>
            <!-- END Steps -->
            <a href="{{ route('reservation.show') }}"
              class="inline-flex items-center justify-center rounded-full leading-6 font-semibold text-white hover:border-blue-700/50 hover:bg-blue-700/50 hover:text-white focus:ring-3 focus:ring-blue-500/50 focus:outline-hidden active:border-blue-700 active:bg-blue-700">
              <button
                type="button"
                class="inline-flex items-center justify-center gap-2 rounded-full border border-blue-800 bg-blue-800 px-6 py-4 leading-6 font-semibold text-white hover:border-blue-700/50 hover:bg-blue-700/50 hover:text-white focus:ring-3 focus:ring-blue-500/50 focus:outline-hidden active:border-blue-700 active:bg-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" data-slot="icon" class="hi-mini hi-arrow-right inline-block size-5 opacity-50">
                  <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" />
                </svg>
                <span>Haz tu reserva ahora</span>
              </button>
            </a>
          </div>
        </div>
        <!-- How it works -->
        <!-- 
        Pricing Section -->
        <div class="bg-white">
          <div
            class="container mx-auto space-y-10 px-4 py-16 lg:px-8 lg:py-32 xl:max-w-4xl">
            <!-- Heading -->
            <div class="text-center">
              <h2 class="mb-4 text-3xl font-extrabold md:text-4xl">
                Elige tu mesa
              </h2>
              <h3
                class="mx-auto text-lg font-medium text-gray-600 md:text-xl md:leading-relaxed lg:w-2/3">
                Disfrutar de un juego de Charros de Jalisco nunca fue tan fácil. Elige tu mesa y disfruta de una experiencia única.
              </h3>
            </div>
            <!-- END Heading -->

            <!-- Pricing Plans -->
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:gap-8">
              <!-- Developer Plan -->
              <div
                class="flex flex-col rounded-xl border-2 border-gray-200 bg-white">
                <div class="grow p-5 lg:p-6">
                  <span
                    class="mb-4 inline-block rounded-full text-sm font-semibold tracking-wider text-blue-600 uppercase">
                    Zona P
                  </span>
                  <div class="mb-2">
                    <span class="text-3xl font-extrabold lg:text-4xl">$xx</span>
                    <span class="font-semibold text-gray-700">por persona</span>
                  </div>
                  <p class="text-sm text-gray-600">
                    Incluye
                    <span class="font-semibold">mesa para 4 personas</span> y
                    <span class="font-semibold">consumo incluido de $xx</span>
                  </p>
                </div>
                <div class="rounded-b-lg bg-gray-100 p-5 lg:p-6">
                  <a
                    href="{{ route('reservation.show') }}"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-full border border-gray-800 bg-gray-800 px-4 py-3 leading-6 font-semibold text-white hover:border-gray-700 hover:bg-gray-700 hover:text-white focus:ring-3 focus:ring-gray-500/25 focus:outline-hidden active:border-gray-700 active:bg-gray-700 xl:w-1/2">
                    Reservar
                  </a>
                </div>
              </div>
              <!-- END Developer Plan -->

              <!-- Agency Plan -->
              <div
                class="relative flex flex-col rounded-xl border-2 border-blue-400 bg-white">
                <div
                  class="absolute top-0 right-0 flex size-10 items-center justify-center text-blue-600">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    data-slot="icon"
                    class="hi-solid hi-bookmark inline-block size-6">
                    <path
                      fill-rule="evenodd"
                      d="M6.32 2.577a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 0 1-1.085.67L12 18.089l-7.165 3.583A.75.75 0 0 1 3.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93Z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
                <div class="grow p-5 lg:p-6">
                  <span
                    class="mb-4 inline-flex items-center gap-1 rounded-full text-sm font-semibold tracking-wider text-blue-600 uppercase"><span>Mesa VIP</span></span>
                  <div class="mb-2">
                    <span class="text-3xl font-extrabold lg:text-4xl">$xx</span>
                    <span class="font-semibold text-gray-700">por persona</span>
                  </div>
                  <p class="text-sm text-gray-600">
                    Incluye
                    <span class="font-semibold">vista privilegiada</span> y
                    <span class="font-semibold">$xx en consumo</span>
                  </p>
                </div>
                <div class="rounded-b-lg bg-blue-50 p-5 lg:p-6">
                  <a
                    href="{{ route('reservation.show') }}"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-full border border-blue-800 bg-blue-800 px-4 py-3 leading-6 font-semibold text-white hover:border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-3 focus:ring-blue-500/50 focus:outline-hidden active:border-blue-700 active:bg-blue-700 xl:w-1/2">
                    Reservar
                  </a>
                </div>
              </div>
              <!-- END Agency Plan -->
            </div>
            <!-- END Pricing Plans -->
          </div>
        </div>
        <!-- END Pricing Section -->

        <!-- Stats Section -->
        <div class="bg-gray-900">
          <div class="container mx-auto px-4 lg:px-8 xl:max-w-7xl">
            <div
              class="grid grid-cols-1 divide-y divide-gray-800 text-center sm:grid-cols-3 sm:divide-x sm:divide-y-0">
              <dl class="space-y-1 px-5 py-16 lg:py-32">
                <dt class="text-4xl font-extrabold text-white">★★★</dt>
                <dd
                  class="text-sm font-semibold tracking-wide text-blue-400 uppercase">
                  LMP
                </dd>
              </dl>
              <dl class="space-y-1 px-5 py-16 lg:py-32">
                <dt class="text-4xl font-extrabold text-white">★★</dt>
                <dd
                  class="text-sm font-semibold tracking-wide text-blue-400 uppercase">
                  LMB
                </dd>
              </dl>
              <dl class="space-y-1 px-5 py-16 lg:py-32">
                <dt class="text-4xl font-extrabold text-white">★</dt>
                <dd
                  class="text-sm font-semibold tracking-wide text-blue-400 uppercase">
                  LMS
                </dd>
              </dl>
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