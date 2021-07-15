@if($setting->value)
    <img src="{{ asset('uploads/' . $setting->value) }}" alt="" width="60" />
@else
    <form id="{{ $setting->slug }}" action="{{ route('settings.update', ['setting' => $setting]) }}" method="post" enctype="multipart/form-data">
        @csrf @method('PUT')
        <input type="file" class="form-control" name="value" />
    </form>
@endif
