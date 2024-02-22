@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/save-category-product') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="text">Tên danh mục</label>
                                <input type="text" name="category_name" class="form-control" id="exampleInputEmail1"
                                    placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea style="resize: none" rows="5" name="category_describe" class="form-control"
                                    id="exampleInputEmail1"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <select name="category_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiện</option>
                                    <option value="1">Ẩn</option>
                                </select>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    @endsection
