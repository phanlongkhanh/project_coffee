<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @yield('title')
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{asset('css/adminlayout/index.css')}}"> 
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><b style="margin-left: 50px">Admin Panel</b></a>

        <!-- Thông tin người dùng -->
        <div class="d-flex align-items-center">
            {{-- <img src="{{ asset('images/' . (auth()->user()->image ?? 'profile.jpg')) }}" class="avatar me-2" alt="Avatar"> --}}
            <span class="me-3 ml-5">{{ auth()->user()->name ?? 'Khách' }}</span>
            <a href="{{route('logout')}}" class="logout-btn">Đăng Xuất</a>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar">
    <a href="{{route('index-dashboard')}}">🏠 Dashboard</a>
    <a href="">☕ Quản lý đơn hàng</a>
    <a href="{{route('index-menu')}}">📋 Quản lý Menu</a>
    <a href="#">👥 Quản lý Nhân Viên</a>
    <a href="#">🏪 Quản lý Kho Hàng</a>
    <a href="#">👤 Quản lý Khách Hàng</a>
    <a href="#">📊 Quản lý Doanh Thu</a>
    <a href="#">🎫 Chương Trình Khuyến Mãi</a>
    <a href="#">💳 Thanh Toán</a>
</div>

<!-- Nội dung chính -->
<div class="content">
  @yield('content')
</div>

</body>
</html>
