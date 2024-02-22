@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật danh mục
            </header>
            <div class="panel-body">
                <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo "<center>$message </center>";
                        Session::put('message', null);
                    }
                    ?>
                @foreach($edit_category_product as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{ URL::to('/update-category-product/'.$edit_value->category_id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="text">Tên danh mục</label>
                            <input type="text" name="category_name" value="{{$edit_value->category_name}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="5" name="category_describe"  class="form-control"
                                id="exampleInputEmail1">{{$edit_value->category_describe}}</textarea>
                        </div>
                        <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
                    @endforeach
            </div>
        </section>

    </div>
    @endsection