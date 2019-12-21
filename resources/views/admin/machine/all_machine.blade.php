@extends('layouts.admin')

@section('title')
    All Machine
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
                            <th>Image1</th>
                            <th>Image2</th>
                            <th>Image3</th>
                            <th>Type</th>
                            <th>Model</th>
                            <th>Capacity</th>
                            <th>Action</th>
                        </tr>

                        @foreach($machines as $machine)
                            <tr>
                                <td>
                                    <img src="{{ asset('uploads/machine/'.$machine->image1) }}" height="50px">
                                </td>
                                <td>
                                    <img src="{{ asset('uploads/machine/'.$machine->image2) }}" height="50px">
                                </td>
                                <td>
                                    <img src="{{ asset('uploads/machine/'.$machine->image3) }}" height="50px">
                                </td>
                                <td>{{ $machine->type }}</td>
                                <td>{{ $machine->model }}</td>
                                <td>{{ $machine->capacity }}</td>
                                <td>
                                    <a href="{{ route('edit.machine',$machine->id)}}">Edit</a> |
                                    <a role="button" class="text-red btnDelete" data-id="{{ $machine->id }}">Delete</a>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="box-footer clearfix">
                    {{ $machines->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-danger fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline" id="modalBtnDelete">Delete</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@stop

@section('additionalJS')
    <script>
        $(function () {
            var selectedId;

            $('.btnDelete').click(function () {
                $('#modal-delete').modal('show');
                selectedId = $(this).data('id');
            });

            $('#modalBtnDelete').click(function () {
                $.ajax({
                    method: "POST",
                    url: "{{ route('delete.machine') }}",
                    data: { id: selectedId }
                }).done(function( msg ) {
                    location.reload();
                });
            });
        });
    </script>
@stop

