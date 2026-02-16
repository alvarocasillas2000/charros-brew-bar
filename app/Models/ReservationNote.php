<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationNote extends Model
{
    use HasFactory;

    protected $table = 'reservations_notes';

    protected $fillable = [
        'reservation_id',
        'note',
        'created_by',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
