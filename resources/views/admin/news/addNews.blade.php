@extends('admin.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2>Thêm Bản tin</h2>
                @if(session()->has('create_news_success'))
                    {{session()->get('create_news_success')}}
                @endif
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('postthembantin')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="n_title" placeholder="Vui lòng nhập tiêu đề bài viết" />
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea class="form-control ckeditor" rows="3" name="n_intro"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control ckeditor" rows="10" name="n_content"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="n_image">
                        </div>
                        <button type="submit" class="btn btn-info">Thêm bản tin</button>
                        <button class="btn btn-default"><a href="{{route('danhsachbantin')}}"> Quay trở lại danh sách tin tức</a></button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection