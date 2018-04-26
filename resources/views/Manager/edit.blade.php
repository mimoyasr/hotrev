@extends("layouts.base")
@section('content')
<div class="row">
    <div class="col-6 offset-3">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form enctype="multipart/form-data"  method="post" action="/managers">
    {{csrf_field()}}
        <div class="form-group">
        <img src='{{asset("/uploads/{$managers->photo}")}}' style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        <input type="file" name="photo">
        <label for="exampleFormControlInput1" >Name</label>
          <input type="text" class="form-control" name="name" value="{{$managers->user->name}}">
          <label for="exampleFormControlInput1" >Email</label>
          <input type="email" class="form-control" name="email" value="{{$managers->user->email}}">
          <label for="exampleFormControlInput1" >Password</label>
          <input type="password" class="form-control" name="password" value="{{$managers->user->password}}">
          <label for="exampleFormControlInput1" >National Id</label>
          <input type="text" class="form-control" name="national_id" value="{{$managers->national_id}}">

        </div>
       
        <button type="submit" class="btn btn-info">Submit</button>
      </form>
    </div>
</div>

@endsection