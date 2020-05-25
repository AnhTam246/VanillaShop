@extends('admin.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2>Danh sách Bản tin</h2>
                @if(session()->has('delete_news_success'))
                    {{session()->get('delete_news_success')}}
                @endif
                
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>Mã bài viết</th>
                            <th>Ngày đăng</th>
                            <th>Tiêu Đề</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($newss as $news)
                            <tr class="odd gradeX" align="center">
                                <td>{{$news->n_id}}</td>
                                <td>{{$news->n_date}}</td>
                                <td>{{$news->n_title}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('xoabantin', $news->n_id)}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('suabantin',$news->n_id)}}">Sửa bài</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
            <a href="{{route('thembantin')}}"><button class="btn btn-warning">Thêm bản tin</button></a>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection