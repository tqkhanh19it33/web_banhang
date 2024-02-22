@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm slider
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/save-slider') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="text">Slider h1</label>
                                <input type="text" name="slider_h1" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="text">Slider h2</label>
                                <input type="text" name="slider_h2" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="text">Slider p</label>
                                <input type="text" name="slider_p" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="text">Hình ảnh sản phẩm</label>
                                <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1">
                            </div>            
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <select name="slider_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiện</option>
                                    <option value="1">Ẩn</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <button type="submit" name="add_slider" class="btn btn-info">Thêm</button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
    @endsection
