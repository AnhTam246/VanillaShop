@extends('admin.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2>Chi tiết Sản phẩm</h2>
                <div class="col-lg-10" style="padding-bottom:120px">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="txtName" placeholder="" value="{{$product->product_title}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Hiệu</label>
                            <input class="form-control" name="txtName" placeholder="" value="{{$brand->brand_name}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Loại</label>
                            <input class="form-control" name="txtName" placeholder="" value="{{$productType->productType_name}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Giá (VNĐ)</label>
                            <input class="form-control" name="txtName" placeholder="" value="{{$product->product_price}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Nổi bật</label>
                            <textarea class="form-control ckeditor" rows="5" name="txtIntro" disabled>{!!$product->product_highlight!!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control ckeditor" rows="15" name="txtIntro" disabled>{!!$product->product_description!!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Ngày bán</label>
                            <input class="form-control" name="txtName" placeholder="" value="{{$product->product_date}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <div><img src="user_asset/upload/product/{{$product->product_image}}" alt="" width="20%"></div>
                        </div>
                        <div class="form-group">
                                <label>Hình ảnh slide</label>
                                <div>
                                    @foreach ($slides as $slide)
                                        <span class="border-dark"><img src="user_asset/upload/product/{{$slide->image}}" alt="" width="18%"></span>
                                    @endforeach
                                </div>
                            </div>
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input class="form-control" name="txtName" placeholder="" value="{{$product->product_quantity}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            @if ($product->product_status == 1)
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="" type="radio" disabled>Hiện
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" type="radio" disabled>Ẩn
                                </label>
                            @else
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1"  type="radio" disabled>Hiện
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" checked="" type="radio" disabled>Ẩn
                                </label>
                            @endif             
                        </div>
                         <a class="btn btn-default" href="{{route('danhsachsanpham')}}">Quay lại danh sách sản phẩm</a>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection