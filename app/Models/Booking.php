<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
    'seatNo', 'date', 'flight_id',
    ];

    public function customer() {
        return $this->hasOne(Customer::class);
    }

       public function flight()
   {
     return $this->belongsTo(Flight::class);
   }
}
