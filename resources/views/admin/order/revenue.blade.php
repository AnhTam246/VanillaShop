@extends('admin.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2>Doanh thu</h2>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center" class="text-center">
                            <th>ID</th>
                            <th>Ngày Tháng</th>
                            <th>Số tiền</th>               
                            <th>Tích để tính doanh thu</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        @foreach ($orders as $order)
                            <tr class="odd gradeX" align="center">
                                <td>{{$order->order_id}}</td>
                                <td>{{$order->order_date}}</td>
                                <td class="orderPrice">{{number_format($order->order_price)}}</td>
                                <td class="center"><input class="orderRevenue" type="checkbox" name="orderRevenue" id="orderRevenue" value="{{$order->order_price}}"> Cộng vào doanh thu</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div><h4><strong>Doanh thu:</strong> <span id="totalPriceOrderRevenue" style="color:red">0</span> <span style="color:red"> VNĐ</span></h4></div>
            <div><input type="checkbox" name="totalOrderRevenue" id="totalOrderRevenue"> Cộng những mục trên vào doanh thu</a></div>
            <div style="margin-top: 40px"><h4><strong>Tổng doanh thu của tất cả đơn hàng:</strong> <span id="totalPriceOrderRevenue" style="color:red">{{number_format($totalPrice)}}</span> <span style="color:red"> VNĐ</span></h4></div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection