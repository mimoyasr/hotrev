
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
            <form class="form-horizontal" method="post" action="/rooms/{{$room->id}}">
            {{csrf_field()}}
              
            
                <div class="box-body">
                <div class="form-group">
                  <label for="inputname" class="col-sm-2 control-label">Number</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="number" id="inputnumber" placeholder="Number" value="{{$room->number}}" disabled>
                  </div>
                </div>

                <div class="box-body">
                <div class="form-group">
                  <label for="inputname" class="col-sm-2 control-label">Capacity</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="capacity" id="inputcapacity" placeholder="Capacity" value="{{$room->capacity}}">
                  </div>
                </div>
            

                      <div class="box-body">
                <div class="form-group">
                  <label for="inputname" class="col-sm-2 control-label">Price</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="price" id="inputprice" placeholder="Price" value="{{$room->price}}">
                  </div>
                </div>

                <div class="form-group">
                  <label>Select</label>
                  <select class="form-control" name="floor">
                  @foreach ($floors as $floor)  
                    <option value={{$floor->id}}
                    
                    @if($floor->id == $room->floor->id)
                    selected
                    @endif
                    
                    >{{$floor->name}}</option>
                    @endforeach
                  </select>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info ">update</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
@endsection