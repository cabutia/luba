<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>@yield('page.title') | {{ config('app.name') }}</title>

        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @stack('luba::meta')

        <link rel="stylesheet" href="{{ asset(config('luba.assets.vendor_css')) }}">
        <link rel="stylesheet" href="{{ asset(config('luba.assets.css')) }}">
        @stack('luba::styles')

        @stack('luba::head-scripts')
    </head>
    <body>
        <div class="container" id="app">
            @include('luba::common.navbar')
            <div class="row mb-3">
                <div class="col-12">
                    <h1>@yield('page.title')</h1>
                    <h3>@yield('page.subtitle')</h3>
                </div>
            </div>
            @yield('content')
        </div>
        <script src="{{ asset(config('luba.assets.vendor_js')) }}"></script>
        <script src="{{ asset(config('luba.assets.js')) }}"></script>
        @stack('luba::scripts')
    </body>
</html>
