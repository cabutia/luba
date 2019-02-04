<div class="form-check col-12">
    <input type="hidden" name="{{ $name }}" value="0">
    <input
        class="form-check-input"
        type="checkbox"
        name="{{ $name }}"
        value="1"
        id="check-{{ str_slug($name) }}"
        {{ isset($checked) && $checked || old($name) ? 'checked' : '' }}>
    <label
        class="form-check-label"
        for="check-{{ str_slug($name) }}">
        @lang('luba::forms.' . $label)
    </label>
    @if ($errors->has($name))
        <small class="invalid-feedback mt-0">{{ $errors->first($name) }}</small>
    @endif
</div>
