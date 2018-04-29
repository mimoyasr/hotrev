@extends("layouts.app")
@section('content')
    
<div class="col-md-12 text-center"> 


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

</script>
@endpush


