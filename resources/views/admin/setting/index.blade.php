@extends('admin.layouts.admin')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Settings</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-4 col-sm-4   form-group pull-right top_search">
                        <a class="btn btn-info add-setting-btn" data-toggle="modal" data-target=".create-setting-modal" href="#">Add Setting</a>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            @include('admin.partials.alerts')
            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Settings</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-responsive"
                                           class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                           cellspacing="0" width="100%" role="grid"
                                           aria-describedby="datatable-responsive_info" style="width: 100%;">
                                        <thead>
                                        <tr role="row">
                                            <th>#ID</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Value</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($settings as $setting)
                                            <tr role="row">
                                                <td>{{ $setting->id }}</td>
                                                <td>{{ $setting->title }}</td>
                                                <td>{{ $setting->slug }}</td>
                                                <td>@if($setting->value) {{ $setting->value }} @else @include('admin/partials/forms/' . $setting->type, ['setting' => $setting]) @endif</td>
                                                <td>
                                                    <a class="btn btn-outline-primary btn-sm settings-update-btn" data-slug="#{{ $setting->slug }}" href="#">Edit</a>
                                                    <form class="remove-item-form" style="display:inline;" method="post" action="{{ route('settings.destroy', ['setting' => $setting]) }}">
                                                        @csrf @method('delete') <button type="submit" class="btn btn-outline-danger btn-sm remove-item-form-btn">Delete</button>
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
        </div>
    </div>
    <!-- /page content -->

    <div class="modal fade create-setting-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Setting</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="{{ route('settings.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Name</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" name="title" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Group</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="group" class="form-control">
                                @foreach($groups as $key => $group)
                                   <option value="{{ $key }}">{{ $group }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Field type</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="type" class="form-control">
                                    @foreach($types as $key => $type)
                                        <option value="{{ $key }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Setting</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('css')
    <link href="{{ asset('admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}"
          rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/build/js/other-theme.js') }}"></script>
@endsection
