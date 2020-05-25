@extends('user.index')
@section('content')
<div class="wrap">
    <div class="container">
      
            <h2 class="n_title">{{$newss->n_title}}</h2>
            <div class="n_intro">
                <p>Cập nhập ngày: {{$newss->n_date}}</p>
            </div>
            <div class="n_image">
            <img src="user_asset/images/news/{{$newss->n_image}}" width="100%" alt="">
            </div>
            <div class="n_content">
                <p> {!!$newss->n_content!!}</p>
            </div>
    
    </div>
</div>
@endsection