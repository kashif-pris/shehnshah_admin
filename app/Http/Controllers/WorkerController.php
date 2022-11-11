<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Business;

use Session;
use URL;
use Auth;
class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function worker_list()
    {
        $vendorId = Session::get('vendor_info');

        if(session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff') {

        if ($vendorId) {
            $Business = Business::where('id', $vendorId->id)->get();

            $woerkers = Worker::where('businessId', $vendorId->id)->with('Businessreleation', 'service_name')->get();
        } else {
            $woerkers = Worker::with('Businessreleation', 'service_name')->get();
            $Business = Business::all();

        }
        }else{
            $Business = Business::where('id', auth()->user()->businessId)->get();
            $woerkers = Worker::where('businessId', auth()->user()->businessId)->with('Businessreleation', 'service_name')->get();

        }
 
        return view('admin.workers.worker_list', compact('vendorId', 'Business', 'woerkers'));
    }
    function worker_add()
    {
        return view('admin.workers.add_worker');
    }

    function worker_edit_store(Request $request)
    {

        $worker = Worker::find($request->id);

        $vendorId = Session::get('vendor_info');
        if ($vendorId) {
            $worker->businessId = $vendorId->id;
        } else {
            $worker->businessId = $request->businessId;
        }
        $worker->serviceId = $request->serviceId;
        $worker->title = $request->title;

        if ($request->hasfile('image')) {
            $profile_pic = $request->image;
            $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
            $destinationPath = public_path('/worker/');
            $profile_pic->move($destinationPath, $ProfilePic);
            $worker->image =  URL::to('/') .'/worker/'.$ProfilePic;
        }

        $worker->phone = $request->phone;
        $worker->save();
        return redirect('worker/worker-list');
    }

    function worker_view($id)
    {
        $worker = Worker::find($id);

        $service_selectd = Service::where('id', $worker->serviceId)->first();
        $vendorId = Session::get('vendor_info');
        if ($vendorId) {
            $Business = Business::where('id', $vendorId->id)->get();
        } else {
            $Business = Business::all();
        }

        return view('admin.workers.worker_view',compact('worker','Business','service_selectd'));
    }

    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function worker_store(Request $request)
    {
        $woerkers = new Worker();
        $vendorId = Session::get('vendor_info');
        if ($vendorId) {
            $woerkers->businessId = $vendorId->id;
        } else {
            $woerkers->businessId = $request->businessId;
        }
        $woerkers->serviceId = $request->serviceId;
        $woerkers->title = $request->title;

        if ($request->hasfile('image')) {
            $profile_pic = $request->image;
            $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
            $destinationPath = public_path('/worker/');
            $profile_pic->move($destinationPath, $ProfilePic);
            // $woerkers->image = $ProfilePic;
            $woerkers->image = URL::to('/').'/worker/'.$ProfilePic;
        }  

        $woerkers->phone = $request->phone;
        $woerkers->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }
    public function worker_edit($id)
    {
        
        $worker = Worker::find($id);

        $service_selectd = Service::where('id', $worker->serviceId)->first();
        $vendorId = Session::get('vendor_info');
        if ($vendorId) {
            $Business = Business::where('id', $vendorId->id)->get();
        } else {
            $Business = Business::all();
        }
        return view('admin.workers.worker_edit', compact('worker', 'Business', 'service_selectd'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}