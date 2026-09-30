<x-guest-layout meta-title="Confirmar contraseña" meta-description="Confirma tu contraseña para continuar">
    <h1 class="text-center font-serif text-3xl font-bold text-sky-600 dark:text-sky-400">Confirma tu contraseña</h1>

    <p class="mt-4 text-center text-sm text-slate-600 dark:text-slate-300">
        Esta es una zona protegida. Escribe tu contraseña para continuar.
    </p>

    <form action="{{ route('password.confirm') }}" method="POST" class="mt-8 space-y-4">
        @csrf

        <div>
            <x-input-label for="password" value="Contraseña" />
            <x-text-input id="password" type="password" name="password" required autofocus autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <x-primary-button class="mt-2 w-full">Confirmar</x-primary-button>
    </form>
</x-guest-layout>
