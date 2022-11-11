<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Booking;
use App\Models\Business;

use Illuminate\Http\Request;
use Session;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function blank_page(){
        return view('admin.blank');
    }

    function booking_list()
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }

        $role = auth()->user()->getRoleNames();
        if ($role[0] == "admin") {

            $vendor_id = Session::get('vendor_info');
            if ($vendor_id) {
                $bookings = Booking::with('businessreleation', 'service', 'offer', 'customers')->where('businessId', $vendor_id->id)->paginate(50);
            } else {
                $bookings = Booking::with('businessreleation', 'service', 'offer', 'customers')->paginate(50);
            }
        }else{
            $bookings = Booking::with('businessreleation', 'service', 'offer', 'customers')->where('businessId', auth()->user()->id)->paginate(50);

        }

        return view('admin.bookings.list', compact('bookings'));
    }


    function add_booking()
    {
        $Business = Business::all();
        return view('admin.bookings.add_booking', compact('Business'));
    }
      function booking_view(){
        return view('admin.bookings.booking_view');
    }




    public function index()
    {
        
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function booking_edit($id)
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

    // public function business_profile()
    // {
    //   return view('admin.business_profile');
    // }
}
