<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import lớp Storage

class ProductController extends Controller
{
    const PATH_VIEW = 'admin.products.';

    public function index()
    {
        $products = Product::with(['color', 'size'])->latest('id')->get();
        return view(self::PATH_VIEW . 'index', compact('products'));
    }

    public function create()
    {
        $colors = Color::pluck('name', 'id')->all();
        $sizes = Size::pluck('name', 'id')->all();
        return view(self::PATH_VIEW . 'create', compact('colors', 'sizes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'product_price' => 'required|integer',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'color_id' => 'required|exists:colors,id',
            'size_id' => 'required|exists:sizes,id',
        ]);

        // Xử lý lưu trữ hình ảnh
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('public/products');
            $fileName = basename($imagePath);
            $validatedData['product_image'] = $fileName;
        }

        // Tạo sản phẩm mới trong cơ sở dữ liệu
        $product = Product::create($validatedData);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $colors = Color::pluck('name', 'id')->all();
        $sizes = Size::pluck('name', 'id')->all();
        return view(self::PATH_VIEW . 'edit', compact('product', 'colors', 'sizes'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'product_price' => 'required|integer',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'color_id' => 'required|exists:colors,id',
            'size_id' => 'required|exists:sizes,id',
        ]);

        // Xử lý lưu trữ hình ảnh
        if ($request->hasFile('product_image')) {
            // Xóa ảnh cũ nếu có
            if ($product->product_image) {
                Storage::delete('public/products/' . $product->product_image);
            }

            // Lưu ảnh mới
            $imagePath = $request->file('product_image')->store('public/products');
            $fileName = basename($imagePath);
            $validatedData['product_image'] = $fileName;
        }

        // Cập nhật sản phẩm với dữ liệu đã xác thực
        $product->update($validatedData);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }


    public function destroy(Product $product)
    {
        if ($product->product_image) {
            Storage::delete('public/products/' . $product->product_image);
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
