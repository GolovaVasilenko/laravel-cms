<form id="{{ $setting->slug }}" action="{{ route('settings.update', ['setting' => $setting]) }}" method="post">
    @csrf @method('PUT')
    <textarea name="value" rows="2" class="form-control">{{ $setting->value }}</textarea>
</form>
