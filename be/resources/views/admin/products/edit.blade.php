@extends('layouts.layout')

@section('content')
<div class="head-title">
    <div class="left">
        <h1>Sửa sản phẩm</h1>
        <ul class="breadcrumb">
            <li><a href="#">Sản phẩm</a></li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li><a class="active" href="#">Sửa sản phẩm</a></li>
        </ul>
    </div>
</div>

<div class="form-edit">
    <h2>Cập nhật Sản phẩm</h2>
    <form action="{{ route('admin.products.update', $product->Product_ID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Name">Tên sản phẩm</label>
            <input type="text" id="Name" name="Name" value="{{ old('Name', $product->Name) }}" required>
        </div>

        <div class="form-group">
            <label for="SKU">Mã SKU</label>
            <input type="text" id="SKU" name="SKU" value="{{ old('SKU', $product->SKU) }}">
        </div>

        <div class="form-group">
            <label for="Price">Giá</label>
            <input type="number" id="Price" name="Price" value="{{ old('Price', $product->Price) }}" required>
        </div>

        <div class="form-group">
            <label for="Discount_price">Giá khuyến mãi</label>
            <input type="number" id="Discount_price" name="Discount_price" value="{{ old('Discount_price', $product->Discount_price) }}">
        </div>

        <div class="form-group">
            <label for="Quantity">Số lượng</label>
            <input type="number" id="Quantity" name="Quantity" value="{{ old('Quantity', $product->Quantity) }}" required>
        </div>

        <div class="form-group">
            <label for="Brand">Thương hiệu</label>
            <input type="text" id="Brand" name="Brand" value="{{ old('Brand', $product->Brand) }}">
        </div>

        <div class="form-group">
            <label for="Description">Mô tả</label>
            <textarea id="Description" name="Description" rows="4">{{ old('Description', $product->Description) }}</textarea>
        </div>

        <div class="form-group">
            <label>Ảnh hiện tại:</label><br>
            @if ($product->Image)
                <img src="{{ asset($product->Image) }}" width="100">
            @else
                <em>Không có ảnh</em>
            @endif
        </div>

        <div class="form-group">
            <label for="Image">Cập nhật ảnh mới (nếu muốn)</label>
            <input type="file" id="Image" name="Image" accept="image/*">
        </div>

        <div class="form-group">
            <label for="Categories_ID">Danh mục</label>
            <select name="Categories_ID" id="Categories_ID" required>
                @foreach($categories as $category)
                    <option value="{{ $category->Categories_ID }}" {{ $category->Categories_ID == $product->Categories_ID ? 'selected' : '' }}>
                        {{ $category->Name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Status">Trạng thái</label>
            <select id="Status" name="Status" required>
                <option value="1" {{ $product->Status ? 'selected' : '' }}>Hiển thị</option>
                <option value="0" {{ !$product->Status ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit">Cập nhật sản phẩm</button>
        </div>
    </form>
</div>
@endsection
