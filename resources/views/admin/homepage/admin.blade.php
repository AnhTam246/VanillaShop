@extends('admin.index')
@section('content')
    <div id="page-wrapper">
            <div class="container-fluid" style="height: 100%">
                <div class="row">
                
                    <div class="col-lg-6">
                        <h1 class="page-header">Trang Chủ</h1>
                    </div>
                    <div class="col-md-6">
                        @if (session()->has('login_success1'))
                        <div class="alert alert-info mb-0 text-uppercase">{{session()->get('login_success1')}}</div>
                        @else
                            
                        @endif
                    </div>

                    <div class="col-md-12">
                        
                        @if (Session::has('ql'))
                            <div class="row">
                                <div class="col-sm-2">
                                    <a href="{{route('danhsachadmin')}}">
                                        <div class="card">
                                            <b>Quản lý Admin</b>
                                            <img src="admin_asset/upload/images/download.png" width="90%%" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{route('danhsachncc')}}">
                                        <div class="card">
                                            <b>Quản lý Nhà Cung Cấp</b>
                                            <img src="admin_asset/upload/images/vendor.png" width="80%" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{route('danhsachloaisp')}}">
                                        <div class="card">
                                            <b>Quản lý Loại Sản Phẩm</b>
                                            <img src="admin_asset/upload/images/loaisp.png" width="75%" height="63%"  alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{route('danhsachsanpham')}}">
                                        <div class="card">
                                            <b>Xem Sản Phẩm</b>
                                            <img src="admin_asset/upload/images/sp.png" width="75%" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{route('danhsachbantin')}}">
                                        <div class="card">
                                            <b>Quản lý Tin Tức</b>
                                            <img src="admin_asset/upload/images/news.png" width="75%" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{route('danhsachkhachhang')}}">
                                        <div class="card">
                                            <b>Khách Hàng</b>
                                            <img src="admin_asset/upload/images/khach.png" width="70%" alt="">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 50px">
                                <div class="col-sm-2">
                                    <a href="{{route('danhsachdonhang')}}">
                                        <div class="card" >
                                            <div><b> Xem Đơn Hàng </b></div>
                                            <img src="admin_asset/upload/images/cart.png" width="70%%" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{route('danhsachphanhoi')}}">
                                        <div class="card">
                                            <b>Phản hồi</b>
                                            <img src="admin_asset/upload/images/feedback.png" width="90%" alt="">
                                        </div>
                                    </a>
                                </div>                       
                                <div class="col-sm-2">
                                    <a href="{{route('doanhthu')}}">
                                        <div class="card">
                                            <b>Doanh Thu</b>
                                            <img src="admin_asset/upload/images/baocao.png" width="80%" alt="">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                
                        @if (Session::has('qlsp'))
                            <div class="row">
                                <div class="col-sm-2">
                                    <a href="{{route('danhsachsanpham')}}">
                                        <div class="card">
                                            <b>Quản lý Sản Phẩm</b>
                                            <img src="admin_asset/upload/images/sp.png" width="75%" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{route('danhsachbinhluan')}}">
                                        <div class="card">
                                            <b>Bình luận</b>
                                            <img src="admin_asset/upload/images/comment.png" width="90%" alt="">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                        @if (Session::has('qldh'))
                            <div class="row">
                                <div class="col-sm-2">
                                    <a href="{{route('danhsachdonhang')}}">
                                        <div class="card" >
                                            <div><b> Đơn Hàng </b></div>
                                            <img src="admin_asset/upload/images/cart.png" width="70%%" alt="">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        
                        @endif 
                    </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
@endsection