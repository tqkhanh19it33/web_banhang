@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('trang-chu')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>
            <div class="table-responsive cart_info">
                <?php
                $content = Cart::content();
                ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
							@foreach($content as $content_cart)
							<td class="cart_product">
								<a href=""><img class="anhanh" src="{{URL::to('/public/upload/product/'.$content_cart->options->image)}}" width="100" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$content_cart->name}}</a></h4>
								<p>Web ID: {{$content_cart->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{ number_format($content_cart->price).' VNĐ' }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart')}}" method="post">
									{{ csrf_field()}}
									<input class="cart_quantity_input" type="number" size="10" min="1" name="quantity_cart" value="{{ $content_cart->qty }}" autocomplete="off">
									<input type="hidden" value="{{$content_cart->rowId}}" name="row_id_cart" class="form-controll">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
											$subtotal = $content_cart->price*$content_cart->qty;
											echo number_format($subtotal).' VNĐ';
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$content_cart->rowId) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<section id="do_action">
		<div class="container">
			<div class="heading">
				<!-- <h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p> -->
			</div>
			<div class="row">
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng tiền <span>{{Cart::subtotal().' VNĐ' }}</span></li>
							<li>Phí ship <span>Free</span></li>
							<li>Thành tiền <span>{{Cart::subtotal().' VNĐ' }}</span></li>
						</ul>
						
                        <form method="post" action="{{URL::to('/order')}}">
                        {{csrf_field()}}
					
                        <span>
					    	<label class="lb1"><input name="payment_method" value="Thanh toán ATM" type="checkbox"> Thanh toán ATM</label>
					    </span>
				    	<span>
					    	<label  class="lb1"><input name="payment_method" value="Thanh toán Momo" type="checkbox"> Thanh toán Momo</label>
				    	</span>
				    	<span>
					    	<label  class="lb1"><input name="payment_method" value="Thanh toán khi nhận hàng" type="checkbox"> Thanh toán khi nhận hàng</label>
				    	</span>
						
                        <button type="submit" class="dat_hang">Đặt hàng</button>
                            </form>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
			<!-- <div class="payment-options">
					
				</div>
		    </div> -->
	</section> <!--/#cart_items-->

@endsection