@extends('admin.layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
<h1>Quản lý đơn hàng</h1>
<a href="{{ route('admin.bills.create') }}" class="btn btn-primary">Thêm mới</a>
<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên đơn hàng</th>
            <th>Loại đơn hàng</th>
            <th>Người dùng</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Khuyến mãi</th>
            <th>Ngày mua</th>
            <th>Giá</th>
            <th>Giảm giá</th>
            <th>Phí vận chuyển</th>
            <th>QR Code</th>
            <th>Ghi chú</th>
            <th>Dự kiến giao hàng</th>
            <th>Ngày giao hàng</th>
            <th>Tên người nhận</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 0 @endphp
        @foreach($bills as $bill)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $bill->bill_name }}</td>
            <td>{{ $bill->bill_type }}</td>
            <td>{{ $bill->user_id }}</td>
            <td>{{ $bill->email }}</td>
            <td>{{ $bill->address }}</td>
            <td>{{ $bill->promotion_id }}</td>
            <td>{{ $bill->buy_date }}</td>
            <td>{{ $bill->cost }} VNĐ</td>
            <td>{{ $bill->discount_price }} VNĐ</td>
            <td>{{ $bill->shipping_fee }}</td>
            <td>{{ $bill->qr_code }}</td>
            <td>{{ $bill->note }}</td>
            <td>{{ $bill->estimated_delivery_date }}</td>
            <td>{{ $bill->delivery_date }}</td>
            <td>{{ $bill->recipient_name }}</td>
            <td><span class="label label-success">{{ $bill->status }}</span></td>
            <td style="display: flex;">
                <a href="{{ route('admin.bills.edit', $bill) }}" class="btn btn-warning m-1">sửa</a>
                <form action="{{ route('admin.bills.destroy', $bill) }}" method="POST" style="display:inline-block;" class="m-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection