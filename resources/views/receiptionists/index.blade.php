
@extends('layouts.base')
@section('content')

<div class="col-md-12 text-center"> 

<button type="button" class="btn btn-success" onclick="window.location='{{ url("receiptionists/create") }}'">Create Receiptioist</button>

</div>

<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
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
        ajax: '{!! route('receiptionists.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'user.name', name: 'name' },
            { data: 'user.email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            @role('Admin')
            { data: 'created_by', name:'created_by' },
            @endrole
            { data: 'action', name: 'action', orderable: false, searchable: false }
          
       
        ]
    });
});
$(document).on('click','.delete',function(){
  
    let self = this ;
    let id = $(this).attr('target');
    let conf = confirm("Are you sure ?");
    if(conf)
    $.ajax({
        url:`receiptionists/${id}`,
        type: 'POST',
        data:{
            '_token' : '{{csrf_token()}}',
            '_method':'DELETE'
        },
        success: res => {
            
            console.log("here1");
            res = JSON.parse(res);
            if(res.status){
                console.log("here2");
                $('#users-table').DataTable().ajax.reload();
               
            }
        }
    });
});
 </script>
@endpush





