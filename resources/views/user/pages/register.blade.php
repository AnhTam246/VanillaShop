@extends('user.index')
@section('content')
<div class="wrap">
    <div class="container mt-5">
       
        <div id="all">
            <div id="content">
            <div class="container">
                <div class="row">
                <div class="col-lg-12">                                
            </div>
                <div class="col-lg-6">
                    <div class="box">
                    <h1>Tạo Tài Khoản</h1>
                    <hr>
                    @if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
							{{$err}}
							@endforeach
						</div>
					@endif
					@if(Session::has('thanhcong'))
						<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
					@endif
                    <form action="{{route('dangkyPostUser')}}" method="post">                   
                    {{csrf_field()}}
                        <div class="form-group">
                        <label for="name">Tên đăng nhập</label>
                            <input id="username" name="username" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input id="password" name="password" type="password" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="password">Nhập Lại Mật khẩu</label>
                        <input id="re_password" name="re_password" type="password" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="name">Họ tên</label>
                        <input id="fullname" name="custname" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="name">Số điện thoại</label>
                        <input id="telephone" type="text" name="custtel" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="email">Địa chỉ mail</label>
                        <input id="email" type="text" name="custemail" class="form-control">
                        </div>
                    
                        <div class="form-group">
                        <label for="name">Địa chỉ</label>
                        <input id="address" name="custaddress" type="text" class="form-control">
                        </div>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i>Đăng Ký</button>
                        </div>
                    </form>
                    </div>
                </div>
                
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection