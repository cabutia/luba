<nav class="navbar navbar-expand-lg navbar-light bg-light px-0 mb-5">
    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"  aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @foreach (config('config.common.navigation') as $link)
                @if (isset($link['auth']) && $link['auth'] === true && Auth::check())
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ isset($link['href']) ? url($link['href']) : (isset($link['route']) ? route($link['route']) : '#') }}">
                            {{ $link['title'] }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</nav>
