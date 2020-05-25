@extends('admin.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Danh sách Sản phẩm đã xóa</h2>
                    @if (session()->get('undo_success'))
                        <div class="alert alert-info ml-3 mr-5 text-uppercase">{{session()->get('undo_success')}}</div>
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
                            @if (Session::has('qlsp'))
                                <th>Trạng thái</th>
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

                                <td>{{$product->product_price}}</td>
                                <td>{{$product->product_date}}</td>
                                <td><img src="user_asset/upload/product/{{$product->product_image}}" alt="" width="50%"></td>
                                <td>{{$product->product_quantity}}</td>
                                @if (Session::has('qlsp'))
                                    <td class="center"><i class="fa fa-undo" aria-hidden="true"></i> <a href="{{route('hoantacsanpham', $product->product_id)}}">Hoàn tác</a></td>
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