<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white shadow-md hidden md:block">
            <div class="p-6 border-b border-gray-700">
                <h1 class="text-xl font-bold text-white">Trang quản trị</h1>
            </div>
            <nav class="mt-4">
                <a href="{{ route('categories.index') }}" class="block py-3 px-6 hover:bg-gray-700">
                    📁 Quản lý danh mục
                </a>
                <a href="{{ route('products.index') }}" class="block py-3 px-6 hover:bg-gray-700">
                    📦 Quản lý sản phẩm
                </a>
                <a href="{{ route('users.index') }}" class="block py-3 px-6 hover:bg-gray-700">
                    👤 Quản lý người dùng
                </a>
                <!-- Thêm menu khác nếu cần -->
            </nav>
        </aside>

        <!-- Main content wrapper -->
        <div class="flex-1 flex flex-col">

            <!-- Header -->
            <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800">@yield('title')</h2>
                <div class="text-sm text-gray-600">
                    Xin chào, Admin | <a href="#" class="text-blue-500 hover:underline">Đăng xuất</a>
                </div>
            </header>

            <!-- Main content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>
