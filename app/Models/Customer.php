<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
    'name', 'age', 'booking_id',
    ];

    public function booking()
   {
     return $this->belongsTo(Booking::class);
   }
}
