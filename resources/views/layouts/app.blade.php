<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Admin Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">

        <style>
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                width: 200px;
                background-color: #fff;
                padding-top: 20px;
                overflow-y: auto;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            }

            .main-content {
                margin-left: 250px; /* Adjust according to sidebar width */
                padding: 20px; /* Add padding to prevent content from sticking to the sidebar */
            }
        </style>
    </head>
    <body class="{{ $class ?? '' }}" style="background-color: #f8f9fe;">
        @auth
            <!-- Include the sidebar -->
            <div class="sidebar">
                @include('side-panel')
            </div>
        @endauth

        <div class="main-content">
            <!-- Include navigation bar -->
            @include('layouts.navbars.navbar')

            <!-- Content section -->
            @yield('content')
        </div>

        @guest
            <!-- Include footer for guest users -->
            @include('layouts.footers.guest')
        @endguest

        <!-- Include JavaScript files -->
        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        
        @stack('js')
        
        <!-- argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
    </body>
</html>
