@extends('admin.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2>Sửa Admin</h2>
                @if(session()->has('edit_admin_success'))
                    {{session()->get('edit_admin_success')}}
                @endif
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('postsuaadmin',$p->user_id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input class="form-control" name="adname" value="{{ $p->username }}" />
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <input type="password" class="form-control" name="adpass" value="" />
                        </div>
                        <div class="form-group">
                            <label>Phân công</label>
                            <select id="role" name="adrole">
                                <option value="1">Quản lý</option>
                                <option value="2">Quản lý Sản Phẩm</option>
                                <option value="3">Quản lý Đơn Hàng</option>
                              </select>
                        </div>
                        <button type="submit" class="btn btn-default">Lưu</button>
                        <!-- <a href="{{route('danhsachadmin')}}"><button class="btn btn-default">Quay trở lại danh sách Admin</button></a> -->
                    <form>
                </div>
            </div>

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection