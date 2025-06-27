<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\JournalEntry;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class CheckJournalEntry  implements ToCollection,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {  
                
        foreach ($rows as $row) 
        {
        
        $contains = Str::contains($row['credit'], 'CREDIT');
        if(!$contains){
            
        $account = AccountCodes::where('account_name',$row['name'])->get()->first()->account_codes;
            if(count($account) > 0){

                $new= \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date'])->format('Y-m-d');
                $date = explode('-', $new);

        return new JournalEntry([
        'gl_code' => AccountCodes::where('account_name',$row['name'])->get()->first()->account_codes,
        'account_id' => AccountCodes::where('account_name',$row['name'])->get()->first()->account_id,
        'date' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date'])->format('Y-m-d'), 
        'month' => $date[1],     
        'year' => $date[0],
        'credit' => $row['credit'],
        'debit' => $row['debit'],
        ]);
        
            }
            else{
               // return redirect(route());
               return redirect()->back();
            }
        }
    }
    }
}
