<div class="{{ isset($class) ? $class : '' }}">
    <div class="card bg-light px-2 py-2">
        <div class="row">
            <div class="col-12">
                <h4>@lang(isset($title) ? $title : 'errors.card_without_title')</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
