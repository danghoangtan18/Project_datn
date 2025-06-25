<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table = 'product_attributes';

    protected $primaryKey = 'Attributes_ID';

    public $timestamps = false;

    protected $fillable = [
        'Name',
        'Description',
        'Create_at',
        'Update_at',
    ];

    // Nếu có quan hệ với bảng product_values, bạn có thể thêm:
    // public function values()
    // {
    //     return $this->hasMany(ProductValue::class, 'Attributes_ID', 'Attributes_ID');
    // }
}
