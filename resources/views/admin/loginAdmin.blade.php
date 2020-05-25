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

    <style>
        body{ background-image: url(admin_asset/upload/images/background.jfif);
        background-size: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng Nhập Admin - Vanilla Shop</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{route('trangchuAdmin')}}" method="Get">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tên Đăng Nhập" name="adname" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật Khẩu" name="password" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-danger btn-block">Đăng Nhập</button>
                                <button type="submit" class="btn btn-lg btn-info btn-block">Báo quên mật khẩu</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="admin_asset/js/jquery.min.js"></script>
<script src="admin_asset/js/bootstrap.min.js"></script>
<script src="admin_asset/metisMenu/dist/metisMenu.min.js"></script>
<script src="admin_asset/js/sb-admin-2.js"></script>
<script src="admin_asset/js/jquery.dataTables.js"></script>
<script rel="stylesheet" href="admin_asset/dataTable/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
</script>
</html>