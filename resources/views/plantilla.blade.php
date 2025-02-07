<html>

<head>
    <title>
        @yield('titulo')
    </title>
    <link rel="stylesheet" href="/css/app.css" type="text/css">
</head>

<body style="overflow-x: hidden">
    @include('partials.nav')
    @yield('contenido')
    @include('partials.footer')
</body>

</html>
