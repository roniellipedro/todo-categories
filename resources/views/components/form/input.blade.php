<div class="input-area">
    <label for="{{ $name }}">
        {{ $label ?? '' }}
    </label>
    @if ($type == 'select')
        <select name="{{ $name }}" id="{{ $name }}" {{ $required ?? '' }} {{ $required ?? '' }}>
            <option selected disabled value="">Selecione a categoria</option>
            {{ $slot }}
        </select>
    @elseif($type == 'textarea')
        <textarea name="{{ $name }}" id="{{ $name }}"
            placeholder="{{ $placeholder ?? '' }} {{ $required ?? '' }}"></textarea>
    @else
        <input name="{{ $name }}" id="{{ $name }}" type="{{ $type }}"
            placeholder="{{ $placeholder ?? '' }}" {{ $required ?? '' }}>
    @endif
</div>
