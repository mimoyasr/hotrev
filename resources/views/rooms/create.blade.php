create

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
            <form class="form-horizontal" method="post" action="/rooms/store">
            {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputname" class="col-sm-2 control-label">Number</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="number" id="inputnumber" placeholder="Number">
                  </div>
                </div>

                <div class="box-body">
                <div class="form-group">
                  <label for="inputname" class="col-sm-2 control-label">Capacity</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="capacity" id="inputcapacity" placeholder="Capacity">
                  </div>
                </div>
            

                      <div class="box-body">
                <div class="form-group">
                  <label for="inputname" class="col-sm-2 control-label">Price</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="price" id="inputprice" placeholder="Price">
                  </div>
                </div>

                <div class="form-group">
                  <label>Select</label>
                  <select class="form-control" name="floor">
                  @foreach ($floors as $floor)  
                    <option value={{$floor->id}}>{{$floor->name}}</option>
                    @endforeach
                  </select>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info ">create</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
@endsection