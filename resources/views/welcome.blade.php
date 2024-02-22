<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<meta property="og:image" content="" >
	<meta property="og:site_name" content="http://localhost/Web_Ban_Hang/" >
	<meta property="og:description" content="Mô tả" >
	<meta property="og:title" content="Trang chủ" >
	<meta property="og:url" content="http://localhost/Web_Ban_Hang/" >
	<meta property="og:type" content="website" >

    <title>Trang chủ</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">'
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('public/frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('public/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
	
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::to('/trang-chu')}}"><img src="{{asset('public/frontend/images/home/logo2.png')}}" alt="" /></a>
						</div>
						<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="{{URL::to('search')}}" method="post">
								{{csrf_field()}}
							<input type="text" name="keywords" placeholder="Nhập vào để tìm kiếm..."/>
							<!-- <button type="submit" class="button-search" name="search_item"></button> -->
							</form>
						</div>
					</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
								<?php
									 	$customer_id = Session::get('customer_id');
                                         if ($customer_id!=null) {
                                             ?>
										<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
										<?php
                                         }else{
											 ?>
											 <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
											 <?php
										 }
										 ?>
								
								<li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
								<?php
									 	$customer_id = Session::get('customer_id');
                                         if ($customer_id!=null) {
                                             ?>
										<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
										<?php
                                         }else{
											 ?>
											 <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
											 <?php
										 }
										 ?>
										 
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
								@foreach($category as $key => $cate)
								<li><a href="{{URL::to('/danh-muc/'.$cate->category_id)}}" >{{$cate->category_name}}</a></li>
								@endforeach
								<li><a href="{{URL::to('/show-news')}}">Tin tức</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						@php
								 $j = 0;
							@endphp
							@foreach($all_slider as $key =>$slider)
							@php
								 $j++;
							@endphp
							<li data-target="#slider-carousel" data-slide-to="{{ $j }}" class="{{ $j==1 ? 'active' : '' }}"></li>
							@endforeach
						</ol>
						
						<div class="carousel-inner">
							@php
								 $i = 0;
							@endphp
						@foreach($all_slider as $key =>$slider)
						@php
								 $i++;
							@endphp
							<div class="item {{ $i==1 ? 'active' : '' }}">
								<div class="col-sm-6">
								<img src="{{URL::to('public/frontend/images/home/Untitled.png')}}" width="650" height="490" />
									<h1><span>{{$slider->slider_h1}}</span></h1>
									<h2>{{$slider->slider_h2}}</h2>
									<p>{{$slider->slider_p}}</p>
									<button type="button" class="btn btn-default get">Mua ngay</button>
								</div>
								<div class="col-sm-6">
									<img src="{{URL::to('public/upload/slider/'.$slider->slider_image)}}" class="girl img-responsive" alt="" />
									
								</div>
								
							</div>
							@endforeach
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục sản phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($category as $key => $cate)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/danh-muc/'.$cate->category_id)}}" >{{$cate->category_name}}</a></h4>
								</div>
							</div>
							@endforeach
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu</h2>
							<div class="brands-name">
							@foreach($brand as $key => $br)
								<ul class="nav nav-pills nav-stacked">
									<li><a class="panel-title" href="{{URL::to('/thuong-hieu/'.$br->brand_id)}}">{{$br->brand_name}}</a></li>
								</ul>
								@endforeach
							</div>
						</div><!--/brands_products-->
						
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					
                @yield('content')
					
					
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
	<div class="footer-widget">
			<div class="container">
				<div class="row">
				<div class="col-sm-2">
						<div class="single-widget">
							<h2></h2>
							<ul class="nav nav-pills nav-stacked">
							
								<li><a href="#"></a></li>
							
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Danh mục</h2>
							<ul class="nav nav-pills nav-stacked">
								@foreach($category as $key => $cate)
								<li><a href="{{URL::to('/danh-muc/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Thương hiệu</h2>
							<ul class="nav nav-pills nav-stacked">
								@foreach($brand as $key => $br)
								<li><a href="{{URL::to('/thuong-hieu/'.$br->brand_id)}}">{{$br->brand_name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>CÁC MỤC KHÁC</h2>
							<ul class="nav nav-pills nav-stacked">
							<?php
									 	$customer_id = Session::get('customer_id');
                                         if ($customer_id!=null) {
                                             ?>
										<li><a href="{{URL::to('/checkout')}}"> Thanh toán</a></li>
										<?php
                                         }else{
											 ?>
											 <li><a href="{{URL::to('/login-checkout')}}"> Thanh toán</a></li>
											 <?php
										 }
										 ?>
							<li><a href="{{URL::to('/show-cart')}}">Giỏ hàng</a></li>
								<?php
									 	$customer_id = Session::get('customer_id');
                                         if ($customer_id!=null) {
                                             ?>
										<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
										<?php
                                         }else{
											 ?>
											 <li><a href="{{URL::to('/login-checkout')}}">Đăng nhập</a></li>
											 <?php
										 }
										 ?>
								<li><a href="{{URL::to('/show-news')}}">Tin tức</a></li
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Nhận tin mới</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Để lại mail và nhận tin mới từ chúng tôi...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2021 by Hiệp Phan. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="https://www.facebook.com/profile.php?id=100009223112624">Hiệp Phan</a></span></p>
				</div>
			</div>
	</footer><!--/Footer-->
	


	<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	
	});
	</script>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="GmedcNMS"></script>

	<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="xgG0wlHh"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="UU0YBbnL"></script>

</body>
</html>