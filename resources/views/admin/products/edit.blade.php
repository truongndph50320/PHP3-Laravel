@extends('admin.layouts.app')

@section('title', 'Sửa sản phẩm')

@section('content')
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
            <h2 class="text-2xl font-semibold text-gray-800">Sửa sản phẩm</h2>
            <a href="{{ route('products.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-gray-600 text-white text-sm rounded hover:bg-gray-700 shadow transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Quay lại
            </a>
        </div>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Tên sản phẩm -->
            <div>
                <label for="name" class="block text-base font-semibold text-gray-800">Tên sản phẩm:</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}"
                       class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                @error('name')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Giá -->
            <div>
                <label for="price" class="block text-base font-semibold text-gray-800">Giá:</label>
                <input type="text" name="price" id="price" value="{{ $product->price }}"
                       class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                @error('price')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Số lượng -->
            <div>
                <label for="quantity" class="block text-base font-semibold text-gray-800">Số lượng:</label>
                <input type="text" name="quantity" id="quantity" value="{{ $product->quantity }}"
                       class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                @error('quantity')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Ảnh -->
            <div>
                <label for="image" class="block text-base font-semibold text-gray-800">Ảnh:</label>
                <input type="file" name="image" id="image"
                       class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                @if ($product->image)
                    <img src="{{ Storage::url($product->image) }}" alt="Ảnh sản phẩm"
                         class="mt-3 w-32 h-auto rounded-md border shadow-sm">
                @else
                    <p class="mt-2 text-gray-500 italic">Không có ảnh</p>
                @endif
                @error('image')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Danh mục -->
            <div>
                <label páfor="category_id" class="block text-base font-semibold text-gray-800">Danh mục:</label>
                <select name="category_id" id="category_id"
                        class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" {{ $product->category_id == $cate->id ? 'selected' : '' }}>
                            {{ $cate->name }}
                        </option>
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
                          class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 whitespace-pre-line">{{ $product->description }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Trạng thái -->
            <div>
                <label for="status" class="block text-base font-semibold text-gray-800">Trạng thái:</label>
                <select name="status" id="status"
                        class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Ngưng hoạt động</option>
                </select>
                @error('status')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nút cập nhật -->
            <div>
                <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700 shadow transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Cập nhật
                </button>
            </div>
        </form>
    </div>
@endsection
