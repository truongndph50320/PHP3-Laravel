@extends('admin.layouts.app')

@section('title', 'Sửa người dùng')

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
            <h2 class="text-2xl font-semibold text-gray-800">Sửa người dùng</h2>
            <a href="{{ route('users.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-gray-600 text-white text-sm rounded hover:bg-gray-700 shadow transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Quay lại
            </a>
        </div>

        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Tên người dùng -->
            <div>
                <label for="name" class="block text-base font-semibold text-gray-800">Tên người dùng:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}"
                       class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                @error('name')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-base font-semibold text-gray-800">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}"
                       class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                @error('email')
                    <p class="text-red-600 text-sm mt
                        -2">{{ $message }}</p>
                @enderror
            </div>
            <!-- Mật khẩu -->
            <div>
                <label for="password" class="block text-base font-semibold text-gray-800">Mật khẩu:</label>
                <input type="password" name="password" id="password"
                       class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                @error('password')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- Xác nhận mật khẩu -->
            <div>
                <label for="password_confirmation" class="block text-base font-semibold text-gray-800">Xác nhận mật khẩu:</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                @error('password_confirmation')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- Vai trò -->
            <div>
                <label for="role" class="block text-base font-semibold text-gray-800">Vai trò:</label>
                <select name="role" id="role"
                        class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Người dùng</option>
                </select>
                @error('role')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- Trạng thái -->
            <div>
                <label for="status" class="block text-base font-semibold text-gray-800">Trạng thái:</label>
                <select name="status" id="status"
                        class="mt-2 block w-full bg-gray-100 px-4 py-3 rounded border border-gray-300 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                    <option value="1" {{ $user->status ? 'selected' : '' }}>Hoạt động</option>
                    <option value="0" {{ !$user->status ? 'selected' : '' }}>Ngưng hoạt động</option>
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
                    Cập nhật người dùng
                </button>
            </div>
        </form>
    </div>

@endsection
