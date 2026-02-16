<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'provider',
        'payment_method',
        'transaction_id',
        'status',
        'amount',
        'raw_response'
    ];

    protected $casts = [
        'raw_response' => 'array',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
    /**
     * Check if payment is approved.
     */
    public function isApproved(): bool
    {
        return $this->status === 'completed';
    }

    /**
     * Check if payment is pending.
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * Check if payment is rejected.
     */
    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }
}
