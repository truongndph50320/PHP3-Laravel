@extends('admin.layouts.app')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('title','Thêm danh mục')
@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg w-full">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Thêm danh mục</h2>
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

        <form action="{{ route('categories.store') }}" method="POST" class="space-y-6 w-full">
            @csrf

            <!-- Tên danh mục -->
            <div class="w-full">
                <label for="name" class="block text-base font-semibold text-gray-800">Tên danh mục:</label>
                <input type="text" id="name" name="name"
                       value="{{ old('name') }}"
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
                    <option value="1">Hoạt động</option>
                    <option value="0">Ngưng hoạt động</option>
                </select>
                @error('status')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-end">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 shadow transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                    Thêm danh mục
                </button>
            </div>
        </form>
    </div>
    

@endsection
