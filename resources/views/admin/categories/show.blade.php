@extends('admin.layouts.app')

@section('title', 'Chi tiết danh mục')

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
            <h2 class="text-2xl font-semibold text-gray-800">Chi tiết danh mục</h2>
            <a href="{{ route('categories.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-gray-600 text-white text-sm rounded hover:bg-gray-700 shadow transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 19l-7-7 7-7"/>
                </svg>
                Quay lại
            </a>
        </div>

        <div class="space-y-6">
            <!-- Tên danh mục -->
            <div>
                <label class="block text-base font-semibold text-gray-800">Tên danh mục:</label>
                <p class="mt-2 bg-gray-100 px-4 py-3 rounded border text-gray-700">{{ $category->name }}</p>
            </div>

            <!-- Trạng thái -->
            <div>
                <label class="block text-base font-semibold text-gray-800">Trạng thái:</label>
                <p class="mt-2 bg-gray-100 px-4 py-3 rounded border text-gray-700">
                    {{ $category->status ? 'Hoạt động' : 'Ngưng hoạt động' }}
                </p>
            </div>
        </div>
        <div class="flex items-center justify-end mt-6">
            <a href="{{ route('categories.edit', $category->id) }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 shadow transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 19l-7-7 7-7"/>
                </svg>
                Sửa danh mục
            </a>
        </div>
    </div>
@endsection
