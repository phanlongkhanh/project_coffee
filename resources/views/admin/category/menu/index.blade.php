@extends('layout.admin')

@section('title', 'Danh sách danh mục')
<script src="{{ asset('jss/action/index.js') }}"></script>

@section('content')
    <div class="container mt-4">
        <h2 class="text-center"><b>Danh Sách Danh Mục</b></h2>
        <hr>

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('create-category-menu') }}" class="btn btn-success">+ Thêm Danh Mục</a>
        </div>
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
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên Danh Mục</th>
                    <th class="text-center">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category_menus as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td class="text-center text-nowrap">
                            <a href="javascript:void(0);"
                                onclick="confirmEdit('{{ route('edit-category-menu', ['id' => Crypt::encrypt($item->id)]) }}')"
                                class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <button class="btn btn-danger btn-sm"
                                onclick="confirmDelete('{{ route('destroy-category-menu', $item->id) }}')">
                                <i class="fas fa-trash-alt"></i> Xóa
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
