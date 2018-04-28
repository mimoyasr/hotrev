@extends("layouts.base")
@push('scripts')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf-8">
        function Approve(id) {
            var target_url = '/pendingclients/' + id;
            $.ajax({
                type: 'PUT',
                url: target_url,
                dataType: 'json',
                data: {"_token": "{{ csrf_token() }}"},
                success: function (data) {
                    $('#users-table').DataTable().draw(false)
                },
                error: function () {
                    alert("Unexpected ERROR");
                },
            });
        }
    </script>
    <script>
        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{Route('pendingclientsdatatablesapprove.index')}}',
                columns: [
                    {data: 'id', name: 'clients.id', searchable: true},
                    {data: 'name', name: 'users.name', searchable: true},
                    {data: 'email', name: 'email', searchable: false},
                    {data: 'created_at', name: 'created_at', searchable: false},
                    {data: 'updated_at', name: 'updated_at', searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false}

                ],

            });
        });

        $(document).on('click', '.btn-danger', function () {

            let self = this;
            let id = $(this).attr('target');
            let conf = confirm("Are you sure ?");
            if (conf)
                $.ajax({
                    url: `/pendingclients/${id}`,
                    type: 'DELETE',
                    data: {
                        '_token': '{{csrf_token()}}',
                        '_method': 'DELETE'
                    },
                    success: res => {

                        if (res.sucess = "sucess") {
                            $(self).parents('tr').remove();

                        }
                    }
                });
        });

    </script>

@endpush

@section('content')

    <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="users-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>actions</th>
        </tr>
        </thead>
    </table>
@stop