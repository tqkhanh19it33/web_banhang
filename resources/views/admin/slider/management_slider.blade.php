@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê slider
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
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Slider h1</th>
                        <th>Slider h2</th>
                        <th>Slider p</th>
                        <th>Slider hình ảnh</th>
                        <th>Trạng thái</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_slider as $key => $slider)
                    <tr>
                        <td>{{ $slider->slider_h1 }}</td>
                        <td>{{ $slider->slider_h2 }}</td>
                        <td>{{ $slider->slider_p }}</td>
                        <td><img src="public/upload/slider/{{ $slider->slider_image }}" height="120" width="120"></td>
                        <td><span class="text-ellipsis">

                                <?php
                                    if ($slider->slider_status == 1) {
                                         ?>
                                <a href="{{URL::to('/hide-slider/'.$slider->slider_id)}}"><span
                                        class="fa-thumb-styling fa fa-eye-slash"> </span> </a>;
                                <?php
                                    } else {
                                         ?>
                                <a href="{{URL::to('/show-slider/'.$slider->slider_id)}}"><span
                                        class="fa-thumb-styling fa fa-eye"> </span> </a>;
                                <?php
                                            }
                                    ?>

                            </span></td>
                        <td>
                            <a href="{{URL::to('/edit-slider/'.$slider->slider_id)}}" class="active styling-edit" ui-toggle-class=""><i
                                    class="fa fa-pencil-square-o text-active"></i><i
                                
                            </a>
                            <a onclick="return confirm('Bạn có xóa slider này?')" href="{{URL::to('/delete-slider/'.$slider->slider_id)}}" class="active styling-edit" ui-toggle-class=""><i
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