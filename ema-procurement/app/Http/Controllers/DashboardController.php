<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member\Member;
use App\Models\Accounting\JournalEntry;
use App\Models\Accounting\Deposit;
use App\Models\Accounting\Expenses;
use App\Models\User;
use App\Models\Payroll\SalaryPayment;
use App\Models\restaurant\Order;
use App\Models\Facility\Invoice;
use DateTime;
use DB;

class DashboardController extends Controller
{
    public function index() {


         $deposit=Deposit::sum('amount');
         $expense=Expenses::where('multiple','0')->sum('amount');

          $date=date('Y-m-d');
           $active_member= Member::where('due_date', '>', $date)->where('status', 1)->count();   
          $exp_member= Member::where('due_date', '<=', $date)->orwhereNull('due_date')->where('status', 1)->count();
          $invoice= Order::whereYear('invoice_date', date('Y'))->where('good_receive',1)->sum(\DB::raw('invoice_amount * exchange_rate'));
         $facility= Invoice::whereYear('invoice_date', date('Y'))->where('good_receive',1)->sum(\DB::raw('invoice_amount * exchange_rate'));

           $payments= SalaryPayment::select([
                DB::raw('MONTHNAME(STR_TO_DATE(payment_month,"%Y-%m-%d")) as month'),
                DB::raw('sum(payment_amount) as amount'),    
                 DB::raw('MONTH(STR_TO_DATE(payment_month,"%Y-%m-%d")) as month_no'),         
            ])
             ->where( DB::raw('YEAR(STR_TO_DATE(payment_month,"%Y-%m-%d"))'), '=', date('Y')) 
            ->groupBy('month')
        ->orderBy('month_no')
            ->get();
          
            
if(!empty($payments[0])){
  foreach($payments as $row){
               $month[]=$row['month'];
                 $amount[]=$row['amount'];

} 

}

else{

                $month[]='';
                 $amount[]='';
}


        return view('dashboard.dashboard1',compact('deposit','expense','active_member','exp_member','invoice','payments','month','amount','facility'));
    }
}
