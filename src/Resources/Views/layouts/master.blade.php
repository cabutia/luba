<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>@yield('page.title') | {{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    </head>
    <body>
        <div class="container">
            @include('luba::common.navbar')
            <h1>@yield('page.title')</h1>
            <h3>@yield('page.subtitle')</h3>
            @yield('content')
        </div>

        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
