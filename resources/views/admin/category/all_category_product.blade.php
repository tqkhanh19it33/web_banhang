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
                
            </div>
        </div>
        <div class="table-responsive">
            <?php
// $message = Session::get('message');
// if ($message) {
//     echo "<center>$message </center>";
//     Session::put('message', null);
// }
?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên danh mục</th>
                        <th>Mô tả danh mục</th>
                        <th>Trạng thái</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_category_product as $key => $cate_product)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{ $cate_product->category_name }}</td>
                        <td>{{ $cate_product->category_describe }}</td>
                        <td><span class="text-ellipsis">

                                <?php
                                    if ($cate_product->category_status == 1) {
                                         ?>
                                <a href="{{URL::to('/hide-category-product/'.$cate_product->category_id)}}"><span
                                        class="fa-thumb-styling fa fa-eye-slash"> </span> </a>;
                                <?php
                                    } else {
                                         ?>
                                <a href="{{URL::to('/show-category-product/'.$cate_product->category_id)}}"><span
                                        class="fa-thumb-styling fa fa-eye"> </span> </a>;
                                <?php
                                            }
                                    ?>

                            </span></td>
                        <td>
                            <a href="{{URL::to('/edit-category-product/'.$cate_product->category_id)}}" class="active styling-edit" ui-toggle-class=""><i
                                    class="fa fa-pencil-square-o text-active"></i><i
                                
                            </a>
                            <a onclick="return confirm('Bạn có xóa danh mục này?')" href="{{URL::to('/delete-category-product/'.$cate_product->category_id)}}" class="active styling-edit" ui-toggle-class=""><i
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