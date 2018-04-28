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
                ajax: '{{Route('approvedclientsreservationsdatatables.index')}}',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'accompany', name: 'accompany', searchable: false},
                    {data: 'number', name: 'number', searchable: false},
                    {data: 'paid_price', name: 'paid_price', searchable: false},
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
            <th>Client accompany number</th>
            <th>Room number</th>
            <th>Client paid price</th>
        </tr>
        </thead>
    </table>
@stop