@extends('user.index')
@section('content') 
    <section class="breadcrumb-item">
        <div class="container bg-white">
            <nav class="breadcrumb bg-white">
                <a class="breadcrumb-item" href="{{route('trangchuUser')}}">Trang chủ</a>
                <span class="breadcrumb-item active">Giỏ hàng</span>
            </nav>
        </div>
    </section>
    <!-- End Breadcrumb -->
    <section class="container p-0">
        <div class="container-fluid p-0 text-center">
            @if (session()->has('delete_success'))
                <div class="alert alert-info mb-0 text-uppercase">{{session()->get('delete_success')}}</div>
            @else
                
            @endif
        </div>
    </section>
    <!-- Cart -->
    @if (Cart::count() > 0)
        <section class="cart">
            <div class="container bg-white pt-2 mb-5">
                <div class="vanilla-cart">
                    <div class="wrap">
                        <div class="row">
                            <div class="col-md-12 cart-col-1">
                                <div class="row title">
                                    <div class="col-6">
                                        <span class="cart-index font-weight-bold">
                                            Giỏ hàng <span>({{Cart::count()}} sản phẩm)</span>
                                        </span>
                                    </div>
                                    <div class="col-md-2 d-none d-md-block">
                                        <h6>Giá (VNĐ)</h6>
                                    </div>
                                    <div class="col-md-2 d-none d-md-block">
                                        <h6>Số lượng</h6>
                                    </div>
                                    <div class="col-md-2 d-none d-md-block">
                                        <h6>Thành tiền</h6>
                                    </div>
                                </div>
                                <!-- Product in cart -->
                                @foreach (Cart::content() as $item)
                                    <div class="row shopping-cart-item m-0 pt-3 pb-2">
                                        <div class="col-lg-2 col-md-2 col-3 img-thumnail-custom">
                                            <p class="image">
                                                <a href="{{route('chitietsanphamUser',$item->id)}}" title="{{$item->name}}">
                                                    <img class="img-product-cart" src="user_asset/upload/product/{{$item->options->image}}"
                                                        alt="{{$item->name}}" width="100%">
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-9">
                                            <p class="name">
                                                <a href="{{route('chitietsanphamUser',$item->id)}}" title="{{$item->name}}">{{$item->name}}</a>
                                            </p>
                                            <div class="policyProduct">
                                                <img src="user_asset/images/detail/ic_2h_ico.png" alt="" width="20px" height="20px">
                                                <img src="user_asset/images/detail/img_policy_3.png" alt="" width="20px" height="20px">
                                                <img src="user_asset/images/detail/img_policy_4.png" alt="" width="20px" height="20px">
                                            </div>
                                            <p class="action">
                                                <form action="{{route('deleteItem',$item->rowId)}}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-link btn-item-delete" title="xóa sản phẩm">Xóa</button>
                                                </form>
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <p class="price text-pink"><input class="price price-number text-pink" type="text" value="{{number_format($item->price)}} ₫" readonly></p>
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="quantity">
                                                        <div class="control-qty">
                                                            <form action="{{route('giamsoluong')}}" method="POST">
                                                                {{ csrf_field() }}
                                                                <button type="submit" class="btn-number" data-type="minus" data-field="qty1" name="qtyminus">-</button>
                                                                <input type="hidden" name="qty" value="{{$item->qty}}">
                                                                <input type="hidden" name="id" value="{{$item->rowId}}">
                                                            </form>
                                                            <input class="input-qty ml-2 text-center" readonly type="text" value="{{$item->qty}}" min="1" max="100" name="qty1">
                                                            <form action="{{route('tangsoluong')}}" method="POST">
                                                                {{ csrf_field() }}
                                                                <button type="submit" class="ml-2 btn-number" data-type="minus" data-field="qty1" name="qtyplus">+</button>
                                                                <input type="hidden" name="qty" value="{{$item->qty}}">
                                                                <input type="hidden" name="id" value="{{$item->rowId}}">
                                                            </form>                                              
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <p class="price text-pink"><input class="price price-number text-pink" type="text" value="{{number_format($item->price * $item->qty)}} ₫" readonly></p>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row total-price pt-3 m-0">
                                    <div class="col-6 col-md-7 col-lg-8">
                                        <div><a href="{{route('xoagiohang')}}">Xóa tất cả sản phẩm trong giỏ</a></div>
                                    </div>
                                    <div class="col-12 col-md-5 col-lg-4">
                                        <p class="text-total">
                                            <span class="text-right">Tổng cộng: </span>
                                            <span class="total">
                                                <input class="total-number-price ml-2 text-left" type="text" value="{{Cart::priceTotal(0,'',',')}} ₫" id="qty1" name="qty1" readonly> 
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="clearfix m-3">
                                    <a class="btn-cart buy-more-product mt-2 mt-md-0" href="{{route('danhSachSanPham')}}">Chọn thêm sản phẩm</a>
                                    <a class="btn-cart pay mt-2" href="{{route('thanhtoan')}}">Tiến hành đặt hàng</a>
                                </div>
                                <!-- End Product in cart -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="cart">
            <div class="container bg-white pt-2 mb-5">
                <div class="vanilla-cart">
                    <div class="wrap">
                        <div class="row">
                            <div class="col-md-12 cart-col-1">
                                <div class="row title">
                                    <div class="col-6">
                                        <span class="cart-index font-weight-bold">
                                            Giỏ hàng trống <span>(0 sản phẩm)</span>
                                        </span>
                                    </div>
                                    <div class="col-md-2 d-none d-md-block">
                                        <h6>Giá (VNĐ)</h6>
                                    </div>
                                    <div class="col-md-2 d-none d-md-block">
                                        <h6>Số lượng</h6>
                                    </div>
                                    <div class="col-md-2 d-none d-md-block">
                                        <h6>Thành tiền</h6>
                                    </div>
                                </div>
                                <!-- Product in cart -->

                                <div class="clearfix m-3">
                                    <a class="btn-cart buy-more-product mt-2 mt-md-0" href="{{route('danhSachSanPham')}}">Quay lại danh sách sản phẩm</a>
                                </div>
                                <!-- End Product in cart -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- End cart -->
@endsection