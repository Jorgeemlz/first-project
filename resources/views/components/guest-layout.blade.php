{{-- Como <x-guest-layout> de Breeze: una tarjeta centrada para login, registro, etc. --}}
@props(['metaTitle' => null, 'metaDescription' => null])

<x-layout :meta-title="$metaTitle" :meta-description="$metaDescription">
    <div class="mx-auto mt-12 mb-16 max-w-md rounded-md bg-white p-8 shadow dark:bg-slate-800">
        {{ $slot }}
    </div>
</x-layout>
