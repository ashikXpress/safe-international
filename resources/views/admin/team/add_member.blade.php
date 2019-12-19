@extends('layouts.admin')

@section('title')
    Add Team Member
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Team Member Information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('add.team.member') }}">
                    @csrf

                    <div class="box-body">


                        <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter name"
                                       name="name" value="{{ old('name') }}">

                                @error('name')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group {{ $errors->has('mobile_number') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Mobile Number</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter mobile number"
                                       name="mobile_number" value="{{ old('mobile_number') }}">

                                @error('mobile_number')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" placeholder="Enter email"
                                       name="email" value="{{ old('email') }}">

                                @error('email')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group {{ $errors->has('designation') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Designation</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter designation"
                                       name="designation" value="{{ old('designation') }}">

                                @error('designation')
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

