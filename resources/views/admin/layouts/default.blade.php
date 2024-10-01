<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Futuro Administrator</title>
    <link href="{{asset('assets/libraries/coreui/icons/css/all.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/libraries/coreui/coreui.css')}}" rel="stylesheet" />
    @stack('styles')
    <style>
        .simplebar-content {
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }
    </style>
</head>
<body>
    @include('admin.layouts.partials.sidebar')
    <main class="wrapper d-flex flex-column min-vh-100">
        @include('admin.layouts.partials.navbar')
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                @yield('content')
            </div>
        </div>
        @include('admin.layouts.partials.footer')
    </main>
    <script src="{{asset('assets/libraries/coreui/color-modes.js')}}"></script>
    <script src="{{asset('assets/libraries/coreui/coreui.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libraries/coreui/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/libraries/coreui/utils.js')}}"></script>
    <script src="{{asset('assets/libraries/coreui/charts.umd.js')}}"></script>
    <script src="{{asset('assets/libraries/coreui/coreui-charts.js')}}"></script>
    <script src="{{asset('assets/libraries/coreui/main.js')}}"></script>
    <script src="{{asset('assets/libraries/jquery/jquery.min.js')}}"></script>
    @stack('scripts')
</body>
</html>