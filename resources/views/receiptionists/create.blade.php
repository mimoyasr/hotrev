
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
            <form class="form-horizontal" method="post" action="/receiptionists/store" enctype="multipart/form-data" >
            {{csrf_field()}}
            <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputName1">Name</label>
                  <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter name">
                </div>
           
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>

                
                <div class="form-group">
                  <label for="exampleInputnationalid1">National ID</label>
                  <input type="text" class="form-control" id="exampleInputnationalid1" name="national_id" placeholder="Enter email">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="photo" >

                  <p class="help-block">Example block-level help text here.</p>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          
@endsection