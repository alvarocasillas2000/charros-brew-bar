<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessDay extends Model
{
    protected $table = 'business_days';

    use HasFactory;

    protected $fillable = [
        'date',
        'is_business_day',
        'description',
        'day_type',
        'ticket_price'
    ];

    protected $casts = [
        'date' => 'date',
        'is_business_day' => 'boolean'
    ];

    /**
     * Reservations for this business day
     */
    public function reservations()
    {
        return $this->hasMany(\App\Models\Reservation::class, 'business_day_id');
    }
}