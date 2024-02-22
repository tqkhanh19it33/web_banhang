@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo "<center>$message </center>";
                        Session::put('message', null);
                    }
                    ?>
                        <form role="form" action="{{ URL::to('/save-product') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="text">Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="text">Giá sản phẩm</label>
                                <input type="text" name="product_price" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="text">Hình ảnh sản phẩm</label>
                                <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="5" name="product_describe" class="form-control" id="ckeditor1"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea style="resize: none" rows="5" name="product_content" class="form-control"
                                    id="id4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục</label>
                                <select name="category_product" class="form-control input-sm m-bot15">
                                   @foreach($category_product as $key => $cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu</label>
                                <select name="brand_product" class="form-control input-sm m-bot15">
                                @foreach($brand_product as $key => $brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiện</option>
                                    <option value="1">Ẩn</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Sản phẩm mới</label>
                                <select name="product_new" class="form-control input-sm m-bot15">
                                    <option value="0">Mới</option>
                                    <option value="1">Không mới</option>
                                </select>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Thêm</button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
    @endsection
