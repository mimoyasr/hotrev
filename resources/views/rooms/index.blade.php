
@extends('layouts.base')
@section('content')

<div class="col-md-12 text-center"> 

<button type="button" class="btn btn-success" onclick="window.location='{{ url("rooms/create") }}'">Create room</button>

</div>

<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Number</th>
                <th>Capacity</th>
                <th>price</th>
                <th>Floor</th>
                @role('Admin')
                <th>Created By</th>
                @endrole
                <th>Action</th>
            </tr>
        </thead>
    </table>

@stop

@push('scripts')
<script>



$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('rooms.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'number', name: 'number' },
            { data: 'capacity', name: 'capacity' },
            { data: 'price', name: 'price' },
            { data: 'floor.name', name: 'floor_id' },
            @role('Admin')
            { data: 'created_by', name:'created_by' },
            @endrole
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
$(document).on('click','.delete',function(){
    console.log("here");
    let self = this ;
    let id = $(this).attr('target');
    let conf = confirm("Are you sure ?");
    if(conf)
    $.ajax({
        url:`rooms/${id}`,
        type: 'POST',
        data:{
            '_token' : '{{csrf_token()}}',
            '_method':'DELETE'
        },
        success: res => {
            console.log("here");
            console.log(res);
            res = JSON.parse(res);
            console.log(res);
            if(res.status){
               
                $('#users-table').DataTable().ajax.reload();
              
               
            }
            else{
                alert ("Can not Delete This room because this room is reserved");
            }
        }
    });
});
</script>
@endpush





