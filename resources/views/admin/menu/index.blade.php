@extends('layout.admin')

@section('title')
    <title>Quản Lý Menu - Quán Cà Phê</title>
@section('content')
    <link rel="stylesheet" href="{{ asset('css/menu/index.css') }}">

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
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Thuộc Tính</th>
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
                            width="100px" height="200px"></td>
                    <td style="line-height: 100px" class="text-center text-nowrap"> {{ number_format($item->price) }} VND
                    </td>
                    <td style="line-height: 100px" class="text-center text-nowrap">
                        <span>{{ $item->category->name ?? 'Không Có' }} </span>
                        <span>-</span>
                        <span>{{ $item->productType->name ?? 'Không Có' }}</span>
                    </td>


                    <td style="line-height: 100px" class="text-center text-nowrap">
                        <button class="btn btn-warning btn-sm" onclick="confirmEdit('#')">
                            <i class="fas fa-edit"></i> Sửa
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete('#')">
                            <i class="fas fa-trash-alt"></i> Xóa
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



@endsection
