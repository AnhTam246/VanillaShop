
<style>
  li.item-header {
      text-transform: uppercase;
      padding-left: 20px;
      padding-right: 20px;
  }
  ul li.item-header a {
      color: black;
      font-weight: bold
  }

</style>

<header class="head"> 
       
<div id="top">
  <div class="container">
    <div class="row">
        <div class="col-lg-8 offer mt-1"><span href="#" class="btn-tht sale btn-danger btn-sm">  Khuyến mãi: Giảm 5% trên tổng hóa đơn đối với tài khoản có trên 10 lần đặt hàng!!</span></div>           
      <div class="col-lg-4 text-certer text-lg-right">
        <ul class="menu list-inline mb-0">

          @if (Session::has('logined'))
            <li class="list-inline-item"><a href="{{route('thongtin', $cust_id)}}"><i class="fa fa-user" aria-hidden="true"></i> Thông tin tài khoản </a></li>
            <li class="list-inline-item"><a href="{{route('thoatUser')}}">Đăng Xuất</a></li>
            {{-- @dd(Session::get('logined')); --}}
          @else
            <li class="list-inline-item"><a href="{{route('dangnhapUserTest')}}">Đăng Nhập</a></li>
            <li class="list-inline-item"><a href="{{route('dangkyUser')}}">Đăng Ký</a></li>  
          @endif  

        </ul>
      </div>
    </div>
  </div>
</div>


<nav class="header-bottom navbar navbar-expand-lg">
  <div class="container"><img src="user_asset/images/header/logo.png" width="100px" height="40px" alt="logo" class="d-none d-md-inline-block"><img src="user_asset/images/header/logo.png" alt="logo" width="35%" class="d-inline-block d-md-none"><span class="sr-only">logo - go to homepage</span></a>
    <div class="navbar-buttons">
      <button type="button" data-toggle="collapse" data-target="#navigation" class="btn-tht btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
      <button type="button" data-toggle="collapse" data-target="#search-tht" class="btn-tht btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="{{route('giohang')}}" class="btn-tht btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i>
        @if (Cart::instance('default')->count() > 0)
          <small style="font-size: 8px" class="badge badge-light">{{ Cart::instance('default')->count() }}</small></a>
        @else
          
      @endif</a>
  
</div>
   <div id="navigation" class="collapse navbar-collapse"><ul class="navbar-nav mr-auto">
        <li class="nav-item active"><a class="nav-link pl-lg-0" href="{{route('trangchuUser')}}">TRANG CHỦ<span class="sr-only">(current)</span></a></li>
   
            
<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" >THƯƠNG HIỆU</a>
          <div class="dropdown-menu mt-0 border-0 shadow-sm" aria-labelledby="navbarDropdown">
          @foreach($brand as $br)
            @if($br->brand_status == 1) 
              <a class="dropdown-item" href="{{ route('danhSachSanPham',['brand_id' => $br->brand_id,]) }}">{{$br->brand_name}}</a> 
            @endif
          @endforeach
</div>
</li>
@foreach($TypeUser as $ty)
  @if($ty->productType_status == 1) 
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" >{{$ty->productType_name}}</a>
          <div class="dropdown-menu mt-0 border-0 shadow-sm" aria-labelledby="navbarDropdown">
          @foreach($ty->getParent as $tu)
            @if($tu->productType_status == 1) 
              <a class="dropdown-item " href="{{route('danhSachSanPham',['productType_id' => $tu->productType_id])}}">{{$tu->productType_name}}</a>
            @endif
          @endforeach        
          </div>
          </li>
@endif
@endforeach     
<li class="nav-item"><a class="nav-link pl-lg-0" href="{{route('cuahang')}}">Cửa hàng</a></li>
      </ul>
      
  
 



<!---search va gio hang--->
<div class="navbar-buttons d-flex justify-content-end">
       
        <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search-tht" class="btn navbar-btn btn-primary-tht d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
        <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block">
          <a href="{{route('giohang')}}" class="btn btn-primary-tht navbar-btn-tht">
            <i class="fa fa-shopping-cart"></i>
            @if (Cart::instance('default')->count() > 0)
              <small style="font-size: 8px" class="badge badge-light">{{ Cart::instance('default')->count() }}</small></a>
            @else
                
            @endif
          </a>
        
        </div>
      </div>
    </div>
  </div>
</nav>
<div id="search-tht" class="collapse">
    <div class="container">
      <form role="search-tht" action="{!! route('danhSachSanPham') !!}" method="GET" class="ml-auto">
      <div class="input-group">
          <input type="text" name="search" placeholder="Tìm kiếm..." class="form-control" value="{{ request('search', null)}}" type="search">
 
            <button type="submit" class="btn btn-primary-tht"><i class="fa fa-search"></i></button>
            </div>
       
      </form>
    </div>
  </div>
</header>