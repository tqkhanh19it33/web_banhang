@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
                </header>
                <div class="panel-body">
                    
                @foreach($edit_product as $key => $product)
                        <form role="form" action="{{ URL::to('/update-product/'.$product->product_id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="text">Tên sản phẩm</label>
                                <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="text">Giá sản phẩm</label>
                                <input type="text" name="product_price" value="{{$product->product_price}}" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="text">Hình ảnh sản phẩm</label>
                                <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" >
                                <img src="{{URL::to('public/upload/product/'.$product->product_image)}}" class="anh_san_pham" width="130" height="130" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea style="resize: none"  rows="5" name="product_describe" class="form-control"
                                    id="ckeditor5">{{$product->product_describe}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea style="resize: none" rows="5" name="product_content"  class="form-control"
                                    id="id4">{{$product->product_content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục</label>
                                <select name="category_product" class="form-control input-sm m-bot15">
                                   @foreach($category_product as $key => $cate)
                                   @if($cate->category_id == $product->category_id)
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @else
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu</label>
                                <select name="brand_product" class="form-control input-sm m-bot15">
                                @foreach($brand_product as $key => $brand)
                                @if($brand->brand_id == $product->category_id)
                                <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @else
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện</option>
                                </select>
                            </div>
                            <button type="submit" name="update_product" class="btn btn-info">Cập nhật</button>
                            @endforeach
                        </form>
                    </div>
          
                </div>
            </section>

        </div>
    @endsection
