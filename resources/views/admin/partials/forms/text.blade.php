<form id="{{ $setting->slug }}" action="{{ route('settings.update', ['setting' => $setting]) }}" method="post">
    @csrf @method('PUT')
    <input class="form-control" name="value" type="text" value="{{ $setting->value }}" />
</form>
