<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang Chủ')</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- AOS (Hiệu ứng Scroll) -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('css/homepage/index.css') }}">




</head>

<body>

    <!-- Thanh điều hướng -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">☕ Quán Nước Chill-Guy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Trang Chủ</a></li>

                    <!-- Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Thực Đơn
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/menu">Tất Cả Sản Phẩm</a></li>
                            <li><a class="dropdown-item" href="#">Cà Phê</a></li>
                            <li><a class="dropdown-item" href="#">Trà Sữa</a></li>
                            <li><a class="dropdown-item" href="#">Nước Ép</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="/contact">Liên Hệ</a></li>

                    <!-- Nút Giỏ Hàng -->
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-cart"></i> Giỏ Hàng</a>
                    </li>
                    <!-- Nút Đăng Nhập -->
                    <li class="nav-item">
                        @if ($users)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <b style="margin-left: 10px ; magrin-right:20px ;"
                                class="text-white">{{ $users->name }}</b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('index-profile')}}">Thông Tin Cá Nhân</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng Xuất</a></li>
                        </ul>
                    </li>
                @else
                    <a class="btn btn-custom ms-3" href="{{ route('index-login') }}">Đăng Nhập</a>
                    @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Nội dung chính -->
    <div class="container mt-5 pt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer">
        &copy; 2025 Quán Nước Online | Thiết Kế Với ❤️ Bởi Phan Long Khánh & Diễm Trang
    </footer>

    <!-- Bootstrap & AOS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
