<?php

namespace App\Imports;

use App\Models\Bar\POS\PurchaseOrderTracking;
use App\Models\Bar\POS\PurchaseOrderTrackingAssigment;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class PurchaseOrderLineImport implements ToCollection, WithHeadingRow
{
    protected $purchaseOrderId;
    protected $trackingId;
    protected $expectedPoNumber;

    public function __construct($purchaseOrderId, $poNumber)
    {
        $this->purchaseOrderId = $purchaseOrderId;
        $this->expectedPoNumber = $poNumber;

        $tracking = PurchaseOrderTracking::create([
            'reference_no' => $this->purchaseOrderId,
        ]);

        $this->trackingId = $tracking->id;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            \Log::info('Import Row:', $row->toArray()); // Debug

            if (!isset($row['po']) || trim($row['po']) !== trim($this->expectedPoNumber)) {
                continue;
            }

            PurchaseOrderTrackingAssigment::create([
                'purchase_order_tracking_id' => $this->trackingId,
                'po' => $row['po'],
                'date' => $row['date'] ?? null,
                'remark' => $row['remark'] ?? null,
                'description' => $row['description'] ?? null,
                'qty' => $row['qty'] ?? null,
                'uom' => $row['uom'] ?? null,
                'containers' => $row['containers'] ?? null, // Simplified for testing
                'reference_no' => $this->purchaseOrderId,
                'status' => $row['status'] ?? null,
                'etd' => $row['etd'] ?? null,
                'bl' => $row['bl'] ?? null,
                'eta' => $row['eta'] ?? null,
                'p_value' => $row['p_value'] ?? null,
                'remark_2' => $row['remark_2'] ?? null,
                'user_id' => auth()->id(),
                'added_by' => auth()->user()->added_by ?? null,
            ]);
        }
    }
}

