<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $table = 'courts';

    protected $primaryKey = 'Courts_ID';

    public $timestamps = false;

    protected $fillable = [
        'Name',
        'Location',
        'Description',
        'Image',
        'Court_type',
        'Price_per_hour',
        'Status',
        'Created_at',
        'Updated_at',
    ];

    // Nếu có bảng booking sân, bạn có thể thêm quan hệ
    // public function bookings()
    // {
    //     return $this->hasMany(CourtBooking::class, 'Courts_ID', 'Courts_ID');
    // }
}
