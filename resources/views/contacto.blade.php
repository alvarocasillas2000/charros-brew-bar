<x-app-layout>
    @php
        $seoTitle = 'Contacto | Charros Brew Bar';
        $seoDescription = 'Contáctanos para reservas, eventos especiales o cualquier duda sobre Charros Brew Bar. Estamos ubicados en el Estadio Charros de Jalisco. WhatsApp, correo y formulario de contacto disponibles.';
        $seoKeywords = 'contacto Charros Brew Bar, telefono sport bar guadalajara, whatsapp reservas charros, eventos privados sport bar, ubicacion Charros Brew Bar';
        $ogImage = asset('assets/img/4E2A1479.jpeg');
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
      "@type": "ContactPage",
      "name": "Contacto - Charros Brew Bar",
      "description": "Página de contacto para Charros Brew Bar",
      "url": "{{ route('contacto') }}",
      "mainEntity": {
        "@type": "SportsActivityLocation",
        "name": "Charros Brew Bar",
        "telephone": "+52-33-1250-0826",
        "contactPoint": {
          "@type": "ContactPoint",
          "telephone": "+52-33-1250-0826",
          "contactType": "Reservations",
          "availableLanguage": ["Spanish"]
        }
      }
    }
    </script>
    @endpush

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </div>
                    
                    <h2 class="mb-6 text-4xl font-black text-white md:text-6xl tracking-tight drop-shadow-lg animate-slide-up">
                        Contáctanos
                    </h2>
                    <h3 class="mx-auto text-xl font-medium text-gray-100 md:text-2xl md:leading-relaxed lg:w-2/3 animate-slide-up-delay">
                        ¿Tienes alguna duda o comentario? <span class="font-bold text-white">Estamos aquí para ayudarte.</span>
                    </h3>

                    <div class="flex flex-wrap justify-center gap-4 pt-10 pb-16">
                        <a href="#contacto-form" class="inline-flex items-center justify-center gap-3 rounded-full border-2 border-gray-600 bg-white px-8 py-4 font-bold text-gray-600 hover:bg-gray-50 hover:scale-105 transition-all duration-300 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                            </svg>
                            <span>Completa el formulario</span>
                        </a>

                        <a href="https://wa.me/523312500826?text=%C2%A1Hola!%20Estuve%20viendo%20la%20p%C3%A1gina%20de%20Charros%20Brew%20Bar%20y%20tengo%20algunas%20dudas.%20%C2%BFMe%20podr%C3%ADan%20ayudar%3F" 
                           class="inline-flex items-center justify-center gap-3 rounded-full border-2 border-green-500 bg-green-600 px-8 py-4 font-bold text-white hover:bg-green-500 hover:border-green-400 hover:scale-105 transition-all duration-300 shadow-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                            <span>Escríbenos por WhatsApp</span>
                        </a>
                    </div>

                    <div class="relative mx-5 pb-12 -mb-20 rounded-2xl bg-white p-3 shadow-2xl sm:-mb-40 lg:mx-32 border-4 border-white/20 overflow-hidden">
                        <img src="{{ asset('assets/img/4E2A1479.jpeg') }}" alt="Interior de Charros Brew Bar con vista al estadio - Contacto y ubicación en Guadalajara" class="mx-auto w-full rounded-xl object-cover" />
                    </div>
                </div>
            </div>

                <!-- Formulario de contacto y Cards combinados -->
                <div class="bg-gradient-to-br from-gray-50 via-gray-50 to-gray-50 pt-40 pb-16">
                    <div class="container mx-auto px-4 py-16 lg:px-8 xl:max-w-7xl">
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                            <!-- Left Column - Contact Form -->
                            <div>
                                <div class="mb-8" id="contacto-form">
                                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-gray-500 to-gray-700 rounded-full mb-4 shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                        </svg>
                                    </div>
                                    
                                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 tracking-tight mb-3">
                                        Envíanos un mensaje
                                    </h2>
                                    <p class="text-lg text-gray-600">
                                        Complete el formulario y <span class="font-bold text-gray-900">nuestro equipo te responderá pronto.</span>
                                    </p>
                                </div>

                                <form action="{{ route('contacto.enviar') }}" method="POST" class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100">
                                    @csrf           
                                    <!-- Nombre -->
                                    <div class="mb-5">
                                        <label for="nombre" class="flex items-center text-sm font-bold text-gray-700 mb-2">
                                            <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                </svg>
                                            </div>
                                            Nombre Completo
                                        </label>
                                        <input type="text" 
                                               id="nombre" 
                                               name="nombre" 
                                               placeholder="Tu nombre" 
                                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:ring-2 focus:ring-gray-500/50 focus:border-gray-500 transition-all duration-200" 
                                               required />
                                    </div>

                                    <!-- Correo -->
                                    <div class="mb-5">
                                        <label for="correo" class="flex items-center text-sm font-bold text-gray-700 mb-2">
                                            <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                                </svg>
                                            </div>
                                            Correo Electrónico
                                        </label>
                                        <input type="email" 
                                               id="correo" 
                                               name="correo" 
                                               placeholder="ejemplo@correo.com" 
                                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:ring-2 focus:ring-gray-500/50 focus:border-gray-500 transition-all duration-200" 
                                               required />
                                    </div>

                                    <!-- Teléfono -->
                                    <div class="mb-5">
                                        <label for="tel" class="flex items-center text-sm font-bold text-gray-700 mb-2">
                                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-green-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                                </svg>
                                            </div>
                                            Teléfono
                                        </label>
                                        <input type="tel" 
                                               id="tel" 
                                               name="tel" 
                                               placeholder="33 1234 5678" 
                                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:ring-2 focus:ring-green-500/50 focus:border-green-500 transition-all duration-200" 
                                               required />
                                    </div>

                                    <!-- Mensaje -->
                                    <div class="mb-6">
                                        <label for="mensaje" class="flex items-center text-sm font-bold text-gray-700 mb-2">
                                            <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                                                </svg>
                                            </div>
                                            Tu Mensaje
                                        </label>
                                        <textarea id="mensaje" 
                                                  name="mensaje" 
                                                  rows="4" 
                                                  placeholder="Cuéntanos cómo podemos ayudarte..." 
                                                  class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:ring-2 focus:ring-gray-500/50 focus:border-gray-500 transition-all duration-200 resize-none" 
                                                  required></textarea>
                                    </div>

                                    <button type="submit" class="w-full group inline-flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-gray-600 to-gray-600 hover:from-gray-700 hover:to-gray-700 px-8 py-4 font-bold text-white hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 group-hover:translate-x-1 transition-transform">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                        </svg>
                                        <span>Enviar Mensaje</span>
                                    </button>
                                </form>
                            </div>

                            <!-- Right Column - Contact Information Cards -->
                            <div>
                                <div class="mb-8 lg:pb-8">
                                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-gray-500 to-gray-700 rounded-full mb-4 shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                        </svg>
                                    </div>
                                    
                                    <h3 class="text-3xl md:text-4xl font-black text-gray-900 tracking-tight mb-3">
                                        Información de Contacto
                                    </h3>
                                    <p class="text-lg text-gray-600">
                                        Encuéntranos y <span class="font-bold text-gray-900">conéctate con nosotros.</span>
                                    </p>
                                </div>
                                
                                <div class="space-y-6">
                                    <!-- Dirección Card -->
                                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 group cursor-pointer">
                                        <div class="flex items-start space-x-4">
                                            <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-gray-500 to-gray-600 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-transform">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-white">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="text-lg font-bold text-gray-900 mb-2">Dirección</h4>
                                                <p class="text-gray-600 leading-relaxed">
                                                    Santa Lucía 373, Estadio Panamericano,
                                                    Zapopan, Jalisco
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Teléfono Card -->
                                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 group cursor-pointer">
                                        <div class="flex items-start space-x-4">
                                            <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-transform">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-white">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="text-lg font-bold text-gray-900 mb-2">Teléfono</h4>
                                                <a href="tel:+523312500826" class="text-gray-600 hover:text-green-600 transition-colors font-semibold text-lg">
                                                    (33) 1250-0826
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Correo Card -->
                                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 group cursor-pointer">
                                        <div class="flex items-start space-x-4">
                                            <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-gray-500 to-gray-600 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-transform">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-white">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="text-lg font-bold text-gray-900 mb-2">Correo Electrónico</h4>
                                                <a href="mailto:info@charrosjalisco.com" class="text-gray-600 hover:text-gray-600 transition-colors font-semibold break-all">
                                                    info@charrosjalisco.com
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Mapa Card -->
                                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                                        
                                        <div class="rounded-xl overflow-hidden shadow-md">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7463.119155928936!2d-103.38619376453241!3d20.72810165673998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b2e825e9c7c3%3A0x9dd938aceef9942e!2sEstadio%20Panamericano%20Charros%20de%20Jalisco!5e0!3m2!1ses-419!2smx!4v1761677442145!5m2!1ses-419!2smx" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</x-app-layout>
