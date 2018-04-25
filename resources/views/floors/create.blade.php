<p>create</p>

<form class ="container-fluid" method="post" action="/floors/store">

{{csrf_field()}}

  <div class="form-group">
    <label for="exampleInputTitle">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter title">
  </div>
  
  <button type="submit" class="btn btn-success">Create</button>
</form>