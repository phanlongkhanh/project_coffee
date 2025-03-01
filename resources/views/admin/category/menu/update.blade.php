@extends('layout.admin')

@section('title', 'Cập Nhật Danh Mục')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded">
                <div style="background-color: rgb(30, 71, 107)" class="card-header text-white text-center">
                    <h3 class="mb-0">Cập Nhật Danh Mục</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('update-category-menu', ['id' => $category_menus->id]) }}" method="POST">
                        @csrf
                        @method('PUT') 
                        
                        <input type="hidden" name="id" value="{{ $category_menus->id }}">

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Tên danh mục:</label>
                            <input type="text" class="form-control border-primary" id="name" name="name" 
                                value="{{ old('name', $category_menus->name) }}" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" style="background-color: rgb(30, 71, 107)" class="btn btn-primary btn-lg">
                                Cập Nhật
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{route('index-category-menu')}}" class="btn btn-secondary">⬅ Quay lại danh sách</a>
            </div>
        </div>
    </div>
</div>
@endsection
