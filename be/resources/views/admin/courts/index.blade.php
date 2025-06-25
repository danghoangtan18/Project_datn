@extends('layouts.layout')

@section('title', 'Danh sách sân')

@section('content')
<div class="head-title">
    <div class="left">
        <h1>Danh sách sân</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Quản lý sân</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Danh sách sân</a>
            </li>
        </ul>
    </div>
    <a href="#" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Download PDF</span>
    </a>
</div>

<div class="body-content">
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Tên sân</th>
                <th>Loại sân</th>
                <th>Giá theo giờ</th>
                <th>Địa điểm</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            {{-- Dữ liệu giả lập mẫu --}}
            <tr>
                <td>1</td>
                <td><img src="{{ asset('img/court1.png') }}" alt="Ảnh sân" width="50"></td>
                <td>Sân bóng đá mini</td>
                <td>5 người</td>
                <td>200,000₫</td>
                <td>Quận 1, TP.HCM</td>
                <td>Mặt cỏ nhân tạo, có đèn</td>
                <td>Hiển thị</td>
                <td>
                    <button>Xóa</button> | <button>Sửa</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td><img src="{{ asset('img/court2.png') }}" alt="Ảnh sân" width="50"></td>
                <td>Sân cầu lông C</td>
                <td>Cầu lông</td>
                <td>120,000₫</td>
                <td>Gò Vấp</td>
                <td>Sàn gỗ, có mái che</td>
                <td>Ẩn</td>
                <td>
                    <button>Xóa</button> | <button>Sửa</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
