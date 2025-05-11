<div class="input-area">
    <label for="{{ $name }}">
        {{ $label ?? '' }}
    </label>
    <input name="{{ $name }}" id="{{ $name }}" type="{{ $type }}"
        placeholder="{{ $placeholder ?? '' }}" {{ $required ?? '' }} value="{{ $value ?? '' }}">
</div>
