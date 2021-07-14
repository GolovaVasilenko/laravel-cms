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
                            <div class="x_title">
                                <h2>Add new Role</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li>
                                        <a href="{{ route('roles.create') }}" class="btn btn-outline-info">Add Role</a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Guard Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->guard_name }}</td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-sm" href="{{ route('roles.edit', ['role' => $role]) }}">Edit</a>
                                                <form style="display:inline;">
                                                    @csrf @method('delete') <button class="btn btn-outline-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
