<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pinding Clients</title>

    <style>
        body {
            padding-top: 40px;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css
"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap4.min.css"/>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


    <script type="text/javascript" charset="utf-8">


        function Approve(id) {
            var target_url = '/pendingclients/' + id;
            $.ajax({
                type: 'PUT',
                url: target_url, //Make sure your URL is correct
                dataType: 'json', //Make sure your returning data type dffine as json
                data: {"_token": "{{ csrf_token() }}"},
                success: function (data) {


                    $('#users-table').DataTable().draw(false)
                    // alert(data.success);
                },
                error: function () {
                    alert("Unexpected ERROR");

                },
            });
        }
    </script>


</head>
<body>
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
</script>


</body>
</html>