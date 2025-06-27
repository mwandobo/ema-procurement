<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bar\POS\Batches;
use App\Models\Inventory\Location;
use App\Models\User;
class InventoryAdjustment extends Model
{
    use HasFactory;

    protected $table = 'store_inventory_adjustments';

    protected $guarded = ['id'];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = [
        'batch_id',
        'adjustment_type',
        'quantity',
        'previous_quantity',
        'new_quantity',
        'reason',
        'adjusted_by',
        'location_id',
    ];

     /**
     * ADJUSTMENT_TYPES constant
     */

    const ADJUSTMENT_TYPE_ADD = 'add';
    const ADJUSTMENT_TYPE_REMOVE = 'remove';

     /**
     * Get the adjustment types
     * 
     * @return array
     */
    public static function getAdjustmentTypes()
    {
        return [
            self::ADJUSTMENT_TYPE_ADD => 'Add Stock',
            self::ADJUSTMENT_TYPE_REMOVE => 'Remove Stock',
        ];
    }

       /**
     * Override the creating event to update item stock
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($adjustment) {
            $batch = Batches::findOrFail($adjustment->batch_id);

            $stock = $batch->stocks()->where('store_id', $adjustment->location_id)->first();
            if(!$stock) {
                throw new \Exception("No stock found for batch ID {$adjustment->batch_id} at location ID {$adjustment->location_id}");
            }
            // Store previous quantity
            $adjustment->previous_quantity = $stock->quantity;

            // Determine signed quantity (add or subtract)
            $quantity = (int) $adjustment->quantity;
            if ($adjustment->adjustment_type === self::ADJUSTMENT_TYPE_REMOVE) {
                $quantity = -1 * abs($quantity);
            }

            // Update item stock
            $stock->quantity += $quantity;
            $stock->save();

            // Store new quantity
            $adjustment->new_quantity = $stock->quantity;
        });
    }
    /**
     * Get the batch that this adjustment belongs to
     */
    public function batch()
    {
        return $this->belongsTo(Batches::class, 'batch_id');
    }

    /**
     * Get the user who made the adjustment
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'adjusted_by');
    }

    /**
     * Get the location that owns the adjustment
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
