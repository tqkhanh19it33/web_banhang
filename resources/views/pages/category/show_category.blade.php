@extends('welcome')
@section('content')

<div class="features_items" >
    <!--features_items-->
    @foreach($name_category as $key => $name)
    <br>
    <h1 class="title text-center" >DANH MỤC {{$name->category_name}} </h1>
      @endforeach
    @foreach($category_by_id as $key => $product)
    <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
    <div class="col-sm-4">
        <div class="product-image-wrapper"> 
            <div class="single-products" >
                <div class="productinfo text-center" >
                    <img src="{{URL::to('public/upload/product/'.$product->product_image) }}" alt="" height="270" width="150"/>
                    <h2>{{ number_format($product->product_price).' VNĐ' }}</h2>
                    <p>{{$product->product_name}}</p>
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