<div class="input-area">
    <label for="{{ $name }}">
        {{ $label ?? '' }}
    </label>
    <input name="{{ $name }}" id="{{ $name }}" type="date" {{ $required ?? '' }}
        @if (!empty($value)) value="{{ date('Y-m-d', strtotime($value)) ?? '' }}" @endif>
</div>
