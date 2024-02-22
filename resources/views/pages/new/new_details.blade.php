@extends('welcome')
@section('content')

<div class="features_items">
    <!--features_items-->
    <br> @foreach($new_details as $key => $details)
    <div class="fb-like" data-href="http://localhost/Web_Ban_Hang/chi-tiet-san-pham/35" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
									<div class="fb-share-button" data-href="http://localhost/Web_Ban_Hang" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/Web_Ban_Hang/danh-muc/&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div> 	
    {!!$details->new_content!!}
    <div class="fb-comments" data-href="http://localhost/Web_Ban_Hang/chi-tiet-san-pham" data-width="" data-numposts="20"></div>
    <br>
    <br>
    @endforeach
</div>
@endsection