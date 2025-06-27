<?php

namespace App\Traits;

use App\Models\Facility\Invoice; // facilities_invoices
use App\Models\Facility\InvoiceItems; // facilities_invoice_items
use App\Models\Facility\Items; // facility_items
use App\Models\Member\Member; // members
use App\Models\Visitors\Visitor; // visitors
use App\Models\User; // users
use Carbon\Carbon;

trait SectionReport
{
    /**
     * Generate a section report for facilities within a date range.
     *
     * @param string|null $startDate
     * @param string|null $endDate
     * @param string|null $userType
     * @param string|null $sport
     * @return array
     */
    public function generateSectionReport($startDate = null, $endDate = null, $userType = null, $sport = null)
    {
        $reports = [];
        
        // Parse and format dates
        $startDate = $startDate ? Carbon::parse($startDate)->startOfDay() : null;
        $endDate = $endDate ? Carbon::parse($endDate)->endOfDay() : null;

        $query = Invoice::query();
        
        // Filter by date range
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        } elseif ($startDate) {
            $query->where('created_at', '>=', $startDate);
        } elseif ($endDate) {
            $query->where('created_at', '<=', $endDate);
        }

        // Filter by user type
        if ($userType && $userType !== 'All') {
            $query->where('user_type', $userType);
        } else {
            $query->whereIn('user_type', ['Member', 'Visitor']);
        }

        $invoices = $query->get();

        $sn = 1;

        // Process invoices and related items
        foreach ($invoices as $invoice) {
            $clientType = $invoice->user_type;
            $clientId = $invoice->client_id;

            // Fetch client name
            $clientName = 'Unknown';
            if ($clientType === 'Member') {
                $member = Member::find($clientId);
                $clientName = $member ? $member->full_name : 'Unknown Member';
            } elseif ($clientType === 'Visitor') {
                $visitor = Visitor::find($clientId);
                $clientName = $visitor ? $visitor->first_name . ' ' . $visitor->last_name : 'Unknown Visitor';
            }

            // Fetch salesperson
            $salesPerson = 'Unknown Salesperson';
            if ($invoice->created_by) {
                $user = User::find($invoice->created_by);
                $salesPerson = $user ? $user->name : $salesPerson;
            }

            $invoiceItems = InvoiceItems::where('invoice_id', $invoice->id)->get();

            foreach ($invoiceItems as $item) {
                $facilityItem = Items::find($item->item_name);
                $sportsType = $facilityItem ? $facilityItem->name : 'Unknown Facility';

                // Filter by sport type
                if ($sport && $sport !== 'All' && $sportsType !== $sport) {
                    continue; // Skip if sport filter doesn't match
                }

                $reports[] = [
                    'sn'           => $sn++,
                    'name'         => $clientName,
                    'type'         => $clientType,
                    'sports'       => $sportsType,
                    'quantity'     => $item->quantity,
                    'amount'       => $item->total_cost,
                    'sales_person' => $salesPerson,
                ];
            }
        }

        return $reports;
    }
}
