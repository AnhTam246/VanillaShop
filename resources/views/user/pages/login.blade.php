@extends('user.index')
@section('content')
<div class="wrap">
    <div class="container mt-5">
        <section class="login-success">
            <div class="container-fluid p-0 text-center">
                @if (session()->has('login_fail1'))
                    <div class="alert alert-danger mb-0 text-uppercase">{{session()->get('login_fail1')}}</div>
                @else
                    
                @endif
            </div>
        </section>
        <div class="login">
            <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Đăng Nhập</h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('dangnhapUserTest')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input id="username" name="username" type="text" placeholder="Nhập tên tài khoản" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                        </div>
                        <p class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Đăng Nhập</button>
                        </p>
                    </form>
                <p class="text-center text-muted">Bạn chưa đăng ký?</p>
                <p class="text-center text-muted"><a href="{{route('dangkyUser')}}" >Đăng Ký Ngay</a></li>! Thật dễ dàng và được thực hiện trong 1 phút sẽ cung cấp cho bạn quyền truy cập để hưởng ưu đãi</p>
                </div>
            </div>
            </div>
        </div>

    </div>
</div>
@endsection