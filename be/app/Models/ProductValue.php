<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductValue extends Model
{
    protected $table = 'product_values';

    protected $primaryKey = 'Values_ID';

    public $timestamps = false;

    protected $fillable = [
        'Attributes_ID',
        'Value',
        'Create_at',
        'Update_at',
    ];

    // Quan hệ với bảng product_attributes
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(ProductAttribute::class, 'Attributes_ID', 'Attributes_ID');
    }
}
