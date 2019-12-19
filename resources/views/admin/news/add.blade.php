@extends('layouts.admin')

@section('title')
    Add News
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">News Information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('add_news_post') }}">
                    @csrf

                    <div class="box-body">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Title</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter title"
                                       name="title" value="{{ old('title') }}">

                                @error('title')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('image') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Image</label>

                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image">

                                @error('image')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('author') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Author</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter author"
                                       name="author" value="{{ old('author') }}">

                                @error('author')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('file') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">File</label>

                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="file">

                                @error('file')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('upload_date') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Upload Date</label>

                            <div class="col-sm-10">
                                <input type="date" class="form-control"
                                       name="upload_date" value="{{ old('upload_date') }}">

                                @error('upload_date')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Description</label>

                            <div class="col-sm-10">
                                <textarea id="editor1" name="description" rows="10" cols="80">{{ old('description') }}</textarea>

                                @error('description')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('additionalJS')
    <!-- CK Editor -->
    <script src="{{ asset('themes/back/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('editor1');
        });
    </script>
@stop
