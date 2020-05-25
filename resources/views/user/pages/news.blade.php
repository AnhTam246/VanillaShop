
@extends('user.index')
@section('content') 
<div class="wrap-news pt-5 pb-5">
    <div class="container container-news pt-2 pb-2">
        <h2 class="big-title">VANILLA BEAUTY HOUSE - BẢN TIN LÀM ĐẸP</h2>
        <!-- <h3 class="title-news-detail">Mục Tiêu Về Da Lớn Nhất Hiện Tại Của Bạn Là Gì?</h3 class="title-news-detail"> -->
        <!-- <div class="row">
            <div class="col-md-3">
                <a href="#">
                    <img src="user_asset/images/news/cat1.png" width="100%"  alt="">
                    <span class="title-news">Da sạch</span>
                </a>
            </div>
            <div class="col-md-3"><a href="#">
                <a href="#">
                    <img src="user_asset/images/news/cat1.png" width="100%"  alt="">
                    <span class="title-news">Dưỡng ẩm</span>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#">
                    <img src="user_asset/images/news/cat1.png" width="100%"  alt="">
                <span class="title-news">Trị mụn</span>
            </a></div>
            <div class="col-md-3"><a href="#">
                <a href="#">
                    <img src="user_asset/images/news/cat1.png" width="100%"  alt="">
                    <span class="title-news">Make up</span>
                </a>
            </div>
        
        </div>
        <h2 class="big-title">BÍ QUYẾT LÀM ĐẸP</h2> -->
        @foreach ($newss as $news)
        <div class="row mt-4 ml-auto">
            
            <div class="col-md-4">
                <a href="#"><img src="user_asset/images/news/{{$news->n_image}}" width="100%" alt=""></a>
            </div>
            <div class="col-md-8">
                <div class="post-item-cat">
                  
                </div>
                <div class="post-item-title">
                    <a href="{{route('chitiettintuc',$news->n_id)}}"><h3 class="title-news-detail">{{$news->n_title}}</h3 class="title-news-detail"></a>
                </div>
                <div class="post-item-intro">
                    {!!$news->n_intro!!}
                </div>
                
            </div>
            
        </div> 
        @endforeach
        <ul class="pagination list-unstyled">
            <li class="page-item"><a class="page-link" href="#">Trước</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Sau</a></li>
          </ul>
    </div>
</div>
@endsection