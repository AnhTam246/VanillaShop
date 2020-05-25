@extends('admin.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid" style="padding-bottom:50px">
            <form action="{{route('capnhatdonhang', $order->order_id)}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <h2>Sửa Đơn hàng</h2>
                    @if (session()->get('update_success'))
                        <div class="alert alert-info ml-3 mr-5">{{session()->get('update_success')}}</div>
                    @else
                        
                    @endif
                    <div class="col-lg-10" style="padding-bottom:10px">
                        <div class="form-group">
                            <label>Mã đơn hàng</label>
                            <input class="form-control" id="id" name="id" placeholder="" value="{{$order->order_id}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Ngày đặt hàng</label>
                            <input class="form-control" name="date" placeholder="" value="{{$order->order_date}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Xác nhận</label>
                            <select name="confirm" id="confirm">
                                @if ($order->order_confirm == 1)
                                    <option value="1">Đã xác nhận</option>
                                    <option value="0">Chưa xác nhận</option>
                                @else
                                    <option value="0">Chưa xác nhận</option>
                                    <option value="1">Đã xác nhận</option>
                                @endif                        
                            </select>
                            <label style="margin-left: 50px">Giao hàng</label>
                            <select name="delivery" id="delivery">
                                @if ($order->order_delivery == 1)
                                    <option value="1">Đã giao hàng</option>
                                    <option value="0">Chưa giao hàng</option>
                                @else
                                    <option value="0">Chưa giao hàng</option>
                                    <option value="1">Đã giao hàng</option>
                                @endif                                   
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên khách hàng đặt hàng</label>
                            <input class="form-control" name="cust_name" placeholder="" value="{{$order->cust_name}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại khách hàng</label>
                            <input class="form-control" name="cust_tel" placeholder="" value="{{$order->cust_tel}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ khách hàng</label>
                            <input class="form-control" name="cust_add" placeholder="" value="{{$order->cust_add}}" readonly/>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row pb-5">
                    <h4>Thông tin đơn hàng</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá bán (VNĐ/1)</th>
                            <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetails as $orderDetail)
                            <tr>
                                <td class="text-center">{{$orderDetail->product_id}}</td>
                                <td>{{$orderDetail->product_name}}</td>
                                <td>{{$orderDetail->orderDetail_quantity}}</td>
                                <td class="text-price"><strong>{{number_format($orderDetail->orderDetail_price)}} đ</strong></td>
                                <td class="text-price"><strong>{{number_format($orderDetail->orderDetail_price * $orderDetail->orderDetail_quantity)}} đ</strong></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-right" colspan="4"><strong>Tổng tiền: </strong></td>
                                <td class="text-price"><strong style="color:red">{{number_format($order->order_price)}} đ</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-default" type="submit">Cập nhật đơn hàng</button>
                <a class="btn btn-default" href="{{route('danhsachdonhang')}}">Quay lại danh sách đơn hàng</a>
            <form>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection