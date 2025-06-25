<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariantValue extends Model
{
    protected $table = 'product_variant_values';

    protected $primaryKey = 'Product_variant_values_ID';

    public $timestamps = false;

    protected $fillable = [
        'Variant_ID',
        'Values_ID',
    ];

    // Mối quan hệ với bảng product_variants
    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'Variant_ID', 'Variant_ID');
    }

    // Mối quan hệ với bảng product_values
    public function value(): BelongsTo
    {
        return $this->belongsTo(ProductValue::class, 'Values_ID', 'Values_ID');
    }
}
