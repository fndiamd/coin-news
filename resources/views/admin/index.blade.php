<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin {{ Config::get('app.name', 'NewsCoin') . ' - ' . $title }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    @include('components.flash-message')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 nav-side">
                @include('admin.components.header')
            </div>
            <div class="col-9 main-section">
                <div class="content">
                    <h2>{{ $title }}</h2>
                    <hr>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
