@prepend('luba::breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ $route }}">
            @if (isset($args))
                @lang($title, $args)
            @else
                @lang($title)
            @endif
        </a>
    </li>
@endprepend
