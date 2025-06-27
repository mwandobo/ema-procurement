<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(auth()->user()->member_id);
        return view('home');

        //return view('dashboard.dashboard1');
    }
    
    public function showChangePswd(){
        return view('auth.change_password');
    }

    public function changePswd(Request $request){
        if(!Hash::check($request->get('current-password'), Auth::user()->password)){
            //check if password matches
            
           Toastr::error('Curent Password does not match with Old Password','Error');
            return back();
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
                //current password and new password are the same
                 Toastr::error('New password can not be the same as your old password change to new one','Error');
                  return back();
        }

        $this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed'
        ]);

        // update password

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->get('new-password'))
        ]);

             Toastr::success('Password changed successfully','Success');
                  return back();

    }
    
    
    
       public function format_number(Request $request)
    {
        //dd($request->all());
       $id=str_replace(",","",$request->id);
       if($id > 999){
       $price=number_format($id,2);
       }
       else{
        $price=$id;   
       }
            

            return response()->json($price);
        
    }
    
}
