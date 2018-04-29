
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
              <h3 class="box-title">Edit Form</h3>
            </div>


            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="/floors/{{$floor->id}}">
            {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputname" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="inputname" placeholder="Name"  value="{{$floor->name}}">
                  </div>
                </div>
            
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info ">update</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
@endsection