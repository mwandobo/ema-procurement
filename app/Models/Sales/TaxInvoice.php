<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxInvoice extends Model
{
    use HasFactory;

    protected $table = "sale_tax_invoices";

    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(SaleOrder::class, 'sale_order_id');
    }

    public function quotation()
    {
        return $this->belongsTo(SaleQuotation::class, 'sale_quotation_id');
    }

    public function preQuotation()
    {
        return $this->belongsTo(SalePreQuotation::class, 'sale_pre_quotation_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'added_by');
    }

}
