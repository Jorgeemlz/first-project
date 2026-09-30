{{-- Como <x-app-layout> de Breeze: páginas con sesión, con un encabezado opcional --}}
@props(['metaTitle' => null, 'metaDescription' => null])

<x-layout :meta-title="$metaTitle" :meta-description="$metaDescription">
    @isset($header)
        <div class="bg-white shadow-sm dark:bg-slate-800">
            <div class="mx-auto max-w-7xl px-6 py-6">
                {{ $header }}
            </div>
        </div>
    @endisset

    {{ $slot }}
</x-layout>
