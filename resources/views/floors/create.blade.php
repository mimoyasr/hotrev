
<!-- <form class ="container-fluid" method="post" action="/floors/store">

{{csrf_field()}}

  <div class="form-group">
    <label for="exampleInputTitle">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter title">
  </div>
  
  <button type="submit" class="btn btn-success">Create</button>
</form> -->
@extends('layouts.base')
@section('content')
<div class="box box-info">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="box-header with-border">
              <h3 class="box-title">Create Form</h3>
            </div>


            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="/floors/store">
            {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputname" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="inputname" placeholder="Name">
                  </div>
                </div>
            
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info ">create</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
@endsection