<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Quản trị - VanillaShop</a>
        </div>
    
        <!-- /.navbar-header -->
    
        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> 
                    @if (Session::has('ql'))
                   Quản lý
                    @endif
                    @if(Session::has('qlsp'))
                    Quản lý  sản phẩm
                    @endif
                    @if(Session::has('qldh'))
                    Quản lý đơn hàng
                    @endif 
                      <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    @if (Session::has('ql'))
                    <li><a href="{{route('logoutad')}}"><i class="fa fa-sign-out fa-fw"></i> Thoát</a>
                    @endif
                    @if(Session::has('qlsp'))
                    <li><a href="{{route('logoutadsp')}}"><i class="fa fa-sign-out fa-fw"></i> Thoát</a>
                    @endif
                    @if(Session::has('qldh'))
                    <li><a href="{{route('logoutaddh')}}"><i class="fa fa-sign-out fa-fw"></i> Thoát</a>
                    @endif 
    
    
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
    
        @include('admin.menu')
        <!-- /.navbar-static-side -->
    </nav>