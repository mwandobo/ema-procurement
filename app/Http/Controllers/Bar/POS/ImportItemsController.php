<?php

namespace App\Http\Controllers\Bar\POS;

use App\Http\Controllers\Controller;
use App\Imports\ImportBarItems;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use File;
use Response;
use Illuminate\Support\Facades\Storage;

class ImportItemsController extends Controller
{
    use Importable;
    
    public function import(Request $request){

        
        $data = Excel::import(new ImportBarItems, $request->file('file')->store('files'));
        
        Toastr::success('File Imported Successfully','Success');
        return redirect()->back();
    }
    
     public function sample(Request $request){
        $filepath = public_path('bar_sample.xlsx');
        return Response::download($filepath); 
    }
}
