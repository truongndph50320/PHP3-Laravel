@extends('admin.layouts.app')

@section('title', 'Danh sách người dùng')

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
            <h2 class="text-2xl font-semibold text-gray-800">Danh sách người dùng</h2>
            <a href="{{ route('users.create') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700 shadow transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Thêm người dùng
            </a>
        </div>

        <!-- Form tìm kiếm -->
        <form action="" method="get" class="mb-6">
            <div class="flex gap-2">
                <input type="text" name="search"
                       class="w-64 bg-gray-100 px-2 py-1 rounded border border-gray-300 text-gray-700 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150"
                       placeholder="Tìm kiếm người dùng" value="{{ request('search') }}">
                <button type="submit"
                        class="inline-flex items-center gap-1 px-2 py-1 bg-gray-600 text-white text-sm rounded hover:bg-gray-700 shadow transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Tìm kiếm
                </button>
            </div>
        </form>

        <!-- Bảng người dùng -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse
                text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Tên người dùng</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Vai trò</th>
                        <th scope="col" class="px-6 py-3">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $user->id }}</td>
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">{{ $user->role }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="text-indigo-600 hover:text-indigo-900">Sửa</a>
                                |
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>

@endsection
