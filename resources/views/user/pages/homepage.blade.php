@extends('user.index')
@section('content')
    <section class="login-success">
        <div class="container-fluid p-0 text-center">
            @if (session()->has('login_success1'))
                <div class="alert alert-info mb-0 text-uppercase">{{session()->get('login_success1')}}</div>
            @else
                
            @endif
        </div>
    </section>
    <!-- Banner -->
    <section class="banner">
        <div class="container-fluid p-0">
            <div class="banner-slide-show">
                <img src="user_asset/images/homepage/banner.png" alt="" width="100%">
            </div>
        </div>
    </section>

    <!-- End banner -->

    <!-- BRAND -->
    <section class="brand">
            <div class="container mt-5 pt-2 pb-3 bg-white">
                <div class="title text-center">
                    <h1 class="title-section text-pink">Các thương hiệu uy tín từ Mỹ</h1>
                </div>
                <div class="row p-1">
                <div class="col-md text-center">
                        <a href="user/danh-sach-san-pham?brand_id=3"><img src="user_asset/images/homepage/brand/neutro.png" width="300px" alt=""></a>
                        <a href="user/danh-sach-san-pham?brand_id=1"><img src="user_asset/images/homepage/brand/lush.png" width="300px" alt=""></a>
                        <a href="user/danh-sach-san-pham?brand_id=2"><img src="user_asset/images/homepage/brand/glam.png" width="300px" alt=""></a>
                        <a href="user/danh-sach-san-pham?brand_id=4"><img src="user_asset/images/homepage/brand/courlorpop.png" width="300px" alt=""></a>
                        <a href="user/danh-sach-san-pham?brand_id=5"><img src="user_asset/images/homepage/brand/maybeline.png" width="300px" alt=""></a>
                        <a href="user/danh-sach-san-pham?brand_id=6"><img src="user_asset/images/homepage/brand/nyx.png" width="300px" alt=""></a>
                
                </div>
            </div>
        </section>
        <!-- ENDBRAND -->
    <!-- PRODUCT TYPE -->
    <section class="productall">
        <div class="bg-productall">
            <div class="container pt-2 pb-3">
                <h1 class="title-section text-center">Các loại sản phẩm theo nhu cầu tại Vanilla </span></h1>
                <div class="row">
                   <div class="col-md-6"><img src="user_asset/images/homepage/skincare.jpg" width="100%" alt=""></div>
                   <div class="col-md-6">
                        <h2 class="text-center " >DƯỠNG DA</h2>
                        <a href="user/danh-sach-san-pham?productType_id=101"><button class="btn btn mt-3 ml-2">Sửa rửa mặt</button></a>
                        <a href="user/danh-sach-san-pham?productType_id=105"><button class="btn btn mt-3 ml-2">Toner</button></a>
                        <a href="user/danh-sach-san-pham?productType_id=106"><button class="btn btn mt-3 ml-2">Mặt Nạ</button></a>
                        <a href="user/danh-sach-san-pham?productType_id=103"><button class="btn btn mt-3 ml-2">Kem dưỡng da</button></a>
                        <a href="user/danh-sach-san-pham?productType_id=104"><button class="btn btn mt-3 ml-2">Serum</button></a>
                        <a href="user/danh-sach-san-pham?productType_id=102"><button class="btn btn mt-3 ml-2">Xịt khoáng</button></a>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6">
                        <h2 class="text-center mt-5">CHĂM SÓC TOÀN THÂN</h2>
                        <a href="user/danh-sach-san-pham?productType_id=201"><button class="btn btn mt-3 ml-2 ">Kem dưỡng da toàn thân</button></a>
                        <a href="user/danh-sach-san-pham?productType_id=203"><button class="btn btn mt-3 ml-2 ">Sữa Tắm</button></a>
                        <a href="user/danh-sach-san-pham?productType_id=202"><button class="btn btn mt-3 ml-2">Dầu gội và dầu xả</button></a>
                   </div>
                   <div class="col-md-6"><img src="user_asset/images/homepage/bodycare.jpg" width="100%" alt=""></div>
                </div>
                <div class="row">
                   <div class="col-md-6"><img src="user_asset/images/homepage/makeup.jpg" width="100%" alt=""></div>
                   <div class="col-md-6">
                        <h2 class="text-center mt-5">MAKE UP - TRANG ĐIỂM</h2>
                        <a href="user/danh-sach-san-pham?productType_id=301"><button class="btn btn mt-2">Dành cho mặt</button></a>
                        <a href="user/danh-sach-san-pham?productType_id=302"><button class="btn btn mt-2 ">Dành cho mắt</button></a>
                        <a href="user/danh-sach-san-pham?productType_id=303"><button class="btn btn mt-2 ">Dành cho môi</button></a>
                   </div>
                </div>
            </div>
        </div>
    </section>


    <!-- END PRODUCT TYPE -->


    {{-- Introduce --}}
    <section class="introduce">
        <div class="bg-product-introduce">
            <!-- Item -->
            <!-- End Item -->
            <!-- Introduce -->
            <section class="introduce">
                <div class="container-fluid pb-5">
                    <div class="wrapper-introduce">
                        <div class="row pt-5 pr-3 pb-3 pl-3">
                            <div class="col-12 col-sm-7">
                                <h1 class="title-introduce text-center text-uppercase">Mỹ phẩm Vanilla</h1>
                                <h2 class="title-introduce-2 text-center text-uppercase">Sứ mệnh</h2>
                                <div class="wrapper-text">
                                    <h5 class="text-introduce">
                                    <p>Vanilla đã đặt ra sứ mệnh mang đến cho tất cả phụ nữ những sản phẩm mỹ phẩm tốt nhất về chất lượng, hiệu quả và an toàn. Bằng cách đáp ứng sự đa dạng vô tận của nhu cầu và mong muốn làm đẹp.</p>
                                    <p>
                                    Chúng tôi đã cống hiến toàn năng lượng và năng lực của mình chỉ cho một niềm đam mê: vẻ đẹp. Đó là một công việc giàu ý nghĩa, vì nó cho phép tất cả các cá nhân thể hiện cá tính của họ, có được sự tự tin và cởi mở với người khác. Vanilla, cung cấp vẻ đẹp cho tất cả chị em.</p>
                                    </h5>
                                </div>
                                <div class="link-introduce text-center">
                                    <a class="link-more-introduce" href="{{route('gioithieu')}}">
                                       <button lass="btn btn">Giới thiệu về Vanilla</button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-sm-5 image-introduce">
                                <img src="user_asset/images/homepage/introduce1.png" width="100%" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Introduce -->
        </div>
    </section>
    {{-- End Introduce --}}


    <!-- video -->
        <section class="review">
            <div class="bg-review">
                <div class="container pb-3">
                    <h1 class="title-section text-center text-pink">Một số review sản phẩm trong tháng</span></h1>
                    <div class="row">                    
                        <div class="col-md-6">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/OQ5w_R-IsUg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                        <div class="col-md-6">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/fJneL-qb8cs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="row">                    
                        <div class="col-md-6">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/RW7G8JB0DLM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                        <div class="col-md-6">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/JojA2-WKe84" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- end video -->


    <!-- News -->
    <section class="news">
        <div class="bg-news">
            <div class="container pt-2 pb-3">
                <h1 class="title-section text-center"><a class="text-pink" href="{{route('tintuc')}}">Bản tin làm đẹp</a> </span></h1>
                <div class="row">
                    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000" >
                        <div class="MultiCarousel-inner">
                            @foreach ($newss as $news)
                                <div class="item">
                                    <div class="pad15">
                                        <div class="news">
                                            <div class="card pt-2 pb-2 text-center" style="width: 100%; height: 300px">
                                                <a href="{{route('chitiettintuc',$news->n_id)}}">
                                                    <img class="card-img-top p-2" src="user_asset/images/news/{{$news->n_image}}"
                                                        alt="news" style="height:150px" data-toggle="tooltip" title="Kem Dưỡng Ẩm Neutrogena, Hydro Boost water Gel">
                                                </a>
                                                <div class="card-body p-2">
                                                    <a class="text-brand-name text-black text-decoration-none" href="{{route('chitiettintuc',$news->n_id)}}" 
                                                            data-toggle="tooltip"  title="{{$news->n_title}}">{{$news->n_title}}</a>
                                                   </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                            <button class="btn btn-danger leftLst"><i class="fa fa-chevron-left"></i></button>
                            <button class="btn btn-danger rightLst"><i class="fa fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End News -->

    
    <!-- Service -->
    <section class="service">
        <div class="container-fluid pt-2 pb-4 bg-white">
            <div class="row text-center">
                <div class="col-6 col-sm-3">
                    <div class="service-1">
                        <img class="image-service" src="user_asset/images/homepage/service1.png" alt="">
                        <div class="service-text">Giới thiệu cho bạn</div>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="service-1">
                        <img class="image-service" src="user_asset/images/homepage/service2.png" alt="">
                        <div class="service-text">Tặng kèm mẫu thử</div>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="service-1">
                        <img class="image-service" src="user_asset/images/homepage/service3.png" alt="">
                        <div class="service-text">Giao hàng miễn phí</div>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="service-1">
                        <img class="image-service" src="user_asset/images/homepage/service4.png" alt="">
                        <div class="service-text">Liên hệ tư vấn</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Service -->
@endsection