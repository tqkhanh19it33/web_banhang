@extends('welcome')
@section('content')

<div class="features_items">
    <!--features_items-->
    <br>
    <h1 class="title text-center">Sản phẩm mới nhất</h1>
    @foreach($new_product as $key => $new)
    <a href="{{URL::to('/chi-tiet-san-pham/'.$new->product_id)}} " target="_self">
    <div class="col-sm-4">
        <div class="product-image-wrapper"> 
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="public/upload/product/{{ $new->product_image }}" alt="" height="270" width="150"/>
                    <h2>{{ number_format($new->product_price).' VNĐ' }}</h2>
                    <p>{{$new->product_name}}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                </ul>
            </div>
        </div>
    </div>
</a>
    @endforeach
</div>
@endsection