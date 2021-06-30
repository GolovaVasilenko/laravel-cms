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

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <form class="form-horizontal form-label-left" method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="x_title">
                            <h2>Add new User</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <button type="submit" class="btn btn-outline-info">Add User</button>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-6 ">
                                <div class="x_panel">
                                    <div class="x_content">
                                        <br>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 ">Avatar</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="file" name="avatar" class="form-control">
                                            </div>
                                        </div>
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
                                                <input type="text" name="name" class="form-control" placeholder="User Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 ">Email</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="email" name="email" class="form-control" placeholder="User Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 ">Password</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="password" name="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 ">Roles</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                @foreach($roles as $role)
                                                <div class="">
                                                    <label>
                                                        <input type="checkbox" class="js-switch" name="roles[]" value="{{ $role->name }}" >
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
