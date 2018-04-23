
<div class="col-md-12 text-center"> 

<button type="button" class="btn btn-success" onclick="window.location='{{ url("") }}'">Create Post</button>

</div>

<div class ="container-fluid"> 
<table  class="table table-bordered table-striped text-center">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>

    
    
    <tr>
      <th scope="row">1</th>
      <td>title</td>
      <td>name</td>
      <td>date</td>

      <td>
        <button type="button" class="btn btn-info">View</button>
        <button type="button" class="btn btn-primary">Edit</button>
        <form action="/posts/{{$post->id}}" method="post">
          {{csrf_field()}}
      
{{ method_field('DELETE') }}
<button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure ?');">Delete</button>
</form> 
      </td>
      
    </tr>
  </tbody>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination">
  
    {{ $posts->links() }}
    
  </ul>
</nav>


</div>





