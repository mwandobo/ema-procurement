<?php

namespace App\Models\Bar\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = "store_item_discounts";
    protected  $guarded = ['id'];

    protected $fillable = [
        'name',
        'discount_type',
        'value',
        'batch_id',
        'min_quantity',
        'max_quantity',
        'is_active',
        'start_date',
        'end_date',
    ];
    
    protected $casts = [
        'value' => 'decimal:2',
        'min_quantity' => 'decimal:2',
        'max_quantity' => 'decimal:2',
        'is_active' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

     /**
     * Get the batch associated with the discount.
     */
    public function batch()
    {
        return $this->belongsTo(Batches::class);
    }

     /**
     * Check if the discount is currently valid based on dates.
     */
    public function isValid()
    {
        $now = now()->startOfDay();
        
        // Check if discount is active
        if (!$this->is_active) {
            return false;
        }
        
        // Check start date
        if ($this->start_date->gt($now)) {
            return false;
        }
        
        // Check end date if specified
        if ($this->end_date && $this->end_date->lt($now)) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Scope a query to only include active discounts.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                    ->where('start_date', '<=', now())
                    ->where(function ($query) {
                        $query->whereNull('end_date')
                              ->orWhere('end_date', '>=', now());
                    });
    }
    
    /**
     * Calculate discount amount for a given price and quantity.
     */
    public function calculateDiscount($price, $quantity)
    {
        // Check if quantity meets minimum requirement
        if ($quantity < $this->min_quantity) {
            return 0;
        }
        
        // Check if quantity exceeds maximum (if specified)
        if ($this->max_quantity && $quantity > $this->max_quantity) {
            return 0;
        }
        
        if ($this->discount_type === 'percentage') {
            return ($price * $this->value) / 100;
        } else {
            return $this->value;
        }
    }
}
