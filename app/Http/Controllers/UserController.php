<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use URL;
use App\Models\Business;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = User::with('business_name')->get();
        return view('admin.users.index', compact('Users'));
        // $Users = User::all();
        // $Business=Business::all();
        // return view('admin.users.index',compact('Users','Business'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        $Business=Business::all();
        return view('admin.users.create',compact('roles','Business'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->role[0]);
        $Users = new  User();
        $Users->name = $request->name;
        $Users->email = $request->email;
        $Users->role_id = $request->role[0];
        $Users->user_type = $request->user_type;
        $Users->password = Hash::make($request->password);
        $Users->businessid = $request->Business;

        // dd($request);

        if ($request->hasfile('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $destinationPath = 'dist/Profile';
            $file->move($destinationPath, $fileNameToStore);
            $Users->profile_photo_path  = $fileNameToStore;
       
           
        }

//        $image = User::file('img');
//        $filename = time() . '.' . $image->getClientOriginalExtension();
//        $path = public_path('images/' . $filename);
//        Image::make($image->getRealPath())->resize(200, 200)->save($path);
//        $Users->image = $filename;
// $Users->profile_photo_path = URL::to('/').'/dist/Profile/'.$fileNameToStore;
        $Users->save();
   
        $roles = $request->role ? $request->role : [];
        $Users->assignRole($roles);
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= User::find($id);

        $roles=Role::all();
   
        return view('admin.users.show', compact('user','roles' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $user= User::with('business_name')->find($id);
        // dd($user);
        $roles=Role::all();
        $Business=Business::all();
        // dd($Business);
        return view('admin.users.edit', compact('user','roles','Business' ));
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
        $user = User::find($id);
        $data = $request->all(); 

//        $data['image']="dist/Profile/defualt.png";
        $fileNameToStore = null;

        if ($request->hasfile('profile')) {
            $file = $request->file('profile');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $destinationPath = 'dist/Profile';
            $file->move($destinationPath, $fileNameToStore);
            $user->image =  $fileNameToStore;
        }
        if (isset($request->password) && $request->password != null)
            $user->password = Hash::make($request->password);

        $user->email = $request->email;
        $user->name = $request->name;
        $user->user_type = $request->user_type;
        $user->businessid = $request->Business;
        $user->save();
        
        $roles = $request->input('role') ? $request->input('role') : [];
        $user->syncRoles($roles);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user)
            $user->delete();

        Session::flash('flash_message_sucess', 'Role Sucessfully Delete!!!.');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('users.index');
    }
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $authUser = Auth::user(); 
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken; 
            $success['name'] =  $authUser->name;
   
            return $this->sendResponse($success, 'User signed in');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    
}
