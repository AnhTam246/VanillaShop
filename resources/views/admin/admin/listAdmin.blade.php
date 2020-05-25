@extends('admin.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2>Danh sách Admin</h2>
                @if(session()->has('delete_admin_success'))
                    {{session()->get('delete_admin_success')}}
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>Admin ID</th>
                            <th>Tên đăng nhập</th>
                            <th>Phân công</th>
                            <th>Xóa</th>
                            <th>Xem/Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            @if($admin->role !== 4)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$admin->user_id}}</td>
                                    <td>{{$admin->username}}</td>
                                    <td>
                                        @if($admin->role == 1)
                                            Quản lý
                                        @endif
                                        @if($admin->role == 2)
                                            Quản lý sản phẩm 
                                        @endif
                                        @if($admin->role == 3)
                                            Quản lý đơn hàng
                                        @endif
                                    </td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('xoaadmin', $admin->user_id)}}"> Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('suaadmin',$admin->user_id)}}">Xem/Sửa</a></td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
            <div class="row">
            <a href="{{route('themadmin')}}"><button class="btn btn-warning">Thêm Admin</button></a>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection