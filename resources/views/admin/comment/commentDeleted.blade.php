@extends('admin.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Danh sách Bình luận</h2>
                    @if (session()->get('undo_success'))
                        <div class="alert alert-info ml-3 mr-5 text-uppercase">{{session()->get('undo_success')}}</div>
                    @else

                    @endif
                    @if (session()->get('permanently_delete_success'))
                        <div class="alert alert-info ml-3 mr-5 text-uppercase">{{session()->get('permanently_delete_success')}}</div>
                    @else

                    @endif
                </div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center" class="text-center">
                            <th>ID</th>
                            <th>Tiêu đề bình luận</th>
                            <th>Sản phẩm bình luận</th>
                            <th>Tài khoản bình luận</th>
                            <th>Điểm đánh giá</th>
                            <th>Ngày bình luận</th>
                            <th>Nội dung</th>
                            <th>Nội dung trả lời</th>
                            <th>Hoàn tác</th>
                            <th>Xóa vĩnh viễn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr class="odd gradeX" align="center">
                                <td>{{$comment->cment_id}}</td>
                                <td>{{$comment->cment_title}}</td>
                                <td>{{$comment->product_cment}}</td>
                                <td>{{$comment->user_cment}}</td>
                                <td>{{$comment->cment_point == 0 ? 0 : $comment->cment_point}}</td>
                                <td>{{$comment->cment_date}}</td>
                                <td>{{$comment->cment_content}}</td>
                                <td>{{$comment->reply_cment}}</td>
                                <td class="center"><i class="fa fa-undo" aria-hidden="true"></i> <a href="{{route('hoantacbinhluan', $comment->cment_id)}}">Hoàn tác</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('xoavinhvienbinhluan',$comment->cment_id)}}"> Xóa vĩnh viễn</a></td>
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