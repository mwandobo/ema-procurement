<?php

namespace App\Imports;

use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\JournalEntry;
use App\Models\Inventory\Location;
use App\Models\Bar\POS\EmptyHistory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use DateTime;
use App\Models\Bar\POS\Items;
use App\Models\Bar\POS\Category;
use App\Models\Bar\POS\Activity;
use App\Models\Bar\POS\PurchaseHistory;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use DB;

class ImportBarItems  implements ToCollection,WithHeadingRow

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

 
        if($row['empty'] == 'Yes'){
          $empty=1;
        }

        elseif($row['empty'] == 'No'){
          $empty=0;

        }
        
        $x=Category::where('name',$row['category'])->first();
        if(!empty($x)){
            $category=$x->id;
        }
        
        else{
           $category='';  
        }


$old=Items::where(DB::raw('lower(name)'), strtolower($row['name']))->first();  

    if (empty($old)) { 
        
     $item= Items::create([
       
        'name' => $row['name'],
        'category_id' => $category,
        'cost_price' => $row['cost_price'],
        'sales_price' => $row['sales_price'],
        'unit_price' => $row['sales_price'],
        'quantity' => $row['quantity'],
        'empty' =>  $empty,
        'bottle' => $row['bottle'],
        'unit' => $row['unit'],
        'description' => $row['description'],
        'added_by' => auth()->user()->added_by,

        ]);

if(!empty($item)){
                    $activity =Activity::create(
                        [ 
                            'added_by'=>auth()->user()->added_by,
                           'user_id'=>auth()->user()->id,
                            'module_id'=>$item->id,
                             'module'=>'Inventory',
                            'activity'=>"Inventory " .  $item->name. "  Created",
                        ]
                        );                      
       }

}
else{
    
     Items::find($old->id)->update([
        'quantity' => $old->quantity + $row['quantity'],
        ]);
        
        $item= Items::find($old->id);

if(!empty($item)){
                    $activity =Activity::create(
                        [ 
                            'added_by'=>auth()->user()->added_by,
                             'user_id'=>auth()->user()->id,
                            'module_id'=>$item->id,
                             'module'=>'Inventory',
                            'activity'=>"Inventory " .  $item->name. " is Updated",
                        ]
                        );                      
} 

}
    

     $today=date('Y-m-d');
     //dd($today);
        //$new= \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($today)->format('Y-m-d');

              $date = explode('-', $today);

if($row['balance'] > 0){
     $drjournal= JournalEntry::create([
        'account_id' => AccountCodes::where('account_name','Stock Main Store')->get()->first()->account_id,
       'date' =>  $today, 
        'month' => $date[1],     
        'year' => $date[0],
        'credit' => '0',
        'debit' => $row['balance'],
        'income_id' => $item->id,
        'name' => 'POS Items',
        'transaction_type' => 'import_pos_items',
        'notes' => 'POS Item Balance for ' .$row['name'],
        'added_by' => auth()->user()->id,
        ]);


        $crjournal= JournalEntry::create([
          'account_id' => AccountCodes::where('account_name','Open Balance')->get()->first()->account_id,
         'date' =>  $today, 
          'month' => $date[1],     
          'year' => $date[0],
          'credit' => $row['balance'],
          'debit' => '0',
          'income_id' => $item->id,
          'name' => 'POS Items',
          'transaction_type' => 'import_pos_items',
          'notes' => 'POS Item Balance for ' .$row['name'],
          'added_by' => auth()->user()->id,
          ]);

}

          $nameArr=$row['quantity'];
 if($nameArr > 0){ 

                      $loc=Location::where('main','1')->first();

                       $lists= array(
                            'quantity' =>   $nameArr,
                             'item_id' =>$item->id,
                               'added_by' => auth()->user()->added_by,
                             'purchase_date' =>  $today,
                             'location' =>    $loc->id,
                            'type' =>   'Purchases');
                           
                         PurchaseHistory ::create($lists);   


                         
                         $lq['crate']=$loc->crate + $nameArr;
                         $lq['bottle']=$loc->bottle+ ($nameArr * $row['bottle']);
                         Location::where('main','1')->update($lq);
          
                       
                    }


                  if($nameArr > 0){ 
                    if($empty == '1'){

                         $pur_items= array(
                          'item_id' => $item->id,
                          'purpose' =>  'Purchase Empty',
                          'date' =>  $today,
                          'has_empty' =>    $empty,
                          'description' => $row['description'],
                          'empty_in_purchase' =>  $nameArr,
                          'purchase_case' =>  $nameArr,
                          'purchase_bottle' =>  $nameArr * $row['bottle'],                            
                          'added_by' => auth()->user()->added_by);
                          
                         
                       EmptyHistory::create($pur_items);  
          
                       
                
                }
            
            }   


   

      } 

    
    
  }  




}
