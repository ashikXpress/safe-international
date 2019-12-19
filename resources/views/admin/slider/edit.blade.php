@extends('layouts.admin')

@section('title')
    Edit Slider
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Slider Information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('edit_slider_post', ['slider' => $slider->id]) }}">
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

                        <div class="form-group {{ $errors->has('heading') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Heading</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter heading"
                                       name="heading" value="{{ empty(old('heading')) ? ($errors->has('heading') ? '' : $slider->heading) : old('heading') }}">

                                @error('heading')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('subheading') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Subheading</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter subheading"
                                       name="subheading" value="{{ empty(old('subheading')) ? ($errors->has('subheading') ? '' : $slider->subheading) : old('subheading') }}">

                                @error('subheading')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('sort') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Sort</label>

                            <div class="col-sm-10">
                                <input type="number" min="1" class="form-control"
                                       name="sort" value="{{ empty(old('sort')) ? ($errors->has('sort') ? '' : $slider->sort) : old('sort') }}">

                                @error('sort')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('admin_all_slider') }}" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

