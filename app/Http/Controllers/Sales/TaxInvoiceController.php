<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Sales\DeliveryNotice;
use App\Models\Sales\DeliveryNoticeItems;
use App\Models\Sales\SaleOrder;
use App\Models\Sales\SalePreQuotation;
use App\Models\Sales\SalePreQuotationItem;
use App\Models\Sales\SaleQuotation;
use App\Models\Sales\TaxInvoice;
use DB;
use Illuminate\Http\Request;

class TaxInvoiceController extends Controller
{
    public function index()
    {
        $taxInvoices = TaxInvoice::with(['quotation', 'order', 'preQuotation'])->latest()->get();
        $saleQuotations = SaleQuotation::with('client')->latest()->get();
        return view('sales.tax-invoice.index', compact('taxInvoices', 'saleQuotations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sale_quotation_id' => 'required',
        ]);

        $user = auth()->user();
        $count = TaxInvoice::count();
        $pro = $count + 1;

        $quotation = SaleQuotation::with(['preQuotation'])->where('id', $request->sale_quotation_id )->first();
        if (!$quotation) {
            return redirect('/v2/sales/tax-invoices')
                ->withErrors('Quotation not found');
        }

        $order = SaleOrder::where('sale_quotation_id', $quotation->id )->first();
        if (!$order) {
            return redirect('/v2/sales/tax-invoices')
                ->withErrors('Order not found');
        }

        $data['reference_no'] = "DGC-SAD-0" . $pro;
        $data['added_by'] = $user->id;
        $data['sale_order_id'] = $order->id;
        $data['sale_quotation_id'] = $request->sale_quotation_id;
        $data['sale_pre_quotation_id'] = $quotation->sale_pre_quotation_id;
        $tax_invoice = TaxInvoice::create($data);

        return redirect('/v2/sales/tax-invoices')
            ->with('success', 'Tax Invoice created successfully with Reference #' . $data['reference_no']);
    }

    public function show($id)
    {
        $taxInvoice = TaxInvoice::with(['order', 'quotation', 'preQuotation'])->where('id', $id )->first();
        if(!$taxInvoice) {
            return redirect('/v2/sales/tax-invoices')->with('error', 'Tax Invoice notice not found');
        }

        $saleQuotation = $taxInvoice->quotation;
        $salePreQuotation = $taxInvoice->preQuotation;
        $taxCode = 'EFD1234567890ABCDE123';
        $saleQuotationItems = SalePreQuotationItem::with('store')->where('sale_pre_quotation_id', $salePreQuotation->id)->get();

        return view('sales.tax-invoice.show', compact('taxInvoice', 'saleQuotation', 'salePreQuotation', 'saleQuotationItems', 'taxCode'));
    }
}
