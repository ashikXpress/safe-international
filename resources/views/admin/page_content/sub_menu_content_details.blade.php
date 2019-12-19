@extends('layouts.admin')

@section('title')
    Submenu Content - {{ $submenu->name }}
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form class="form-horizontal" method="POST" action="{{ route('submenu_content_save', ['submenu' => $submenu->id]) }}">
                    @csrf

                    <textarea id="editor1" name="text_content" rows="10" cols="80">{{ $submenu->content }}</textarea>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('submenu_content') }}" class="btn btn-default">Cancel</a>
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
