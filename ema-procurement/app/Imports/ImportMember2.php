<?php

namespace App\Imports;

use App\Models\JournalEntry ;
use App\Models\AccountCodes ;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Models\Cards\Cards;
use App\Models\Cards\CardAssignment;
use DateTime;
use App\Models\Transaction;
use App\Models\Member\Member;
use App\Models\User;
use App\Models\Accounts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use Carbon\Carbon;

class ImportMember  implements ToCollection,WithHeadingRow

{ 
//, WithValidation
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
      foreach ($rows as $row) 
      {

       $check=Member::where('full_name',$row['full_name'])->first();

       if(!empty($check)){

      if(!empty($row['due_date'])){  
$new= \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['due_date'])->format('Y-m-d') ;

}
else{
$new='';
}

//dd($new);
     $member = Member::where('full_name',$row['full_name'])->update([
        'due_date' => $new,

        ]);
     

}





      } 

    
    
  }  




}
