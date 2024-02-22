@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm tin tức
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/save-new') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="text">Tiêu đề tin tức</label>
                                <input type="text" name="new_title" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="text">Hình ảnh tin tức</label>
                                <input type="file" name="new_image" class="form-control" id="exampleInputEmail1">
                            </div>  
                            <div class="form-group">
                                <label for="text">Mô tả tin tức</label>
                                <input type="text" name="new_desc" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung tin tức</label>
                                <textarea style="resize: none" rows="5" name="new_content" class="form-control" id="ckeditor10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <select name="new_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiện</option>
                                    <option value="1">Ẩn</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <button type="submit" name="add_new" class="btn btn-info">Thêm</button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
    @endsection
