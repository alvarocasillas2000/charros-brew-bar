<header id="page-header" class="flex flex-none items-center py-10 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900">
    <div class="container mx-auto flex flex-col gap-6 px-4 text-center sm:flex-row sm:items-center sm:justify-between sm:gap-0 lg:px-8 xl:max-w-6xl">
        <div>
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-lg font-bold tracking-wide text-white hover:opacity-75">
                <img src="{{ asset('assets/img/LOGOblanco.png') }}" alt="Charros de Jalisco" class="w-6 h-5">
                <span>Charros de Jalisco</span>
            </a>
        </div>
        <nav class="flex items-center justify-center gap-4 text-sm sm:gap-6">
             @php
                $navItems = [
                    ['route' => 'home', 'label' => 'Inicio'],
                    ['route' => 'menu', 'label' => 'Menú'],
                    ['route' => 'reservation.show', 'label' => 'Reserva'],
                    ['route' => 'contacto', 'label' => 'Contacto'],
                ];
            @endphp
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}"
                    class="font-semibold {{ Route::is($item['route']) ? 'text-white' : 'text-gray-400 hover:text-white' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
            @auth
            <!-- Mobile menu button -->
            <div class="sm:hidden">
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-300 hover:bg-blue-800 focus:outline-none focus:bg-blue-800 focus:text-gray-300 transition duration-150 ease-in-out">
                        <svg class="size-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Mobile dropdown menu -->
                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400 border-b">
                            {{ __('Administrar cuenta') }}
                        </div>

                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            {{ __('Perfil') }}
                        </a>

                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            {{ __('Dashboard') }}
                        </a>

                        <a href="{{ route('business-days.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            {{ __('Dias habiles') }}
                        </a>

                        <a href="{{ route('areas.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            {{ __('Areas por Juego') }}
                        </a>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <a href="{{ route('api-tokens.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            {{ __('API Tokens') }}
                        </a>
                        @endif

                        <div class="border-t border-gray-200"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                {{ __('Cerrar Sesión') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Desktop menu -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="60">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    {{ Auth::user()->currentTeam->name }}

                                    <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <div class="w-60">
                                <!-- Team Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Team') }}
                                </div>

                                <!-- Team Settings -->
                                <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                    {{ __('Team Settings') }}
                                </x-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-dropdown-link>
                                @endcan

                                <!-- Team Switcher -->
                                @if (Auth::user()->allTeams()->count() > 1)
                                <div class="border-t border-gray-200"></div>

                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" />
                                @endforeach
                                @endif
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                            @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    {{ Auth::user()->name }}

                                    <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Administrar cuenta') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            <x-dropdown-link href="{{ route('dashboard') }}">
                                {{ __('Dashboard') }}
                            </x-dropdown-link>

                            <x-dropdown-link href="{{ route('business-days.index') }}">
                                {{ __('Dias habiles') }}
                            </x-dropdown-link>

                            <x-dropdown-link href="{{ route('areas.index') }}">
                                {{ __('Areas por Juego') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                    {{ __('Cerrar Sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
            @else
            <!-- <a
                  href="{{ route('login')}}"
                  class="font-medium text-gray-50 hover:text-blue-500"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    data-slot="icon"
                    class="hi-mini hi-user-circle inline-block size-5 opacity-50"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  <span>Iniciar Sesión</span>
                </a> -->
            @endauth
        </nav>
    </div>
</header>