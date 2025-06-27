<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;

use App\Models\Accounting\GroupAccount;
use App\Models\Accounting\SubGroupAccount;
use App\Models\Accounting\ClassAccount;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class SubGroupAccountController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $user=auth()->user()->added_by;
        $group = SubGroupAccount::where('added_by',$user)->where('disabled','0')->get();
         $group_account = GroupAccount::where('added_by',$user)->get();
        return view('accounting.sub_group.data', compact('group','group_account'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
       $class_account = ClassAccount::all();
        return view('accounting.group_account.create', compact('class_account'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

      $nameArr =$request->name ;
        $subArr = $request->sub_group  ;
      

                 if(!empty($nameArr)){
            for($i = 0; $i < count($nameArr); $i++){
                if(!empty($nameArr[$i])){

                     $group=GroupAccount::where('name',$nameArr[$i])->where('added_by', auth()->user()->added_by)->first();
                    $items = array(
                        'name' => $nameArr[$i],
                        'sub_group' =>   $subArr[$i],
                      'class' =>   $group->class,
                        'group_id' =>  $group->group_id,
                         'type' => $group->type,
                           'order_no' => $i,
                           'added_by' => auth()->user()->added_by);
                       
                       SubGroupAccount::create($items);  ;
    
    
                }
            }

        } 


          
            Toastr::success('Sub Group Account Created Successfully','Success');
            return redirect('sub_group_account');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
       $user=auth()->user()->added_by;
        $data=  SubGroupAccount::find($id);       
        $group_account = GroupAccount::where('added_by',$user)->get();
        return View::make('accounting.sub_group.data', compact('data','group_account','id'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     

$group_account =   SubGroupAccount::find($id);

      $group=GroupAccount::where('name',$request->name)->where('added_by', auth()->user()->added_by)->first();

               $data['name']=$request->name;
            $data['sub_group']=$request->sub_group;
            $data['class']= $group->class;
            $data['group_id']=$group->group_id;
            $data['type']=$group->type;
            $data['added_by']= auth()->user()->added_by;
    
           $group_account->update($data);
                    

     
        Toastr::success('Sub Group Account Updated Successfully','Success');
        return redirect('sub_group_account');

 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $group_account =   SubGroupAccount::find($id);
      $data['disabled']='1';
    
           $group_account->update($data);

        Toastr::success('Sub Group Account Deleted Successfully','Success');
        return redirect('sub_group_account');
    }
}
