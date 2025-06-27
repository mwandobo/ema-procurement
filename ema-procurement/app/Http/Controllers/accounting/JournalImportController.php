<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Imports\ImportJournalEntry ;
use App\Imports\CheckJournalEntry ;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Response;

class JournalImportController extends Controller
{
    use Importable;
    
    public function import(Request $request){
        //$data = Excel::import(new ImportJournalEntry, $request->file('file')->store('files'));
        
        $import = new ImportJournalEntry;
        
        $data = Excel::import($import, $request->file('file'));
        
        $notploaded=$import->notploaded;
        
        //dd($notploaded); 

        if ($notploaded)
            {
                Toastr::error('The Journal must balance (Debits equal to Credits)','Error');
                return redirect()->back();
                
            }
            
            else{
                Toastr::success('File Imported Successfully','Success');
                return redirect()->back();
            }
        

        
        
    }
    
     public function sample(Request $request){
       //return Storage::download('journal_sample.xlsx');
       $filepath = public_path('journal_sample.xlsx');
       return Response::download($filepath);
    }
}
