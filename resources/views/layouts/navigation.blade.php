<header class="bg-white shadow-sm dark:border-b dark:border-slate-700 dark:bg-slate-800">
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between gap-6 px-6">

        {{-- Lado izquierdo: botón del celular y logo --}}
        <div class="flex flex-1 items-center">
            {{-- Botón hamburguesa: solo se ve en pantallas chicas (celular) --}}
            <button id="menu-button" type="button" aria-label="Abrir menú" aria-expanded="false"
                class="mr-4 rounded-md p-2 text-slate-600 hover:bg-gray-100 md:hidden dark:text-slate-300 dark:hover:bg-gray-800">
                {{-- Ícono abrir (☰) --}}
                <svg id="open-menu-icon" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                {{-- Ícono cerrar (✕), oculto al inicio --}}
                <svg id="close-menu-icon" class="hidden h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>

            {{-- Logo --}}
            <a href="{{ route('home') }}" aria-label="Inicio" class="text-sky-500">
                <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linejoin="round" d="M12 4 2 9l10 5 10-5-10-5Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 11v5c0 1.5 2.7 3 6 3s6-1.5 6-3v-5" />
                    <path stroke-linecap="round" d="M22 9v6" />
                </svg>
            </a>
        </div>

        {{-- Links al centro del header: solo en pantallas medianas o más grandes --}}
        <div class="hidden space-x-8 md:flex">
                <a class="px-3 py-2 {{ request()->routeIs('home') ? 'text-sky-500' : 'text-slate-600 hover:text-sky-500 dark:text-slate-300' }}"
                    href="{{ route('home') }}"> Inicio </a>
                <a class="px-3 py-2 {{ request()->routeIs('posts.*') ? 'text-sky-500' : 'text-slate-600 hover:text-sky-500 dark:text-slate-300' }}"
                    href="{{ route('posts.index') }}"> Blog </a>
                <a class="px-3 py-2 {{ request()->routeIs('nosotros') ? 'text-sky-500' : 'text-slate-600 hover:text-sky-500 dark:text-slate-300' }}"
                    href="{{ route('nosotros') }}"> Nosotros </a>
                <a class="px-3 py-2 {{ request()->routeIs('contact') ? 'text-sky-500' : 'text-slate-600 hover:text-sky-500 dark:text-slate-300' }}"
                    href="{{ route('contact') }}"> Contacto </a>
                @auth
                    <a class="px-3 py-2 {{ request()->routeIs('dashboard') ? 'text-sky-500' : 'text-slate-600 hover:text-sky-500 dark:text-slate-300' }}"
                        href="{{ route('dashboard') }}"> Dashboard </a>
                @endauth
        </div>

        {{-- Lado derecho: selector de tema y avatar --}}
        <div class="flex flex-1 items-center justify-end gap-4">
            <div class="relative">
                {{-- Botón del sol: abre el menú de temas --}}
                <button id="theme-button" type="button" aria-label="Cambiar tema" aria-expanded="false"
                    class="rounded-md p-2 text-slate-600 hover:bg-gray-100 dark:text-slate-300 dark:hover:bg-gray-800">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <circle cx="12" cy="12" r="4" />
                        <path stroke-linecap="round" d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41" />
                    </svg>
                </button>

                {{-- Menú de temas: oculto hasta que se presiona el sol --}}
                <div id="theme-menu"
                    class="absolute right-0 z-10 mt-2 hidden w-40 overflow-hidden rounded-md border border-gray-200 bg-white py-1 shadow-lg dark:border-gray-700 dark:bg-gray-800">
                    <button type="button" data-theme="light"
                        class="theme-option flex w-full items-center gap-2 px-3 py-2 text-left hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <circle cx="12" cy="12" r="4" />
                            <path stroke-linecap="round" d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41" />
                        </svg>
                        Light
                    </button>
                    <button type="button" data-theme="dark"
                        class="theme-option flex w-full items-center gap-2 px-3 py-2 text-left hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linejoin="round" d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8Z" />
                        </svg>
                        Dark
                    </button>
                    <button type="button" data-theme="system"
                        class="theme-option flex w-full items-center gap-2 px-3 py-2 text-left hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <rect x="3" y="4" width="18" height="12" rx="2" />
                            <path stroke-linecap="round" d="M9 20h6M12 16v4" />
                        </svg>
                        System
                    </button>
                </div>
            </div>
            @auth
                {{-- Con sesión: avatar con las iniciales (lleva al perfil) y botón para salir --}}
                <a href="{{ route('profile.edit') }}" title="Perfil de {{ auth()->user()->name }}"
                    class="flex h-12 w-12 items-center justify-center rounded-full text-lg {{ request()->routeIs('profile.*') ? 'bg-sky-100 text-sky-700 ring-2 ring-sky-500 dark:bg-sky-900 dark:text-sky-200' : 'bg-gray-200 text-gray-800 hover:ring-2 hover:ring-slate-400 dark:bg-gray-700 dark:text-gray-100' }}">
                    {{ mb_strtoupper(collect(explode(' ', auth()->user()->name))->take(2)->map(fn ($parte) => mb_substr($parte, 0, 1))->join('')) }}
                </a>
                <form action="{{ route('logout') }}" method="POST" class="hidden md:block">
                    @csrf
                    <button type="submit" class="text-sm text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-200">
                        Salir
                    </button>
                </form>
            @else
                {{-- Sin sesión: links para entrar o registrarse --}}
                <a href="{{ route('login') }}"
                    class="hidden text-slate-600 hover:text-sky-500 md:inline dark:text-slate-300">Entrar</a>
                <a href="{{ route('register') }}"
                    class="hidden rounded-md bg-slate-700 px-4 py-1.5 text-sm font-semibold text-white hover:bg-slate-800 md:inline-block dark:bg-slate-200 dark:text-slate-900 dark:hover:bg-white">Registrarse</a>
            @endauth
        </div>
    </div>

    {{-- Menú del celular: oculto hasta que se presiona el botón hamburguesa --}}
    <div id="menu" class="hidden flex-col border-t border-gray-200 px-6 py-4 md:hidden dark:border-gray-700">
        <a class="block rounded-md px-3 py-2 {{ request()->routeIs('home') ? 'bg-sky-50 text-sky-700 dark:bg-sky-900/40 dark:text-sky-300' : 'text-slate-600 hover:bg-slate-100 hover:text-sky-500 dark:text-slate-300 dark:hover:bg-gray-800' }}"
            href="{{ route('home') }}"> Inicio </a>
        <a class="block rounded-md px-3 py-2 {{ request()->routeIs('posts.*') ? 'bg-sky-50 text-sky-700 dark:bg-sky-900/40 dark:text-sky-300' : 'text-slate-600 hover:bg-slate-100 hover:text-sky-500 dark:text-slate-300 dark:hover:bg-gray-800' }}"
            href="{{ route('posts.index') }}"> Blog </a>
        <a class="block rounded-md px-3 py-2 {{ request()->routeIs('nosotros') ? 'bg-sky-50 text-sky-700 dark:bg-sky-900/40 dark:text-sky-300' : 'text-slate-600 hover:bg-slate-100 hover:text-sky-500 dark:text-slate-300 dark:hover:bg-gray-800' }}"
            href="{{ route('nosotros') }}"> Nosotros </a>
        <a class="block rounded-md px-3 py-2 {{ request()->routeIs('contact') ? 'bg-sky-50 text-sky-700 dark:bg-sky-900/40 dark:text-sky-300' : 'text-slate-600 hover:bg-slate-100 hover:text-sky-500 dark:text-slate-300 dark:hover:bg-gray-800' }}"
            href="{{ route('contact') }}"> Contacto </a>
        @auth
            <a class="block rounded-md px-3 py-2 {{ request()->routeIs('dashboard') ? 'bg-sky-50 text-sky-700 dark:bg-sky-900/40 dark:text-sky-300' : 'text-slate-600 hover:bg-slate-100 hover:text-sky-500 dark:text-slate-300 dark:hover:bg-gray-800' }}"
                href="{{ route('dashboard') }}"> Dashboard </a>
        @endauth

        {{-- Entrar / Registrarse / Salir en el celular --}}
        <div class="mt-2 border-t border-gray-200 pt-2 dark:border-gray-700">
            @auth
                <a href="{{ route('profile.edit') }}" class="block rounded-md px-3 py-2 text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-gray-800">Perfil</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block w-full rounded-md px-3 py-2 text-left text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-gray-800">
                        Salir
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block rounded-md px-3 py-2 text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-gray-800">Entrar</a>
                <a href="{{ route('register') }}" class="block rounded-md px-3 py-2 text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-gray-800">Registrarse</a>
            @endauth
        </div>
    </div>
</header>
