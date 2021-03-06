@extends('admin.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2>Danh sách Đơn hàng</h2>
                @if (session()->get('delete_success'))
                    <div class="alert alert-info ml-3 mr-5">{{session()->get('delete_success')}}</div>
                @else

                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center" class="text-center">
                            <th>ID</th>
                            <th>Ngày đặt hàng</th>
                            <th>Xác nhận</th>
                            <th>Giao hàng</th>
                            <th>Tổng tiền(VNĐ)</th>
                            @if (Session::has('qldh'))
                                <th>Chỉnh sửa</th>
                            @endif
                            <th>Chi tiết</th>
                            @if (Session::has('qldh'))
                                <th>Xóa</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($orders) > 0)
                            @foreach ($orders as $order)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$order->order_id}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->order_confirm == 1 ? 'Đã xác nhận' : 'Chưa xác nhận'}}</td>
                                    <td>{{$order->order_delivery == 1 ? 'Đã giao' : 'Chưa giao'}}</td>
                                    <td>{{number_format($order->order_price)}}</td>
                                    @if (Session::has('qldh'))
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('suadonhang',$order->order_id)}}">Sửa</a></td>
                                    @endif
                                    <td class="center"><i class="fa fa-info-circle" aria-hidden="true"></i> <a href="{{route('chitietdonhang',$order->order_id)}}">Xem chi tiết</a></td>
                                    @if (Session::has('qldh'))
                                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('xoadonhang',$order->order_id)}}"> Xóa</a></td>
                                    @endif
                                </tr> 
                            @endforeach
                        @else
                            
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection