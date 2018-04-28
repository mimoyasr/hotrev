@extends("layouts.base")
@push('scripts')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{Route('approvedclientsdatatables.index')}}',
                columns: [
                    {data: 'name', name: 'users.name', searchable: true,},
                    {data: 'email', name: 'email', searchable: false},
                    {data: 'mobile', name: 'mobile', searchable: false},
                    {data: 'country', name: 'country', searchable: false},
                    {data: 'gender', name: 'gender', orderable: false, searchable: false}

                ],


            });
        });


    </script>
@endpush

@section('content')
    <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="users-table">
        <thead>
        <tr>
            <th>Client Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>country</th>
            <th>gender</th>
        </tr>
        </thead>
    </table>
@stop