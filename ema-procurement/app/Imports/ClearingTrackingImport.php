<?php

namespace App\Imports;

use App\Models\Bar\POS\ClearingTracking;
use App\Models\Bar\POS\ClearingTrackingAssigment;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClearingTrackingImport implements ToCollection, WithHeadingRow
{
    protected $purchaseOrderId;
    protected $poNumber;
    protected $trackingId;

    public function __construct($purchaseOrderId, $poNumber)
    {
        $this->purchaseOrderId = $purchaseOrderId;
        $this->poNumber = $poNumber;

        // ✅ Create tracking ONCE here
        $tracking = ClearingTracking::create([
            'reference_no' => $this->purchaseOrderId,
        ]);
        $this->trackingId = $tracking->id;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // 🛑 Skip if no PO or doesn't match the given PO number
            if (!isset($row['po']) || trim($row['po']) !== $this->poNumber) {
                continue;
            }

            ClearingTrackingAssigment::create([
                'store_clearing_tracking' => $this->trackingId,
                'po'                  => $row['po'],
                'supplier_name'       => $row['supplier_name'],
                'padm'                => $row['padm'],
                'invoice_date'        => $row['invoice_date'],
                'remark'              => $row['remark'],
                'product_description' => $row['product_description'],
                'hard_copies'         => $row['hard_copies'],
                'copies'              => $row['copies'],
                'no_of_container'     => $row['no_of_container'],
                'reference_no'        => $this->purchaseOrderId,
                'status'              => $row['status'],
                'etd'                 => $row['etd'],
                'bl_no'               => $row['bl_no'],
                'eta'                 => $row['eta'],
                'print_receive'       => $row['print_receive'],
                'tra_assessment'      => $row['tra_assessment'] ?? null,
                'user_id'             => auth()->id(),
                'added_by'            => auth()->user()->added_by,
            ]);
        }
    }
}

