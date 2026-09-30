<x-app-layout meta-title="Perfil" meta-description="Edita tu perfil">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-slate-800 dark:text-slate-200">Perfil</h2>
    </x-slot>

    <div class="mx-auto max-w-3xl space-y-6 px-6 py-12">

        {{-- 1. Datos del perfil --}}
        <section class="rounded-md bg-white p-6 shadow-sm sm:p-8 dark:bg-slate-800">
            <h3 class="text-lg font-semibold">Información del perfil</h3>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Cambia tu nombre y tu correo.</p>

            <form action="{{ route('profile.update') }}" method="POST" class="mt-6 space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <x-input-label for="name" value="Nombre" />
                    <x-text-input id="name" type="text" name="name" :value="old('name', $user->name)" required autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="email" value="Correo" />
                    <x-text-input id="email" type="email" name="email" :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <x-primary-button>Guardar</x-primary-button>
            </form>
        </section>

        {{-- 2. Cambiar contraseña (sus errores vienen en $errors->updatePassword) --}}
        <section class="rounded-md bg-white p-6 shadow-sm sm:p-8 dark:bg-slate-800">
            <h3 class="text-lg font-semibold">Cambiar contraseña</h3>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Usa una contraseña larga y difícil de adivinar.</p>

            <form action="{{ route('password.update') }}" method="POST" class="mt-6 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="current_password" value="Contraseña actual" />
                    <x-text-input id="current_password" type="password" name="current_password" autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" />
                </div>

                <div>
                    <x-input-label for="new_password" value="Contraseña nueva" />
                    <x-text-input id="new_password" type="password" name="password" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" />
                </div>

                <div>
                    <x-input-label for="new_password_confirmation" value="Confirmar contraseña nueva" />
                    <x-text-input id="new_password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" />
                </div>

                <x-primary-button>Guardar</x-primary-button>
            </form>
        </section>

        {{-- 3. Eliminar cuenta (sus errores vienen en $errors->userDeletion) --}}
        <section class="rounded-md bg-white p-6 shadow-sm sm:p-8 dark:bg-slate-800">
            <h3 class="text-lg font-semibold text-red-600 dark:text-red-400">Eliminar cuenta</h3>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                Se borra tu cuenta para siempre. Escribe tu contraseña para confirmar.
            </p>

            <form action="{{ route('profile.destroy') }}" method="POST" class="mt-6 space-y-4"
                onsubmit="return confirm('¿Seguro que quieres eliminar tu cuenta? No se puede deshacer.')">
                @csrf
                @method('DELETE')

                <div>
                    <x-input-label for="delete_password" value="Contraseña" />
                    <x-text-input id="delete_password" type="password" name="password" autocomplete="current-password" />
                    <x-input-error :messages="$errors->userDeletion->get('password')" />
                </div>

                <x-danger-button>Eliminar cuenta</x-danger-button>
            </form>
        </section>
    </div>
</x-app-layout>
