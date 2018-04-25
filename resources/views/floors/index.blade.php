
@extends('layouts.base')
@section('content')

<div class="col-md-12 text-center"> 

<button type="button" class="btn btn-success" onclick="window.location='{{ url("floors/create") }}'">Create Floor</button>

</div>


 <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Number</th>
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
        ajax: '{!! route('floors.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'nubmber', name: 'nubmber' },
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
        url:`floors/${id}`,
        type: 'POST',
        data:{
            '_token' : '{{csrf_token()}}',
            '_method':'DELETE'
        },
        sucsess: res => {
            console.log("here");
            console.log(res);
            res = JSON.parce(res);
            if(res.status){
                $(self).parents('tr').remove();
            }
        }
    });
});
</script>
@endpush


