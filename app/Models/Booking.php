<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
    'seatNo', 'date',
    ];

    public function customer() {
        return $this->hasMany(Customer::class);
    }

       public function flight()
   {
     return $this->belongsTo(Flight::class);
   }
}
