<?php

namespace App\Traits;

use App\Models\Bar\POS\Category;
use App\Models\Bar\POS\Items;

trait ProductsReport
{
    public function generateReport($startDate = null, $endDate = null, $categoryId = null)
    {
        $query = Items::select(
                'store_pos_items.name',
                'store_pos_items.category_id',
                'store_pos_items.quantity',
                'store_pos_items.unit',
                'store_pos_items.sales_price',
                'store_pos_items.cost_price',
                'pos_item_categories.name as category'
            )
            ->join('pos_item_categories', 'store_pos_items.category_id', '=', 'pos_item_categories.id');

        if ($startDate && $endDate) {
            $query->whereBetween('store_pos_items.created_at', [$startDate, $endDate]);
        }
        if ($categoryId) {
            $query->where('store_pos_items.category_id', $categoryId);
        }

        $items = $query->get();

        $report = [];
        $sn = 1;

        foreach ($items as $item) {
            $report[] = [
                'sn' => $sn++,
                'name' => $item->name,
                'category' => $item->category,
                'quantity' => $item->quantity,
                'unit' => $item->unit,
                'sales_price' => $item->sales_price,
                'cost_price' => $item->cost_price,
            ];
        }

        return $report;
    }
}
