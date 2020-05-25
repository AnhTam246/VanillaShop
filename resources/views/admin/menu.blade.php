<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{route('trangchuAdmin')}}"><i class="fa fa-align-left" aria-hidden="true"></i> Trang chủ</a>
                </li>
                @if (Session::has('ql'))
                    <li>
                        <a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Quản lý Admin<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('danhsachadmin')}}">Danh sách Admin</a>
                            </li>
                            <li>
                                <a href="{{route('themadmin')}}">Thêm Admin</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-tags" aria-hidden="true"></i> Quản lý Nhà Cung Cấp<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('danhsachncc')}}">Danh sách Nhà Cung Cấp</a>
                            </li>
                            <li>
                                <a href="{{route('themncc')}}">Thêm Nhà Cung Cấp</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="admin/theloai/danhsach"><i class="fa fa-cubes" aria-hidden="true"></i> Loại sản phẩm<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('danhsachloaisp')}}">Danh sách Loại Sản Phẩm</a>
                            </li>
                            <li>
                                <a href="{{route('themloaisp')}}">Thêm Loại Sản Phẩm</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
    
                    <li>
                        <a href="admin/loaitin/danhsach"><i class="fa fa-cube" aria-hidden="true"></i> Sản phẩm<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('danhsachsanpham')}}">Danh sách Sản Phẩm</a>
                            </li>
                            <li>
                                <a href="{{route('sanphamdaxoa')}}">Sản Phẩm Đã Xóa</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Quản lý Tin Tức<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('danhsachbantin')}}">Danh sách Tin Tức</a>
                            </li>
                            <li>
                                <a href="{{route('thembantin')}}">Thêm Tin Tức</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-diamond" aria-hidden="true"></i> Khách Hàng<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('danhsachkhachhang')}}">Danh sách Khách Hàng</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                
    
                    <li>
                        <a href="admin/slide/danhsach"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Đơn hàng<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('danhsachdonhang')}}">Danh sách đơn hàng</a>
                            </li>
                            <li>
                                <a href="{{route('doanhthu')}}">Doanh thu</a>
                            </li>
                            <li>
                                <a href="{{route('donhangdaxoa')}}">Đơn hàng đã xóa</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                                    
                    </li>
                    <li>
                        <a href="admin/user/danhsach"><i class="fa fa-comment" aria-hidden="true"></i> Phản hồi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('danhsachphanhoi')}}">Danh Sách Phản Hồi</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                {{-- @dd(Session::get('ql')); --}}
                @elseif (Session::has('qlsp'))
                    <li>
                        <a href="admin/loaitin/danhsach"><i class="fa fa-cube" aria-hidden="true"></i> Sản phẩm<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('danhsachsanpham')}}">Danh sách Sản Phẩm</a>
                            </li>
                            <li>
                                <a href="{{route('themsanpham')}}">Thêm Sản Phẩm</a>
                            </li>
                            <li>
                                <a href="{{route('sanphamdaxoa')}}">Sản Phẩm Đã Xóa</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="admin/user/danhsach"><i class="fa fa-commenting-o" aria-hidden="true"></i> Bình luận<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('danhsachbinhluan')}}">Danh Sách Bình Luận</a>
                            </li>
                            <li>
                                <a href="{{route('binhluandaxoa')}}">Bình Luận Đã Xóa</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                {{-- @dd(Session::get('qlsp')); --}}
                @else
                    <li>
                        <a href="admin/slide/danhsach"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Đơn hàng<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('danhsachdonhang')}}">Danh sách đơn hàng</a>
                            </li>
                            <li>
                                <a href="{{route('donhangdaxoa')}}">Đơn hàng đã xóa</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                                    
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->