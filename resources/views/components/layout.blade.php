<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$metaTitle ?? 'Yorch title'}}</title>
    <meta name="description" content="{{$metaDescription ?? 'Desfault description'}}"/>
    <script>
        // Aplica el tema guardado antes de pintar la página, para que no parpadee en blanco
        try {
            const tema = localStorage.getItem('theme');
            const oscuro = tema === 'dark' || (tema !== 'light' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            document.documentElement.classList.toggle('dark', oscuro);
        } catch (e) {}
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-gray-900 dark:bg-slate-900 dark:text-gray-100">
    @session('status')
        <div class="bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100 p-3">
            {{ $value }}
        </div>
    @endsession

    @include('layouts.navigation')

    {{ $slot }}

    @if (isset($sidebar))
        <div id="sidebar">
            <h3>Sidebar</h3>
            <div>{{ $sidebar }}</div>
        </div>
    @endif
</body>
</html>
