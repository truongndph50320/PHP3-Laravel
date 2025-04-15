@extends('admin.layouts.app')

@section('title', 'Danh sách sản phẩm')

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

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Danh sách sản phẩm</h2>
            <a href="{{ route('products.create') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700 shadow transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Thêm sản phẩm
            </a>
        </div>

        <!-- Form tìm kiếm -->
        <form action="" method="get" class="mb-6">
            <div class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                       class="w-64 bg-gray-100 px-2 py-1 rounded border border-gray-300 text-gray-700 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150"
                       placeholder="Tìm sản phẩm">
                <button type="submit"
                        class="inline-flex items-center gap-1 px-2 py-1 bg-gray-600 text-white text-sm rounded hover:bg-gray-700 shadow transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Tìm kiếm
                </button>
            </div>
        </form>

        <!-- Bảng sản phẩm -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-800 text-sm font-semibold">
                        <th class="px-4 py-3 text-left border-b border-gray-200">ID</th>
                        <th class="px-4 py-3 text-left border-b border-gray-200">Tên sản phẩm</th>
                        <th class="px-4 py-3 text-left border-b border-gray-200">Ảnh</th>
                        <th class="px-4 py-3 text-left border-b border-gray-200">Danh mục</th>
                        <th class="px-4 py-3 text-left border-b border-gray-200">Trạng thái</th>
                        <th class="px-4 py-3 text-left border-b border-gray-200">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="text-gray-700 hover:bg-gray-50 transition duration-150">
                            <td class="px-4 py-3 border-b border-gray-200">{{ $product->id }}</td>
                            <td class="px-4 py-3 border-b border-gray-200">{{ $product->name }}</td>
                            <td class="px-4 py-3 border-b border-gray-200">
                                <img src="{{ Storage::url($product->image) }}"
                                     class="w-16 h-10 object-cover rounded border border-gray-200 shadow-sm hover:scale-105 transition duration-300">
                            </td>
                            <td class="px-4 py-3 border-b border-gray-200">{{ $product->category->name ?? 'Không xác định' }}</td>
                            <td class="px-4 py-3 border-b border-gray-200">
                                <span class="inline-block px-3 py-1 text-sm rounded-full {{ $product->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $product->status ? 'Hoạt động' : 'Ngưng hoạt động' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 border-b border-gray-200 flex gap-2">
                                <a href="{{ route('products.show', $product->id) }}"
                                   class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 shadow transition duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Xem
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-600 text-white text-sm rounded hover:bg-yellow-700 shadow transition duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-2.828 0l-1.414-1.414a2 2 0 010-2.828L14.586 4.586a2 2 0 012.828 0z" />
                                    </svg>
                                    Sửa
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white text-sm rounded hover:bg-red-700 shadow transition duration-150" onclick="return confirm('Bạn có chắc chắn xóa không?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4M9 7v12m6-12v12" />
                                        </svg>
                                        Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Phân trang -->
        <div class="mt-6">
            {{ $products->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
