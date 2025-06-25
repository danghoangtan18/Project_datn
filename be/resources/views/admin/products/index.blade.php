@extends('layouts.layout')

@section('content')
<div class="head-title">
    <div class="left">
        <h1>Sản phẩm</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Sản phẩm</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Danh sách sản phẩm</a>
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
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Giá KM</th>
                <th>Số lượng</th>
                <th>Thương hiệu</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
@foreach($products as $key => $product)
<tr>
    <td>{{ $key + 1 + ($products->currentPage() - 1) * $products->perPage() }}</td>
    <td>
        @if($product->Image)
            <img src="{{ asset($product->Image) }}" alt="Ảnh sản phẩm" width="50">
        @else
            <img src="{{ asset('WebAdmin/img/no-image.png') }}" alt="No Image" width="50">
        @endif
    </td>
    <td>{{ $product->Name }}</td>
    <td>{{ number_format($product->Price, 0, ',', '.') }}₫</td>
    <td>{{ number_format($product->Discount_price, 0, ',', '.') }}₫</td>
    <td>{{ $product->Quantity }}</td>
    <td>{{ $product->Brand }}</td>
    <td>{{ Str::limit($product->Description, 40) }}</td>
    <td>{{ $product->Status ? 'Hiển thị' : 'Ẩn' }}</td>
    <td>
        <a href="{{ route('admin.products.edit', $product->Product_ID) }}">Sửa</a> |
        <form action="{{ route('admin.products.destroy', $product->Product_ID) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">Xóa</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>

    </table>
</div>
@endsection
