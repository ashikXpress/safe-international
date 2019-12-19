@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-cube"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Slider</span>
                    <span class="info-box-number">{{ $data['slider'] }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-newspaper-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">News</span>
                    <span class="info-box-number">{{ $data['news'] }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-comments-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Client Says</span>
                    <span class="info-box-number">{{ $data['says'] }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-picture-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Gallery</span>
                    <span class="info-box-number">{{ $data['gallery'] }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
@stop
