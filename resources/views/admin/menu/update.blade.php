@extends('layout.admin')

@section('title', 'Cập Nhật Món - Quán Cà Phê')

@section('content')

    <style>
        .card {
            max-width: 600px;
            margin: auto;
        }
    </style>

    <h2 class="mb-4">✏️ Cập Nhật Món</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

 

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: "{{ session('success') }}",
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: "{{ session('error') }}",
            });
        </script>
    @endif

    <div class="card p-4">
        <form action="{{ route('update-menu', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Tên Món</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $menu->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="id_category_menu" class="form-label">Danh Mục</label>
                <select class="form-control" id="id_category_menu" name="id_category_menu" required>
                    <option value="">-- Chọn danh mục --</option>
                    @foreach ($categorymenus as $category)
                        <option value="{{ $category->id }}"
                            {{ $menu->id_category_menu == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá (VNĐ)</label>
                <input type="number" class="form-control" id="price" name="price"
                    value="{{ old('price', $menu->price) }}" required min="1">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Ảnh Món</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($menu->image)
                    <div class="mt-2">
                        <img src="{{ asset('images/' . $menu->image) }}" alt="Ảnh món" class="img-fluid" width="150">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
            <a href="{{ route('index-menu') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>

@endsection
