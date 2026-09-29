<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$metaTitle ?? 'Yorch title'}}</title>
    <meta name="description" content="{{$metaDescription ?? 'Desfault description'}}"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @session('status')
  <div >
    {{ $value }}
  </div>  
  @endsession
    @include('partials/navigation')
{{ $slot }}
@if (isset($sidebar))
<div id ="sidebar">   
 <h3>Sidebar</h3>
 <div>{{ $sidebar }}</div>
</div>
@endif
</body>     
</html>