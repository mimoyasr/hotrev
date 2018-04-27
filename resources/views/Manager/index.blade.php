@extends("layouts.base")
@section('content')
    
<div class="col-md-12 text-center"> 

  <button type="button" class="btn btn-success" onclick="window.location='{{ url("managers/create") }}'">Add Manager</button>
  
  </div>
<br><br>

  <table class="table table-bordered" id="users-table">
    <thead>
      <tr class="text-center">
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">National Id</th>
        <th scope="col">photo</th>
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
        ajax: '{!! route('managers.data') !!}',
        columns: [
          { data: 'id', name: 'id' },
          { data: 'name', name: 'name' },
          { data: 'email', name: 'email' },
          { data: 'nationalid',name: 'nationalid' },
          { data: 'photo', name: 'photo' },
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


