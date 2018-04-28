@extends("layouts.base")
@section('content')

<div class="col-md-12 text-center"> 
</div>
<br><br>

<table class="table table-bordered" id="users-table">
    <thead>
      <tr class="text-center">
        <th scope="col">Accompany Number</th>
        <th scope="col">Room Number</th>
        <th scope="col">paid price</th>
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
        ajax: '{!! route('reservations.data') !!}',
        columns: [
            { data: 'accompany', name: 'accompany' },
          { data: 'room.number', name: 'room.number' },
          { data: 'paid_price', name: 'paid_price' },
         
        ]
    });
});
</script>
@endpush