<?php

namespace App\Models;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
    'seatNo', 'date', 'flight_id', 'file_path'
    ];

    public function customer() {
        return $this->hasOne(Customer::class);
    }

       public function flight()
   {
     return $this->belongsTo(Flight::class);
   }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y');
    }
}
