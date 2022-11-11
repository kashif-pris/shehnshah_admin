<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use Redirect;
use Config;
use App\Models\Service;
use App\Models\Business;
use App\Models\BusinessServices;
use App\CentralLogics\Helpers;
use App\Models\Area;
use App\Models\Vendor;
use URL;


// use Illuminate\Support\Facades\DB;
class VendorController extends Controller
{
    function deletesession(Request $request)
    {

        Session::forget('vendor_info');

    }

    function vendor_list()
    {

        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }
        // dd('Allow user');
        $vendor_list_data = Business::with('service')->get();

        // dd($vendor_list_data->service->title);
        return view('admin.vendors.vendor_list', compact('vendor_list_data'));
    }

    function add_vendor()
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }

        $services = Service::all();
        $locations = Helpers::get_cities();
        return view('admin.vendors.add_vendor', compact('services', 'locations'));
    }

    function store_vendor(Request $request)
    {
// dd($request->all());

        // $businessInfo=Business::whereJsonContains('contact', ['phone' => '+971507285969'])->first();//$request->contactInfo['phone']
        // dd($businessInfo);
        // if(isset($businessInfo)){
        //     return back()->withInput(array('msg' => 'usiness with this phone already registerd!'));
        // }
        // if(!($businessInfo)){
        //     return ('No Business Information Found');
        // }

        DB::beginTransaction();
//        try {
        // handling images / gallery
        $Business = new Business();
        $imageArray = [];
        $locations = Helpers::get_cities();
        $workHours = [];
        $breakHours = [];
        foreach ($request->start_time as $i => $timings) {


            // work hours
            $start = explode(',', $request->start_time[$i]);
            $end = explode(',', $request->end_time[$i]);
            $workHours[][] = ($request->start_time[$i] . ',' . $request->end_time[$i]);

            // break hours
            $start = explode(',', $request->break_start_time[$i]);
            $end = explode(',', $request->break_end_time[$i]);
            $breakHours[][] = $request->break_start_time[$i] . ',' . $request->break_end_time[$i];
        }
        $a = $this->toarray($workHours);
        $bb = $this->toarray($breakHours);
//dd($bb);

        // dd('stop');
        if ($request->group_a) {
            foreach ($request->group_a as $key => $image) {

                $profile_pic = $image['logo'];
                $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
                $destinationPath = public_path('/business_gallery/');
                $profile_pic->move($destinationPath, $ProfilePic);
                // $imageArray[] = $ProfilePic;
                // $imageArray[] = $ProfilePic;
                $imageArray[] = URL::to('/') . '/business_gallery/'.$ProfilePic;

            }

        }

        // dd($imageArray);

        // handling business hours
        $hoursArray = [];
        if ($request->group_b) {
            foreach ($request->group_b as $key => $hours) {
                $hoursArray[] = array_map('intval', explode(',', $hours['hours']));
            }
        }
        $Logo = null;
        if ($request->logo) {
            $profile_pic = $request->logo;
            $Logo = rand() . '.' . $profile_pic->getClientOriginalName();
            $destinationPath = public_path('/vendor_logo/');

            $profile_pic->move($destinationPath, $Logo);
            // $Business->logo =  $Logo;
            $Business->logo = URL::to('/') . '/vendor_logo/' . $Logo;

        }
        // $service->icon = $Logo;
        $Cover = null;
        if ($request->cover) {
            $profile_pic = $request->cover;
            $Cover = rand() . '.' . $profile_pic->getClientOriginalName();
            $destinationPath = public_path('/vendor_cover/');
            $profile_pic->move($destinationPath, $Cover);
            // $Business->cover = $Cover;
            $Business->cover = URL::to('/') . '/vendor_cover/' . $Cover;

        }
        // $service->icon = $Cover;


        //  dd($hoursArray);


        $Business->title = $request->business_title;
        $Business->serviceId = $request->service_id;
        $Business->street = $request->street;
        // $Business->logo = $Logo;

        // $Business->cover = $Cover;

        $Business->area = $request->area;
        $Business->city = $request->city;
        $Business->lat = $request->lat;
        $Business->lng = $request->lng;
        $Business->country = $request->country;
        $Business->about = $request->about;
        $Business->contact = json_encode((object)$request->contactInfo);
        $Business->gallery = json_encode($imageArray);
        $Business->hours = json_encode($a);
        $Business->breaks = json_encode($bb);


        $Business->save();
//        dd($Business);
        // handling service_provissioning
        if ($request->service_provissioning) {
            foreach ($request->service_provissioning as $key => $service) {
                $serviceProvissioned = BusinessServices::where('serviceId', $service)->where('businessId', $Business->id)->first();
                if (!($serviceProvissioned)) {
                    BusinessServices::create([
                        'businessId' => $Business->id,
                        'serviceId' => $service,
                        'active' => 1
                    ]);
                }
            }
        }

        // all good
        DB::commit();
        return redirect('vendors/vendor-list-show-all');
//        } catch (\Exception $e) {
//            DB::rollback();
//            dd($e);
//        }
    }





public function toarray($data)
    {

        $new_array = [];

        foreach ($data as $item) {
            $new_array1 = [];
            $s = explode(",", $item[0]);
            foreach ($s as $item2) {

                $new_array1[] = (int)$item2;
            }
            $new_array[] = $new_array1;
        }

        return $new_array;

    }
    function vendor_detail_edit(Request $request)
    {
    //    dd($request->all());
    $data = Business::orderBy('id' , 'desc')->first();
   
        $locations = Helpers::get_cities();
        if (isset($request->city)) {
            $id = $request->city;
            $desired_object = $locations->filter(function ($item) use ($id) {
                return $item->id == $id;
            })->first();
            return $desired_object->areas;
        }
        $businessInfo = Business::where('id', $request->id)->with('provissioning', 'cityInfo', 'areaInfo')->first();
        if (!($businessInfo)) {
            return ('No Business Information Found');
        }


        $services = [];
        $areas = [];
        $provissioning = [];
        if (isset($businessInfo)) {
            $services = Service::whereNotIn('id', $businessInfo->provissioning->pluck('serviceId'))->get();
            $areas = Area::where('city_id', $businessInfo->city)->get();
            $provissioning = $businessInfo->provissioning;
            $businessHours = json_decode($businessInfo->hours);
            $breakHours = json_decode($businessInfo->breaks);
            $gallery = json_decode($businessInfo->gallery);
            // dd($provissioning);

            $week = Helpers::getWeekMap();
            //    dd($week[1]);

            // $formatedData = Helpers::timeFormate($businessHours[0][0],'split');

        }
        $hours  = Helpers::getWeekMap()[1];
        foreach($hours as $key=> $time){

            $start= '';
            $end = '';
            // dd((int)explode(',',$time)[0] ,$businessHours[0][0] ,(int)explode(',',$time)[1] , $businessHours[0][1]);
            // start time of the business
            if((int)explode(',',$time)[0] == $businessHours[0][0] && (int)explode(',',$time)[1] == $businessHours[0][1]){
                $start = $time;
            }

             // end time of the business
             if((int)explode(',',$time)[0] == $businessHours[0][2] && (int)explode(',',$time)[1] == $businessHours[0][3]){
                $end = $time;

            }
      
         }
        //  dd($start,$end);
        return view('admin.vendors.edit_vendor', compact('businessInfo', 'services', 'locations', 'areas', 'businessHours', 'breakHours', 'gallery', 'provissioning'));
    }

    function vendor_detail_update_info(Request $r)
    {

        // dd($r->all());
        DB::beginTransaction();
        try {

            $locations = Helpers::get_cities();
            $workHours = [];
            $breakHours = [];
            foreach ($r->start_time as $i => $timings) {


                // work hours
                $start = explode(',', $r->start_time[$i]);
                $end = explode(',', $r->end_time[$i]);
                $workHours[][] = ($r->start_time[$i] . ',' . $r->end_time[$i]);

                // break hours
                $start = explode(',', $r->break_start_time[$i]);
                $end = explode(',', $r->break_end_time[$i]);
                $breakHours[][] = $r->break_start_time[$i] . ',' . $r->break_end_time[$i];
            }

            // return json_encode($workHours);
            // dd($workHours[0][0]);
            $businessInfo = Business::where('id', $r->business_id)->first();
            $businessInfo->title = $r->business_title;
            if ($r->default_service) {
                $businessInfo->serviceId = $r->default_service;
            }

            if ($r->logo) {
                $profile_pic = $r->logo;
                $Logo = rand() . '.' . $profile_pic->getClientOriginalName();
                $destinationPath = public_path('/vendor_logo/');
                $profile_pic->move($destinationPath, $Logo);
                // $businessInfo->logo = $Logo;
                $businessInfo->logo = URL::to('/') . '/vendor_logo/' . $Logo;
            }
            if ($r->cover) {
                $profile_pic = $r->cover;
                $Cover = rand() . '.' . $profile_pic->getClientOriginalName();
                $destinationPath = public_path('/vendor_cover/');
                $profile_pic->move($destinationPath, $Cover);
                // $businessInfo->cover = $Cover;
                $businessInfo->cover = URL::to('/') . '/vendor_cover/' . $Cover;
            }
            // handling gallery


            $a = $this->toarray($workHours);
            $bb = $this->toarray($breakHours);


            $businessInfo->street = $r->street;
            $businessInfo->area = $r->area;
            $businessInfo->city = $r->city;
            $businessInfo->lat = $r->lat;
            $businessInfo->lng = $r->lng;
            $businessInfo->country = $r->country;
            $businessInfo->about = trim($r->about);
            $businessInfo->contact = json_encode((object)$r->contactInfo);

            $businessInfo->hours = json_encode($a);
            $businessInfo->breaks = json_encode($bb);
            // $businessInfo->hours = json_encode($workHours);
            // $businessInfo->breaks = json_encode($breakHours);
            // handling service_provissioning
            if ($r->service_provissioning) {
                foreach ($r->service_provissioning as $key => $service) {
                    $serviceProvissioned = BusinessServices::where('serviceId', $service)->where('businessId', $r->business_id)->first();
                    if (!($serviceProvissioned)) {
                        BusinessServices::create([
                            'businessId' => $r->business_id,
                            'serviceId' => $service,
                            'active' => 1
                        ]);
                    }
                }
            }
            if ($r->gallery) {


                $array = json_decode($businessInfo->gallery);

                $imageArray = [];
                foreach ($r->gallery as $key => $image) {
                    $profile_pic = $image['logo'];
                    $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
                    $destinationPath = public_path('/business_gallery/');
                    $profile_pic->move($destinationPath, $ProfilePic);
                    // $imageArray[] = $ProfilePic;
                    $imageArray[] =  URL::to('/') . '/business_gallery/'.$ProfilePic;
                }
                $a=array_merge($array, $imageArray);

                $businessInfo->gallery = json_encode($a);


            }


            $businessInfo->save();
            DB::commit();
            // all good
            return redirect('vendors/vendor-list-show-all');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }

    }

    function vendor_view(Request $request)
    {
        if ($request->vendorId) {
            $vendor = Business::where('id', $request->vendorId)->first();
            Session::put('vendor_info', $vendor);
            return "Session created for selected vendor.";
        } else {
            return "Vendor ID is required!";
        }
    }

    function vendor_booking($id = null)
    {
        return view('admin.vendors.vendor_booking');
    }

    function vendor_worker()
    {
        return view('admin.vendors.vendor_worker');
    }

    function vendor_detail($id = null)
    {

        return view('admin.vendors.vendor_detail');
    }

    public function vendor_delete($id)
    {
        $vendor = Business::where('id', $id)->first();
        // dd($make_delete);
        $vendor->delete();
        return redirect('vendors/vendor-list-show-all');

    }

    public function business_profile($id)
    {
        $vendor = Business::where('id', $id)->first();
        return view('admin.business_profile', compact('vendor'));
    }

  
}



