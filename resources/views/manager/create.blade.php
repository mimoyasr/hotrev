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
    <div class="container">
            <div class="col-md-6 offset-3">
 
    <form enctype="multipart/form-data"  method="post" action="/managers">
    {{csrf_field()}}
    
        <div class="form-group">
        <img src="{{asset('uploads/user.jpg')}}" style="width:200px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        <br><br><br><br><br><br><br><br><br>
        <input type="file" name="photo">
        <br><br>
        <label for="exampleFormControlInput1" >Name</label>
          <input type="text" class="form-control" name="name">
          <label for="exampleFormControlInput1" >Email</label>
          <input type="email" class="form-control" name="email">
          <label for="exampleFormControlInput1" >Password</label>
          <input type="password" class="form-control" name="password">
          <label for="exampleFormControlInput1" >National Id</label>
          <input type="text" class="form-control" name="national_id">

        </div>
       
        <button type="submit" class="btn btn-info">Submit</button>
        <button type="button" class="btn btn-success" onclick="window.location='{{ url("managers") }}'">Back</button>

      </form>
            </div>
</div>
    </div>
</div>

@endsection