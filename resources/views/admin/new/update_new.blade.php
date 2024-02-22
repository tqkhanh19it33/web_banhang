@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật tin tức
                </header>
                <div class="panel-body">
                    
                @foreach($edit_new as $key => $new)
                        <form role="form" action="{{ URL::to('/update-new/'.$new->new_id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="text">Tiêu đề tin tức</label>
                                <input type="text" name="new_title" value="{{$new->new_title}}" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="text">Hình ảnh tin tức</label>
                                <input type="file" name="new_image" class="form-control" id="exampleInputEmail1" >
                                <img src="{{URL::to('public/upload/new/'.$new->new_image)}}" class="anh_san_pham" width="130" height="130" >
                            </div>
                            <div class="form-group">
                                <label for="text">Mô tả</label>
                                <input type="text" name="new_desc" value="{{$new->new_desc}}" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung tin tức</label>
                                <textarea style="resize: none" rows="5" name="new_content" class="form-control" id="ckeditor10">{{ $new->new_content }}</textarea>
                            </div>
                         
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <select name="new_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện</option>
                                </select>
                            </div>
                            <button type="submit" name="update_new" class="btn btn-info">Cập nhật</button>
                            @endforeach
                        </form>
                    </div>
          
                </div>
            </section>

        </div>
    @endsection
