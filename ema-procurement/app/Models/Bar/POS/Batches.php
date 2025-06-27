<?php

namespace App\Models\Bar\POS;
use App\Models\Inventory\InventoryAdjustment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batches extends Model
{
    use HasFactory;

    protected $table = "store_item_batches";
    protected  $guarded = ['id'];

      /**
     * Get the inventory adjustments for this batch
     */
    public function inventoryAdjustments()
    {
        return $this->hasMany(InventoryAdjustment::class, 'batch_id');
    }

    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id');
    }

    public function stocks()
    {
        return $this->hasMany(Stocks::class, 'batch_id');
    }

    /**
     * Get the discounts associated with this batch.
     */
    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    /**
     * Get active discounts for the batch.
     */
    public function activeDiscounts()
    {
        return $this->discounts()->active();
    }
    
    /**
     * Get the best applicable discount for this batch.
     */
    public function bestDiscount($quantity = 1)
    {
        return $this->activeDiscounts()
            ->where(function ($query) use ($quantity) {
                $query->where('min_quantity', '<=', $quantity)
                      ->where(function ($q) use ($quantity) {
                          $q->whereNull('max_quantity')
                            ->orWhere('max_quantity', '>=', $quantity);
                      });
            })
            ->orderByRaw('CASE WHEN discount_type = "percentage" THEN value * selling_price / 100 ELSE value END DESC')
            ->first();
    }
    
    /**
     * Calculate the discounted price for a given quantity.
     */
    public function getDiscountedPrice($quantity = 1)
    {
        $discount = $this->bestDiscount($quantity);
        
        if (!$discount) {
            return $this->selling_price;
        }
        
        $discountAmount = $discount->calculateDiscount($this->selling_price, $quantity);
        return $this->selling_price - $discountAmount;
    }
}
