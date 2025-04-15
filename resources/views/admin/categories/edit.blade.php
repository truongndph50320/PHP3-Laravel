@extends('admin.layouts.app')

@section('title','Sửa danh mục')

@section('content')
    @if (session('status'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded shadow">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 px-4 py-3 bg-red-100 text-red-800 rounded shadow">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-lg w-full">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Sửa danh mục</h2>
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

        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-6 w-full">
            @csrf
            @method('PUT')

            <!-- Tên danh mục -->
            <div class="w-full">
                <label for="name" class="block text-base font-semibold text-gray-800">Tên danh mục:</label>
                <input type="text" id="name" name="name"
                       value="{{ old('name', $category->name) }}"
                       class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" />
                @error('name')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Trạng thái -->
            <div class="w-full">
                <label for="status" class="block text-base font-semibold text-gray-800">Trạng thái:</label>
                <select id="status" name="status"
                        class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                    <option value="1" {{ $category->status ? 'selected' : '' }}>Hoạt động</option>
                    <option value="0" {{ !$category->status ? 'selected' : '' }}>Ngưng hoạt động</option>
                </select>
                @error('status')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end">
                <button type="submit"
                        class="px-5 py-3 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700 shadow transition duration-150">
                    Cập nhật danh mục
                </button>
            </div>
        </form>
    </div>
@endsection
