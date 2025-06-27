<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use App\Models\Accounting\AccountCodes;
use App\Models\Leave\Leave;
use App\Models\Leave\LeaveCategory;
use App\Models\Accounting\JournalEntry;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class LeaveCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = LeaveCategory::all(); 
        return view('leave.leave_category',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $data['added_by']=auth()->user()->added_by;
        

        $leave= LeaveCategory::create($data);

          Toastr::success('Created Successfully','Success');
        return redirect(route('leave_category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
    }

    public function discountModal(Request $request)
    {
               

                 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data =  LeaveCategory::find($id);
        
        return view('leave.leave_category',compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $leave=  LeaveCategory::find($id);

   $data = $request->all();
      $data['added_by']=auth()->user()->id;

                
        $leave->update($data);
        
        Toastr::success('Updated Successfully','Success');
        return redirect(route('leave_category.index'));

       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $leave=  LeaveCategory::find($id);
        $leave->update(['disabled'=> '1']);
        
         Toastr::success('Deleted Successfully','Success');
        return redirect(route('leave_category.index'));
    }

    public function category(Request $request)
    {
        //
        $data = $request->all();
        $data['added_by']=auth()->user()->id;
        $category =LeaveCategory::create($data);
       
       if ($request->ajax()) {

            return response()->json($category);
       }
    }

    public function approve($id)
    {
        //
        $leave = Leave::find($id);
        $data['application_status'] = 2;
    $data['approve_by'] = auth()->user()->id;;
        $leave->update($data);
        return redirect(route('leave.index'))->with(['success'=>'Approved Successfully']);
    }

     public function reject($id)
    {
        //
        $leave = Leave::find($id);
        $data['application_status'] = 3;
        $leave->update($data);
        return redirect(route('leave.index'))->with(['success'=>'Rejected Successfully']);
    }

}
