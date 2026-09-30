<x-guest-layout meta-title="Iniciar sesión" meta-description="Inicia sesión en el blog">
    <h1 class="text-center font-serif text-4xl font-bold text-sky-600 dark:text-sky-400">Iniciar sesión</h1>

    {{-- Si el middleware 'auth' te mandó aquí, Laravel guarda en la sesión la página que querías abrir --}}
    @if (session()->has('url.intended'))
        <p class="mt-6 rounded-md bg-amber-50 px-4 py-3 text-sm text-amber-800 dark:bg-amber-900/40 dark:text-amber-200">
            Necesitas iniciar sesión para hacer eso. Cuando entres, te regresamos a donde ibas.
        </p>
    @endif

    <form action="{{ route('login') }}" method="POST" class="mt-8 space-y-4">
        @csrf

        <div>
            <x-input-label for="email" value="Correo" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="password" value="Contraseña" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <label class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-300">
            <input type="checkbox" name="remember" class="rounded border-slate-300 dark:border-slate-600" />
            Recordarme
        </label>

        <x-primary-button class="mt-2 w-full">Entrar</x-primary-button>
    </form>

    <p class="mt-6 text-center text-sm text-slate-500 dark:text-slate-400">
        ¿No tienes cuenta?
        <a href="{{ route('register') }}" class="font-semibold text-sky-600 hover:underline dark:text-sky-400">Regístrate</a>
    </p>
</x-guest-layout>
