@extends('admin.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <h2>Danh sách Loại Sản Phẩm</h2>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên Loại Sản Phẩm</th>
                        <th style="text-align: center;">Mô tả</th>
                        <th>Hình ảnh</th>
                        <th>Trạng thái</th>
                        <th>Loại id</th>
                        <th>Xóa</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productType as $pt)
                    <tr class="odd gradeX" align="center">
                        <td>{{$pt->productType_id}}</td>
                        <td>{{$pt->productType_name}}</td>
                        <td>{!!$pt->productType_description!!}</td>
                        <td>
                            <p><img width="100px" height="100px" src="user_asset/upload/loaisanpham/{{$pt->productType_image}}" alt="" /></p>
                            {{$pt->productType_image}}
                        </td>
                        <td>
                            @if($pt->productType_status == 1)
                                Hiện
                            @else
                                Ẩn
                            @endif    
                        </td>
                        <td>{{$pt->parent_id}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/productType/delete/{{$pt->productType_id}}"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/productType/edit/{{$pt->productType_id}}">Sửa</a></td>
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