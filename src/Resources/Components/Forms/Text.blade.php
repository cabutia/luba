<div class="form-group col-12 px-0">
    <label for="title">@lang('luba::forms.'. $label)</label>
    <input
        type="text"
        name="{{ $name }}"
        value="{{ old($name) }}"
        class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}"
        placeholder="@lang('luba::forms.'. $label .'_hint')"
        {{ isset($required) ? 'required' : '' }}>
    @if ($errors->has($name))
        <small class="invalid-feedback mt-0">{{ $errors->first($name) }}</small>
    @endif
</div>

@if (isset($help))
    @push('help_card_'. $help)
        <div class="col-12">
            <h5>@lang('luba::forms.'. $label)</h5>
            <p>@lang('luba::forms.help.'. $label)</p>
        </div>
    @endpush
@endif
