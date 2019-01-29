<div class="form-group">
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
