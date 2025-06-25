@extends('layouts.layout')

@section('title', 'Thêm sân')

@section('content')
<div class="head-title">
    <div class="left">
        <h1>Thêm sân</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Quản lí sân</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Thêm sân</a>
            </li>
        </ul>
    </div>
    <a href="#" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Download PDF</span>
    </a>
</div>

<div class="form-add">
    <h2>Thêm Sân Mới</h2>
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tên sân</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="address">Địa chỉ</label>
            <input type="text" id="address" name="address" required>
        </div>

        <div class="form-group">
            <label for="price">Tiền/giờ (VNĐ)</label>
            <input type="number" id="price" name="price" min="0" required>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái sân</label>
            <select id="status" name="status" required>
                <option value="trong">Trống</option>
                <option value="dangdat">Đang đặt</option>
                <option value="baotri">Bảo trì</option>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Ảnh sân (không bắt buộc)</label>
            <input type="file" id="image" name="image" accept="image/*">
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea id="description" name="description" rows="4"></textarea>
        </div>

        <div class="form-actions">
            <button type="submit">Thêm sân</button>
        </div>
    </form>
</div>
@endsection
