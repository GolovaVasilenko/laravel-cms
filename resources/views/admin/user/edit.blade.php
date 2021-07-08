@extends('admin.layouts.admin')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Users</h3>
                </div>

            </div>
            <div class="clearfix"></div>
            @include('admin.partials.alerts')
            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <form class="form-horizontal form-label-left" method="post" action="{{ route('users.update', ['user' => $user]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="x_title">
                                <h2>Update User</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li>
                                        <button type="submit" class="btn btn-outline-info">Update User</button>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-6 ">
                                    <div class="x_panel">
                                        <div class="x_content">
                                            <br>
                                            @if($user->avatar)
                                                <div class="img-wrapper">
                                                    <span>&times;</span>
                                                    <img src="{{ asset('uploads/' . $user->avatar) }}" />
                                                </div>
                                            @else
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 ">Avatar</label>
                                                    <div class="col-md-9 col-sm-9 ">
                                                        <input type="file" name="avatar" class="form-control">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="x_panel">
                                        <div class="x_content">
                                            <br>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 ">Name</label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="name" class="form-control" placeholder="User Name" value="{{ $user->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 ">Email</label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="email" name="email" class="form-control" placeholder="User Email" value="{{ $user->email }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3 col-sm-3 ">Roles</label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    @foreach($roles as $role)
                                                        <div class="">
                                                            <label>
                                                                <input type="checkbox" class="js-switch" name="roles[]" value="{{ $role->name }}" @if($user->hasRole($role->name)) checked @endif >
                                                                {{ ucfirst($role->name) }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection

@section('css')
    <link href="{{ asset('admin/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('admin/vendors/switchery/dist/switchery.min.js') }}"></script>
@endsection
