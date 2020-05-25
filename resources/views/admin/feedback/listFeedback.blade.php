@extends('admin.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2>Danh sách Phản hồi</h2>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Chủ Đề</th>
                            <th>Ngày Tháng</th>    
                            <th>Nội Dung </th>                            
                            <th>Email Khách Hàng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($feedback as $feed)
                        <tr class="odd gradeX" align="center">
                        <td>{{$feed->fb_id}}</td>
                            <td>{{$feed->fb_title}}</td>
                            <td>{{$feed->fb_date}}</td>
                            <td>{{$feed->fb_content}}</td>                                                                                              
                            <td class="center">
                                @foreach ($custFbs as $cust)
                                    @if($feed->cust_id == $cust->cust_id)

                                        {{$cust->cust_email}}
                                    @endif
                                @endforeach
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('xoafeedback', $feed->fb_id)}}">Xóa</a></td>
                        </tr>
                       @endforeach
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection