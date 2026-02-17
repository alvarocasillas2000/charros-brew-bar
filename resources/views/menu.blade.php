<x-app-layout>
    @php
        $seoTitle = 'Menú | Charros Brew Bar Guadalajara';
        $seoDescription = 'Descubre nuestro menú de comida y bebidas. Disfruta de alitas, boneless, hamburguesas, cervezas y más mientras ves el béisbol de Charros de Jalisco. Descarga nuestro menú completo.';
        $seoKeywords = 'menu sport bar guadalajara, comida estadio charros, alitas guadalajara, bebidas sport bar, boneless zapopan, cerveza artesanal gdl, hamburguesas sport bar';
        $ogImage = asset('assets/img/sportbar_menu.jpg');
        $ogType = 'restaurant.menu';
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
      "@type": "Restaurant",
      "name": "Charros Brew Bar",
      "hasMenu": {
        "@type": "Menu",
        "name": "Menú Charros Brew Bar",
        "description": "Menú completo con botanas, bebidas y más",
        "hasMenuSection": [
          {
            "@type": "MenuSection",
            "name": "Botanas",
            "description": "Alitas, boneless, nachos y más"
          },
          {
            "@type": "MenuSection", 
            "name": "Bebidas",
            "description": "Cervezas, refrescos y bebidas especiales"
          }
        ]
      },
      "servesCuisine": "Mexican",
      "priceRange": "$$",
      "url": "{{ route('menu') }}"
    }
    </script>
    @endpush

    <!-- Page Container -->
    <div
        id="page-container"
        class="mx-auto flex min-h-dvh w-full min-w-[320px] flex-col bg-gray-100">
        <!-- Page Content -->
        <main id="page-content" class="flex max-w-full flex-auto flex-col">
            <!-- Hero Section with Gradient -->
            <div class="bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-900">
                <div class="container mx-auto px-4 pt-16 lg:px-8 lg:pt-32 xl:max-w-6xl text-center">
                    <!-- Header Icon -->
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-white/10 backdrop-blur-sm rounded-full mb-6 shadow-2xl animate-bounce">
                        <i class="fas fa-utensils text-white text-3xl"></i>
                    </div>
                    
                    <h2 class="mb-6 text-4xl font-black text-white md:text-6xl tracking-tight drop-shadow-lg animate-slide-up">
                        Nuestro Menú
                    </h2>
                    <h3 class="mx-auto text-xl font-medium text-gray-100 md:text-2xl md:leading-relaxed lg:w-2/3 pb-16 animate-slide-up-delay">
                        Disfruta de nuestras <span class="font-bold text-white">deliciosas opciones</span> en botanas, bebidas y más.
                    </h3>
                </div>
                
                <!-- Menu Image Container -->
                <div class="container mx-auto px-4 lg:px-8 xl:max-w-6xl">
                    <div class="relative mx-5 pb-12 -mb-20 rounded-2xl bg-white p-3 shadow-2xl sm:-mb-40 lg:mx-32 border-4 border-white/20 overflow-hidden">
                        <picture>
                            <source srcset="{{ asset('assets/img/sportbar_menu_1.jpg') }}" media="(max-width: 639px)">
                            <source srcset="{{ asset('assets/img/sportbar_menu.jpg') }}" media="(max-width: 1023px)">
                            <img src="{{ asset('assets/img/sportbar_menu.jpg') }}" alt="Menú completo de Charros Brew Bar - Alitas, boneless, hamburguesas, bebidas y más" class="mx-auto w-full rounded-xl object-cover" />
                        </picture>
                    </div>
                </div>
            </div>
            
            <!-- Download and Description Section -->
            <div class="bg-gradient-to-br from-gray-50 via-gray-50 to-gray-50 pt-48 pb-16">
                <div class="container mx-auto px-4 lg:px-8 xl:max-w-6xl">
                    
                    <!-- Download Button Section -->
                    <div class="text-center mb-16">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-gray-500 to-gray-600 rounded-full mb-6 shadow-lg">
                            <i class="fas fa-download text-white text-2xl"></i>
                        </div>
                        
                        <h3 class="text-3xl md:text-4xl font-black text-gray-900 tracking-tight mb-4">
                            Descarga Nuestro Menú
                        </h3>
                        <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                            Lleva nuestro menú completo contigo y <span class="font-bold text-gray-900">planea tu próxima visita.</span>
                        </p>
                        
                        <a href="{{ asset('assets/docs/menu.pdf') }}" download class="group inline-block">
                            <button type="button" class="inline-flex items-center justify-center gap-3 rounded-full bg-gradient-to-r from-gray-600 to-gray-800 hover:from-gray-700 hover:to-gray-800 px-10 py-5 leading-6 font-bold text-white hover:scale-105 transition-all duration-300 shadow-xl hover:shadow-2xl">
                                <i class="fas fa-file-pdf text-2xl group-hover:animate-bounce"></i>
                                <span class="text-lg">Descargar Menú PDF</span>
                                <i class="fas fa-download group-hover:translate-y-1 transition-transform"></i>
                            </button>
                        </a>
                    </div>

                    <!-- Description Card -->
                    <div class="bg-gradient-to-r from-gray-700 to-gray-800 rounded-2xl p-10 shadow-2xl text-white text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full mb-6 shadow-lg">
                            <i class="fas fa-star text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-black mb-4 tracking-tight">
                            Una Experiencia Única
                        </h3>
                        <p class="text-lg md:text-xl text-gray-100 leading-relaxed max-w-3xl mx-auto">
                            En Charros Brew Bar ofrecemos una amplia variedad de botanas, bebidas y platillos para que disfrutes mientras ves tu deporte favorito. 
                            Desde nachos y alitas hasta una selección de cervezas artesanales, tenemos algo para todos los gustos.
                            <span class="block mt-4 font-bold text-white">
                                Consulta nuestro menú completo y disfruta de una experiencia única en Charros Brew Bar.
                            </span>
                        </p>
                    </div>

                </div>
            </div>
        </main>
    </div>
    <!-- END Menu Section -->

</x-app-layout>
