@extends('admin.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <h2>Chỉnh Sửa Loại Sản Phẩm : {{$productType->productType_name}}</h2>
            
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
                <form action="admin/productType/edit/{{$productType->productType_id}}" method="POST" enctype="multipart/form-data"> <!--admin/brand/edit -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Tên Loại Sản Phẩm</label>
                        <input class="form-control" name="txtName" value="{{$productType->productType_name}}" placeholder="" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control ckeditor" rows="3" name="txtIntro" id="demo3"value="">{{$productType->productType_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Loại id</label>
                        <input class="form-control" name="txtParent" value="{{$productType->parent_id}}" placeholder="" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <p><img width="200px" height="200px" src="user_asset/upload/loaisanpham/{{$productType->productType_image}}"></p>
                        <input type="file" name="fImages" class="form-control"/>
                    </div>
                    <div class="form-group">    
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" 
                            @if($productType->productType_status==0)
                            {{"checked"}}
                            @endif                          
                            type="radio">Hiện
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="0" 
                            @if($productType->productType_status==1)
                            {{"checked"}}
                            @endif                          
                            type="radio">Ẩn
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection