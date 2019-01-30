<div class="row mt-3">
    <div class="col-12">
        <ul class="nav nav-tabs nav-fill">
            @foreach ($tabs as $tab)
                <li class="nav-item">
                    <a
                        href="{{ $tab['route'] }}"
                        class="nav-link {{ luba_active_route($tab['route']) ? 'active' : '' }}">
                        @lang($tab['title'])
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
