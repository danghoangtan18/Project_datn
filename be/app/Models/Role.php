<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles'; // Có thể bỏ nếu theo chuẩn, nhưng thêm vào cho rõ

    protected $primaryKey = 'Role_ID'; // Vì bạn không dùng 'id'

    public $incrementing = false; // Vì bạn dùng `unsignedBigInteger`, không phải auto increment

    public $timestamps = false; // Bảng này không có created_at / updated_at

    protected $fillable = [
        'Role_ID',
        'Name',
        'Description',
    ];

    // Một role có thể có nhiều user (nếu có bảng 'user' liên quan)
    public function users()
    {
        return $this->hasMany(User::class, 'Role_ID');
    }
}
