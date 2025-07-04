@extends('layouts.layout')

@section('title', 'Danh sách danh mục')

@section('content')
<div class="head-title">
	<div class="left">
		<h1>Danh mục sản phẩm</h1>
		<ul class="breadcrumb">
			<li><a href="#">Danh mục sản phẩm</a></li>
			<li><i class='bx bx-chevron-right'></i></li>
			<li><a class="active" href="#">Danh sách danh mục</a></li>
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
				<th>Tên danh mục</th>
				<th>Mô tả</th>
				<th>Thao Tác</th>
			</tr>
		</thead>
		<tbody>
    @foreach($categories as $index => $category)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                @if($category->Image)
                    <img src="{{ asset($category->Image) }}" width="50">
                @else
                    <img src="{{ asset('WebAdmin/img/default.png') }}" width="50">
                @endif
            </td>
            <td>{{ $category->Name }}</td>
            <td>{{ $category->Description }}</td>
            <td>
                <form action="{{ route('admin.categories.destroy', $category->Categories_ID) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                </form>

                <a href="{{ route('admin.categories.edit', $category->Categories_ID) }}">
                    <button>Sửa</button>
                </a>
            </td>
        </tr>
    @endforeach
</tbody>

	</table>
</div>
@endsection
