<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member\Business;
use App\Models\Member\Member;
use App\Models\Visitors\Visitor;
use App\Models\Member\MembershipType;
use App\Models\Member\Sports;
use App\Models\Member\Dependant;
use App\Models\Cards\Cards;
use App\Models\Cards\CardAssignment;
use App\Models\restaurant\Order;
use App\Models\User;
use App\Models\Country;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use PDF;
use Brian2694\Toastr\Facades\Toastr;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view("members.application_form");
        $country=Country::all(); 
        return view("members.application_form1",compact('country'));
    }

    public function gymkhana_test(){

        // $data = PacelHistory::where('id', $id)->first();

        //if landscape heigth * width but if portrait widht *height      // dd($dataResult);
        $customPaper = array(0,0,198.425,494.80);

        $pdf = PDF::loadView('members.gymkhana_pdf')->setPaper($customPaper, 'portrait');
        return $pdf->stream('gymkhana_test.pdf');

    }
    
    public function gymkhana_test2(){

        // $data = PacelHistory::where('id', $id)->first();

        //if landscape heigth * width but if portrait widht *height      // dd($dataResult);
        $customPaper = array(0,0,198.425,494.80);

        $pdf = PDF::loadView('members.gymkhana2_pdf')->setPaper($customPaper, 'portrait');
        return $pdf->stream('gymkhana_test2.pdf');

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

        $validated = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'full_name' => 'required',
            'gender' => 'required',
            'membership_class'=>'required',
            'd_o_birth'=>'required',
            'business_name' => 'nullable',
            'business_address'=>'nullable',
            'employer' => 'nullable',
            'designation' => 'nullable',
           // 'first_proposer'=>'required',
            //'second_proposer'=>'required',
            'picture'=>'required',
        ]);
        $validated->after(function ($validator) use ($request)  {
            $age = Carbon::parse($request->d_o_bith)->age;
           if (($age <18 || $age >18) && $request->membership_class == 4) {
                $validator->errors()->add('age_error', 'For Junior Membership age should be between 18 and 21 only');
            }
        });
        // $validated->after(function ($validator) use ($request)  {
      
        //    if ($request->first_proposer == $request->second_proposer) {
        //         $validator->errors()->add('age_error', 'First and Second Proposer should be Different People');
        //     }
        // });
        if ($validated->fails()) {
            return redirect('members/non_cooperate')
                        ->withErrors($validated)
                        ->withInput();
        }
        //
        $data['full_name'] =  $request->full_name;
        $data['nationality'] =  $request->nationality;
        $data['address'] =  $request->address;
        $data['phone1'] =  $request->phone1;
        $data['phone2'] =  $request->phone2;
        $data['gender'] =  $request->gender;
        $data['d_o_birth'] =  $request->d_o_birth;
        $data['email'] =  $request->email;
        $data['membership_class'] =  $request->membership_class;
        $data['membership_reason'] =  $request->other_info;
        $data['spouse_name'] =  $request->spouse_name;
        $data['first_proposer'] =  "sam";
        $data['second_proposer'] =  "sam";

        // $data['first_proposer'] =  $request->first_proposer;
        // $data['second_proposer'] =  $request->second_proposer;

        if ($request->hasFile('picture')) {
            $photo=$request->file('picture');
            $fileType=$photo->getClientOriginalExtension();
            $fileName=rand(1,1000).date('dmyhis').".".$fileType;
            $logo=$fileName;
            $photo->move('assets/img/member_pasport_size', $fileName );
             $data['picture'] = $logo;

        }

        $member = Member::create($data);



        



        $business_data['member_id'] = $member->id;
         $business_data['business_name'] = $request->business_name;
         $business_data['business_address'] = $request->business_address;
         $business_data['employer'] = $request->employer;
         $business_data['designation'] = $request->designation;

         $business = Business::create($business_data);


         $sports_name_arr = $request->sport_name;
         $years_played_arr = $request->years_played;
         $level_arr = $request->level;
         if(!empty($sports_name_arr)){
            for($i=0;$i<count($sports_name_arr);$i++){
                $sports_data['member_id'] = $member->id;
                $sports_data['sport_name'] = $sports_name_arr[$i];
                $sports_data['years_played'] = $years_played_arr[$i];
                $sports_data['level'] = $level_arr[$i];

if(!empty($years_played_arr[$i]) || !empty($level_arr[$i])){
    $sports = Sports::create($sports_data);
}
                
            }
         }

         $name_arr = $request->name;
         $birth_date_arr = $request->birth_date;

         if(!empty($name_arr)){
            for($i=0;$i<count($name_arr);$i++){
                

            $dependant_data['name'] = $name_arr[$i];
            $dependant_data['member_id'] = $member->id;
            $dependant_data['birth_date'] = $birth_date_arr[$i];
            $dependant = Dependant::create($dependant_data);

            }
         }



         $user_data['email'] = $request->email;
          $user_data['payroll'] = '1';
         $user_data['member_id'] = $member->id;
         $user_data['password'] =  Hash::make(strtoupper($request->full_name));
         $user_data['name'] = $request->fname.''.$request->lname;
         $user  = User::create($user_data);

         $role = Role::where('slug','Member')->get()->first();
         $user->roles()->attach($role->id);

         
         return redirect(url('/'))->with(['success'=>'Congraturation Your Registration Request Received successfull. Your Login credential is Email and Your Last name in Capital Letter']);








    }
    
    public function member_business_index($member_id){
        return view("members.member_business_view",compact('member_id'));
    }
    
    
    public function member_business_insert(Request $request){
        
        $business_data['member_id'] = $request->member_id;
         $business_data['business_name'] = $request->business_name;
         $business_data['business_address'] = $request->business_address;
         $business_data['employer'] = $request->employer;
         $business_data['designation'] = $request->designation;

         $business = Business::create($business_data);
         
         return redirect()->route('member_list')->with(['success'=>'Member Business Details Saved Successfully']);
    }
    
    public function member_business_edit($member_id, $id){

         $data = Business::where('member_id',$member_id)->where('id', $id)->first();
        return view("members.member_business_view",compact('data','id','member_id'));
    }
    
    public function member_business_updates(Request $request, $id){
        
        $business = Business::find($id);
        
        $business_data['member_id'] = $request->member_id;
         $business_data['business_name'] = $request->business_name;
         $business_data['business_address'] = $request->business_address;
         $business_data['employer'] = $request->employer;
         $business_data['designation'] = $request->designation;

         $business_updt = $business->update($business_data);

         
        Toastr::success('Member Details Successfully','Success');
         return redirect()->route('manage_member.show',$business->member_id);

    }


      public function member_sports_index($member_id){
        return view("members.member_sports",compact('member_id'));
    }
    
    
    public function member_sports_insert(Request $request){
        
          $sports_name_arr = $request->sport_name;
         $years_played_arr = $request->years_played;
         $level_arr = $request->level;
         if(!empty($sports_name_arr)){
            for($i=0;$i<count($sports_name_arr);$i++){
                $sports_data['member_id'] = $member->id;
                $sports_data['sport_name'] = $sports_name_arr[$i];
                $sports_data['years_played'] = $years_played_arr[$i];
                $sports_data['level'] = $level_arr[$i];

if(!empty($years_played_arr[$i]) || !empty($level_arr[$i])){
    $sports = Sports::create($sports_data);
}
                
            }
         }
         
         return redirect()->route('member_list')->with(['success'=>'Member Business Deatils Saved Successfully']);
    }
    
    public function member_sports_edit($member_id, $id){

         $data = Sports::where('member_id',$member_id)->where('id', $id)->first();
        return view("members.member_sports_edit",compact('data','id','member_id'));
    }
    
    public function member_sports_update(Request $request, $id){
        
        $sports = Sports::find($id);
        
           $sports_name_arr = $request->sport_name;
         $years_played_arr = $request->years_played;
         $level_arr = $request->level;
         if(!empty($sports_name_arr)){
            for($i=0;$i<count($sports_name_arr);$i++){
                $sports_data['member_id'] = $sports->member_id;
                $sports_data['sport_name'] = $sports_name_arr[$i];
                $sports_data['years_played'] = $years_played_arr[$i];
                $sports_data['level'] = $level_arr[$i];

if(!empty($years_played_arr[$i]) || !empty($level_arr[$i])){
    
     $sports_updt = $sports->update($sports_data);
    
}
                
            }
         }

        

         Toastr::success('Member Details Successfully','Success');
         return redirect()->route('manage_member.show',$sports->member_id);


    }



    public function member_reg_admin_view(){
        
        $proposer = Member::where('disabled',0)->get();
        $membership_type = MembershipType::all();
         $country=Country::all(); 
         $corp= MembershipType::where('name','CORPORATE MEMBER')->first();
         $members = Member::where('disabled',0)->where('membership_class', 1)->get();
         
        return view("members.member_registration",compact('membership_type','proposer','country', 'members','corp'));
    }


    public function member_reg_admin(Request $request){
        
            $validated = Validator::make($request->all(), [
            'member_id' => 'required|unique:users',
            'full_name' => 'required',
            'membership_class' => 'required'
        ]);
        // $validated->after(function ($validator) use ($request)  {
        //     $age = Carbon::parse($request->d_o_bith)->age;
        //   if (($age <18 || $age >18) && $request->membership_class == 4) {
        //         $validator->errors()->add('age_error', 'For Junior Membership age should be between 18 and 21 only');
        //     }
        // });
       
        // if ($validated->fails()) {
        //     return redirect('members/non_cooperate')
        //                 ->withErrors($validated)
        //                 ->withInput();
        // }
        //
        
        // $last_card_id = Member::all()->last();
        
        $data['full_name'] =  $request->full_name;
        $data['nationality'] =  $request->nationality;
        $data['address'] =  $request->address;
        $data['phone1'] =  $request->phone1;
        $data['phone2'] =  $request->phone2;
        $data['gender'] =  $request->gender;
        $data['d_o_birth'] =  $request->d_o_birth;
       $data['due_date'] =  $request->due_date;
        $data['email'] =  $request->email;
        $data['member_id'] =  $request->member_id;
        $data['membership_class'] =  $request->membership_class;;
        $data['membership_reason'] =  $request->membership_reason;
     $data['corporate_name'] =  $request->corporate_name;
        $data['other_info'] =  $request->other_info;
        $data['first_proposer'] =  "sam";
        $data['second_proposer'] =  "sam";

        // $data['first_proposer'] =  $request->first_proposer;
        // $data['second_proposer'] =  $request->second_proposer;

        if ($request->hasFile('picture')) {
            $photo=$request->file('picture');
            $fileType=$photo->getClientOriginalExtension();
            $fileName=rand(1,1000).date('dmyhis').".".$fileType;
            $logo=$fileName;
            $photo->move('assets/img/member_pasport_size', $fileName );
             $data['picture'] = $logo;

        }

        $member = Member::create($data);


         $user_data['email'] = $request->member_id;
         $user_data['member_id'] = $member->id;
         $user_data['password'] =  Hash::make($request->member_id);
         $user_data['name'] = $request->full_name;
         $user_data['is_active'] = 1;
         $user_data['payroll'] = 1;
         
          $check=User::where('email', $request->member_id)->first();
               if(!empty($check)){
                  $check->update($user_data);


             }else{
         $user  = User::create($user_data);

         $role = Role::where('slug','Member')->get()->first();
         $user->roles()->attach($role->id);
         
         }
         
    
      

         
         return redirect()->back()->with(['success'=>'Registration Request Received successfull. User Login credential is Member ID and Password Member ID']);


    }

    
    public function member_reg_admin_edit($id){
        $data = Member::find($id);
        $membership_type = MembershipType::all();
        $corp= MembershipType::where('name','CORPORATE MEMBER')->first();
        $country=Country::all(); 
        //return view("members.member_registration",compact('data','id','country', 'membership_type','corp'));

       return view("members.member_list",compact('data','id','country', 'membership_type','corp')); 
    }
    
    public function member_reg_admin_updates(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'member_id' => 'required|unique:users',
            'full_name' => 'required',
            'membership_class' => 'required'
        ]);
        //   $validated = Validator::make($request->all(), [
        //     'email' => 'required|unique:users',
        //     'full_name' => 'required',
        //     'gender' => 'required',
        //     'd_o_birth'=>'required',
        //     'picture'=>'required',
        // ]);
   
//   dd("member failed kk");
        $member = Member::find($id);
        
        
        $data['full_name'] =  $request->full_name;
        $data['nationality'] =  $request->nationality;
        $data['address'] =  $request->address;
        $data['phone1'] =  $request->phone1;
        $data['phone2'] =  $request->phone2;
        $data['gender'] =  $request->gender;
        $data['d_o_birth'] =  $request->d_o_birth;
       //$data['due_date'] =  $request->due_date;
        $data['email'] =  $request->email;
        $data['member_id'] =  $request->member_id;
        $data['membership_class'] =  $request->membership_class;
        $data['corporate_name'] =  $request->corporate_name;
        $data['membership_reason'] =  $request->membership_reason;
        $data['other_info'] =  $request->other_info;
        $data['first_proposer'] =  "sam";
        $data['second_proposer'] =  "sam";

        // $data['first_proposer'] =  $request->first_proposer;
        // $data['second_proposer'] =  $request->second_proposer;

        if ($request->hasFile('picture')) {
            $photo=$request->file('picture');
            $fileType=$photo->getClientOriginalExtension();
            $fileName=rand(1,1000).date('dmyhis').".".$fileType;
            $logo=$fileName;
            $photo->move('assets/img/member_pasport_size', $fileName );
             $data['picture'] = $logo;

        }

        

        $member_updt = $member->update($data);

         $user  = User::where('member_id', $member->id)->first();
         
         $user_data['email'] = $request->member_id;
         $user_data['password'] =  Hash::make($request->member_id);
         $user_data['name'] = $request->full_name;
         
         
         $user_updt = $user->update($user_data);

     if($member->is_dependent == '1'){
       $name_arr = $request->full_name;
         $birth_date_arr = $request->d_o_birth;
       $gender_arr = $request->gender;

      $dependant=Dependant::find($member->dependant_id);

            $dependant_data['name'] = $name_arr;
             $dependant_data['gender'] = $gender_arr;
            $dependant_data['birth_date'] = $birth_date_arr;

            $dependant ->update($dependant_data);

}
         Toastr::success('Member Updated Successfully','Success');
         return redirect()->route('manage_member.show',$member->id);


        
    }

 public function add_dependant($id){
           $dep=Dependant::where('member_id',$id)->where('disabled',0)->count();
        return view("members.member_dependent_view",compact('id','dep'));
    }

 public function save_dependant(Request $request)
    {    

          
         $name_arr = $request->name;
         $birth_date_arr = $request->birth_date;
       $gender_arr = $request->gender;
        $pic_arr = $request->picture;

      $member=Member::find($request->id);

       $mem=preg_replace('/[^0-9]/', '',$member->member_id);

        if(!empty($name_arr)){
            for($i=0;$i<count($name_arr);$i++){
                
             $dep=Dependant::where('member_id',$request->id)->where('disabled',0)->count();              
              $x=$dep+1;

            $dependant_data['name'] = $name_arr[$i];
            $dependant_data['member_id'] = $member->id;
            $dependant_data['member'] = $mem.".".$x." FMM";
             $dependant_data['gender'] = $gender_arr[$i];
            $dependant_data['birth_date'] = $birth_date_arr[$i];
            $dependant_data['added_by'] = auth()->user()->added_by;

            $dependant = Dependant::create($dependant_data);
            
            
            if(!empty($pic_arr[$i])){
            $photo=$pic_arr[$i];
            $fileType=$photo->getClientOriginalExtension();
            $fileName=rand(1,1000).date('dmyhis').".".$fileType;
            $logo=$fileName;
            $photo->move('assets/img/member_pasport_size', $fileName );
             $data['picture'] = $logo;

        }
        
        else{
            
           $data['picture'] = '';  
        }
        

            
     

      $member_dependant = Member::create([       
            'full_name' => $name_arr[$i],
            'member_id' => $mem.".".$x." FMM",
            'd_o_birth' => $birth_date_arr[$i],
            'gender' => $gender_arr[$i],
            'dependants' => '',
            'dependant_id' =>$dependant ->id ,
            'is_dependant' => 1,
            'due_date' =>$member->due_date,
            'membership_class' => $member->membership_class,
            'status' => $member->status,
            'picture' =>  $data['picture'],
            'card_id' => $member->card_id,
           'first_proposer' =>$member->first_proposer,
           'second_proposer' =>$member->second_proposer,
            ]);

        $user1 = User::create([
       'name'=>$name_arr[$i],
       'email'=> $mem.".".$x." FMM",
       'member_id'=> $member_dependant->id,
       'is_active'=>1,
        'payroll' => 1,
       'password'=> Hash::make($mem.".".$x." FMM"),
      
      ]);

      $role = Role::where('slug','Member')->get()->first();
      $user1->roles()->attach($role->id);

      

}
         }

        
         Toastr::success('Dependent Created Successfully.','Success');
         return redirect(route('manage_member.show',$request->id));


    }
    
 public function edit_dependant($id){
           $data=Dependant::find($id);
            $member=Member::where('disabled',0)->where('dependant_id',$id)->first();
        return view("members.member_dependent_edit",compact('id','data','member'));
    }


 public function update_dependant(Request $request, $id)
    {    

          
         $name_arr = $request->name;
         $birth_date_arr = $request->birth_date;
       $gender_arr = $request->gender;
        $pic_arr = $request->picture;

      $dependant=Dependant::find($id);

            $dependant_data['name'] = $name_arr;
             $dependant_data['gender'] = $gender_arr;
            $dependant_data['birth_date'] = $birth_date_arr;

            $dependant ->update($dependant_data);
            
            if(!empty($pic_arr)){
            $photo=$pic_arr;
            $fileType=$photo->getClientOriginalExtension();
            $fileName=rand(1,1000).date('dmyhis').".".$fileType;
            $logo=$fileName;
            $photo->move('assets/img/member_pasport_size', $fileName );
             $data['picture'] = $logo;

        }
        
        else{
            
           $data['picture'] = '';  
        }
        
        
         $member=Member::where('dependant_id',$id)->first();
        
    if(!empty($pic_arr)){
              unlink('assets/img/member_pasport_size/'. $member->picture);             
            }
            

                  
          $member_dependant = Member::where('dependant_id',$id)->update([       
            'full_name' => $name_arr,
            'd_o_birth' => $birth_date_arr,
            'gender' => $gender_arr,
            'picture' =>  $data['picture']
            ]);

        $user1 = User::where('member_id',$member->id)->update([ 
       'name'=>$name_arr,      
      ]);




        
         Toastr::success('Dependent Updated Successfully.','Success');
         return redirect(route('manage_member.show',$dependant->member_id));


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

    public function reg_type(Request $request)
    {
        //
        $proposer = Member::where('disabled',0)->get();
       $membership_type = MembershipType::all();
       $country=Country::all(); 
        if($request->type == 1)
        return view("members.application_form",compact('membership_type','proposer','country'));
        else{
            return view("members.application_form2");
        }
    }

    public function non_cooperate(){
        $proposer = Member::where('disabled',0)->get();
        $membership_type = MembershipType::all();
         $country=Country::all(); 
        return view("members.application_form",compact('membership_type','proposer','country'));
    }

    public function member_class(Request $request){
       
        
        return response()->json(['html' => view('members.family')->render()]);

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
    }

    public function image_update(Request $request,$id){
        $id = $request->id;

        if ($request->hasFile('picture')) {
            $photo=$request->file('picture');
            $fileType=$photo->getClientOriginalExtension();
            $fileName=rand(1,1000).date('dmyhis').".".$fileType;
            $logo=$fileName;
            $photo->move('assets/img/member_pasport_size', $fileName );
             $data['picture'] = $logo;

        }

        $member = Member::find($id)->update($data);
                    
        //$data = MembershipPayment::find($id);
       // $filename =  $data->attachment;
         Toastr::success('Image Uploaded Successfully','Success');
        return redirect()->back();


    }

    public function image_update_model(Request $request){
        $id = $request->id;
                    
        //$data = MembershipPayment::find($id);
       // $filename =  $data->attachment;
         $data = Member::find($id);
        return view('members.update_image',compact('id','data'));


    }

    public function findEmail(Request $request)
    {
 
  $member_info  = Member::where('disabled',0)->where('email', $request->id)->first();
 if (!empty($member_info)) {
$price="Email is already registered. Enter another email" ;
}
else{
$price='' ;
 }


                return response()->json($price);	                  
 
    }


 public function order_summary(Request $request)
    {
       
         if(!empty(auth()->user()->member_id)){
            $data=Order::where('user_id', auth()->user()->member_id)->get();
          $member_info  = Member::where('id', auth()->user()->member_id)->first();
          }
             else if(!empty(auth()->user()->visitor_id)){
            $data=Order::where('user_id', auth()->user()->visitor_id)->get();
          $member_info  = Visitor::where('id', auth()->user()->visitor_id)->first();
          }

        return view('members.order_report',
            compact('data','member_info'));
    
    }


}
