<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductClientController extends Controller
{
    public function index(Request $request)
    {
        // Khởi tạo truy vấn lấy các sản phẩm đang hoạt động và thuộc danh mục đang hoạt động
        $query = Product::with('category')
            ->where('status', 1)
            ->whereHas('category', function ($q) {
                $q->where('status', 1); // Chỉ lấy sản phẩm có danh mục đang hoạt động
            });

        // Lọc theo tên sản phẩm nếu có từ khóa tìm kiếm
        if ($request->filled('search')) {
            $searchTerm = trim($request->input('search'));
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        // Lọc theo khoảng giá nếu có
        if ($request->filled('price')) {
            $priceRange = explode(',', $request->input('price'));
            if (count($priceRange) === 2 && is_numeric($priceRange[0]) && is_numeric($priceRange[1])) {
                $minPrice = (float) $priceRange[0];
                $maxPrice = (float) $priceRange[1];
                if ($minPrice >= 0 && $maxPrice >= $minPrice) {
                    $query->whereBetween('price', [$minPrice, $maxPrice]);
                }
            }
        }

        // Lọc theo danh mục nếu có
        if ($request->filled('category')) {
            $categoryId = (int) $request->input('category');
            if ($categoryId > 0) {
                $query->where('category_id', $categoryId);
            }
        }

        // Sắp xếp sản phẩm theo ID giảm dần và phân trang
        $products = $query->orderBy('id', 'desc')->paginate(8);

        // Lấy top 5 sản phẩm mới nhất (thuộc danh mục đang hoạt động)
        $latestProducts = Product::with('category')
            ->where('status', 1)
            ->whereHas('category', function ($q) {
                $q->where('status', 1);
            })
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        // Trả về view với dữ liệu sản phẩm
        return view('client.home', compact('products', 'latestProducts'));
    }

    public function show($id)
{
    $product = Product::with('category')->where('status', 1)
        ->whereHas('category', function ($q) {
            $q->where('status', 1);
        })
        ->findOrFail($id);

    // Lấy 5 sản phẩm cùng danh mục (trừ chính nó)
    $relatedProducts = Product::with('category')
        ->where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->where('status', 1)
        ->whereHas('category', function ($q) {
            $q->where('status', 1);
        })
        ->take(5)
        ->get();

    return view('client.show', compact('product', 'relatedProducts'));
}

}
