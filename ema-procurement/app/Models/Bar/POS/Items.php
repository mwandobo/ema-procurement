<?php

namespace App\Models\Bar\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Inventory\Location;
use App\Models\Inventory\InventoryAdjustment;

class Items extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "store_pos_items";
    
    
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id'); 
    }

    /**
     * Define the category relationship.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); 
    }
    
    public function goodIssues()
{
    return $this->hasMany(GoodIssueItem::class, 'item_id'); // Adjust with correct foreign key if necessary
}

 /**
     * Get the inventory adjustments for this item
     */
    public function inventoryAdjustments()
    {
        return $this->hasMany(InventoryAdjustment::class, 'item_id');
    }

    public function batches()
    {
        return $this->hasMany(Batches::class, 'item_id');
    }
}

