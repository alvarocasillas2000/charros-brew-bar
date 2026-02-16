<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AreaXGame extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'business_day_id',
        'area_id',
        'cost_per_person',
        'max_capacity',
        'reserved_quantity'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['available'];

    /**
     * Get the business day that owns the AreaXGame.
     */
    public function businessDay(): BelongsTo
    {
        return $this->belongsTo(BusinessDay::class);
    }

    /**
     * Get the area that owns the AreaXGame.
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Calculate available spaces (accessor).
     *
     * @return int
     */
    public function getAvailableAttribute(): int
    {
        return $this->max_capacity - $this->reserved_quantity;
    }

    /**
     * Check if there's available capacity.
     *
     * @param int $quantity
     * @return bool
     */
    public function hasAvailability(int $quantity = 1): bool
    {
        return $this->available >= $quantity;
    }

    /**
     * Increment reserved quantity.
     *
     * @param int $quantity
     * @return bool
     */
    public function reserveSpaces(int $quantity = 1): bool
    {
        if (!$this->hasAvailability($quantity)) {
            return false;
        }

        $this->increment('reserved_quantity', $quantity);
        return true;
    }

    /**
     * Decrement reserved quantity.
     *
     * @param int $quantity
     * @return bool
     */
    public function releaseSpaces(int $quantity = 1): bool
    {
        if ($this->reserved_quantity < $quantity) {
            return false;
        }

        $this->decrement('reserved_quantity', $quantity);
        return true;
    }
    
    /**
     * Calculate actual reserved quantity from reservations table.
     *
     * @return int
     */
    public function getActualReservedQuantityAttribute(): int
    {
        return \App\Models\Reservation::where(function($query) {
            $query->where('area_x_game_id', $this->id)
                  ->orWhere(function($subQuery) {
                      $subQuery->where('area_id', $this->area_id)
                               ->where('business_day_id', $this->business_day_id);
                  });
        })
        ->where('status', 'confirmed') // Only count confirmed reservations
        ->sum('people_count');
    }
    
    /**
     * Calculate actual available spaces.
     *
     * @return int
     */
    public function getActualAvailableAttribute(): int
    {
        return max(0, $this->max_capacity - $this->actual_reserved_quantity);
    }
    
    /**
     * Calculate pending reservations quantity.
     *
     * @return int
     */
    public function getPendingReservationsAttribute(): int
    {
        return \App\Models\Reservation::where(function($query) {
            $query->where('area_x_game_id', $this->id)
                  ->orWhere(function($subQuery) {
                      $subQuery->where('area_id', $this->area_id)
                               ->where('business_day_id', $this->business_day_id);
                  });
        })
        ->where('status', 'pending') // Only count pending reservations
        ->sum('people_count');
    }
    
    /**
     * Sync the reserved_quantity field with actual reservations.
     *
     * @return void
     */
    public function syncReservedQuantity(): void
    {
        $this->update(['reserved_quantity' => $this->actual_reserved_quantity]);
    }
}
