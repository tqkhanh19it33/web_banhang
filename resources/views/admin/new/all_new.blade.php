@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê tin tức
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
            </div>
            <div class="col-sm-4">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tiêu đề tin tức</th>
                        <th>Ảnh tin tức</th>
                        <th>Mô tả tin tức</th>
                        <th>Trạng thái</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($all_new as $key => $new)
                    <tr>
                        <td>{{ $new->new_title }}</td>
                        <td><img src="public/upload/new/{{ $new->new_image }}" height="120" width="120"></td>
                        <td>{{ $new->new_desc }}</td>
                        
                        <td><span class="text-ellipsis">

                                <?php
                                    if ($new->new_status == 1) {
                                         ?>
                                <a href="{{URL::to('/hide-new/'.$new->new_id)}}"><span
                                        class="fa-thumb-styling fa fa-eye-slash"> </span> </a>;
                                <?php
                                    } else {
                                         ?>
                                <a href="{{URL::to('/show-new/'.$new->new_id)}}"><span
                                        class="fa-thumb-styling fa fa-eye"> </span> </a>;
                                <?php
                                            }
                                    ?>

                            </span></td>
                        <td>
                            <a href="{{URL::to('/edit-new/'.$new->new_id)}}" class="active styling-edit" ui-toggle-class=""><i
                                    class="fa fa-pencil-square-o text-active"></i><i
                                
                            </a>
                            <a onclick="return confirm('Bạn có xóa tin tức này này?')" href="{{URL::to('/delete-new/'.$new->new_id)}}" class="active styling-edit" ui-toggle-class=""><i
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