<div class="{{ isset($class) ? $class : '' }}">
    <div class="card bg-light px-2 py-2">
        <div class="row">
            <div class="col-12">
                <h4>@lang('luba::forms.help_card_hint')</h4>
            </div>
            @stack('help_card_'. $namespace)
        </div>
    </div>
</div>
