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

    <!-- Danh sách món -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th class="text-center" scope="col">Tên Sản Phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th class="text-center" scope="col">Giá</th>
                <th class="text-center" scope="col">Danh Mục</th>
                <th scope="col" class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <!-- Lặp qua danh sách sản phẩm -->
            @foreach ($menus as $item)
                <tr>
                    <th style="line-height: 100px" class="text-center text-nowrap" scope="row">{{ $item->id }}</th>
                    <td style="line-height: 100px" class="text-center text-nowrap">{{ Str::limit($item->name, 30) }}</td>
                    <td> <img src="{{ asset('images/' . $item->image) }}" class="img-fluid rounded" alt="Không Có Ảnh"
                            width="150px" height="150px"></td>
                    <td style="line-height: 100px" class="text-center text-nowrap"> {{ number_format($item->price) }} VND
                    </td>
                    <td style="line-height: 100px" class="text-center text-nowrap">
                        <span>{{ $item->category->name ?? 'Không Có' }} </span>
                    </td>
                    <td style="line-height: 100px" class="text-center text-nowrap">
                        <a href="javascript:void(0);"
                            onclick="confirmEdit('{{ route('edit-menu', ['id' => Crypt::encrypt($item->id)]) }}')"
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <button class="btn btn-danger btn-sm"
                            onclick="confirmDelete('{{ route('destroy-menu', $item->id) }}')">
                            <i class="fas fa-trash-alt"></i> Xóa
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
