<x-app-layout meta-title="Dashboard" meta-description="Panel del usuario">
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-slate-800 dark:text-slate-200">
                Dashboard
            </h2>
        </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl px-6">
            <div class="overflow-hidden rounded-md bg-white shadow-sm dark:bg-slate-800">
                <div class="p-6 text-slate-900 dark:text-slate-100">
                    ¡Iniciaste sesión, {{ auth()->user()->name }}!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
