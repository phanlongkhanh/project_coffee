@extends('layout.admin')

@section('title', 'Dashboard - Quản Lý Cà Phê')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="{{asset('css/dashboard/index.css   ')}}">

<!-- Thống kê nhanh -->
<div class="row">
    <div class="col-md-3">
        <div class="stat-card">
            <h5>💰 Doanh Thu Hôm Nay</h5>
            <h3>5,000,000 VNĐ</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <h5>📦 Đơn Hàng Hôm Nay</h5>
            <h3>120</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <h5>👥 Khách Hàng</h5>
            <h3>980</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <h5>🍵 Món Bán Chạy</h5>
            <h3>Trà Sữa Trân Châu</h3>
        </div>
    </div>
</div>

<!-- Biểu đồ doanh thu -->
<div class="mt-5">
    <h4>📈 Doanh Thu Tháng Này</h4>
    <canvas id="revenueChart"></canvas>
</div>

<!-- Danh sách đơn hàng gần đây -->
<div class="mt-5">
    <h4>📝 Đơn Hàng Mới Nhất</h4>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Khách Hàng</th>
                <th>Món Đã Đặt</th>
                <th>Thành Tiền</th>
                <th>Trạng Thái</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Phan Long Khánh </td>
                <td>Cà Phê Sữa</td>
                <td>45,000 VNĐ</td>
                <td><span class="badge bg-success">Hoàn Thành</span></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Thạch Thị Diễm Trang</td>
                <td>Trà Xanh</td>
                <td>55,000 VNĐ</td>
                <td><span class="badge bg-warning">Đang xử lý</span></td>
            </tr>
        </tbody>
    </table>
</div>

<script src="{{asset('jss/dashboard/index.js')}}"></script>
@endsection
