@extends('layouts.admin')

@section('title')
    Submenu Content
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
                            <th>Menu</th>
                            <th>Sub Menu</th>
                            <th>Action</th>
                        </tr>

                        @foreach($menus as $menu)
                            @foreach($menu->subMenus as $subMenu)
                                <tr>
                                    @if($loop->first)
                                        <td rowspan="{{ count($menu->subMenus) }}">{{ $menu->name }}</td>
                                    @endif

                                    <td>{{ $subMenu->name }}</td>
                                    <td>
                                        <a href="{{ route('submenu_content_details', ['submenu' => $subMenu->id]) }}">Edit Content</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
