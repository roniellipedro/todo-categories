<div class="input-area">
    <label for="{{ $name }}">
        {{ $label ?? '' }}
    </label>

    <textarea name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder ?? '' }}" {{ $required ?? '' }}>{{ $value ?? '' }}</textarea>

</div>
