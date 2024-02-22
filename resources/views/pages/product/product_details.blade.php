@extends('welcome')
@section('content')
@foreach($product_details as $key => $details)
<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('/public/upload/product/'.$details->product_image)}}" alt="" />
							</div>
							

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="{{URL::to('public/frontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />
								<h2>{{$details->product_name}}</h2>
								<p>Web ID: {{$details->product_id}}</p>
								<img src="{{URL::to('public/frontend/images/product-details/rating.png')}}" alt="" />
								<form action="{{URL::to('add-cart')}}" method="POST">
									{{ csrf_field()}}
								<span>
									<span>{{ number_format($details->product_price).' VNĐ' }}</span>
									<label>Số lượng:</label>
									<input type="number" min="1" value="1" name="qty" />
									<input type="hidden" value="{{$details->product_id}}" name="product_hidden"  />
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>Add to cart</button>
								</span>
									</form>
								<p><b>Tình trạng:</b> In Stock</p>
								<p><b>Trạng thái:</b> New</p>
                                <p><b>Danh mục:</b> {{$details->category_name}} </p>
								<p><b>Thương hiệu:</b> {{$details->brand_name}} </p>
								<div class="fb-like" data-href="http://localhost/Web_Ban_Hang/chi-tiet-san-pham/35" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
								<div class="fb-share-button" data-href="https://thanhnien.vn/" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://thanhnien.vn/&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
								
							</div><!--/product-information-->
						</div>
					</div>
                    <div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Thông số kỹ thuật</a></li>		
								<li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                                <li><a href="#tag" data-toggle="tab">Sản phẩm tương tự</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<div class="col-sm-12">
									<div class="product-image-wrapper">
									<div class="fb-like" data-href="http://localhost/Web_Ban_Hang/chi-tiet-san-pham/35" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
									<div class="fb-share-button" data-href="http://localhost/Web_Ban_Hang" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/Web_Ban_Hang/danh-muc/&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div> 	
                                    <p>{!!$details->product_describe!!}</p>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade " id="companyprofile" >
								<div class="col-sm-12">
									<div class="product-image-wrapper">
                                    <p>{!!$details->product_content!!}</p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade " id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>USER</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>7:00 AM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>1 AUGUST 2021</a></li>
										
									</ul>
									<div class="fb-comments" data-href="http://localhost/Web_Ban_Hang/chi-tiet-san-pham" data-width="" data-numposts="20"></div>
									
								</div>
							</div>
							<div class="tab-pane fade" id="tag" >
							@foreach($same_product as $key => $same)
							<a href="{{URL::to('/chi-tiet-san-pham/'.$same->product_id)}} " target="_self">
								<div class="col-sm-3">
									<div class="product-image-wrapper">		
										<div class="single-products">										
											<div class="productinfo text-center">										
												<img src="{{URL::to('/public/upload/product/'.$same->product_image)}}" alt="" />
												<h2>{{ number_format($same->product_price).' VNĐ' }}</h2>
												<p>{{$same->product_name}}</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>		
								</div>
								</a>
								@endforeach
							</div>
						</div>
					</div><!--/category-tab-->
                    @endforeach
                    <br>
                    <br>
                    <br>
                    <br>
                   
@endsection