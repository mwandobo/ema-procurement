<?php

namespace App\Imports;

use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\Accounts;
use App\Models\Accounting\JournalEntry;
use App\Models\Accounting\Transaction;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use DateTime;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportJournalEntry  implements ToCollection,WithHeadingRow

{ 
//, WithValidation
   // use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public $notploaded;
    
    public function collection(Collection $rows)
    {
     
        //  $myDateTime = DateTime::createFromFormat('Y-m-d', strtotime($row[2]));
        //  $year = $myDateTime->format('Y');
        //  $month = $myDateTime->format('M');
        
        
        $total_dr=0;
          $total_cr=0;
          
         //check sum    
         foreach ($rows as $row) 
      {
            $total_dr+= $row['debit'];
         $total_cr+= $row['credit'];
         
          $sum=abs($total_dr-$total_cr);
          
      }


         foreach ($rows as $row) 
      {
          
           if($sum != '0'){
             $this->notploaded = 'not uploaded';
             
         }
          
         
          
          else{
          
          $new= \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date'])->format('Y-m-d');
//dd($new);
              $date = explode('-', $new);
     $journal= JournalEntry::create([
        'gl_code' => AccountCodes::where('account_name',$row['name'])->get()->first()->account_codes,
        'account_id' => AccountCodes::where('account_name',$row['name'])->get()->first()->account_id,
       'date' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date'])->format('Y-m-d'), 
        'month' => $date[1],     
        'year' => $date[0],
        'credit' => $row['credit'],
        'debit' => $row['debit'],
        'transaction_type' => 'import_entry',
         'notes' => $row['notes'],
        'added_by' => auth()->user()->id,
        ]);
        
if(!empty($row['credit'])){
        $credit=AccountCodes::where('account_name',$row['name'])->first();
//dd($credit);
    if($credit->account_group == 'Cash And Banks'){

     $account= Accounts::where('account_id',$credit->account_id)->first();

if(!empty($account)){
$balance=$account->balance - $row['credit'] ;
$item_to['balance']=$balance;
$account->update($item_to);
}

else{
  $cr= AccountCodes::where('id',$credit->account_id)->first();
$balance=0- $row['credit'];

 Accounts::create([
  'account_id'=>$credit->account_id,
      'account_name'=> $cr->account_name,
      'balance'=> $balance,
       'exchange_code'=>'TZS',
        'added_by'=>auth()->user()->id,
]);
   

    
}
        
   // save into tbl_transaction
                              $transaction= Transaction::create([
                                'module' => 'Import Journal Entry',
                                 'module_id' =>   $journal->id,
                               'account_id' => AccountCodes::where('account_name',$row['name'])->get()->first()->account_id,
                                'name' => 'Import Journal Entry Payment',
                                'type' => 'Expense',
                                'amount' =>$row['credit'],
                                'debit' =>$row['credit'],
                                'total_balance' =>$balance,
                                'date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date'])->format('Y-m-d'), 
                                   'status' => 'paid' ,
                                'notes' => 'This expense is from import journal entry payment.' ,
                                'added_by' =>auth()->user()->id,
                            ]);
}

}

    
if(!empty($row['debit'])){
  $debit=AccountCodes::where('account_name',$row['name'])->first();
    if($debit->account_group == 'Cash And Banks'){

     $account= Accounts::where('account_id',$debit->account_id)->first();

if(!empty($account)){
$balance=$account->balance +  $row['debit'];
$item_to['balance']=$balance;
$account->update($item_to);
}

else{
  $cr= AccountCodes::where('id',$debit->account_id)->first();
$balance=0+$row['debit'];

 Accounts::create([
     'account_id'=>$debit->account_id,
      'account_name'=> $cr->account_name,
      'balance'=> $balance,
       'exchange_code'=>'TZS',
        'added_by'=>auth()->user()->id,
]);


}
        
   // save into tbl_transaction
                          $transaction= Transaction::create([
                                    'module' => 'Import Journal Entry',
                                 'module_id' =>   $journal->id,
                               'account_id' => AccountCodes::where('account_name',$row['name'])->get()->first()->account_id,
                                 'name' => 'Import Journal Entry Payment',
                                'type' => 'Income',
                                'amount' =>$row['debit'] ,
                                'credit' => $row['debit'],
                                'total_balance' =>$balance,
                                  'date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date'])->format('Y-m-d'), 
                                   'status' => 'paid' ,
                                'notes' => 'This income is from import journal entry payment.' ,
                                'added_by' =>auth()->user()->id,
                            ]);

}
}    
}

    
    }
  }  




}
