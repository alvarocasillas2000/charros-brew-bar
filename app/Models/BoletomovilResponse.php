<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoletomovilResponse extends Model
{
    protected $fillable = [
        'reservation_id',
        'request_type',
        'api_endpoint',
        'event_id',
        'quantity',
        'card_payment',
        'email',
        'http_status',
        'successful',
        'response_body',
        'error_message',
    ];

    protected $casts = [
        'successful' => 'boolean',
        'card_payment' => 'decimal:2',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
