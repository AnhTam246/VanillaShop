@extends('user.index')
@section('content') 
    <!-- Order detail -->
    <section class="order-detail">
        <div class="container-fluid p-0 text-center">
            @if (session()->has('discount_mark'))
                <div class="alert alert-info mb-0 text-uppercase">{{session()->get('discount_mark')}}</div>
            @else
                
            @endif
        </div>
        <div class="container bg-white pb-3 mt-5 pl-5 pr-5 mb-5">
           <div class="row">
               <div class="col-12">
                   <div class="row pt-2">
                        <div class="col-3">
                            <img src="user_asset/images/header/logo.jpg" width="100%" alt="logo" class="d-none d-md-inline-block">
                        </div>
                        <div class="col-9">
                            <p>Cửa hàng shop mỹ phẩm Vanilla</p>
                            <p>Địa chỉ: 200 Đường 3 tháng 2, Quận 10, Thành phố Hồ Chí Minh, Việt Nam</p>
                            <p>Điện thoại: 0967275890, Email: Vanillashop@gmail.com</p>
                        </div>
                   </div>
               </div>
           </div>
           <div class="row ">
               <div class="text-center m-auto">
                   <h2>Hóa đơn bán hàng</h2>
                   <div>Mã đơn hàng: {{$newOrder->order_id}}</div>
                </div>
           </div>
           <div class="row mt-5">
               <div class="col-6 user-information">
                    <p class="text-uppercase">
                        <strong>Thông tin Khách hàng: </strong>
                    </p>
                    <div>Họ tên: {{$newOrder->cust_name}}</div>
                    <div>Điện thoại: {{$newOrder->cust_tel}}</div>
                    <div>Địa chỉ: {{$newOrder->cust_add}}</div>
                    <div>Email: {{$newOrder->cust_email}}</div>
                    <div>Ghi chú:  {{$newOrder->order_note}}</div>
               </div>
               <div class="col-6 order-information">
                    <p class="text-uppercase">
                        <strong>Thông tin đơn hàng: </strong>
                    </p>
                    <div>Mã đặt hàng: {{$newOrder->order_id}}</div>
                    <div>Ngày đặt hàng: {{$newOrder->order_date}}</div>
                    <div>Trạng thái: Đặt hàng thành công</div>
                    <div>Giao hàng: Đang xử lý</div>
                </div>
           </div>

           <div class="row mt-4">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
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
                      <td>1</td>
                      <td>{{$orderDetail->product_id}}</td>
                      <td>{{$orderDetail->product_name}}</td>
                      <td>{{$orderDetail->orderDetail_quantity}}</td>
                      <td class="text-price"><strong>{{number_format($orderDetail->orderDetail_price)}} đ</strong></td>
                      <td class="text-price"><strong>{{number_format($orderDetail->orderDetail_price * $orderDetail->orderDetail_quantity)}} đ</strong></td>
                    </tr>
                  @endforeach
                  <tr>
                    <td class="text-right" colspan="5"><strong>Tổng thành tiền: </strong></td>
                    <td class="text-price">
                      <strong>
                        @if (session()->get('discount_mark'))
                          {{number_format($totalPrice * 100/95)}} đ   
                        @else
                          {{number_format($totalPrice)}} đ   
                        @endif
                      </strong>
                    </td>
                  </tr>
                    @if (session()->get('discount_mark'))
                      <tr>
                        <td class="text-right" colspan="5"><strong>Áp dụng giảm giá khi có trên 10 lần đặt hàng: </strong></td>
                        <td>Giảm 5%</td>
                      </tr>
                      <tr>
                        <td class="text-right" colspan="5"><strong>Tổng tiền phải trả: </strong></td>
                          <td class="text-price"><strong>{{number_format($totalPrice)}} đ</strong></td>
                      </tr>
                    @else

                    @endif
                </tbody>
              </table>
           </div>

           <div class="row mt-3">
               <div class="alert alert-danger m-auto">
                    <h5 class="text-center">VanillaShop chân thành cảm ơn quý khách đã đặt hàng!</h5>
                    <h5 class="text-center">Shop sẽ tiến hành liên lạc với quý khách trước khi giao hàng!</h5>
               </div>
           </div>
           <div class="row mt-5">
                <div>
                    <a href="{{route('trangchuUser')}}">Click vào đây để quay trở về trang chủ của cửa hàng</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Order detail -->
@endsection