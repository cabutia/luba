<div class="form-group">
    <div class="row d-none mb-2" id="input-preview-{{ $name }}">
        <div class="col text-center">
            <img src="#" class="img-fluid rounded">
        </div>
    </div>
    <label>
        @lang('luba::forms.'. $label)
    </label>
    <div class="custom-file">
        <input
            type="file"
            class="custom-file-input {{ $errors->has($name) ? 'is-invalid' : '' }}"
            id="input-image-{{ $name }}"
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

@if (isset($help))
    @push('help_card_'. $help)
        <div class="col-12">
            <h5>@lang('luba::forms.'. $label)</h5>
            <p>@lang('luba::forms.help.'. $label)</p>
        </div>
    @endpush
@endif

@push('luba::scripts')
    <script>
        let input = document.getElementById('input-image-{{ $name }}')
        let previewContainer = document.getElementById('input-preview-{{ $name }}')
        let previewImg = previewContainer.querySelector('img')
        input.addEventListener('change', ev => {
            if (input.files && input.files[0]) {
                let reader = new FileReader()
                reader.onload = e => {
                    previewImg.setAttribute('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0])
                previewContainer.classList.remove('d-none')
            }
        })
    </script>
@endpush
