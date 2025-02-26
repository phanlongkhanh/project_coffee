@extends('layout.admin')

@section('title')
<title>Quản Lý Menu - Quán Cà Phê</title>
@section('content')
    <link rel="stylesheet" href="{{ asset('css/menu/index.css') }}">
    <script src="{{ asset('jss/menu/index.js') }}"></script>
    
    <h2 class="mb-4 text-center">📜 Quản Lý Menu</h2>

    <!-- Nút thêm món -->
    <div class="text-center mb-4">
        <a href="{{ route('create-menu') }}" class="btn btn-primary btn-lg">
            ➕ Thêm Món
        </a>
        <a href="{{ route('create-menu') }}" class="btn btn-primary btn-lg">
            📋 Danh Mục
        </a>
    </div>

    <hr>

    <!-- Danh sách món -->
    <div class="row">
        @foreach ($menus as $item)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="menu-card">
                <img src="{{ asset('images/' . $item->image) }}" alt="Tên món">
                <h5 class="mt-2">{{$item->name}}</h5>
                <h6 class="text-success">{{ number_format($item->price, 0, ',', '.') }} VNĐ</h6>
                <!-- Nút Sửa & Xóa -->
                <div class="text-center mt-3">
                    <button class="btn btn-warning btn-sm" onclick="confirmEdit('#')">
                        <i class="fas fa-edit"></i> Sửa
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="confirmDelete('#')">
                        <i class="fas fa-trash-alt"></i> Xóa
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
