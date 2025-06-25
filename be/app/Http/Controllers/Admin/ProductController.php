<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Categories_ID' => 'required|exists:categories,Categories_ID',
            'Name' => 'required|string|max:255',
            'SKU' => 'nullable|string|max:100',
            'Brand' => 'nullable|string|max:255',
            'Description' => 'nullable|string',
            'Image' => 'nullable|image|max:2048',
            'Price' => 'required|numeric|min:0',
            'Discount_price' => 'nullable|numeric|min:0|lt:Price',
            'Quantity' => 'required|integer|min:0',
            'Status' => 'boolean',
        ]);

        if ($request->hasFile('Image')) {
            $path = $request->file('Image')->store('uploads/products', 'public');
            $validated['Image'] = 'storage/' . $path;
        }

        $validated['Status'] = $request->has('Status') ? $request->Status : 0;
        $validated['Created_at'] = now();

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'Categories_ID' => 'required|exists:categories,Categories_ID',
            'Name' => 'required|string|max:255',
            'SKU' => 'nullable|string|max:100',
            'Brand' => 'nullable|string|max:255',
            'Description' => 'nullable|string',
            'Image' => 'nullable|image|max:2048',
            'Price' => 'required|numeric|min:0',
            'Discount_price' => 'nullable|numeric|min:0|lt:Price',
            'Quantity' => 'required|integer|min:0',
            'Status' => 'boolean',
        ]);

        if ($request->hasFile('Image')) {
            $path = $request->file('Image')->store('uploads/products', 'public');
            $validated['Image'] = 'storage/' . $path;
        }

        $validated['Status'] = $request->has('Status') ? $request->Status : 0;
        $validated['Update_at'] = now();

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}
