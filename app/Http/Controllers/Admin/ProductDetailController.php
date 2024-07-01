<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\Fabric;

class ProductDetailController extends Controller
{
    public function index()
    {
        $productDetails = ProductDetail::with(['category', 'product', 'color', 'size', 'fabric'])
            ->latest()
            ->get();

        return view('admin.product_details.index', compact('productDetails'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        $products = Product::pluck('name', 'id')->all();
        $colors = Color::pluck('name', 'id')->all();
        $sizes = Size::pluck('name', 'id')->all();
        $fabrics = Fabric::pluck('fabric', 'id')->all();

        return view('admin.product_details.create', compact('categories', 'products', 'colors', 'sizes', 'fabrics'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'product_id' => 'required|exists:products,id',
            'import_price_product_detail' => 'required|integer',
            'price_product_detail' => 'required|integer',
            'color_id' => 'required|exists:colors,id',
            'size_id' => 'required|exists:sizes,id',
            'fabric_id' => 'required|exists:fabrics,id',
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            'note' => 'nullable|string',
            'slug' => 'required|string',
            'status' => 'required|string',
        ]);

        ProductDetail::create($validatedData);

        return redirect()->route('admin.product_details.index')
            ->with('success', 'Product Detail created successfully.');
    }
    public function show(ProductDetail $productDetail)
    {
        return view('admin.product_details.show', compact('productDetail'));
    }


    public function edit(ProductDetail $productDetail)
    {
        $categories = Category::pluck('name', 'id')->all();
        $products = Product::pluck('name', 'id')->all();
        $colors = Color::pluck('name', 'id')->all();
        $sizes = Size::pluck('name', 'id')->all();
        $fabrics = Fabric::pluck('fabric', 'id')->all();

        return view('admin.product_details.edit', compact('productDetail', 'categories', 'products', 'colors', 'sizes', 'fabrics'));
    }

    public function update(Request $request, ProductDetail $productDetail)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'product_id' => 'required|exists:products,id',
            'import_price_product_detail' => 'required|integer',
            'price_product_detail' => 'required|integer',
            'color_id' => 'required|exists:colors,id',
            'size_id' => 'required|exists:sizes,id',
            'fabric_id' => 'required|exists:fabrics,id',
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            'note' => 'nullable|string',
            'slug' => 'required|string',
            'status' => 'required|string',
        ]);

        $productDetail->update($validatedData);

        return redirect()->route('admin.product_details.index')
            ->with('success', 'Product Detail updated successfully.');
    }

    public function destroy(ProductDetail $productDetail)
    {
        $productDetail->delete();

        return redirect()->route('admin.product_details.index')
            ->with('success', 'Product Detail deleted successfully.');
    }
}
