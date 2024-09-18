<input type="{{ $type }}" class="{{ $class ?: 'form-control' }} @error($name) is-invalid

@enderror"
    name="{{ $name }}" id="{{ $id }}" value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}"
    {{ $attribute }}>
@error($name)
    <span class="invalid-feedback">
        {{ $massage }}
    </span>
@enderror
