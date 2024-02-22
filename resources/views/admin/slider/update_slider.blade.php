@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật slider
                </header>
                <div class="panel-body">
                    
                @foreach($edit_slider as $key => $slider)
                        <form role="form" action="{{ URL::to('/update-slider/'.$slider->slider_id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="text">Slider h1</label>
                                <input type="text" name="slider_h1" value="{{$slider->slider_h1}}" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="text">Slider h2</label>
                                <input type="text" name="slider_h2" value="{{$slider->slider_h2}}" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="text">Slider p</label>
                                <input type="text" name="slider_p" value="{{$slider->slider_p}}" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="text">Hình ảnh slider</label>
                                <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1" >
                                <img src="{{URL::to('public/upload/slider/'.$slider->slider_image)}}" class="anh_san_pham" width="130" height="130" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <select name="slider_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện</option>
                                </select>
                            </div>
                            <button type="submit" name="update_slider" class="btn btn-info">Cập nhật</button>
                            @endforeach
                        </form>
                    </div>
          
                </div>
            </section>

        </div>
    @endsection
