@extends('admin.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2>Thêm Admin</h2>
                @if(session()->has('create_admin_success'))
                    {{session()->get('create_admin_success')}}
                @endif
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('postthemadmin')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input class="form-control" name="adname" placeholder="Vui lòng nhập tên đăng nhập" />
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" name="adpass" placeholder="Vui lòng nhập mật khẩu" />
                        </div>
                        <div class="form-group">
                            <label>Phân công</label>
                            <select id="cars" name="adrole">
                                <option value="1">Quản lý</option>
                                <option value="2">Quản lý Sản Phẩm</option>
                                <option value="3">Quản lý Đơn Hàng</option>
                              </select>
                        </div>
                        <button type="submit" class="btn btn-info">Tạo tài khoản Admin</button>
                        
                    <form>
                    <!-- <button class="btn btn-default"><a href="{{route('danhsachadmin')}}">Quay trở lại danh sách Admin</a></button> -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
