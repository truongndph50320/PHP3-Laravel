@extends('admin.layouts.app')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Chi tiết sản phẩm</h2>
        </div>

        <div class="space-y-6">
            <!-- Tên sản phẩm -->
            <div>
                <label class="block text-base font-semibold text-gray-800">Tên sản phẩm:</label>
                <p class="mt-2 bg-gray-100 px-4 py-3 rounded border text-gray-700">{{ $product->name }}</p>
            </div>

            <!-- Giá -->
            <div>
                <label class="block text-base font-semibold text-gray-800">Giá:</label>
                <p class="mt-2 bg-gray-100 px-4 py-3 rounded border text-gray-700">
                    {{ number_format($product->price, 0, ',', '.') }} VND
                </p>
            </div>

            <!-- Số lượng -->
            <div>
                <label class="block text-base font-semibold text-gray-800">Số lượng:</label>
                <p class="mt-2 bg-gray-100 px-4 py-3 rounded border text-gray-700">{{ $product->quantity }}</p>
            </div>

            <!-- Ảnh -->
            <div>
                <label class="block text-base font-semibold text-gray-800">Ảnh:</label>
                @if ($product->image)
                    <img src="{{ Storage::url($product->image) }}" alt="Ảnh sản phẩm"
                        class="mt-3 w-32 h-auto rounded-md border shadow-sm">
                @else
                    <p class="mt-2 text-gray-500 italic">Không có ảnh</p>
                @endif
            </div>

            <!-- Danh mục -->
            <div>
                <label class="block text-base font-semibold text-gray-800">Danh mục:</label>
                <p class="mt-2 bg-gray-100 px-4 py-3 rounded border text-gray-700">
                    {{ $product->category->name ?? 'Không xác định' }}
                </p>
            </div>

            <!-- Mô tả -->
            <div>
                <label class="block text-base font-semibold text-gray-800">Mô tả:</label>
                <p class="mt-2 bg-gray-100 px-4 py-3 rounded border text-gray-700 whitespace-pre-line">
                    {{ $product->description }}
                </p>
            </div>

            <!-- Trạng thái -->
            <div>
                <label class="block text-base font-semibold text-gray-800">Trạng thái: <p
                        class="mt-2 inline-block px-3 py-1 text-sm rounded-full
                    {{ $product->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $product->status ? 'Hoạt động' : 'Ngưng hoạt động' }}
                    </p></label>
            </div>

            <a href="{{ route('products.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-gray-600 text-white text-sm rounded hover:bg-gray-700 shadow transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Quay lại
            </a>
        </div>
    </div>
@endsection
