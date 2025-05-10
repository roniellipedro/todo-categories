<div class="input-area">
    <label for="{{ $name }}">
        {{ $label ?? '' }}
    </label>
    <input name="{{ $name }}" id="{{ $name }}" type="date" {{ $required ?? '' }}
        value="{{ date('Y-m-d', strtotime($value)) ?? '' }}">
</div>
