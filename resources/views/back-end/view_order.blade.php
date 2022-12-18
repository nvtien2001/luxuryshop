<!DOCTYPE html>
<html lang="en">

<head>
    @include('back-end.common.css')
    <link href="http://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="dashboard">
                @include('back-end.common.menu')
                <div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Xem đơn hàng</p>
                        <div class="right__table">
                            <div class="right__tableWrapper">
                                <table id="myTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ Tên</th>
                                            <th>SĐT</th>
                                            <th>Stt sp</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá tiền</th>
                                            <th>Ngày</th>
                                            <th>Tổng tiền</th>
                                            <th>Địa chỉ</th>
                                            <th>Trạng thái</th>
                                            <th>Xác nhận</th>
                                            <th>Huỷ</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @for($i=0;$i < count($orders); $i++)
                                            <tr>
                                            <td data-label="STT" rowspan="{{count($order_prod[$i]) + 1}}">{{$i + 1}}</td>
                                            <td data-label="Tên" rowspan="{{count($order_prod[$i]) + 1}}">{{$orders[$i]->customer_name}}</td>
                                            <td data-label="phone" rowspan="{{count($order_prod[$i]) + 1}}">{{$orders[$i]->customer_phone}}</td>
                                            </tr>
                                            <tr>
                                                <td data-label="Stt sp">1</td>
                                                <td data-label="Tên sản phẩm">{{$order_prod[$i][0]->product_title}}</td>
                                                <td data-label="Số lượng">{{$order_prod[$i][0]->quantity}}</td>
                                                <td data-label="Giá tiền">{{$order_prod[$i][0]->product_price}}</td>

                                                <td data-label="Ngày" rowspan="{{count($order_prod[$i]) + 1}}">{{$orders[$i]->created_date}}</td>
                                                <td data-label="Tổng" rowspan="{{count($order_prod[$i]) + 1}}">{{$orders[$i]->total}}</td>
                                                <td data-label="Địa chỉ" rowspan="{{count($order_prod[$i]) + 1}}">{{$orders[$i]->customer_address}}</td>

                                                <td data-label="Trạng thái" rowspan="{{count($order_prod[$i]) + 1}}">
                                                    <span class="badge badge-primary">{{$orders[$i]->status}}</span>
                                                </td>

                                                <td data-label="Xác nhận" class="right__confirm" rowspan="{{count($order_prod[$i]) + 1}}" id="confirm-${order.id }">
                                                    <a href="javascript:void(0)" onclick="shop1.is_pay(${order.id})" class="right__iconTable"><img src="/assets/icon-check.svg" alt=""></a>

                                                </td>

                                                <td data-label="Xoá" class="right__iconTable" rowspan="{{count($order_prod[$i]) + 1}}" id="cancel-${order.id }">
                                                    <a href="javascript:void(0)" onclick="shop3.is_cancel(${order.id})"><img src="/assets/icon-trash-black.svg" alt=""></a>

                                                </td>
                                            </tr>
                                            @for($j=1;$j< count($order_prod[$i]); $j++) <tr>
                                                <td data-label="Stt sp">{{$j + 1}}</td>
                                                <td data-label="Tên sản phẩm">{{$order_prod[$i][$j]->product_title}}</td>
                                                <td data-label="Số lượng">{{$order_prod[$i][1]->quantity}}</td>
                                                <td data-label="Giá tiền">{{$order_prod[$i][1]->product_price}}</td>
                                                </tr>
                                                @endfor
                                                @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('back-end.common.js')
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
</body>

</html>
