@extends('admin.layouts.admin')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Users</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-4 col-sm-4   form-group pull-right top_search">
                        <a class="btn btn-info" href="{{ route('users.create') }}" >Add User</a>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>List of Users</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection
