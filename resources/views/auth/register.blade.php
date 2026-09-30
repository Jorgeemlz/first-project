<x-guest-layout meta-title="Crear cuenta" meta-description="Regístrate en el blog">
    <h1 class="text-center font-serif text-4xl font-bold text-sky-600 dark:text-sky-400">Crear cuenta</h1>

    <form action="{{ route('register') }}" method="POST" class="mt-8 space-y-4">
        @csrf

        <div>
            <x-input-label for="name" value="Nombre" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="Correo" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="password" value="Contraseña" />
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div>
            <x-input-label for="password_confirmation" value="Confirmar contraseña" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        <x-primary-button class="mt-2 w-full">Crear cuenta</x-primary-button>
    </form>

    <p class="mt-6 text-center text-sm text-slate-500 dark:text-slate-400">
        ¿Ya tienes cuenta?
        <a href="{{ route('login') }}" class="font-semibold text-sky-600 hover:underline dark:text-sky-400">Inicia sesión</a>
    </p>
</x-guest-layout>
