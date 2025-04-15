@extends('admin.layouts.app')

@section('title', 'Thêm sản phẩm')

@section('content')
    <!-- Thông báo -->
    @if (session('status'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 px-4 py-2 bg-red-100 text-red-700 rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Thêm sản phẩm</h2>
            <a href="{{ route('products.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-gray-600 text-white text-sm rounded hover:bg-gray-700 shadow transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Quay lại
            </a>
        </div>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Tên sản phẩm -->
            <div>
                <label for="name" class="block text-base font-semibold text-gray-800">Tên sản phẩm:</label>
                <input type="text" id="name" name="name"
                       class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" />
                @error('name')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Giá -->
            <div>
                <label for="price" class="block text-base font-semibold text-gray-800">Giá:</label>
                <input type="text" id="price" name="price"
                       class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" />
                @error('price')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Số lượng -->
            <div>
                <label for="quantity" class="block text-base font-semibold text-gray-800">Số lượng:</label>
                <input type="text" id="quantity" name="quantity"
                       class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" />
                @error('quantity')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Ảnh -->
            <div>
                <label for="image" class="block text-base font-semibold text-gray-800">Ảnh:</label>
                <input type="file" id="image" name="image"
                       class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" />
                @error('image')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Danh mục -->
            <div>
                <label for="category_id" class="block text-base font-semibold text-gray-800">Danh mục:</label>
                <select name="category_id" id="category_id"
                        class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mô tả -->
            <div>
                <label for="description" class="block text-base font-semibold text-gray-800">Mô tả:</label>
                <textarea name="description" id="description" rows="5"
                          class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 whitespace-pre-line"></textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Trạng thái -->
            <div>
                <label for="status" class="block text-base font-semibold text-gray-800">Trạng thái:</label>
                <select name="status" id="status"
                        class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                    <option value="1">Hoạt động</option>
                    <option value="0">Ngưng hoạt động</option>
                </select>
                @error('status')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nút thêm sản phẩm -->
            <div>
                <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700 shadow transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Thêm sản phẩm
                </button>
            </div>
        </form>
    </div>
@endsection
