<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user'; // Vì bảng tên là 'user', không phải 'users'
    protected $primaryKey = 'ID'; // PK trong bảng là 'ID', không phải 'id'

    public $timestamps = false; // Vì bạn không dùng created_at, updated_at của Laravel

    protected $fillable = [
        'Role_ID',
        'Name',
        'Email',
        'Password',
        'Phone',
        'Gender',
        'Date_of_birth',
        'Avatar',
        'Status',
        'Address',
        'Created_at',
        'Updated_at',
    ];

    protected $hidden = [
        'Password',
        'remember_token',
    ];

    protected $casts = [
        'Date_of_birth' => 'date',
        'Status' => 'boolean',
        'Created_at' => 'datetime',
        'Updated_at' => 'datetime',
        'Password' => 'hashed',
    ];

    // Quan hệ: Mỗi user thuộc về một role
    public function role()
    {
        return $this->belongsTo(Role::class, 'Role_ID');
    }
}
