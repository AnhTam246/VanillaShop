@extends('admin.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <h2>Chỉnh Sửa Sản phẩm</h2>
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) >0 )
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
                @endif

                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <form action="admin/product/edit/{{$product->product_id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="txtTieuDe" value="{{$product->product_title}}" placeholder="" />
                    </div>
                    <div class="form-group">
                        <label>Hiệu</label>
                        <input class="form-control" name="txtHieu" value="{{$product->brand_id}}" placeholder="" />
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <input class="form-control" name="txtTheLoai" value="{{$product->productType_id}}" placeholder="" />
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" name="txtGia" value="{{$product->product_price}}" placeholder="" />
                    </div>
                    <div class="form-group">
                        <label>Nổi bật</label>
                        <textarea class="form-control ckeditor" rows="5" id="demo" name="txtNoiBat">{{$product->product_highlight}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control ckeditor" rows="15" name="txtIntro" id="demo">{{$product->product_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <p><img width="200px" height="200px" src="user_asset/upload/product/{{$product->product_image}}"></p>
                        <input type="file" name="fImages">
                    </div>
                    <div class="form-group">
                        <label for="files">Chọn Slide (Nhấn Ctrl để chọn nhiều file):</label>
                        <input type="file" id="files" name="fImages1" multiple><br><br>
                    </div>

                    <div class="form-group">
                        <label>Số lượng</label>
                        <input class="form-control" name="SoLuong" value="{{$product->product_quantity}}" placeholder="" />
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" @if($product->product_status==1)
                            {{"checked"}}
                            @endif
                            type="radio">Hiện
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="0" @if($product->product_status==0)
                            {{"checked"}}
                            @endif
                            type="radio">Ẩn
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection