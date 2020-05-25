<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>
    <base href="{{asset('')}}}">
    <link rel="stylesheet" href="user_asset/css/homepage.css">
    <link rel="stylesheet" href="user_asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="user_asset/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="user_asset/css/details.css">
    <link rel="stylesheet" href="user_asset/css/lightslider.css">
    <link rel="stylesheet" href="user_asset/css/cart.css">
    <link rel="stylesheet" href="user_asset/css/pay.css">
    <link rel="stylesheet" href="user_asset/css/product-page.css">
    <link rel="stylesheet" href="user_asset/css/news.css">
    <link rel="stylesheet" href="user_asset/css/qa.css">
    <link rel="stylesheet" href="user_asset/css/about.css">
    <link rel="stylesheet" href="user_asset/css/store.css">
    <link rel="stylesheet" href="user_asset/css/tuan.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">

</head>
<body>
    @include('user.header')

    <div class="wrap-content">
        @yield('content')
    </div>
   
    @include('user.footer')
</body>
<script src="user_asset/js/jquery.min.js"></script>
<script src="user_asset/js/bootstrap.min.js"></script>
<script src="user_asset/js/hompage.js"></script>
<script src="user_asset/js/details.js"></script>
<script src="user_asset/js/lightslider.js"></script>
<script src="user_asset/js/pay.js"></script>

<script>
    $(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixed-top')
			}else{
				$(".header-bottom").removeClass('fixed-top')
			}}
		)
	})
</script>
</html>