@extends('layouts.admin')

@section('title')
    Add Machine
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Machine Information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('add.machine') }}">
                    @csrf

                    <div class="box-body">


                        <div class="form-group {{ $errors->has('model') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Model</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter model"
                                       name="model" value="{{ old('model') }}">

                                @error('model')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('type') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Type</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter type"
                                       name="type" value="{{ old('type') }}">

                                @error('type')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('capacity') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Capacity</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter capacity"
                                       name="capacity" value="{{ old('capacity') }}">

                                @error('capacity')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('image1') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Image 1</label>

                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image1">

                                @error('image1')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('image2') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Image 2</label>

                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image2">

                                @error('image2')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('image3') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Image 3</label>

                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image3">

                                @error('image3')
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
