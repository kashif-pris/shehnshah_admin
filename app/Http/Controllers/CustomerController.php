<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
 use App\Models\Vehicle;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function customer_list()
    {
        $vendorId = Session::get('vendorId');
        $role = auth()->user()->getRoleNames();
        if ($role[0] == "admin") {

            // $vendorId = Session::get('vendorId');
            if ($vendorId) {
                $Customers = Customer::where('ownerBusinessId', $vendorId)->with('Vehiclereleation', 'Businessreleation')->paginate(50);
            } else {
                $Customers = Customer::with('Vehiclereleation', 'Businessreleation')->paginate(50);

            }
        } else {
            $Customers = Customer::where('ownerBusinessId', auth()->user()->businessId)->with('Vehiclereleation', 'Businessreleation')->paginate(50);

        }
        return view('admin.customers.customer_list', compact('Customers', 'vendorId'));
    }
    function customer_add(){
 
        return view('admin.customers.add_customer');
    }
    function customer_view(){
        return view('admin.customers.customer_view');
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
}
