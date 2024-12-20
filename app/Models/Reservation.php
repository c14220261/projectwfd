<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $primaryKey = 'reservation_id';
    protected $table = 'reservation';
    protected $fillable = [
        'user_id',
        'car_id',
        'reservation_date',
        'pickup_date',
        'return_date',
        'status',
        'extendable',
        'subtotal'
    ];
    protected $casts = [
        'pickup_date' => 'date',
        'return_date' => 'date',
        'reservation_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function car()
    {
        return $this->belongsTo(Cars::class, 'car_id');
    }
}
