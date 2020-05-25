@extends('user.index')
@section('content') 
    <!-- Breadcrumb -->
    <section class="breadcrumb-item">
        <div class="container bg-white">
            <nav class="breadcrumb bg-white">
                <a class="breadcrumb-item" href="{{route('trangchuUser')}}">Trang chủ</a>
                <a class="breadcrumb-item" href="{{route('giohang')}}">Giỏ hàng</a>
                <span class="breadcrumb-item active">Thanh toán</span>
            </nav>
        </div>
    </section>
    @if (session()->has('quantity_not_enough'))
        <div class="container p-0">
            <div class="alert alert-danger mb-0 text-uppercase text-center">{{session()->get('quantity_not_enough')}}</div>
        </div>
    @else
        
    @endif
    <!-- End Breadcrumb -->
    <!-- Form information & cart -->
    <section class="form-information-cart">
        <div class="container bg-white pt-2 pb-3">
            <div class="order">
                <div class="row">
                    <div class="col-12 col-lg-5 col-md-push-7">
                        <div class="cart-info">
                            <h2 class="title">Giỏ hàng</h2>
                            <ul class="list-unstyled">
                                @foreach (Cart::content() as $item)
                                    <li>
                                        <span class="image">
                                            <span class="cart-list-product-image" href="#">
                                                <img src="user_asset/upload/product/{{$item->options->image}}" width="100%" alt="">
                                            </span>
                                        </span>
                                        <div class="list-content">
                                            <h5><span href="#">{{$item->name}}</span></h5>
                                            <div class="quantity">
                                                {{$item->qty}} x <span class="amount"><span class="money text-pink">{{number_format($item->price)}} ₫</span></span> 
                                                <div class="pull-right text-pink">{{number_format($item->price * $item->qty)}} ₫</div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="load-lead">
                                <p class="list-info-price mb-2">
                                    <small>Tạm tính: </small>
                                    <span class="pull-right text-pink">{{Cart::priceTotal(0,'',',')}} ₫</span>
                                </p>
                            </div>
                            <div class="load-ship">
                                <p class="list-info-price mb-2">
                                    <small>Phí vận chuyển: </small>
                                    <span class="pull-right text-pink">Chưa xác định!</span>
                                </p>
                            </div>
                            <div class="subtotal">
                                Thành tiền: <span class="pull-right"><strong class="money-total text-pink">{{Cart::priceTotal(0,'',',')}} ₫</strong></span>
                            </div>
                            <div class="pttt">
                                <span>* Phương thức thanh toán: Nhận hàng & thanh toán tiền mặt tại nhà</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 col-md-pull-5">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{$error}}<br>
                                @endforeach
                            </div>
                        @endif
                        <form method="POST" class="form-horizontal" action="{{route('chitietdathang')}}">                           
                            {{ csrf_field() }}
                            <h2 class="title">Địa chỉ nhận hàng</h2>
                            @if (Session::get('logined'))
                                <div class="alert-warning mb-3">
                                    Thông tin của quý khách đã tự động điền vào các trường, chỉnh sửa nếu có thay đổi!
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label control-label">Email</label>
                                    <div class="col-12 col-md-9">
                                        <input type="email" id="email-order" name="email" class="form-control" placeholder="Email" value="{{$custOrder->cust_email}}">
                                        <div class="invalid-feedback">Email không hợp lệ!</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label control-label">Họ và tên</label>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control" id="name-order" name="name" placeholder="Họ và tên" value="{{$custOrder->cust_name}}">
                                        <div class="invalid-feedback">Tên không được để rỗng!</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label control-label">Số điện thoại</label>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control" id="phone" name="phone" minlength="10" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Số điện thoại" value="{{$custOrder->cust_tel}}">
                                        <div class="invalid-feedback">Vui lòng nhập kí tự số và có 10 số trở lên !</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label control-label">Địa chỉ</label>
                                    <div class="col-12 col-md-9">
                                        <textarea class="form-control" name="address" id="address" cols="50" rows="2" placeholder="Phường/xã, số nhà, đường...">{{$custOrder->cust_add}}</textarea>
                                        <div class="invalid-feedback">Địa chỉ không được rỗng !</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label control-label">Ghi chú</label>
                                    <div class="col-12 col-md-9">
                                        <textarea class="form-control" name="note" id="note" cols="50" rows="2" placeholder="Ghi chú (Nhập nếu có)"></textarea>
                                    </div>
                                </div>
                            @else
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label control-label">Email</label>
                                    <div class="col-12 col-md-9">
                                        <input type="email" id="email-order" name="email" class="form-control" placeholder="Email">
                                        <div class="invalid-feedback">Email không hợp lệ!</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label control-label">Họ và tên</label>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control" id="name-order" name="name" placeholder="Họ và tên">
                                        <div class="invalid-feedback">Tên không được để rỗng!</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label control-label">Số điện thoại</label>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control" id="phone" name="phone" minlength="10" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Số điện thoại">
                                        <div class="invalid-feedback">Vui lòng nhập kí tự số và có 10 số trở lên !</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label control-label">Tỉnh/Thành phố</label>
                                    <div class="col-12 col-md-9">
                                        <select id="region" name="region" class="form-control">    
                                            <option value="Chọn Tỉnh/Thành phố">Chọn Tỉnh/Thành phố</option>
                                        </select>
                                        <div class="invalid-feedback">Vui lòng chọn Tỉnh/ Thành Phố !</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label control-label">Quận/Huyện</label>
                                    <div class="col-12 col-md-9">
                                        <select required id="district" name="distric" class="form-control">
                                            <option id="qh">Chọn Quận/Huyện</option>
                                        </select>
                                        <div class="invalid-feedback">Vui lòng chọn Quận/Huyện !</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label control-label">Địa chỉ</label>
                                    <div class="col-12 col-md-9">
                                        <textarea class="form-control" name="address" id="address" cols="50" rows="2" placeholder="Phường/xã, số nhà, đường..."></textarea>
                                        <div class="invalid-feedback">Địa chỉ không được rỗng !</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-3 col-form-label control-label">Ghi chú</label>
                                    <div class="col-12 col-md-9">
                                        <textarea class="form-control" name="note" id="note" cols="50" rows="2" placeholder="Ghi chú (Nhập nếu có)"></textarea>
                                    </div>
                                </div>
                            @endif   
                            <div class="row">
                                <div class="col-6">
                                    <a class="btn btn-secondary btn-back" href="{{route('giohang')}}" ><i class="fa fa-angle-left mr-2" aria-hidden="true"></i> Quay lại giỏ hàng</a>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="submit" id="btn-submit-information" class="btn btn-danger btn-dh">Xác nhận đặt hàng</button>
                                </div>
                            </div>
                        </form>   
                    </div>    
                </div>
            </div>
        </div>
    </section>
    <!-- End form information -->
@endsection