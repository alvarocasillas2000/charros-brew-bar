<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <title>Charros Brew Bar</title>

    <meta
      name="description"
      content="Charros Brew Bar ~ caliente.mx"
    />
    <meta name="author" content="nextium~AC" />

    <!-- Icons -->

    <!-- Cambiar iconos -->
    <link
      rel="icon"
      href="./assets/img/chretro.png"   
      sizes="any"
      type="image/png"
    />
    <link
      rel="icon"
      href="./assets/img/chretro.png"
      type="image/png"
    />

    <!-- Inter web font from bunny.net (GDPR compliant) -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link
      href="https://fonts.bunny.net/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.bunny.net/css?family=anton:400" rel="stylesheet" />

    <!-- Tailwind CSS Play CDN (mostly for development/testing purposes) -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <!-- Tailwind CSS v4 Configuration -->
    <style type="text/tailwindcss">
      /* Class based dark mode */
      @custom-variant dark (&:where(.dark, .dark *));

      /* Theme configuration */
      @theme {
        /* Fonts */
        --default-font-family: "Inter";
      }
  </style>
  <script>
    async function loadComponents() {
      const headerElement = document.getElementById('header');
      if (headerElement) {
        headerElement.innerHTML = await (await fetch('header.html')).text();
      }
    }

    document.addEventListener('DOMContentLoaded', loadComponents);
  </script>
  </head>
  <body>
    <div id="header"></div>
  </body>
