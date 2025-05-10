<div class="input-area">
    <label for="{{ $name }}">
        {{ $label ?? '' }}
    </label>
    <input name="{{ $name }}" id="{{ $name }}" type="text" placeholder="{{ $placeholder ?? '' }}"
        {{ $required ?? '' }} value="{{ $value ?? '' }}">
</div>
