<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use DB;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url',$permission)->first();
        if(isset($checkPermission)){
            $this->authorize($checkPermission->name);
        }
        $Permissions = Permission::all();
        return view('admin.permissions.index', compact('Permissions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $permission = \Request::route()->getName();
        // $checkPermission = DB::table('permissions')->where('url',$permission)->first();
        // if(isset($checkPermission)){
        //     $this->authorize($checkPermission->name);
        // }
        // dd('test');
        $mainpermissions = Permission::where('main', 1)->get();
      
        return view('admin.permissions.create', compact('mainpermissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
      
   
        // $validated = $request->validate([
        //     'name' => 'required|unique:permissions|max:255',
        // ]);
        $parent_id = $request->parent_id ?? 0;
        $main = ($request->main == "main") ? 1 : 0;
        $sub_menu = ($request->sub_menu == "1") ? 1 : 0;

        $Permission=new Permission();
        $Permission->name=$request->display_name;
        $Permission->icon=$request->icon;
        $Permission->url= $request->url;
        $Permission->guard_name='web';
        $Permission->main=$main;
        $Permission->parent_id=$parent_id;
        $Permission->sub_menu=$sub_menu;
        $Permission->save();
//        Permission::create(['name' => $request->name, 'display_name' => $request->display_name, 'icon' => $request->icon,  'url' => $request->url, 'guard_name' => 'web', 'main' => $main, 'parent_id' => $parent_id,'sub_menu',$sub_menu]);
        return redirect()->route('permissions.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Permision = Permission::find($id);
        return view('admin.permissions.show', compact('Permision'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mainpermissions = Permission::where('main', 1)->get();
        $Permision = Permission::find($id);
        return view('admin.permissions.edit', compact('Permision', 'mainpermissions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sub_menu = ($request->sub_menu == "1") ? 1 : 0;
        $Permission = Permission::find($id);
        $Permission->name = $request->name;
        $Permission->icon = $request->icon;
        $Permission->url = $request->url;
        $Permission->sub_menu = $sub_menu;    

        $Permission->display_name = $request->display_name;
        $Permission->save();
        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $Permission)
    {
        $Permission->delete();

        return redirect()->route('permissions.index');
    }
}
