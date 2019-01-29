<div class="form-group col-12 px-0">
    <label for="title">@lang('luba::forms.'. $label)</label>
    <select
        class="form-control"
        name="{{ $name }}"
        {{ isset($required) ? 'required' : '' }}>
        @if (!empty($slot))
            @forelse ($options as $option)
                <option
                    value="{{ $option->{$key} }}"
                    {{ old($name) == $option->{$key} ? 'selected' : '' }}>
                    {{ $option->{$value} }}
                </option>
            @empty
                <option selected disabled>@lang('luba::forms.'. $label .'_empty')</option>
            @endforelse
        @else
            {{ $slot }}
        @endif
    </select>
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
