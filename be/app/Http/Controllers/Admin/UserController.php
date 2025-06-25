<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Role; 

class UserController extends Controller
{
    // Hiển thị danh sách user
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
{
    $roles = Role::all(); // Lấy danh sách quyền từ bảng roles
    return view('admin.users.create', compact('roles'));
}

    // Lưu user mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Email' => 'required|email|unique:user,Email',
            'Password' => 'required|string|min:6|confirmed',
            'Phone' => 'nullable|string|max:20',
            'Gender' => 'nullable|in:male,female,other',
            'Date_of_birth' => 'nullable|date',
            'Status' => 'nullable|boolean',
            'Address' => 'nullable|string|max:500',
            'Role_ID' => 'required|exists:roles,Role_ID',
        ]);

        $user = new User();
        $user->fill($validated);
        $user->Password = bcrypt($validated['Password']);
        $user->Status = $request->has('Status') ? $request->Status : 0;
        $user->Role_ID = $validated['Role_ID'];
        $user->Created_at = now();

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Tạo user thành công!');
    }

    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Cập nhật user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Email' => [
                'required',
                'email',
                Rule::unique('user', 'Email')->ignore($user->ID, 'ID'),
            ],
            'Password' => 'nullable|string|min:6|confirmed',
            'Phone' => 'nullable|string|max:20',
            'Gender' => 'nullable|in:male,female,other',
            'Date_of_birth' => 'nullable|date',
            'Status' => 'nullable|boolean',
            'Address' => 'nullable|string|max:500',
            'Role_ID' => 'required|exists:roles,Role_ID',
        ]);

        $user->fill($validated);
        $user->Role_ID = $validated['Role_ID'];

        if ($request->filled('Password')) {
            $user->Password = bcrypt($request->Password);
        }
        $user->Status = $request->has('Status') ? $request->Status : 0;
        $user->Updated_at = now();

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Cập nhật user thành công!');
    }

    // Xóa user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Xóa user thành công!');
    }
}
