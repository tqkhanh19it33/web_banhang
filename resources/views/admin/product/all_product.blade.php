@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê danh mục sản phẩm
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Trạng thái</th>
                        <th>Sản phẩm mới</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_product as $key => $product)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ number_format($product->product_price) ." VNĐ" }}</td>
                        <td><img src="public/upload/product/{{ $product->product_image }}" height="120" width="120"></td>
                        <td>{{ $product->category_name }}</td>
                        <td>{{ $product->brand_name }}</td>
                        <td><span class="text-ellipsis">

                                <?php
                                    if ($product->product_status == 1) {
                                         ?>
                                <a href="{{URL::to('/hide-product/'.$product->product_id)}}"><span
                                        class="fa-thumb-styling fa fa-eye-slash"> </span> </a>
                                <?php
                                    } else {
                                         ?>
                                <a href="{{URL::to('/show-product/'.$product->product_id)}}"><span
                                        class="fa-thumb-styling fa fa-eye"> </span> </a>
                                <?php
                                            }
                                    ?>

                            </span></td>
                            <td><span class="text-ellipsis">

                                <?php
                                    if ($product->product_new == 0) {
                                         ?>
                                <a href="{{URL::to('/new-product/'.$product->product_id)}}"><span
                                        class="fa-thumb-styling fa fa-thumbs-up"> </span> </a>
                                <?php
                                    } else {
                                         ?>
                                <a href="{{URL::to('/not-new-product/'.$product->product_id)}}"><span
                                        class="fa-thumb-styling fa fa-thumbs-down"> </span> </a>
                                <?php
                                            }
                                    ?>

                            </span></td>
                        <td>
                            <a href="{{URL::to('/edit-product/'.$product->product_id)}}" class="active styling-edit" ui-toggle-class=""><i
                                    class="fa fa-pencil-square-o text-active"></i><i
                                
                            </a>
                            <a onclick="return confirm('Bạn có xóa sản phẩm này?')" href="{{URL::to('/delete-product/'.$product->product_id)}}" class="active styling-edit" ui-toggle-class=""><i
                                    class="fa fa-times text-danger text"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection