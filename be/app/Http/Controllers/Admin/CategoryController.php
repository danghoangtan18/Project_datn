<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Hiển thị danh sách
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Form tạo mới
    public function create()
    {
        return view('admin.categories.create');
    }

    // Lưu dữ liệu mới
    public function store(Request $request)
{
    $request->validate([
        'Name' => 'required|string|max:255',
        'Description' => 'nullable|string',
        'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->only(['Name', 'Description']);

    // Xử lý ảnh nếu có
    if ($request->hasFile('Image')) {
        $image = $request->file('Image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/categories'), $imageName);
        $data['Image'] = 'uploads/categories/' . $imageName;
    }

    Category::create($data);

    return redirect()->route('admin.categories.index')->with('success', 'Thêm danh mục thành công!');
}


    // Form chỉnh sửa
    public function edit($id)
{
    $category = Category::findOrFail($id);
    return view('admin.categories.edit', compact('category'));
}


    // Cập nhật danh mục
    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'Description' => 'nullable|string',
            'Image' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    // Xóa danh mục
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục thành công!');
    }
}
