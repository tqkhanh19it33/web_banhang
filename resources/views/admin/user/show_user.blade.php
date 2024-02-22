@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê danh sách người dùng
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
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Password token<th>  
                        <th style="width:30px;"></th>                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_user as $key => $user)
                    <tr> 
                        <td>{{ $user->customer_name }}</td>
                        <td>{{ $user->customer_email }}</td>
                        <td>{{ $user->customer_phone }}</td>
                        <td>{{ $user->customer_password }}</td>
                        <td>
                            <a onclick="return confirm('Bạn có xóa người dùng này?')" href="{{URL::to('/delete-user/'.$user->customer_id)}}" class="active styling-edit" ui-toggle-class=""><i
                                    class="fa fa-times text-danger text"></i>
                            </a>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection