@extends("layouts.base")
@section('content')
    
    <div class ="container-fluid"> 
    <table  class="table table-bordered table-striped text-center">
      <thead>
        <tr class="text-center">
         
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Id</th>
          <th scope="col">NationalId</th>
          <th scope="col">photo</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
    @foreach($managers as $manager)
        <tr>
            td>{{ $manager->user->name }}</td>
          <td>{{ $manager->user->email }}</td>
          <td>{{ $manager->id }}</td>
          <td>{{ $manager->national_id }}</td>
          <td>{{ $manager->photo}}</td>
    
          <td>
            <button type="button" class="btn btn-info">View</button>
            <button type="button" class="btn btn-primary">Edit</button>

          </td>
          
        </tr>
        @endforeach
      </tbody>
    </table>

    
    </div>


@endsection
