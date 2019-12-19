@extends('layouts.admin')

@section('title')
    Edit Say
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Say Information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('edit_say_post', ['say' => $say->id]) }}">
                    @csrf

                    <div class="box-body">
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
                                       name="author" value="{{ empty(old('author')) ? ($errors->has('author') ? '' : $say->author) : old('author') }}">

                                @error('author')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('designation') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Designation</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter designation"
                                       name="designation" value="{{ empty(old('designation')) ? ($errors->has('designation') ? '' : $say->designation) : old('designation') }}">

                                @error('designation')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Description</label>

                            <div class="col-sm-10">
                                <textarea id="editor1" name="description" rows="10" style="width:100%;">{{ empty(old('description')) ? ($errors->has('description') ? '' : $say->description) : old('description') }}</textarea>

                                @error('description')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('admin_all_say') }}" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

