@extends('layout.admin')

@section('title', 'Thêm Món Mới - Quán Cà Phê')

@section('content')

    <!-- Custom CSS -->
    <style>
        .card {
            max-width: 600px;
            margin: auto;
        }
    </style>

    <h2 class="mb-4">➕ Thêm Món Mới</h2>

    <!-- Hiển thị lỗi nhập liệu -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form thêm món -->
    <div class="card p-4">
        <form action="{{ route('store-menu') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Tên Món</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="id_category_menu" class="form-label">Danh Mục</label>
                <select class="form-control" id="id_category_menu" name="id_category_menu" required>
                    <option value="">-- Chọn danh mục --</option>
                    @foreach ($categorys as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="mb-3">
                <label for="amount" class="form-label">Số Lượng</label>
                <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount') }}"
                    required min="1">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá (VNĐ)</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}"
                    required min="1">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Ảnh Món</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Lưu Món</button>
            <a href="{{ route('index-menu') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>

@endsection
