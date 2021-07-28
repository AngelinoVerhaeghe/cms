<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('css')
</head>

<body class="bg-gray-100 h-screen antialiased font-sans">

    <header class="bg-gray-900 shadow-lg py-6">
        @include('includes.topNavigation')
    </header>

    <div class="container mx-auto px-6 lg:px-0">
        <main>
            @yield('content')
        </main>
    </div>

    <footer class="bg-gray-900 shadow-lg py-15 mt-15">
        @include('includes.footer')
    </footer>


    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Blade page only scripts -->
    @yield('scripts')

</body>

</html>
