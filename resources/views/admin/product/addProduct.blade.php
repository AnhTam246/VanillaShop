@extends('admin.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <h2>Thêm Sản phẩm</h2>
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
                <form action="{{route('themsanpham')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"  />
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="txtTieuDe" placeholder="Nhập tiêu đề" />
                    </div>
                    <div class="form-group">
                        <label>Hiệu</label>
                        <input class="form-control" name="txtHieu" placeholder="Nhập thương hiệu" />
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <input class="form-control" name="txtTheLoai" placeholder="Nhập thể loại" />
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" name="txtGia" placeholder="Nhập giá" />
                    </div>
                    <div class="form-group">
                        <label>Nổi bật</label>
                        <textarea class="form-control ckeditor" rows="5" name="txtNoiBat"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control ckeditor" rows="15" name="txtIntro" id="demo"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="fImages">
                    </div>
                    <div class="form-group">
                        <label for="files">Chọn Slide (Nhấn Ctrl để chọn nhiều file):</label>
                        <input type="file" id="files" name="fImages1" multiple><br><br>
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input class="form-control" name="SoLuong" placeholder="" />
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" checked="" type="radio">Hiện
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="0" type="radio">Ẩn
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection