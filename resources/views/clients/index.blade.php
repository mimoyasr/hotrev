@extends("layouts.base")
@section('content')
    
<div class="col-md-12 text-center"> 

  <button type="button" class="btn btn-success" onclick="window.location='{{ url("managers/create") }}'">Add Manager</button>
  
  </div>
<br><br>

  <table class="table table-bordered" id="users-table">
    <thead>
      <tr class="text-center">
        <th scope="col">Room Id</th>
        <th scope="col">Price</th>
        <th scope="col">Capacity</th>
        <th scope="col">Action</th>
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
        ajax: '{!! route('clients.data') !!}',
        columns: [
          { data: 'number', name: 'number' },
          { data: 'price', name: 'price' },
          { data: 'capacity', name: 'capacity' },
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
        url:`managers/${id}`,
        type: 'POST',
        data:{
            '_token' : '{{csrf_token()}}',
            '_method':'DELETE'
        },
        success: res => {
            console.log("here");
            console.log(res);
            res = JSON.parse(res);
            if(res.status){
                $(self).parents('tr').remove();
            }
        }
    });
});
</script>
@endpush


