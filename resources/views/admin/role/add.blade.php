@extends('admin.layouts.admin')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Roles</h3>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <form class="form-horizontal form-label-left" method="post" action="{{ route('roles.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="x_title">
                                <h2>Add new Role</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li>
                                        <button type="submit" class="btn btn-outline-info">Add Role</button>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Name</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
