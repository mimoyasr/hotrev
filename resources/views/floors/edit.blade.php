


@section('content')

<h1>in show</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class ="container-fluid" method="post" action="/floors/{{$floor->id}}">

{{csrf_field()}}

  <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" class="form-control" name="name" placeholder="Enter title"  value="{{$floor->name}}">
  </div>

  <button type="submit" class="btn btn-success">Create</button>
</form>

