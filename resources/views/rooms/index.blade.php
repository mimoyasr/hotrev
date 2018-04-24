
@extends('layouts.base')
@section('content')

<div class="col-md-12 text-center"> 

<button type="button" class="btn btn-success" onclick="window.location='{{ url("rooms/create") }}'">Create room</button>

</div>

<div class ="container-fluid"> 
<table  id="myTable" class="table table-bordered table-striped text-center">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Number</th>
      <th scope="col">Capacity</th>
      <th scope="col">Price</th>
      <th scope="col">Floor Name</th>

    </tr>
  </thead>
  <tbody>

    
     @foreach ($rooms as $room)  
    <tr>
      <th scope="row">1</th>
      <td>{{$room->number}}</td>
      <td>{{$room->capacity}}</td>
      <td>{{$room->price}}</td>
      <td>{{$room->floor->name}}</td>
      
      

      <td>
        <button type="button" class="btn btn-primary"  onclick="window.location='{{ url("rooms/$room->id/edit") }}'">Edit</button>
        <form action="/rooms/{{$room->id}}" method="post">
          {{csrf_field()}}
      
{{ method_field('DELETE') }}
<button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure ?');">Delete</button>
</form>
      </td>
      
    </tr>
	
@endforeach
    
  </tbody>
</table>

</div>

<!-- <table id="table_id" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table> -->

@endsection

<!-- <script>
  var $  = require( 'jquery' );
var dt = require( 'datatables.net' )();
$(document).ready( function () {
    // $('#myTable').DataTable();
} );
<script> -->


