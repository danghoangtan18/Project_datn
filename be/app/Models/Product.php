<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products'; // Tên bảng

    protected $primaryKey = 'Product_ID'; // Khóa chính

    public $timestamps = false; // Không dùng created_at, updated_at mặc định

    protected $fillable = [
        'Categories_ID',
        'Name',
        'SKU',
        'Brand',
        'Description',
        'Image',
        'Price',
        'Discount_price',
        'Quantity',
        'Status',
        'Created_at',
        'Update_at',
    ];

    protected $casts = [
        'Created_at' => 'datetime',
        'Update_at' => 'datetime',
        'Price' => 'decimal:2',
        'Discount_price' => 'decimal:2',
        'Status' => 'boolean',
    ];

    // Quan hệ: Product thuộc về Category (nếu có bảng categories)
    public function category()
    {
        return $this->belongsTo(Category::class, 'Categories_ID');
    }
}
