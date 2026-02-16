<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'business_day_id',
        'area_id',
        'area_x_game_id',
        'people_count',
        'total_cost',
        'status',
        'transaction_id',
    ];

    public function businessDay()
    {
        return $this->belongsTo(BusinessDay::class, 'business_day_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function notes()
    {
        return $this->hasMany(ReservationNote::class);
    }

    public function boletomovilResponses()
    {
        return $this->hasMany(BoletomovilResponse::class);
    }

    public function isPaid()
    {
        return $this->payment && $this->payment->status === 'completed';
    }
}
