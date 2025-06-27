<?php

namespace App\Http\Controllers\authorization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\SystemModule;
use Brian2694\Toastr\Facades\Toastr;

class RoleController extends Controller
{  

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $modules = SystemModule::all();
        return view('authorization.role.index', compact('roles', 'permissions', 'modules'));
    }

    public function create(Request $request)
    {

        $role = Role::find($request->role_id);
        if($role->added_by == auth()->user()->id){
        if (isset($request->permissions)) {
            $role->refreshPermissions($request->permissions);
        } else {
            $role->permissions()->detach();
        }
        
       Toastr::success('Permission Updated Successfully','Success');
      return redirect()->back();
       }else{
            Toastr::error('You dont have permission to perform this action','Error');
            return redirect()->back();
       }

        
    }

    public function store(Request $request)
    {
        $role = Role::create([
            'slug' => str_replace(' ', '-', $request->slug),
            'added_by'=>auth()->user()->id,
            
        ]);
        Toastr::success('Role Created Successfully','Success');
        return redirect(route('roles.index'));
    }

    public function show($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $modules = SystemModule::all();
        return view('authorization.role.assign', compact('permissions', 'modules', 'role'));
    }


    public function edit(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($request->id);
        $role->slug = str_replace(' ', '-', $request->slug);
        $role->save();

      Toastr::success('Role Updated Successfully','Success');
        return redirect(route('roles.index'));
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        Toastr::success('Role Deleted Successfully','Success');
        return redirect(route('roles.index'));
    }
}
