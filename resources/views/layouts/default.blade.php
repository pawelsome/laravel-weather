<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather Panel API</title>
    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('styles')
</head>
<body class="bg-success">
<div id="app">
    <div id="wrapper">
        @yield('content')
    </div>
</div>
@yield('scripts')
</body>
</html>