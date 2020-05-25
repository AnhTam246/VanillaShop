@extends('admin.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <h2>Danh sách Nhà cung cấp</h2>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên NCC</th>
                        <th>Email NCC</th>
                        <th style="text-align: center;">Mô tả</th>
                        <th>Logo</th>
                        <th>Trạng thái</th>
                        <th>Xóa</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brand as $br)
                    <tr class="odd gradeX" align="center">
                        <td>{{$br->brand_id}}</td>
                        <td>{{$br->brand_name}}</td>
                        <td>{{$br->brand_email}}</td>
                        <td>{!!$br->brand_description!!}</td>
                        <td>
                            <p><img width="100px" height="100px" src="user_asset/upload/nhacc/{{$br->brand_logo}}" alt="" /></p>
                            {{$br->brand_logo}}
                        </td>
                        <td>
                            @if($br->brand_status == 1)
                                Hiện
                            @else
                                Ẩn
                            @endif    
                        </td>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/brand/delete/{{$br->brand_id}}"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/brand/edit/{{$br->brand_id}}">Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection