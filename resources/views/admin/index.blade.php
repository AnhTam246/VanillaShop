<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <base href="{{asset('')}}}">
    <link rel="stylesheet" href="admin_asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin_asset/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_asset/metisMenu/dist/metisMenu.min.css">
    <link rel="stylesheet" href="admin_asset/dataTable/dataTables.bootstrap.css">
    <link href="admin_asset/css/dataTables.responsive.css" rel="stylesheet">
    <link href="admin_asset/css/sb-admin-2.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
</head>
<body>
    <div id="wrapper">

        @include('admin.header')
    
        @yield('content')
    
    </div>
</body>
<script src="admin_asset/js/jquery.min.js"></script>
<script src="admin_asset/js/bootstrap.min.js"></script>
<script src="admin_asset/metisMenu/dist/metisMenu.min.js"></script>
<script src="admin_asset/js/sb-admin-2.js"></script>
<script src="admin_asset/js/jquery.dataTables.js"></script>
<script rel="stylesheet" href="admin_asset/dataTable/dataTables.bootstrap.min.js"></script>
<script src="admin_asset/js/revenue.js"></script>
<script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
</html>