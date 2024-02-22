@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật thương hiệu
            </header>
            <div class="panel-body">
                @foreach($edit_brand_product as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{ URL::to('/update-brand-product/'.$edit_value->brand_id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="text">Tên thương hiệu</label>
                            <input type="text" name="brand_name" value="{{$edit_value->brand_name}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Nhập tên thương hiệu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea style="resize: none" rows="5" name="brand_describe"  class="form-control"
                                id="ckeditor3">{{$edit_value->brand_describe}}</textarea>
                        </div>

                        <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
                    @endforeach
            </div>
        </section>

    </div>
    @endsection