@extends('layout.use')

@section('title', 'Trang Chủ - Quán Nước Online')

@section('content')
<!-- Banner chào mừng -->
<div class="text-center mt-5 py-5" style="background: linear-gradient(to right, #ffcc80, #ffb74d); border-radius: 15px;">
    <h1 class="fw-bold text-white animate__animated animate__fadeInDown">Chào mừng đến với Quán Nước Chill-Guy 🍹</h1>
    <p class="text-light animate__animated animate__fadeInUp">Thưởng thức những ly nước tươi mát nhất tại cửa hàng của chúng tôi!</p>
    <a href="/menu" class="btn btn-custom btn-lg shadow-lg animate__animated animate__pulse animate__infinite">Xem Thực Đơn</a>
</div>

<!-- Danh sách sản phẩm -->
<div class="container mt-5">
    <h2 class="text-center fw-bold mb-4">🌟 Món Hot Hôm Nay 🌟</h2>
    <hr>
    <div class="row">
        @foreach ($products as $item)
            <div class="col-md-4" data-aos="zoom-in">
                <div class="card shadow-lg border-0" style="border-radius: 15px; overflow: hidden;">
                    <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">{{ $item->name }}</h5>
                        <p class="card-text text-danger fw-bold fs-5">{{ number_format($item->price) }}đ</p>
                        <a href="#" class="btn btn-success btn-lg w-100 shadow">Mua Ngay</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
