<?php

namespace App\Http\Controllers\authorization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Application;
use Brian2694\Toastr\Facades\Toastr;
//use App\Region;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Imports\ImportUser;
use App\Imports\ImportUserDetails;
use App\Models\Payroll\EmployeePayroll;
use App\Models\UserDetails\BasicDetails;
use App\Models\UserDetails\BankDetails;
use App\Models\UserDetails\SalaryDetails;
use Response;
use Session;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $users = User::whereNull('member_id')->whereNull('visitor_id')->get();

        return view('authorization.users.index',Compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        $department = Department::all();
        //$region = Region::all();
        return view('authorization.users.add',Compact('roles','department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $validatedData = $request->validate([
           
            'name' => 'required|max:255|min:3|string',
            //'role' => 'required|string',
           
            'email' => 'required|string|min:3|unique:users', 
           
           // 'password' => 'required|string|min:6|confirmed',
           
          
        ]);
        //
        $user = User::create([
            'name' => $request['name'],
           
            'email' => $request['email'],
            
            'password' => Hash::make($request['password']),
            
            'added_by' => auth()->user()->added_by,
            'status' => 1,
            'is_active' => 1,
            'department_id' => $request['department_id'],
            'department_id' => $request['department_id'],
            'joining_date' => $request['joining_date'],
            'leave_balance' => $request['leave_balance'],
        ]);

        if (!$user) {
          //  return redirect(route('users.index'));
        }

        $user->roles()->attach($request['role']);

       Toastr::success('User Created Successfully','Success');
        return redirect(route('users.index'));
       
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
        $users = User::all();

        return view('authorization.users.index2',Compact('users'));
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
        $role = Role::all();
       
        //$user = User::with('Role')->where('id',$id)->get();
        $user = User::all()->where('id',$id);
        $user_id = User::find($id);
        $department = Department::all();
        $designation= Designation::where('department_id', $user_id->department_id)->get();
        return view('authorization.users.edit',compact('user','role','department','designation'));
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
        $user = User::findOrFail($id);
        $user->name = $request['name'];
       
        $user->email = $request['email'];
        $user->department_id = $request['department_id'];           
        $user->designation_id = $request['designation_id'];
        $user->joining_date = $request['joining_date'];
        $user->added_by = auth()->user()->added_by;
        $user->save();

        if (!$user) {
           
        }
        $user->roles()->detach();
        $user->roles()->attach($request['role']);

         Toastr::success('User Updated Successfully','Success');
        return redirect(route('users.index'));
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
        $user = User::find($id);
        $user->delete();

       Toastr::success('User Deleted Successfully','Success');
        return redirect(route('users.index'));
    }

    public function findDepartment(Request $request)
    {

        $district= Designation::where('department_id',$request->id)->get();                                                                                    
               return response()->json($district);

}


public function details($id)
    {
        //
          $type = Session::get('type');
        if(empty($type))
        $type = "basic";

        $basic_details = BasicDetails::where('user_id',$id)->first();
        $bank_details = BankDetails::where('user_id',$id)->first();
        $salary_details = SalaryDetails::where('user_id',$id)->first();
            $user =  User::find($id);
            $user_id=$id;
        return view('user_details.index',compact('type','basic_details','bank_details','salary_details','user','user_id'));
    }

   public function user_import(Request $request){
       
       if($request->id == 0){
           
           return view('authorization.users.import');
       }
       
         $data = Excel::import(new ImportUser, $request->file('file')->store('files'));
        
             Toastr::success('File Imported Successfully','Success');
        return redirect()->back();
   }

public function details_import(Request $request){
       
       if($request->id == 0){
           
           return view('authorization.users.import_details');
       }
       
         $data = Excel::import(new ImportUserDetails, $request->file('file')->store('files'));
        
         Toastr::success('File Imported Successfully','Success');
        return redirect()->back();
   }

 public function user_sample(Request $request){
        //return Storage::download('items_sample.xlsx');
        $filepath = public_path('user_sample.xlsx');
        return Response::download($filepath); 
    }

 public function details_sample(Request $request){
        //return Storage::download('items_sample.xlsx');
        $filepath = public_path('user_details_sample.xlsx');
        return Response::download($filepath); 
    }


 public function save_disable($id)
    {
        //
        $user =  User::find($id);

        $data['disabled_date']=date('Y-m-d');
         $data['disabled']='1';
          $data['payroll']='1';

       $user->update($data);

      $payroll=   EmployeePayroll::where('user_id', $id)->first();
        
if(!empty($payroll)){
$item['disabled']='1';
  $payroll->update($item);
}

 Toastr::success('User Disabled Successfully','Success');
        return redirect(route('users.index'));
    }

}
