@extends('client.layouts.app')

@section('title', 'Sản phẩm - ' . $product->name)

@section('content')
<div class="container mx-auto px-4 py-10">

    {{-- Thông tin chi tiết sản phẩm --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-white p-6 rounded-xl shadow-md">
        {{-- Ảnh sản phẩm --}}
        <div>
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                 class="w-full h-auto object-cover rounded-lg shadow-md">
        </div>

        {{-- Thông tin --}}
        <div class="space-y-4">
            <h1 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h1>
            <p class="text-gray-500 text-sm">Danh mục:
                <span class="font-medium text-gray-700">
                    {{ $product->category->name ?? 'Chưa phân loại' }}
                </span>
            </p>
            <p class="text-2xl text-red-600 font-semibold">
                {{ number_format($product->price, 0, ',', '.') }} đ
            </p>
            <p class="text-gray-700 leading-relaxed">
                {{ $product->description ?? 'Không có mô tả cho sản phẩm này.' }}
            </p>

            {{-- Nút mua hoặc thêm vào giỏ (nếu có) --}}
            {{-- <button
                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                Thêm vào giỏ hàng
            </button>@if(Auth::check())
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                    Thêm vào giỏ hàng
                </button>
            </form>
        @else
            <a href="{{ route('login') }}"
               class="bg-gray-400 text-white px-6 py-3 rounded-lg hover:bg-gray-500 transition font-semibold inline-block">
                Đăng nhập để thêm vào giỏ
            </a>
        @endif --}}

        </div>
    </div>

    {{-- Sản phẩm liên quan --}}
    {{-- Sản phẩm liên quan --}}
@if($relatedProducts->isNotEmpty())
<div class="mt-12">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Sản phẩm cùng danh mục</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
        @foreach($relatedProducts as $related)
            <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition-all">
                <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}"
                     class="w-full h-40 object-cover rounded-lg mb-3">
                <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $related->name }}</h3>
                <p class="text-red-500 font-semibold mt-1">
                    {{ number_format($related->price, 0, ',', '.') }} đ
                </p>
                <a href="{{ route('client.products.show', $related->id) }}"
                   class="text-blue-500 text-sm hover:underline mt-2 inline-block">Xem chi tiết</a>
            </div>
        @endforeach
    </div>
</div>
@endif

</div>
@endsection
