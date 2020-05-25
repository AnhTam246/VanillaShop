@extends('admin.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Danh sách Sản phẩm</h2>
                    @if (session()->get('delete_success'))
                        <div class="alert alert-info ml-3 mr-5">{{session()->get('delete_success')}}</div>
                    @else

                    @endif
                </div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Hiệu</th>
                            <th>Loại</th>
                            <th>Giá (VNĐ)</th>
                            <th>Ngày bán</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>   
                            <th>Chi tiết</th>
                            @if (Session::has('qlsp'))
                                <th>Chỉnh sửa</th>
                                <th>Xóa</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="odd gradeX" align="center">
                                <td>{{$product->product_id}}</td>
                                <td>{{$product->product_title}}</td>

                                @foreach ($brands as $brand)
                                    @if ($product->brand_id == $brand->brand_id)
                                        <td>{{$brand->brand_name}}</td>
                                    @endif
                                @endforeach
                                
                                @foreach ($productTypes as $productType)
                                    @if ($product->productType_id == $productType->productType_id)
                                        <td>{{$productType->productType_name}}</td>
                                    @endif
                                @endforeach

                                <td>{{number_format($product->product_price)}}</td>
                                <td>{{$product->product_date}}</td>
                                @if (Session::has('qlsp'))
                                    <td><img src="user_asset/upload/product/{{$product->product_image}}" alt="" width="100%"></td>
                                @else
                                    <td><img src="user_asset/upload/product/{{$product->product_image}}" alt="" width="50%"></td>
                                @endif
                                    <td>{{$product->product_quantity}}</td>
                                <td class="center"><i class="fa fa-info-circle" aria-hidden="true"></i> <a href="{{route('chitietsanpham',$product->product_id)}}">Xem chi tiết</a></td>
                                @if (Session::has('qlsp'))
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$product->product_id}}">Sửa</a></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('xoasanpham',$product->product_id)}}"> Xóa</a></td>
                                @endif
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