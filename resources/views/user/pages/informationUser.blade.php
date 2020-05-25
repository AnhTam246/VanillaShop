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
              <h1>Thông Tin Tài Khoản</h1>
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                          {{$error}}<br>
                      @endforeach
                  </div>
              @endif
              <hr> 
              <form action="{{route('suakhachhang')}}" method="post">
              {{ csrf_field() }}
                <input type="hidden" name="idCust" value="{{$customer->cust_id}}">
                <div class="form-group">
                  <label for="name">Tên đăng nhập</label>
                  <input id="name" type="text" class="form-control" name="txtName" value="{{$users->username}}" placeholder="" /> <disabled/>
                </div>
                <div class="form-group">
                  <label for="password">Mật khẩu </label>
                  <input id="password" type="password" class="form-control" name="txtPass" value="" placeholder="" />
                </div>
                <div class="form-group">
                  <label for="name">Họ tên</label>
                  <input id="name" type="text" class="form-control" name="txtHoten" value="{{$customer->cust_name}}" placeholder="" />
                </div>
               <div class="form-group">
                  <label for="name">Số điện thoại</label>
                  <input id="name" type="text" class="form-control" name="txtTel" value="{{$customer->cust_tel}}" placeholder="" /> 
                </div>
                <div class="form-group">
                  <label for="email">Địa chỉ mail</label>
                  <input id="email" type="text" class="form-control" name="txtEmail" value="{{$customer->cust_email}}" placeholder="Please Enter Email" />
                </div>
              
                <div class="form-group">
                  <label for="name">Địa chỉ</label>
                  <input id="name" type="text" class="form-control" name="txtDiachi" value="{{$customer->cust_add}}" placeholder="" />
                </div>

                <div class="form-group">
                    <label for="name">Số lần đặt hàng</label>
                    <input id="mark" type="text" class="form-control" name="txtMark" value="{{$customer->cust_mark}}" placeholder="" readonly/>
                  </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Cập Nhật Thông Tin</button>
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