<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>{{ $seoTitle ?? 'Charros Brew Bar' }}</title>
    <meta name="description" content="{{ $seoDescription ?? 'Disfruta del béisbol de Charros de Jalisco en nuestro Sport Bar con vista privilegiada al estadio. Reserva tu mesa y disfruta de comida, bebidas y la mejor atmósfera deportiva en Guadalajara.' }}">
    <meta name="keywords" content="{{ $seoKeywords ?? 'sport bar guadalajara, charros de jalisco, estadio de béisbol, reservar mesa sport bar, vista al campo béisbol, bebidas y botanas guadalajara, eventos deportivos gdl' }}">
    <meta name="author" content="Charros Brew Bar">
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $ogTitle ?? $seoTitle ?? 'Charros Brew Bar | Vista Privilegiada del Estadio' }}">
    <meta property="og:description" content="{{ $ogDescription ?? $seoDescription ?? 'Disfruta del béisbol de Charros de Jalisco con vista privilegiada, comida y bebidas.' }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('assets/img/sportbarlogo.png') }}">
    <meta property="og:url" content="{{ $ogUrl ?? url()->current() }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:site_name" content="Charros Brew Bar">
    <meta property="og:locale" content="es_MX">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $twitterTitle ?? $seoTitle ?? 'Charros Brew Bar | Vista Privilegiada del Estadio' }}">
    <meta name="twitter:description" content="{{ $twitterDescription ?? $seoDescription ?? 'Disfruta del béisbol de Charros de Jalisco con vista privilegiada, comida y bebidas.' }}">
    <meta name="twitter:image" content="{{ $twitterImage ?? asset('assets/img/sportbarlogo.png') }}">

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5GHD7CBL');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Change the icon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon-96x96.png') }}" sizes="96x96" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LDQCM1GBL5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-LDQCM1GBL5');
    </script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <!-- Structured Data (JSON-LD) -->
    @stack('structured-data')

    <!-- Page Loader Styles -->
    <style>
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #111111;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.3s ease-out, visibility 0.3s ease-out;
        }

        .page-loader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255, 255, 255, 0.3);
            border-top: 5px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Prevent scrolling while loader is active */
        body.loading {
            overflow: hidden;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5GHD7CBL"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <x-banner />

    <!-- Page Loader -->
    <div id="page-loader" class="page-loader">
        <div class="loader-spinner"></div>
    </div>

    <div class="min-h-screen bg-gray-100">


        <!-- Page Heading -->
        @include('partials.header')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Page Footer -->
        @include('partials.footer')
    </div>

    @stack('modals')
    @stack('scripts')

    @livewireScripts

    <!-- Page Loader Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loader = document.getElementById('page-loader');
            const body = document.body;
            
            // Add loading class to body
            body.classList.add('loading');
            
            // Get all images on the page
            const images = document.querySelectorAll('img');
            let imagesToLoad = images.length;
            let imagesLoaded = 0;
            
            // Function to check if all images are loaded
            function imageLoaded() {
                imagesLoaded++;
                if (imagesLoaded >= imagesToLoad) {
                    hideLoader();
                }
            }
            
            // Function to hide loader
            function hideLoader() {
                loader.classList.add('hidden');
                body.classList.remove('loading');
            }
            
            // If there are no images, hide loader immediately
            if (imagesToLoad === 0) {
                hideLoader();
                return;
            }
            
            // Set a maximum timeout for the loader (10 seconds)
            const maxLoadTime = setTimeout(function() {
                hideLoader();
            }, 10000);
            
            // Add load event listeners to all images
            images.forEach(function(img) {
                if (img.complete) {
                    // Image is already loaded
                    imageLoaded();
                } else {
                    // Wait for image to load
                    img.addEventListener('load', imageLoaded);
                    img.addEventListener('error', imageLoaded); // Count errors as loaded to prevent hanging
                }
            });
        });
    </script>
</body>

</html>
