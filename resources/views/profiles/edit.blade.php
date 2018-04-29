
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
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="/profiles/{{ $client->id }}">
            {{csrf_field()}}
            <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputName1">Name</label>
                  <input type="text" class="form-control" id="exampleInputName" name="name" value={{$client->user->name}} placeholder="Enter name">
                </div>
           
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="email" value={{$client->user->email}} placeholder="Enter email">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Mobile</label>
                  <input type="mobile" class="form-control" id="mobile" name="mobile" value="{{$client->mobile }}" placeholder="Password">
                </div>

                  
                  <input type="hidden" class="form-control"  name="user_id" value="{{$client->user_id }}" placeholder="Enter email">

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          
@endsection