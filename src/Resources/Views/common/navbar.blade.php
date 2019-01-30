<nav class="navbar navbar-expand-lg navbar-light bg-light px-0">
    <div class="container">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#luba--top-navbar"
            aria-controls="luba--top-navbar"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="luba--top-navbar">
            <ul class="navbar-nav mr-auto">
                @foreach (config('luba::navigation') as $link)
                    @if ($link['auth'] === true && Auth::check())
                        @if (isset($link['childs']) && count($link['childs']) > 0)
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    @lang('luba::navigation.'. $link['title'])
                                </a>
                                <div class="dropdown-menu">
                                    @foreach ($link['childs'] as $child)
                                        <a
                                            class="dropdown-item"
                                            href="{{ isset($child['href']) ? url($child['href']) : (isset($child['route']) ? route($child['route']) : '#') }}">
                                            @lang('luba::navigation.'. $child['title'])
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="{{ isset($link['href']) ? url($link['href']) : (isset($link['route']) ? route($link['route']) : '#') }}">
                                    @lang('luba::navigation.'. $child['title'])
                                </a>
                            </li>
                        @endif
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>
