<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <title>Laravel</title>
</head>
<body class="antialiased">

<nav class="text-gray-600 text-center rounded shadow border">
    <a href="/">Principal</a>
    <a href="/nosotros">Nosotros</a>
    <a href="/tienda">Tienda</a>
    <a href="/contacto">Contacto</a>
</nav>

<h1>@yield('titulo')</h1>


@yield('contenido')
</body>
</html>

