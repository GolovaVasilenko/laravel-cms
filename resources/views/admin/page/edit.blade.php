@extends('admin.layouts.admin')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">

                <div class="title_left">
                    <h3>Pages</h3>
                </div>

            </div>

            <div class="clearfix"></div>
            @include('admin.partials.alerts')
            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <form class="form-horizontal form-label-left" method="post" action="{{ route('pages.update', ['page' => $page]) }}" >
                            @csrf
                            @method('PUT')
                            <div class="x_title">
                                <h2>Edit Page</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li>
                                        <button type="submit" class="btn btn-outline-info">Edit Page</button>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-12 ">
                                    <br>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Page Title</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="title" class="form-control" placeholder="" value="{{ $page->title }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Page Slug</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="slug" class="form-control" placeholder="" value="{{ $page->slug }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Page Content</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <textarea id="richEditor" class="richEditor form-control" name="body">{{ $page->body }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Meta Title</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" name="meta_title" class="form-control" placeholder="" value="{{ $page->meta_title }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 ">Meta Description</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <textarea class="form-control" name="meta_description">{{ $page->meta_description }}</textarea>
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

@endsection
@section('js')
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'richEditor', {
            filebrowserBrowseUrl : '/admin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
            filebrowserUploadUrl : '/admin/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
            filebrowserImageBrowseUrl : '/admin/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
        });
    </script>
@endsection

