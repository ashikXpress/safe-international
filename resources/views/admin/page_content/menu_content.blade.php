@extends('layouts.admin')

@section('title')
    Menu Content
@stop

@section('content')
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('message') }}
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="80%">Name</th>
                            <th>Action</th>
                        </tr>

                        @foreach($menus as $menu)
                            <tr>
                                <td>{{ $menu->name }}</td>
                                <td>
                                    <a href="{{ route('menu_content_details', ['menu' => $menu->id]) }}">Edit Content</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
