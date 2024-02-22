@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('trang-chu')}}">Trang chủ</a></li>
				  <li class="active">Thông tin khách hàng</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-9">
						<div class="shopper-info">
							<center><p>Thông tin khách hàng</p></center>
							<form action="{{URL::to('/save-checkout')}}" method="post">
                                {{ csrf_field()}}
						
								<input type="text" name="shipping_name"  placeholder="Họ và tên">
								<input type="email" name="shipping_email"  placeholder="Email">
								<input type="text" name="shipping_phone"  placeholder="Số điện thoại">
					
								<input type="text" name="shipping_address" placeholder="Địa chỉ">
							
                                <textarea name="shipping_note"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
                                <br>
                                <br>
                                <button type="submit" name="send_order" class="btn btn-default btn-sm">Tiếp tục</button>
								<br>
								<br>
							</form>
						</div>
					</div>	
				</div>
			</div>
	</section> <!--/#cart_items-->

@endsection