<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Approved Clients</title>

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


</head>
<body>
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


<script>
    $(function () {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{Route('approvedclientsdatatables.index')}}',
            columns: [
                {
                    data: 'name',
                    name: 'users.name',
                    searchable: true,
                    // render: function (data) {
                    //     return '<h1>data</h1>';
                    // }
                },
                {data: 'email', name: 'email', searchable: false},
                {data: 'mobile', name: 'mobile', searchable: false},
                {data: 'country', name: 'country', searchable: false},
                {data: 'gender', name: 'gender', orderable: false, searchable: false}

            ],


        });
    });


</script>


</body>
</html>