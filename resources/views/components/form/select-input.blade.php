<div class="input-area">
    <label for="{{ $name }}">
        {{ $label ?? '' }}
    </label>
    <select name="{{ $name }}" id="{{ $name }}" {{ $required ?? '' }} {{ $required ?? '' }}>
        <option selected disabled value="">Selecione a categoria</option>
        {{ $slot }}
    </select>
</div>
