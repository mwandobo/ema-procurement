<?php

namespace App\Traits;

use App\Models\restaurant\Order; // orders table
use App\Models\restaurant\OrderHistory; // order_history table
use App\Models\Inventory\Location; // locations table
use App\Models\Bar\POS\Items; // store_pos_items table
use App\Models\Member\Member; // members table
use App\Models\Visitors\Visitor; // visitors table
use App\Models\User; // users table
use Carbon\Carbon;

trait SalesReport
{
    /**
     * Generate a sales report with detailed order information, filtered by optional parameters.
     *
     * @param string|null $startDate
     * @param string|null $endDate
     * @param string|null $userType
     * @param int|null $locationId
     * @return array
     */
   public function generateSalesReport($startDate = null, $endDate = null, $userType = null, $locationId = null)
{
    $reports = [];
    
    $query = Order::query();

    if ($startDate) {
        $query->where('created_at', '>=', Carbon::parse($startDate)->startOfDay());
    }
    if ($endDate) {
        $query->where('created_at', '<=', Carbon::parse($endDate)->endOfDay());
    }

    if ($userType && $userType !== 'All') {
        $query->where('user_type', $userType);
    }

    if ($locationId && $locationId !== 'All') {
        $query->where('location', $locationId);
    }

    $orders = $query->get();

    foreach ($orders as $order) {
        $userId = $order->user_id;
        $userType = $order->user_type;
        $invoiceId = $order->id;

        $member = Member::find($userId);
        $clientName = $member ? $member->full_name : 'Unknown';

        $salesPerson = 'Unknown';
        if ($order->created_by) {
            $user = User::find($order->created_by);
            $salesPerson = $user ? $user->name : $salesPerson;
        }

        $locationName = 'Unknown';
        if ($order->location) {
            $location = Location::find($order->location);
            $locationName = $location ? $location->name : $locationName;
        }

        $orderHistory = OrderHistory::where('invoice_id', $invoiceId)->get();
        $items = [];
        $totalQuantity = 0;

        foreach ($orderHistory as $history) {
            $item = Items::find($history->item_id);
            $itemName = $item ? $item->name : 'Unknown Item';

            $items[] = $itemName;
            $totalQuantity += $history->quantity;
        }

        $totalCost = $order->invoice_amount + $order->invoice_tax;

        $reports[] = [
            'user_id'       => $userId,
            'full_name'     => $clientName,
            'user_type'     => $userType,
            'location'      => $locationName,
            'items'         => $items,
            'total_quantity'=> $totalQuantity,
            'total_cost'    => $totalCost,
            'sales_person'  => $salesPerson,
        ];
    }

    return $reports;
}

}
