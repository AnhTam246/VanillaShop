@extends('admin.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2>Sửa Bản tin</h2>
                @if(session()->has('edit_news_success'))
                    {{session()->get('edit_news_success')}}
                @endif
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('suabantin',$newss->n_id)}}" method="POST"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <!-- <div class="form-group">
                            <label>Chuyên Mục</label>
                            <select id="cat" name="n_topic">
                                <option value="1">Trị Mụn</option>
                                <option value="2">Dưỡng Ẩm</option>
                                <option value="3">Da sạch</option>
                                <option value="4">Make Up</option>
                                <option value="5">SALE</option>
                                <option value="6">Khác..</option>
                              </select>
                        </div> -->
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="n_title" value="{{$newss->n_title}}"/>
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea class="form-control ckeditor" rows="3" name="n_intro">{{$newss->n_intro}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control ckeditor" rows="10" name="n_content">{{$newss->n_content}}</textarea>
                           
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <td><img width="200px" height="200px" src="user_asset/images/news/{{$newss->n_image}}" alt="" width="100%"></td>
                            <input type="file" name="n_image">
                        </div>
                        <button type="submit" class="btn btn-danger">Lưu</button>
                        <button class="btn btn-default"><a href="{{route('danhsachbantin')}}"> Quay trở lại danh sách tin tức</a></button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection