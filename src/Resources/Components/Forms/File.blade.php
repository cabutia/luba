<div class="form-group">
    <label>
        @lang('luba::forms.'. $label)
    </label>
    <div class="custom-file">
        <input
            type="file"
            class="custom-file-input {{ $errors->has($name) ? 'is-invalid' : '' }}"
            id="{{ $name }}"
            name="{{ $name }}"
            {{ isset($required) ? 'required' : '' }}>
        <label class="custom-file-label" for="{{ $name }}">
            @lang('luba::forms.'. (isset($placeholder) ? $placeholder : 'choose_file'))
        </label>
        @if ($errors->has($name))
            <small class="invalid-feedback mt-0">{{ $errors->first($name) }}</small>
        @endif
    </div>
</div>
