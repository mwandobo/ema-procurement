<?php

namespace App\Http\Controllers\Bar\POS;
use App\Http\Controllers\Controller;
use App\Imports\PurchaseOrderLineImport;
use App\Imports\ClearingTrackingImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use File;
use Response;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    

    
     public function tracking_sample333(Request $request){
     
        $filepath = public_path('diy_purchase_tracking_excel_new.xlsx');
        return Response::download($filepath); 
    }
    
    public function purchase_order_sample(Request $request){
     
        $filepath = public_path('diy_purchase_tracking_sample.xlsx');
        return Response::download($filepath); 
    }
    
    
    public function purchase_order_sample_g(Request $request){
     
        $filepath = public_path('diy_purchase_tracking_sample_g.xlsx');
        return Response::download($filepath); 
    }
    
    
    
    
  public function purchase_order_import(Request $request)
  {
    $request->validate([
        'import_file' => 'required|file|mimes:xlsx,xls,csv',
        'purchase_order_id' => 'required',
        'po_number' => 'required',
    ]);

    Excel::import(
        new PurchaseOrderLineImport($request->purchase_order_id, $request->po_number),
        $request->file('import_file')
    );

    return back()->with('success', 'File imported successfully.');
  }

    
    public function clearing_sample(Request $request){
     
        $filepath = public_path('clearing_sample_excel.xlsx');
        return Response::download($filepath); 
    }
    
    public function clearing_tracking_import(Request $request)
    {
    $request->validate([
        'import_file' => 'required|file|mimes:xlsx,xls,csv',
        'purchase_order_id' => 'required',
        'po_number' => 'required',
    ]);

    Excel::import(
        new ClearingTrackingImport($request->purchase_order_id, $request->po_number),
        $request->file('import_file')
    );

    return back()->with('success', 'File imported successfully.');
    }

 
}
