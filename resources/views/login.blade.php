@extends('layouts.app')

@section('title', 'Charros Brew Bar')

@section('content')


<!-- Page Container -->



  <div class="flex items-center justify-center flex-grow p-14 lg:py-32">
    <div class="bg-white shadow-lg rounded-xl p-8 max-w-sm w-full">
      <div class="text-center mb-6">
        <img src="./assets/img/chretro.png" alt="Charros Brew Bar" class="mx-auto w-24">
        <h2 class="text-2xl font-bold mt-4 text-gray-800">Iniciar Sesión</h2>
      </div>

      <form id="loginForm">
          <!-- Correo Electrónico -->
          <div class="mb-4">
              <label for="email" class="block text-sm font-medium text-gray-700">
                  Correo Electrónico
              </label>
              <input
                  type="email"
                  id="email"
                  name="email"
                  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-500 focus:outline-none"
                  placeholder="usuario@charros.com"
                  autocomplete="email"
                  required
              />
          </div>

          <!-- Contraseña -->
          <div class="mb-4">
              <label for="password" class="block text-sm font-medium text-gray-700">
                  Contraseña
              </label>
              <input
                  type="password"
                  id="password"
                  name="password"
                  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-500 focus:outline-none"
                  placeholder="********"
                  autocomplete="current-password"
                  required
              />
          </div>

          <!-- Botón de Inicio de Sesión -->
          <button
              type="submit"
              class="w-full bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-700 focus:ring-2 focus:ring-gray-500"
          >
              Iniciar Sesión
          </button>

          <!-- Enlace para recuperar contraseña -->
          <div class="mt-4 text-center">
              <a href="recuperar_contraseña.html" class="text-gray-600 hover:underline text-sm">
                  ¿Olvidaste tu contraseña?
              </a>
          </div>

          <!-- Mensaje de error -->
          <p id="errorMessage" 
            class="mt-4 text-red-600 text-center hidden" 
            aria-live="assertive">
              Credenciales incorrectas. Intenta de nuevo.
          </p>
      </form>

    </div>
  </div>

<!-- END Page Container -->

        @endsection

