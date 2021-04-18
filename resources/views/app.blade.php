<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.8.55/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    @routes
    <script src="https://polyfill.io/v3/polyfill.min.js?features=smoothscroll,NodeList.prototype.forEach,Promise,Object.values,Object.assign" defer></script>
    <script src="{{ asset('js/anime.min.js') }}" defer></script>
    <script src="{{ asset('js/charming.min.js') }}" defer></script>
    <script src="{{ mix("js/manifest.js") }}" defer></script>
    <script src="{{ mix("js/vendor.js") }}" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
    @inertia
</body>
</html>
