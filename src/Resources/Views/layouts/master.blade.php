<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>@yield('page.title') | {{ config('app.name') }}</title>

        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @stack('luba::meta')

        <link rel="stylesheet" href="{{ asset(config('luba.assets.vendor_css')) }}">
        <link rel="stylesheet" href="{{ asset(config('luba.assets.css')) }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        @stack('luba::styles')

        @stack('luba::head-scripts')
    </head>
    <body onbeforeunload="handleBeforeUnload(event)" onload="handleOnLoad(event)">
        @include('luba::common.preloader')
        @include('luba::common.navbar')
        @include('luba::common.breadcrumbs')
        <div class="container" id="app">
            <div class="row mb-3">
                <div class="col-12">
                    {{-- <h1>@yield('page.title')</h1> --}}
                    {{-- <h3>@yield('page.subtitle')</h3> --}}
                </div>
            </div>
            @yield('content')
        </div>
        <script src="{{ asset(config('luba.assets.vendor_js')) }}"></script>
        <script src="{{ asset(config('luba.assets.js')) }}"></script>
        @include('luba::common.development')
        @stack('luba::scripts')
    </body>
</html>
