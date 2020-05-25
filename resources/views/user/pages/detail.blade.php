@extends('user.index')
@section('content') 
    {{-- Alert comment --}}
    <section class="comment">
        <div class="container-fluid p-0 text-center">
            @if (session()->has('addtocart_success'))
                <div class="alert alert-info mb-0 text-uppercase">{{session()->get('addtocart_success')}}</div>
            @else
                
            @endif
            @if (session()->has('comment_success'))
                <div class="alert alert-info mb-0 text-uppercase">{{session()->get('comment_success')}}</div>
            @else
                
            @endif

            @if (session()->has('comment_fail'))
                <div class="alert alert-danger mb-0 text-uppercase">{{session()->get('comment_fail')}}</div>
            @else
                
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{$error}}<br>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <!-- Breadcrumb -->
    <section class="breadcrumb-item">
        <div class="container bg-white">
            <nav class="breadcrumb bg-white">
                <a class="breadcrumb-item" href="{{route('trangchuUser')}}">Trang chủ</a>
                <a class="breadcrumb-item" href="{{route('danhSachSanPham',['productType_id' => $productType->productType_id, 'order'=> request('order', 'asc')])}}">{{$productType->productType_name}}</a>
                <span class="breadcrumb-item active">{{$product->product_title}}</span>
            </nav>
        </div>
    </section>
    <!-- End Breadcrumb -->
    <!-- Image product & cart product -->
    <section class="image-cart-product">
        <div class="container bg-white pt-2 pb-5">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <ul id="light-slider" class="gallery list-unstyled cS-hidden">
                        @foreach ($slides as $slide)
                            <li data-thumb="user_asset/upload/product/{{$slide->image}}">
                                <img src="user_asset/upload/product/{{$slide->image}}" alt="" width="100%">
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="product-detail pr-3">
                        <div class="item-box">
                            <h5 class="title-brand"><a class="text-pink" href="{{ route('danhSachSanPham',['brand_id' => $brand->brand_id, 'from'
                                    => request('from', null), 'to' => request('to', null), 'productType_id'
                                     => request('productType_id', null), 'order' => request('order', 'asc')]) }}">{{$brand->brand_name}}</a></h5>
                            <h4 class="item-name">
                                {{$product->product_title}}
                            </h4>
                            <div class="product-code">Mã sản phẩm: {{$product->brand_id}}{{$product->productType_id}}{{$product->product_id}}</div>
                            <div class="product-code">Loại: <a class="text-pink" href="{{route('danhSachSanPham',['productType_id' => $productType->productType_id, 'order'=> request('order', 'asc')])}}">{{$productType->productType_name}}</a></div>
                            <div class="text-price mt-2 text-price-item-box"><strong>{{number_format($product->product_price)}}  ₫</strong></div>
                            <hr>
                            <div class="high-light">
                                {!!$product->product_highlight!!}
                            </div>
                            <hr>
                            <form action="{{route('giohang',$product->product_id)}}" method="post">
                                {{ csrf_field() }}
                                <div class="quantity">
                                    <label class="label-qty float-left">Số lượng: </label>
                                    <div class="control-qty">
                                        <button type="button" class="ml-3 btn-number qtyminus" data-type="minus" data-field="qty" disabled="disabled">-</button>
                                        <input class="input-qty ml-3" type="text" value="1" min="1" max="100" id="qty1" name="qty">
                                        <button type="button" class="ml-3 btn-number qtyplus" data-type="minus" data-field="qty">+</button>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <input type="hidden" name="id" value="{{$product->product_id}}">
                                    <input type="hidden" name="name" value="{{$product->product_title}}">
                                    <input type="hidden" name="price" value="{{$product->product_price}}">
                                    <input type="hidden" name="image" value="{{$product->product_image}}">
                                    <button type="submit" class="btn-style-add btn-addtocart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ
                                    </button>
                                </div>
                            </form>

                            <hr>
                            <div class="information-more">
                                <ul class="information policyProduct p-0">
                                    <li>
                                        <img src="user_asset/images/detail/ic_2h_ico.png" alt="" width="20px" height="20px">
                                        <span class="infoPolicy">
                                            <h5>MIỄN PHÍ GIAO HÀNG TOÀN QUỐC</h5>
                                            <span class="text-infoPolicy">(Đơn hàng trên 1,000,000 đ)</span>
                                        </span>
                                    </li>
                                    <li>
                                        <img src="user_asset/images/detail/img_policy_3.png" alt="" width="20px" height="20px">
                                        <span class="infoPolicy">
                                            <h5>ĐỔI TRẢ DỄ DÀNG & MIỄN PHÍ</h5>
                                            <span class="text-infoPolicy">(Đổi trả 07 ngày đối với hàng lỗi)</span>
                                        </span>
                                    </li>
                                    <li>
                                        <img src="user_asset/images/detail/img_policy_4.png" alt="" width="20px" height="20px">
                                        <span class="infoPolicy">
                                            <h5>CAM KẾT CHÍNH HÃNG 100%</h5>
                                            <span class="text-infoPolicy">(Đền 10 lần nếu sai cam kết)</span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Image product & cart product -->
    <!-- Describe and reviews -->
    <section class="describe-reviews">
        <div class="container mt-5 border-top pb-5 pt-2 bg-white">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#describe" class="tab-link nav-link active" data-toggle="tab">
                        <h4 class="title-describe">Thông tin chi tiết</h4>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#reviews" class="tab-link nav-link" data-toggle="tab">
                        <h4 class="title-reviews">Đánh giá</h4>
                    </a>
                </li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="describe">
                    <h3 class="text-center mb-3">{{$product->product_title}}</h3>
                    <div class="desscription-product">
                        {!!$product->product_description!!}
                    </div>
                </div>
                <div class="tab-pane fade" id="reviews">
                    <div class="row mb-5">
                        <div class="col-12 col-md-6" id="comment">
                            <h4>Gửi nhận xét của bạn</h4>
                            <div class="review-product">
                                {{-- @if ()
                                    
                                @else
                                    
                                @endif --}}
                                <form action="{{route('binhluansanpham')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="idProduct" value="{{$product->product_id}}">
                                    <div class="form-group">
                                        <div class="rate">
                                            <label class="float-left mb-0">1. Đánh giá của bạn về sản phẩm này: </label>
                                            <div class="review-star float-left ml-3">
                                                 <div class="star">
                                                    <input class="fa fa-star" id="star5" type="radio" value="5" name="star"/>
                                                    <label class="fa fa-star" for="star5"></label>
                                                    <input class="fa fa-star" id="star4" type="radio" value="4" name="star"/>
                                                    <label class="fa fa-star" for="star4"></label>
                                                    <input class="fa fa-star" id="star3" type="radio" value="3" name="star"/>
                                                    <label class="fa fa-star" for="star3"></label>
                                                    <input class="fa fa-star" id="star2" type="radio" value="2" name="star"/>
                                                    <label class="fa fa-star" for="star2"></label>
                                                    <input class="fa fa-star" id="star1" type="radio" value="1" name="star"/>
                                                    <label class="fa fa-star" for="star1"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label >2. Tiêu đề của nhận xét: </label>
                                        <input class="form-control" type="text" placeholder="Nhập tiêu đề nhận xét (không bắt buộc)" name="comment_title" id="comment_title">
                                    </div>
                                    <div class="form-group">
                                        <label >3. Viết nhận xét của bạn vào bên dưới: </label>
                                        <textarea class="form-control" cols="30" rows="10" name="comment_content" id="comment_content" type="text" placeholder="Nhận xét của bạn về sản phẩm này (bắt buộc)" required></textarea>
                                    </div>
                                    <div class="action text-center">
                                        <button type="submit" class="btn btn-primary">Gửi nhận xét</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="product-review">
                                <h5 class="title-product-review">{{$product->product_title}}</h5>
                                <div class="text-center">
                                    <img src="user_asset/upload/product/{{$product->product_image}}" alt="" width="50%">
                                </div>
                                <div class="text-support-product-review mt-3">
                                    <p>Quý khách có thắc mắc về sản phẩm hoặc dịch vụ của Vanilla? Quý khách đang muốn khiếu nại hay phản hồi về đơn hàng đã mua?</p>
                                    <ul>
                                        <li>Liên hệ hotline <a class="tel-support" href="tel:+84967275890">0967275890</a>, hoặc gửi thông tin về email <a class="email-support" href="mailto:hotrovanilla@gmail.com">hotrovanilla@gmail.com</a> để được hỗ trợ ngay.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <h4>Đánh giá của khách hàng</h4>
                            @if (count($comments) > 0)
                                @foreach ($comments as $comment)
                                    <div class="row mt-4 mb-5">
                                        <div class="col-3 text-center">
                                            <div class=" border-right"><b><i class="fa fa-user" aria-hidden="true"></i> {{$comment->user_cment}}</b></div>
                                            <div class=" border-right">{{$comment->cment_date}}</div>
                                        </div>
                                        <div class="col-8 ml-5">
                                            <div class="product-point">
                                                @if ($comment->cment_point == 0)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i> 
                                                @endif
                                                @if ($comment->cment_point == 1)
                                                    <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i> 
                                                @endif
                                                @if ($comment->cment_point == 2)
                                                    <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                                    <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i> 
                                                @endif
                                                @if ($comment->cment_point == 3)
                                                    <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                                    <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                                    <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i> 
                                                @endif
                                                @if ($comment->cment_point == 4)
                                                    <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                                    <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                                    <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                                    <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i> 
                                                @endif
                                                @if ($comment->cment_point == 5)
                                                    <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                                    <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                                    <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                                    <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                                    <i class="fa fa-star" aria-hidden="true" style="color:orange"></i> 
                                                @endif
                                                <span class="title-comment-product">
                                                    {{$comment->cment_title}}
                                                </span>
                                            </div>
                                            <div class="content-comment-product">
                                                {{$comment->cment_content}}
                                            </div>
                                            @if ($comment->reply_cment)
                                                <div class="row mt-3">
                                                    <div class="text-pink col-12"><i class="fa fa-user-o" aria-hidden="true"></i> <b>Shop Vanilla:</b></div>
                                                    <div class="reply-cment col-12  ">{{$comment->reply_cment}}</div>
                                                </div>
                                            @else
                                                
                                            @endif
                                           
                                        </div>
                                  
                                    </div>
                                    
                                    <hr style="width:80%">
                                @endforeach
                            @else
                                <div>Hiện tại chưa có bình luận nào về sản phẩm này! Hãy là người bình luận đầu tiên <i class="fa fa-arrow-up" aria-hidden="true"></i> <i class="fa fa-arrow-up" aria-hidden="true"></i> <i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Describe and reviews -->
    <!-- Same product -->
    <section class="same-product">
        <div class="container mt-5 mb-5 pt-2 pb-3 bg-white">
            <div class="title text-center">
                <h1 class="text-center title-section">Sản phẩm tương tự</h1>
            </div>
            <div class="row">
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
                    <div class="MultiCarousel-inner">
                        @foreach ($productSames as $productSame)
                            @if ($productSame->product_id !== $product->product_id)
                                <div class="item">
                                    <div class="pad15">
                                        <div class="product">
                                            <div class="card pt-2 pb-2 text-center" style="width: 100%; height: 370px">
                                                <a href="{{route('chitietsanphamUser',$productSame->product_id)}}">
                                                    <img class="card-img-top p-2" src="user_asset/upload/product/{{$productSame->product_image}}"
                                                        alt="product" data-toggle="tooltip" title="{{$productSame->product_title}}">
                                                </a>
                                                <div class="card-body p-2">
                                                    @foreach ($brands as $brand)
                                                        @if ($brand->brand_id == $productSame->brand_id)
                                                            <a class="text-brand-name text-black text-decoration-none" href="{{route('chitietsanphamUser',$productSame->product_id)}}" data-toggle="tooltip" title="{{$brand->brand_name}}">
                                                                {{$brand->brand_name}}
                                                            </a>                                                              
                                                        @else
                                                            
                                                        @endif
                                                    @endforeach                                                    
                                                    <p class="product-name mb-1 mt-1">
                                                        <a class="text-product-name text-black text-decoration-none" href="{{route('chitietsanphamUser',$productSame->product_id)}}"
                                                            data-toggle="tooltip" title="{{$productSame->product_title}}">{{$productSame->product_title}}</a>
                                                    </p>
                                                    <p class="card-text text-price">{{number_format($product->product_price)}} đ</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>       
                            @else
                                
                            @endif
                        @endforeach
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <!-- End same product -->
@endsection