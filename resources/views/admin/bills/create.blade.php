@extends('admin.layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
<h1>Thêm mới đơn hàng</h1>
<form action="{{ route('admin.bills.store') }}"
    method="POST">
    @csrf
    <div class="form-group">
        <label for="bill_name">Tên đơn hàng</label>
        <input type="text"
            name="bill_name"
            class="form-control"
            value="{{ isset($bill) ? $bill->bill_name : '' }}">
    </div>
    <div class="form-group">
        <label for="bill_type">Loại đơn hàng</label>
        <input type="text"
            name="bill_type"
            class="form-control"
            value="{{ isset($bill) ? $bill->bill_type : '' }}">
    </div>
    <div class="form-group">
        <label for="user_id">Người dùng</label>
        <input type="text"
            name="user_id"
            class="form-control"
            value="{{ isset($bill) ? $bill->user_id : '' }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email"
            name="email"
            class="form-control"
            value="{{ isset($bill) ? $bill->email : '' }}">
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text"
            name="address"
            class="form-control"
            value="{{ isset($bill) ? $bill->address : '' }}">
    </div>
    <div class="form-group">
        <label for="promotion_id">Khuyến mãi</label>
        <input type="text"
            name="promotion_id"
            class="form-control"
            value="{{ isset($bill) ? $bill->promotion_id : '' }}">
    </div>
    <div class="form-group">
        <label for="buy_date">Ngày mua</label>
        <input type="date"
            name="buy_date"
            class="form-control"
            value="{{ isset($bill) ? $bill->buy_date : '' }}">
    </div>
    <div class="form-group">
        <label for="cost">Giá</label>
        <input type="number"
            min="0"
            name="cost"
            class="form-control"
            value="{{ isset($bill) ? $bill->cost : '' }}">
    </div>
    <div class="form-group">
        <label for="discount_price">Giảm giá</label>
        <input type="number"
            min="0"
            name="discount_price"
            class="form-control"
            value="{{ isset($bill) ? $bill->discount_price : '' }}">
    </div>
    <div class="form-group">
        <label for="shipping_fee">Phí vận chuyển</label>
        <input type="number"
            min="0"
            name="shipping_fee"
            class="form-control"
            value="{{ isset($bill) ? $bill->shipping_fee : '' }}">
    </div>
    <div class="form-group">
        <label for="qr_code">QR code</label>
        <input type="text"
            name="qr_code"
            class="form-control"
            value="{{ isset($bill) ? $bill->qr_code : '' }}">
    </div>
    <div class="form-group">
        <label for="note">Ghi chú</label>
        <input type="text"
            name="note"
            class="form-control"
            value="{{ isset($bill) ? $bill->note : '' }}">
    </div>
    <div class="form-group">
        <label for="estimated_delivery_date">Dự kiến giao hàng</label>
        <input type="date"
            name="estimated_delivery_date"
            class="form-control"
            value="{{ isset($bill) ? $bill->estimated_delivery_date : '' }}">
    </div>
    <div class="form-group">
        <label for="delivery_date">Ngày giao</label>
        <input type="date"
            name="delivery_date"
            class="form-control"
            value="{{ isset($bill) ? $bill->delivery_date : '' }}">
    </div>
    <div class="form-group">
        <label for="recipient_name">Tên người nhận</label>
        <input type="text"
            name="recipient_name"
            class="form-control"
            value="{{ isset($bill) ? $bill->recipient_name : '' }}">
    </div>
    <div class="form-group">
        <label for="status">Trạng thái</label>
        <input type="text"
            name="status"
            class="form-control"
            value="{{ isset($bill) ? $bill->status : '' }}">
    </div>
    <button type="submit"
        class="btn btn-primary mt-2">Save</button>
</form>
@endsection