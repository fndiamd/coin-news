<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (!isset($title))
        <?php $title = 'Home'; ?>
    @endif
    <title>{{ Config::get('app.name', 'NewsCoin') . ' - ' . $title }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
</head>

<body>
    @include('components.header')
    @include('components.flash-message')
    @yield('content')
    @include('components.footer')

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>
