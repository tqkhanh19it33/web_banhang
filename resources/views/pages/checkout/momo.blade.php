@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('trang-chu')}}">Trang chủ</a></li>
				  <li class="active">Đặt hàng thành công!</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="review-payment">
				<h2>Chúc mừng bạn đã đặt hàng thành công! Chúng tôi sẽ liên lạc cho bạn sớm nhất có thể!</h2>
			</div>
@endsection