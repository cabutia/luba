<nav>
    <div class="container px-0 mt-3">
        <div class="col py-2">
            @yield('page.title')
            <small>@yield('page.subtitle')</small>
        </div>
        <ol class="breadcrumb bg-transparent py-2">
            <luba-breadcrumb
                title="luba::navigation.home"
                route="#"/>
            @stack('luba::breadcrumbs')
        </ol>
    </div>
</nav>
