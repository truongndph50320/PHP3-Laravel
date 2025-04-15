@extends('client.layouts.app')

@section('title', 'Trang chủ')

@section('content')
<div class="container mx-auto px-4 py-10">

    {{-- Tìm kiếm và lọc --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        {{-- Form tìm kiếm --}}
        <form method="GET" action="{{ route('client.products.index') }}" class="bg-white p-6 rounded-xl shadow-md space-y-4">
            <h2 class="text-lg font-semibold text-gray-700">Tìm kiếm</h2>
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Nhập tên sản phẩm..."
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
            @if(request('price'))
                <input type="hidden" name="price" value="{{ request('price') }}">
            @endif
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Tìm kiếm
            </button>
        </form>

        {{-- Form lọc sản phẩm --}}
        <form method="GET" action="{{ route('client.products.index') }}" class="bg-white p-6 rounded-xl shadow-md space-y-4">
            <h2 class="text-lg font-semibold text-gray-700">Lọc theo giá</h2>
            <select name="price" id="price"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 p-3">
                <option value="">Tất cả giá</option>
                <option value="500000,1000000" {{ request('price') == '500000,1000000' ? 'selected' : '' }}>500,000 - 1,000,000 đ</option>
                <option value="1000000,2000000" {{ request('price') == '1000000,2000000' ? 'selected' : '' }}>1,000,000 - 2,000,000 đ</option>
                <option value="2000000,5000000" {{ request('price') == '2000000,5000000' ? 'selected' : '' }}>2,000,000 - 5,000,000 đ</option>
                <option value="5000000,999999999" {{ request('price') == '5000000,999999999' ? 'selected' : '' }}>Trên 5,000,000 đ</option>
            </select>

            @if(request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
            @endif

            <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                Lọc sản phẩm
            </button>
        </form>

    </div>

    {{-- Top 5 sản phẩm mới --}}
    @if($latestProducts->isNotEmpty())
        <div class="mb-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Sản phẩm mới nhất</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($latestProducts as $latestProduct)
                    <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition-all">
                        <img src="{{ asset('storage/' . $latestProduct->image) }}" alt="{{ $latestProduct->name }}"
                             class="w-full h-36 object-cover rounded-lg mb-3">
                        <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $latestProduct->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $latestProduct->category->name ?? 'Chưa phân loại' }}</p>
                        <p class="text-red-500 font-semibold mt-1">{{ number_format($latestProduct->price, 0, ',', '.') }} đ</p>
                        <a href="{{ route('client.products.show', $latestProduct->id) }}"
                           class="text-blue-500 text-sm hover:underline mt-2 inline-block">Xem chi tiết</a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Danh sách sản phẩm --}}
    <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Danh sách sản phẩm</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse($products as $product)
            <div class="bg-white p-4 rounded-xl shadow-md hover:shadow-xl transition-all">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                     class="w-full h-48 object-cover rounded-lg mb-4">
                <h2 class="text-xl font-semibold text-gray-800 truncate">{{ $product->name }}</h2>
                <p class="text-gray-500 text-sm">{{ $product->category->name ?? 'Chưa phân loại' }}</p>
                <p class="text-red-500 font-semibold mt-2">{{ number_format($product->price, 0, ',', '.') }} đ</p>
                <a href="{{ route('client.products.show', $product->id) }}"
                   class="text-blue-500 mt-3 inline-block hover:underline text-sm">
                    Xem chi tiết
                </a>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">Không tìm thấy sản phẩm nào.</p>
        @endforelse
    </div>

    {{-- Phân trang --}}
    @if($products->hasPages())
        <div class="mt-10">
            {{ $products->appends(request()->query())->links() }}
        </div>
    @endif
</div>
@endsection
