@extends('layouts.layout')

@section('content')
<div class="head-title">
    <div class="left">
        <h1>Thêm sản phẩm</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Sản phẩm</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Thêm sản phẩm</a>
            </li>
        </ul>
    </div>
    <a href="#" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Download PDF</span>
    </a>
</div>

<div class="form-add">
    <h2>Thêm Sản Phẩm Mới</h2>
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="Name">Tên sản phẩm</label>
        <input type="text" id="Name" name="Name" required>
    </div>

    <div class="form-group">
    <label for="SKU">Mã SKU</label>
    <input type="text" id="SKU" name="SKU">
</div>


    <div class="form-group">
        <label for="Price">Giá</label>
        <input type="number" id="Price" name="Price" required>
    </div>

    <div class="form-group">
        <label for="Discount_price">Giá khuyến mãi</label>
        <input type="number" id="Discount_price" name="Discount_price">
    </div>

    <div class="form-group">
        <label for="Quantity">Số lượng</label>
        <input type="number" id="Quantity" name="Quantity" required>
    </div>

    <div class="form-group">
        <label for="Brand">Thương hiệu</label>
        <input type="text" id="Brand" name="Brand">
    </div>

    <div class="form-group">
        <label for="Description">Mô tả</label>
        <textarea id="Description" name="Description" rows="4"></textarea>
    </div>

    <div class="form-group">
        <label for="Image">Ảnh sản phẩm</label>
        <input type="file" id="Image" name="Image" accept="image/*">
    </div>

    <div class="form-group">
        <label for="Categories_ID">Danh mục</label>
        <select name="Categories_ID" id="Categories_ID" required>
            @foreach($categories as $category)
                <option value="{{ $category->Categories_ID }}">{{ $category->Name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="Status">Trạng thái</label>
        <select id="Status" name="Status" required>
            <option value="1">Hiển thị</option>
            <option value="0">Ẩn</option>
        </select>
    </div>

    <div class="form-actions">
        <button type="submit">Thêm sản phẩm</button>
    </div>
</form>

</div>
@endsection
