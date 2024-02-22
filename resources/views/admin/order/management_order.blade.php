@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê đơn hàng
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
                        <th>Tên khách hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Số lượng<th>
                        <th>Tổng tiền</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ghi chú</th>
                        <th>Phương thức thanh toán</th>
                        <th>Tình trạng</th>    
                        <th style="width:30px;"></th>                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_order as $key => $order)
                    <tr> 
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ number_format($order->product_price) }}</td>
                        <td>{{ $order->product_quantity }}</td>
                        <td></td>
                        <?php
                            $total = $order->product_price * $order->product_quantity;
                        ?>
                        <td>{{ number_format($total) }}</td>
                        <th>{{ $order->shipping_address }}</th>
                        <th>{{ $order->shipping_phone}}</th>
                        <th>{{ $order->shipping_note}}</th>
                        <th>{{ $order->payment_method}}</th>
                        <td>{{ $order->order_status }}</td>     
                        <td>
                            <a onclick="return confirm('Bạn có xóa đơn hàng này?')" href="{{URL::to('/delete-order/'.$order->customer_id)}}" class="active styling-edit" ui-toggle-class=""><i
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