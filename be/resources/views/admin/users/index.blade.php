@extends('layouts.layout')

@section('content')
<div class="head-title">
    <div class="left">
        <h1>Tài khoản</h1>
        <ul class="breadcrumb">
            <li><a href="#">Tài khoản</a></li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li><a class="active" href="#">Danh sách tài khoản</a></li>
        </ul>
    </div>
    <a href="#" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Download PDF</span>
    </a>
</div>

<div class="body-content">
    @if (session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><img src="{{ asset($user->Avatar ?? 'WebAdmin/img/people.png') }}" alt="Ảnh" width="50"></td>
                <td>{{ $user->Name }}</td>
                <td>{{ $user->Email }}</td>
                <td>{{ $user->Phone }}</td>
                <td>
                    <form action="{{ route('admin.users.destroy', $user->ID) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                    <a href="{{ route('admin.users.edit', $user->ID) }}">
                        <button>Sửa</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px">
        {{ $users->links() }}
    </div>
</div>
@endsection
