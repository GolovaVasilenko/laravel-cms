@if ($errors->any())
    <div class="alert alert-danger alert-dismissible ">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <ul>
            @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if ($message = \Illuminate\Support\Facades\Session::get('success'))
    <div class="alert alert-info alert-dismissible ">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <p>{{ $message }}</p>
    </div>
@endif
