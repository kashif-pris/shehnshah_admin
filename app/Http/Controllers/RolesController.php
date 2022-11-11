<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                  
                $Roles = Role::all();
        return view('admin.roles.index', compact('Roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);
        $permissions = $request->permisions;
        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
        $role->givePermissionTo($permissions);
        Session::flash('flash_message_sucess', 'Role Sucessfully Add!!!.');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('all-roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $AllowedPermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where(['role_has_permissions.role_id' => $id])
            ->get()->pluck('name', 'id');

        $permissions = Permission::all();
        return view('admin.roles.show', compact('permissions', 'role', 'AllowedPermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
       
        $role = Role::find($id);
      
        $AllowedPermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
         
        ->where(['role_has_permissions.role_id' => $id])
            ->get()->pluck('name', 'id');
         
         
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('permissions', 'role', 'AllowedPermissions'));
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
        
        
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $permissions = $request->permissions;
        $role->syncPermissions($permissions);
        Session::flash('flash_message_sucess', 'Role Sucessfully Update!!!.');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('all-roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $role = Role::findOrFail($id);
        if ($role)
            $role->delete();
        // $role->delete();

        Session::flash('flash_message_sucess', 'Role Sucessfully Delete!!!.');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
