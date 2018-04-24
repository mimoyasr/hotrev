
@extends('layouts.base')
@section('content')




 <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Number</th>
                
            </tr>
        </thead>
    </table>

@stop

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('floors.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'nubmber', name: 'nubmber' },
            
        ]
    });
});
</script>
@endpush


