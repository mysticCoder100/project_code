@if (!Route::is('admin.*') && Auth::guard('tourist')->check())
    @props([
        'user' => Auth::guard('tourist')->user(),
        'field' => $field,
    ])
@endif

<div class="my-input">
    <label for="{{ $field['name'] }}" class="form-label">{{ $field['placeholder'] }}</label>
    <div class="input-wrapper" data-content="{{ $field['name'] }}">
        @if (isset($field['textarea']))
            <textarea id="{{ $field['name'] }}" name="{{ $field['name'] }}" class="form-control"
                placeholder="{{ $field['placeholder'] }}" rows="4"></textarea>
        @elseif (isset($field['select']))
            <select class="form-select" id="{{ $field['name'] }}"
                name="{{ $field['name'] }}">
                <option class="text-muted" selected value="{{ '' }}">{{ $field['placeholder'] }}</option>
                @foreach ($field['option'] as $option)
                    <option value="{{ $option['value'] }}">{{ $option['placeholder'] }}</option>
                @endforeach
            </select>
        @else
            <input type="{{ $field['type'] }}" data-type="{{ $field['type'] }}" id="{{ $field['name'] }}"
                name="{{ $field['name'] }}"
                value="{{ $user[$field['name']] ?? old($field['name']) }}"
                class="form-control"
                placeholder="{{ $field['placeholder'] }}">
            @if ($field['type'] == 'password')
                <button class="btn" type="button"> <i class="fa fa-eye" aria-hidden="true"></i> </button>
            @endif
        @endif
    </div>
    @error($field['name'])
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
