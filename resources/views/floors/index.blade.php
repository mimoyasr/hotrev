
<div class="col-md-12 text-center"> 

<button type="button" class="btn btn-success" onclick="window.location='{{ url("floors/create") }}'">Create floor</button>

</div>

<div class ="container-fluid"> 
<table  class="table table-bordered table-striped text-center">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Number</th>

    </tr>
  </thead>
  <tbody>

    
    @foreach ($floors as $floor) 
    <tr>
      <th scope="row">{{$floor->id}}</th>
      <td>{{$floor->name}}</td>
      <td>{{$floor->nubmber}}</td>
      

      <td>
        <button type="button" class="btn btn-primary"  onclick="window.location='{{ url("floors/$floor->id/edit") }}'">Edit</button>
        <form action="/floors/{{$floor->id}}" method="post">
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





