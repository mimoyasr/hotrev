



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
      <th scope="col">Slug</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>

    
    
    <tr>
      <th scope="row">1</th>
      <td>title</td>
      <td>name</td>
      <td>date</td>
     <td></td>
      <td>
        <button type="button" class="btn btn-info" onclick="window.location='{{ url("posts/$post->id") }}'" >View</button>
        <button type="button" class="btn btn-primary"  onclick="window.location='{{ url("posts/$post->id/edit") }}'" >Edit</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
  Launch demo modal
</button>
 <button targ="{{ $post->id }}" class="btn btn-warning" > view Ajax </button>
      <?php if($post->trashed()){?>

<form action="/posts/restore/{{$post->id}}" method="post">
          {{csrf_field()}}
      
{{ method_field('DELETE') }}
<button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure ?');">Restore</button>
</form>

      <?php }else{?>

        <form action="/posts/{{$post->id}}" method="post">
          {{csrf_field()}}
      
{{ method_field('DELETE') }}
<button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure ?');">Delete</button>
</form>

<?php } ?>

        
      </td>
      
    </tr>

<!--modal show -->

<div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $post->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>{{$post->id}}</label>
        <label>{{$post->title}}</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end -->

    @endforeach
    

  </tbody>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination">
  
    {{ $posts->links() }}
    
  </ul>
</nav>


</div>





