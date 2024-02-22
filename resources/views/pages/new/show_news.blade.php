@extends('welcome')
@section('content')

<div class="features_items">
    <!--features_items-->
    <br>
    <h1 class="title text-center">Tin tức</h1>
    @foreach($all_new as $key => $new)
    <a href="{{URL::to('/chi-tiet-tin-tuc/'.$new->new_id)}}" target="_self">
    <div class="col-sm-4">
        <div class="product-image-wrapper"> 
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="public/upload/new/{{ $new->new_image }}" alt="" height="200" width="100"/>
                    <h2>{{ $new->new_title }}</h2>
                    <p>{{$new->new_desc}}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
</a>
    @endforeach
</div>
@endsection