<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use Redirect;
use App\Models\Service;
use App\Models\VehicleType;
use App\Models\Make;
use App\Models\ModelType;
use App\Models\Business;
use App\Models\Worker;
use App\Models\Customer;
use App\Models\BusinessOffering;
use App\Models\City;
use App\Models\Area;
use App\Models\Coupon;
use App\Models\Offering;
use App\Models\Queue;
use App\Models\Discount;
use App\Models\BusinessServices;
use Validator;
use URL;
use App\CentralLogics\Helpers;

class BaseController extends Controller
{
    function blank_page()
    {
        return view('admin.blank');
    }

    function service_offering(Request $request)
    {
        $offering = Offering::where('serviceId', $request->serviceId)->get();

        $data = [
            'offering' => $offering,
            'message' => "Successfully Listed"
        ];

        return \Response::json($data, 200);

    }

    function offering_details(Request $request)
    {

        $offering_value = Offering::where('Id', $request->offeringId)->first();

        return \Response::json($offering_value, 200);

    }
function business_service(Request $request)
    {

        $html = '<option value="">Select option </option>';

        $data = BusinessServices::where('businessId', $request->id)->with('service')->get();
        foreach ($data as $item) {
            if (isset($item->service))
                $html = $html . '<option value="' . $item->service->id . '">' . $item->service->title . ' </option>';
        }
        return $html;
    }
  

    function booking_list()
    {
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);

        return view('admin.bookings.list');
    }

    function add_booking()
    {
        return view('admin.bookings.add_booking');
    }

    function booking_view()
    {
        return view('admin.bookings.booking_view');
    }

    function vendor_list()
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }
        // dd('Allow user');
        return view('admin.vendors.vendor_list');
    }

    function add_vendor()
    {
        return view('admin.vendors.add_vendor');
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

    function customer_list()
    {


     if(session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff') {

            $vendorId = Session::get('vendorId');
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

    function customer_add()
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }
        return view('admin.customers.add_customer');
    }

    function customer_view()
    {
        return view('admin.customers.customer_view');
    }

    function coupon_list()
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }



      
     if(session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff') {


            $vendorId = Session::get('vendor_info');
        

            if ($vendorId) {
                $coupons_list = Coupon::with('business_name', 'service_name')->where('businessId', $vendorId->id)->paginate(50);
            } else {
                $coupons_list = Coupon::with('business_name', 'service_name')->get();
            }
        } else {
            $coupons_list = Coupon::with('business_name', 'service_name')->where('businessId', auth()->user()->businessId)->paginate(50);

        }
        // dd($coupons_list);
        return view('admin.coupons.coupon_list', compact('coupons_list'));
    }

    function coupon_add()
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }

     if(session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff') {
            $vendor_id = Session::get('vendor_info');
            if ($vendor_id) {
                $business = Business::where('id', $vendor_id->id)->get();
                $BusinessServices = BusinessServices::where('businessId', $vendor_id->id)->pluck('serviceId');
                $service = Service::whereIn('id', $BusinessServices)->get();
            } else {
                $business = Business::get();
                $service = Service::get();
            }
        } else {
            $vendor_id = auth()->user()->businessId;
            $business = Business::where('id', $vendor_id)->get();
            $BusinessServices = BusinessServices::where('businessId', $vendor_id)->pluck('serviceId');
            $service = Service::whereIn('id', $BusinessServices)->get();
        }


        $week = Helpers::getWeekMap()[0];

        return view('admin.coupons.add_coupon', compact('service', 'business', 'week', 'vendor_id'));
    }

    function coupon_view($id)
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }
        $coupon_view = Coupon::where('id', $id)->with('business_name', 'service_name')->first();
        return view('admin.coupons.coupon_view', compact('coupon_view'));
    }

    function coupon_save(Request $request)
    {

        $request->validate([
            'business' => 'required',
            'service' => 'required',
            'title' => 'required',
            'about' => 'required|max:150',
            'cover' => 'required|mimes:jpeg,bmp,png,jpg',
            'price' => 'required|numeric',
            // 'discount_rate' => 'required|numeric',
            'subtitle' => 'required',
            'description' => 'required',
            'highlight' => 'required',
            // 'discount_value' => 'required',
            // 'start_date' => 'required',
            // 'finish_date' => 'required'

        ]);
        $arraySingle = array_map('current', $request->group_b);
        // dd(json_encode($arraySingle));
        $profile_pic = $request->cover;
        $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
        $destinationPath = public_path('/coupons/');
        // $new_coupon->cover = '/coupons/'.$ProfilePic;
        $profile_pic->move($destinationPath, $ProfilePic);


        $new_coupon = new Coupon();
        $new_coupon->businessId = $request->business;
        $new_coupon->serviceId = $request->service;
        $new_coupon->title = $request->title;
        $new_coupon->subTitle = $request->subtitle;
        $new_coupon->about = $request->about;
        $new_coupon->description = $request->description;
        $new_coupon->cover = URL::to('/') . '/coupons/' . $ProfilePic;
        $new_coupon->highlight = $request->highlight;
        $new_coupon->price = $request->price;
        $new_coupon->discountRate = $request->discount_rate;
        $new_coupon->discountValue = $request->discount_value;
        // $new_coupon->isInstant = $request->	is_instant;

        $saleconation_array = null;
        foreach ($request->salecondition as $key => $value) {

            if ($key == "from" || $key == "to") {
                $saleconation_array[$key] = $value;
            } else {
                $saleconation_array[$key] = (int)$value;
            }
        }

        $usecondition_array = null;
        foreach ($request->usecondition as $key => $value) {

            if ($key == "from" || $key == "days" || $key == "shifts" || $key == "to") {
                $usecondition_array[$key] = $value;
            } else {
                $usecondition_array[$key] = (int)$value;
            }
        }
//        dd($request->usecondition);

        $new_coupon->saleConditions = json_encode($saleconation_array);
        $new_coupon->useConditions = json_encode($usecondition_array);
//        $new_coupon->saleConditions = json_encode((object)$request->salecondition);
        $new_coupon->useConditions = json_encode((object)$request->usecondition);
        $new_coupon->otherConditions = json_encode($arraySingle);
        $new_coupon->isInstant = $request->coupon_type;
        $new_coupon->active = $request->status_type;

        $new_coupon->status = "Draft";

     // dd($new_coupon);
        $new_coupon->save();
        return redirect('coupon/coupon-list');


        // dd($arraySingle);
        // $usecondition = json_encode((object) $request->usecondition);
        // $salecondition = json_encode((object) $request->salecondition);

        dd('Data Saved Successfully in DataBase');

    }
    public function coupon_delete($id)
    {
        $coupon_remove = Coupon::where('id', $id)->first();
        $coupon_remove->delete();
        return redirect('coupon/coupon-list');
    }

    public function coupon_edit($id)
    {
        $vendor_id = Session::get('vendor_info');
        if ($vendor_id) {
            $business = Business::where('id', $vendor_id->id)->get();
            $BusinessServices = BusinessServices::where('businessId', $vendor_id->id)->pluck('serviceId');
            $service = Service::whereIn('id', $BusinessServices)->get();
        } else {
            $business = Business::get();
            $service = Service::get();
        }
        $coupons_list = Coupon::with('business_name', 'service_name')->where('id', $id)->first();
        // dd($coupons_list);
        $couponDays = json_decode($coupons_list->useConditions);

        $notFound = [];
        $week = Helpers::getWeekMap()[0];
        foreach ($week as $day) {
            if (isset($couponDays->Days)) {
                if (!(in_array($day, $couponDays->Days))) {
                    $notFound[] = $day;
                }
            } else {
                if (!(in_array($day, $couponDays->days))) {
                    $notFound[] = $day;
                }
            }

        }

        // dd($coupons_list);
        return view('admin.coupons.coupon_edit', compact('coupons_list', 'service', 'business', 'notFound', 'couponDays', 'week'));

    }

  public function coupon_edit_store(Request $request)
    {
        // dd($request->all());
        $coupon_edit_save = Coupon::where('id', $request->id)->first();
        // dd($coupon_edit_save);

        $arraySingle = array_map('current', $request->group_b);
        // dd(json_encode($arraySingle));


        $new_coupon = $coupon_edit_save;
        $new_coupon->businessId = $request->business;
        $new_coupon->serviceId = $request->service;
        $new_coupon->title = $request->title;
        $new_coupon->subTitle = $request->subtitle;
        $new_coupon->about = $request->about;
        $new_coupon->description = $request->description;
        if ($request->hasfile('image')) {
            $profile_pic = $request->cover;
            $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
            $destinationPath = public_path('/coupons/');
            $profile_pic->move($destinationPath, $ProfilePic);
            $new_coupon->cover = $ProfilePic;
        }
        $new_coupon->highlight = $request->highlight;
        $new_coupon->price = $request->price;
        $new_coupon->discountRate = $request->discount_rate;
        $new_coupon->discountValue = $request->discount_value;
        // $new_coupon->isInstant = $request->	is_instant;


        $saleconation_array = null;
        foreach ($request->salecondition as $key => $value) {

            if ($key == "from" || $key == "to") {
                $saleconation_array[$key] = $value;
            } else {
                $saleconation_array[$key] = (int)$value;
            }
        }

        $usecondition_array = null;
        foreach ($request->usecondition as $key => $value) {

            if ($key == "from" || $key == "days" || $key == "shifts" || $key == "to") {
                $usecondition_array[$key] = $value;
            } else {
                $usecondition_array[$key] = (int)$value;
            }
        }
//        dd($request->usecondition);

        $new_coupon->saleConditions = json_encode($saleconation_array);
        $new_coupon->useConditions = json_encode($usecondition_array);
        
//        $new_coupon->saleConditions = json_encode((object)$request->salecondition);
//        $new_coupon->useConditions = json_encode((object)$request->usecondition);
        $new_coupon->otherConditions = json_encode($arraySingle);
        $new_coupon->isInstant = $request->coupon_type;
        $new_coupon->active = $request->status_type;
        $new_coupon->status = "Draft";


        // dd($new_coupon);
        $new_coupon->save();
        return redirect('coupon/coupon-list');


        // dd($arraySingle);
        // $usecondition = json_encode((object) $request->usecondition);
        // $salecondition = json_encode((object) $request->salecondition);

        dd('Data Saved Successfully in DataBase');


    }


    function service_list(Request $r)
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }



        $service = Service::get();
        if ($r->ajax) {
            return Service::whereIn('id', $r->ajax)->select('id', 'title')->get();
        }


        return view('admin.services.service_list', compact('service'));
    }

    function service_add()
    {

        $Service = Service::get();
        // dd($Service);
        return view('admin.services.add_service', compact('Service'));
    }

    function service_store(Request $request)
    {
        $service = new Service();
        $service->title = $request->title;

        $profile_pic = $request->icon;
        $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
        $destinationPath = public_path('/service/');
        $profile_pic->move($destinationPath, $ProfilePic);
        // $service->icon = $ProfilePic;

        // dd($service);
        $service->icon = URL::to('/') . '/service/' . $ProfilePic;
        $service->save();
        return back();

    }

    function service_view($id)
    {
        $service = Service::where('id', $id)->first();

        return view('admin.services.service_view', compact('service'));
    }

    public function service_edit_store(Request $request)
    {
        // dd($request->all());

        $service_edit = Service::where('id', $request->id)->first();
        if ($request->icon != '') {
            $service_edit->title = $request->title;
            $profile_pic = $request->icon;
            $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
            $destinationPath = public_path('/service/');
            $profile_pic->move($destinationPath, $ProfilePic);
            $service_edit->icon = $ProfilePic;

            $service_edit->save();
            return redirect('/service/service-list');

        } else {
            $service_edit->title = $request->title;
            $service_edit->icon = $service_edit->icon;

            $service_edit->save();
            return redirect('/service/service-list');
        }

    }

    public function service_delete($id)
    {
        $service_delete = Service::where('id', $id)->first();
        // dd($service_delete);
        $service_delete->delete();
        return redirect('/service/service-list');
    }

    public function offering_add()
    {
        // dd('khan');
//        $Service = Service::get();
        $vendor_id = Session::get('vendor_info');

        if ($vendor_id) {

            $data = BusinessServices::where('businessId', $vendor_id->id)->with('service')->get();
            $BusinessServices = BusinessServices::where('businessId', $vendor_id->id)->pluck('serviceId');
            $Service = Service::whereIN('id', $BusinessServices)->get();
        } else {
            $Service = Service::get();
        }

        return view('admin.offering.offering_add', compact('Service'));
    }

    public function offering_store(Request $request)
    {


        $imageArray = [];
        if ($request->gallery) {
            foreach ($request->gallery as $key => $image) {
                $profile_pic = $image['gallery_img'];
                $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
                $destinationPath = public_path('/offering_gallery/');
                $profile_pic->move($destinationPath, $ProfilePic);
                // $imageArray[] = $ProfilePic;
                $imageArray[] =URL::to('/') . '/offering_gallery/'.$ProfilePic;
                // $imageArray[] = '/offering_gallery/'.$ProfilePic;
               
            }
        }
        // dd($imageArray);
        if ($request->hasfile('cover')) {
            $profile_pic = $request->cover;
            $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
            $destinationPath = public_path('/offering_cover/');

            $profile_pic->move($destinationPath, $ProfilePic);

            // $profile_pic->cover = $ProfilePic;
            // dd($profile_pic->cover);
            // $profile_pic->cover = URL::to('/') . '/offering_cover/' . $ProfilePic;
        }
        $arrayOptions = array_map('current', $request->options);
        $arraySpecification = array_map('current', $request->specification);
        $new_offering = new Offering;
        $new_offering->serviceId = $request->serviceId;
        $new_offering->title = $request->title;
        $new_offering->subTitle = $request->sub_Title;
        $new_offering->active = $request->status_type;
        $new_offering->about = $request->about;
        $new_offering->cover = $ProfilePic;
        $new_offering->cover = URL::to('/') . '/offering_cover/' . $ProfilePic;

        $new_offering->specs = json_encode($arraySpecification);
        $new_offering->options = json_encode($arrayOptions);
        $new_offering->gallery = json_encode($imageArray);
        $new_offering->conditions = json_encode((object)$request->conditions);
        
        $new_offering->save();
        return redirect('service/offering-list');

    }

    public function offering_list(Request $request)
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }

     if(session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff') {

            $vendorId = Session::get('vendor_info');
            // dd($vendorId);

            if ($vendorId) {
                $offering_list = Offering::with('service_name')->whereHas('bussness_offers', function ($q) use ($vendorId) {
                    $q->where('businessId', '=', $vendorId->id);
                })->get();

            } else {
                $offering_list = Offering::with('service_name', 'bussness_offers')->get();

            }
        } else {
            $vendorId = auth()->user()->businessId;
            $offering_list = Offering::with('service_name')->whereHas('bussness_offers', function ($q) use ($vendorId) {
                $q->where('businessId', '=', $vendorId);
            })->get();
        }


        // dd($offering_list);
        return view('admin.offering.offering_list', compact('offering_list'));
    }

    public function offering_delete($id)
    {
        $offer_remove = Offering::where('id', $id)->first();
        $offer_remove->delete();
        return redirect('service/offering-list');
    }

    public function offering_view($id)
    {
        $Service = Service::get();
        $offering_data = Offering::with('service_name')->where('id', $id)->first();
        return view('admin.offering.offering_view', compact('Service', 'offering_data'));
    }

    public function offering_edit($id)
    {
        $Service = Service::get();
        $offering_data = Offering::with('service_name')->where('id', $id)->first();
        return view('admin.offering.offering_edit', compact('Service', 'offering_data'));
    }

  
    public function offering_edit_store(Request $request)
    {
      
      
        $offering_edit_store = Offering::where('id', $request->id)->first();
        // dd($offering_edit_store);





        $arrayOptions = array_map('current', $request->options);
        $arraySpecification = array_map('current', $request->specification);
        // dd($request->all());
        if ($request->cover != '') {

            $profile_pic = $request->cover;
            $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
            $destinationPath = public_path('/offering_cover/');
            $profile_pic->move($destinationPath, $ProfilePic);

            $offering_edit_store->serviceId = $request->serviceId;
            $offering_edit_store->title = $request->title;
            $offering_edit_store->subTitle = $request->sub_Title;
            $offering_edit_store->about = $request->about;
            $offering_edit_store->cover = URL::to('/') .'/offering_cover/'.$ProfilePic;
            $offering_edit_store->specs = json_encode($arraySpecification);
            $offering_edit_store->options = json_encode($arrayOptions);

            $offering_edit_store->conditions = json_encode((object)$request->conditions);
            $offering_edit_store->active = $request->status_type;
           
            if ($request->gallery) {
                $imageArray = [];
                foreach ($request->gallery as $key => $image) {
                    $profile_pic = $image['gallery_img'];
                    $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
                    $destinationPath = public_path('/offering_gallery/');
                    $profile_pic->move($destinationPath, $ProfilePic);
                    $imageArray[] = URL::to('/') .'/offering_gallery/'.$ProfilePic;
                }
                $offering_edit_store->gallery = json_encode($imageArray);
            }
            // dd($offering_edit_store);
            $offering_edit_store->save();

            return redirect('service/offering-list');
        } else {
            $offering_edit_store->serviceId = $request->serviceId;
            $offering_edit_store->title = $request->title;
            $offering_edit_store->subTitle = $request->sub_Title;
            $offering_edit_store->about = $request->about;
            $offering_edit_store->cover = $offering_edit_store->cover;
            $offering_edit_store->specs = json_encode($arraySpecification);
            $offering_edit_store->options = json_encode($arrayOptions);
        
            $offering_edit_store->conditions = json_encode((object)$request->conditions);
            $offering_edit_store->active = $request->status_type;

            // dd($offering_edit_store);
            if ($request->gallery) {
                $imageArray = [];
                foreach ($request->gallery as $key => $image) {
                    $profile_pic = $image['gallery_img'];
                    $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
                    $destinationPath = public_path('offering_gallery/');
                    $profile_pic->move($destinationPath, $ProfilePic);
                    $imageArray[] = URL::to('/') .'/offering_gallery/'.$ProfilePic;
                }
                $offering_edit_store->gallery = json_encode($imageArray);
            }
            // dd($offering_edit_store);
            $offering_edit_store->save();

            return redirect('service/offering-list');
        }
    }


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
            dd($Business);

        }
    
        return view('admin.workers.worker_list', compact('vendorId', 'Business', 'woerkers'));
    }

    function worker_add()
    {
        return view('admin.workers.add_worker');
    }

    function worker_view()
    {
        return view('admin.workers.worker_view');
    }

    function business_setup()
    {

        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }
        return view('admin.business.business_setup');

    }

    public function business_setup_data(Request $request)
    {
        $data = json_encode(preg_split("/\,/", $request->vehicle));
        $make = json_encode(preg_split("/\,/", $request->make));
        $model = json_encode(preg_split("/\,/", $request->models));
        // dd($data,$make,$model);
        // dd($request->all());
        DB::table('business_settings')->updateOrInsert(['key' => 'TimeZone'], [
            'value' => $request['time_zone']
        ]);

        DB::table('business_settings')->updateOrInsert(['key' => 'BusinessName'], [
            'value' => $request['business_name']
        ]);

        DB::table('business_settings')->updateOrInsert(['key' => 'Mobile'], [
            'value' => $request['mobile']
        ]);

        DB::table('business_settings')->updateOrInsert(['key' => 'BookingNotification'], [
            'value' => $request['booking_notification']
        ]);


        DB::table('business_settings')->updateOrInsert(['key' => 'Image'], [
            'value' => $request['logo']
        ]);
        // $curr_logo = BusinessSetting::where(['key' => 'logo'])->first();
        // if ($request->has('logo')) {
        //     $image_name = Helpers::update('business/', $curr_logo->value, 'png', $request->file('logo'));
        // } else {
        //     $image_name = $curr_logo['value'];
        // }
        DB::table('business_settings')->updateOrInsert(['key' => 'Email'], [
            'value' => $request['email']
        ]);
        DB::table('business_settings')->updateOrInsert(['key' => 'Address'], [
            'value' => $request['address']
        ]);
        DB::table('business_settings')->updateOrInsert(['key' => 'Vehicle'], [
            'value' => $data
        ]);
        DB::table('business_settings')->updateOrInsert(['key' => 'Make'], [
            'value' => $make
        ]);
        DB::table('business_settings')->updateOrInsert(['key' => 'Model'], [
            'value' => $model
        ]);
        return back();
    }

    function payment_setup()
    {
        return view('admin.payment.payment_setup');
    }

    function view_page()
    {
        return view('admin.show.view_page');
    }

    function massage_page()
    {
        return view('admin.massage.massage_page');
    }

    function notification_page()
    {
        return view('admin.notification.notification_page');
    }

    public function getLogout()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('login');
    }

    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    public function vehicle_type(Request $request)
    {
        return view('admin.vehicle_type.add_vehicle_type');
    }

    public function vehicle_store(Request $request)
    {
        // dd($request->all());
        $vehicle_type = new VehicleType();
        $vehicle_type->name = $request->name;
        $vehicle_type->created_by = Auth::user()->id;
        // $service->icon = $request->icon;
        // dd($vehicle_type);

        $vehicle_type->save();
        return redirect('/lookup/vehicle-type-list');
    }

    function vehicle_list()
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }
        $vehicle_type_list = VehicleType::get();
        // dd($vehicle_type_list);

        return view('admin.vehicle_type.vehicle_type_list', compact('vehicle_type_list'));
    }

    public function vehicle_view($id)
    {
        $view = VehicleType::where('id', $id)->first();
        // dd($view);

        return view('admin.vehicle_type.vehicle_type_view', compact('view'));
    }

    public function vehicle_edit($id)
    {
        $edit = VehicleType::where('id', $id)->first();
        return view('admin.vehicle_type.vehicle_type_edit', compact('edit'));
    }

    public function vehicle_edit_store(Request $request)
    {
        // dd($request->all());
        $edit_store = VehicleType::where('id', $request->id)->first();
        $edit_store->name = $request->name;
        $edit_store->status = $request->status;
        $edit_store->save();
        return redirect('/lookup/vehicle-type-list');
    }

    public function vehicle_delete($id)
    {
        $vehicle_type_delete = VehicleType::where('id', $id)->first();
        // dd($vehicle_type_delete);
        $vehicle_type_delete->delete();
        return redirect('/lookup/vehicle-type-list');
    }

    public function make_list()
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }
        $make = Make::get();
        return view('admin.make.make_list', compact('make'));
    }

    public function make_store(Request $request)
    {
        $make = new Make();
        $make->name = $request->name;
        $make->created_by = Auth::user()->id;
        // $service->icon = $request->icon;
        // dd($vehicle_type);

        $make->save();
        return redirect('/lookup/make-list');
    }

    public function make_view($id)
    {
        $view = Make::where('id', $id)->first();
        // dd($view);

        return view('admin.make.make_view', compact('view'));
    }

    public function make_edit($id)
    {
        $edit = Make::where('id', $id)->first();
        // dd($edit);
        return view('admin.make.make_edit', compact('edit'));
    }

    public function make_edit_store(Request $request)
    {
        // dd($request->all());
        $edit_store = Make::where('id', $request->id)->first();
        $edit_store->name = $request->name;
        $edit_store->status = $request->status;
        $edit_store->save();
        return redirect('/lookup/make-list');
    }

    public function make_delete($id)
    {
        $make_delete = Make::where('id', $id)->first();
        // dd($vehicle_type_delete);
        $make_delete->delete();
        return redirect('/lookup/make-list');
    }

    public function model_list()
    {

        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }
        $make = ModelType::with('make_name')->get();

        $makeData = Make::all();
        return view('admin.model.model_list', compact('make', 'makeData'));
    }

    public function model_store(Request $request)
    {
        $datArray = $request->except('_token');
        $datArray['created_by'] = Auth::user()->id;
        ModelType::create($datArray);
        return redirect('/lookup/model-list');
    }

    public function model_view($id)
    {
        $view = ModelType::where('id', $id)->first();
        // dd($view);

        return view('admin.model.model_view', compact('view'));
    }

    public function model_edit($id)
    {
        $edit = ModelType::where('id', $id)->first();
        // dd($edit);
        return view('admin.model.model_edit', compact('edit'));
    }

    public function model_edit_store(Request $request)
    {
        // dd($request->all());
        $edit_store = ModelType::where('id', $request->id)->first();
        $edit_store->name = $request->name;
        $edit_store->status = $request->status;
        $edit_store->make_id = $request->make_id;
        $edit_store->save();
        return redirect('/lookup/model-list');
    }

    public function model_delete($id)
    {
        $make_delete = ModelType::where('id', $id)->first();
        // dd($vehicle_type_delete);
        $make_delete->delete();
        return redirect('/lookup/model-list');
    }


    //cities//

    public function city_list()
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }
        $make = City::get();
        return view('admin.city.city_list', compact('make'));
    }

    public function city_store(Request $request)
    {
        $city = new City();
        $city->name = $request->name;
        $city->created_by = Auth::user()->id;
        // $service->icon = $request->icon;
        // dd($vehicle_type);

        $city->save();
        return redirect('/lookup/city-list');
    }

    public function city_view($id)
    {
        $view = City::where('id', $id)->first();
        // dd($view);

        return view('admin.city.city_view', compact('view'));
    }

    public function city_edit($id)
    {
        $edit = City::where('id', $id)->first();
        // dd($edit);
        return view('admin.city.city_edit', compact('edit'));
    }

    public function city_edit_store(Request $request)
    {
        // dd($request->all());
        $edit_store = City::where('id', $request->id)->first();
        $edit_store->name = $request->name;
        // $edit_store->status = $request->status;
        $edit_store->save();
        return redirect('/lookup/city-list');
    }

    public function city_delete($id)
    {
        $make_delete = City::where('id', $id)->first();
        // dd($vehicle_type_delete);
        $make_delete->delete();
        return redirect('/lookup/city-list');
    }

    //areas///

    public function area_list()
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }
        $make = Area::with('city_name')->get();

        $makeData = City::all();
        return view('admin.area.area_list', compact('make', 'makeData'));
    }

    public function area_store(Request $request)
    {
        $datArray = $request->except('_token');
        $datArray['created_by'] = Auth::user()->id;
        Area::create($datArray);
        return redirect('/lookup/area-list');
    }

    public function area_view($id)
    {
        $view = Area::where('id', $id)->first();
        // dd($view);

        return view('admin.area.area_view', compact('view'));
    }

    public function area_edit($id)
    {
        $edit = Area::where('id', $id)->first();
        // dd($edit);
        return view('admin.area.area_edit', compact('edit'));
    }

    public function area_edit_store(Request $request)
    {
        // dd($request->all());
        $edit_store = Area::where('id', $request->id)->first();
        $edit_store->name = $request->name;
        // $edit_store->status = $request->status;
        $edit_store->city_id = $request->city_id;

        $edit_store->save();
        return redirect('/lookup/area-list');
    }

    public function area_delete($id)
    {
        $make_delete = Area::where('id', $id)->first();
        // dd($vehicle_type_delete);
        $make_delete->delete();
        return redirect('/lookup/area-list');
    }


    //Quessssssssssssssss

    public function queue_list()
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }
        $vendorId = Session::get('vendor_info');

     if(session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff') {
           
            if ($vendorId != '') {
                // dd('if condition');
                $make = Queue::with('business_name')->where('businessId', $vendorId->id)->get();
                $makeData = Business::where('id', $vendorId->id)->get();
                $offering_name = Offering::with('service_name')->whereHas('bussness_offers', function ($q) use ($vendorId) {
                    $q->where('businessId', '=', $vendorId->id);
                })->get();


            } else {
                // dd('else condition');
                $make = Queue::with('business_name')->get();
                $makeData = Business::all();
                $offering_name = Offering::all();
            }
        }
        else {
            $vendor_Id = auth()->user()->businessId;
            $make = Queue::with('business_name')->where('businessId', auth()->user()->businessId)->get();
            $makeData = Business::where('id', $vendor_Id)->get();
            $offering_name = Offering::with('service_name')->whereHas('bussness_offers', function ($q) use ($vendor_Id) {
                $q->where('businessId', '=', $vendor_Id);
            })->get();
        }

        // dd($make);
        // dd($vendorId,$make,$makeData,$offering_name);
        return view('admin.queue.queue_list', compact('vendorId', 'make', 'makeData', 'offering_name'));
    }
    
    public function queue_store(Request $request)
    {

        $new_queue = new Queue();
        $new_queue->businessId = $request->business_id;
        $new_queue->title = $request->title;
        $new_queue->walkin = $request->walkin;
        $new_queue->alias = $request->alias;
        $toarray = $this->toarray($request->Offerings);
        $new_queue->offerings = json_encode($toarray);
        $new_queue->save();
//        dd(1);
        return redirect('/queues/queue-list');
    }

    public function toarray($data)
    {

        $new_array = [];

        foreach ($data as $item) {

            $new_array1 = [];


            $new_array[] = (int)$item;
        }

        return $new_array;

    }

    public function queue_edit_store(Request $request)
    {
        // dd($request->all());
        $queue_edit = Queue::where('id', $request->id)->first();

        $queue_edit->businessId = $request->business_id;
        $queue_edit->walkin = $request->walkin;
        $queue_edit->title = $request->title;
        $queue_edit->alias = $request->alias;
        // $queue_edit->offerings = json_encode($request->Offerings);
        $toarray = $this->toarray($request->Offerings);
        $queue_edit->offerings = json_encode($toarray);

        $queue_edit->save();
        return redirect('/queues/queue-list');
    }

    public function queue_delete($id)
    {
        $make_delete = Queue::where('id', $id)->first();
        // dd($make_delete);
        $make_delete->delete();
        return redirect('/queues/queue-list');

    }


    //discount


    public function discount_list()
    {
        $permission = \Request::route()->getName();
        $checkPermission = DB::table('permissions')->where('url', $permission)->first();
        if (isset($checkPermission)) {
            $this->authorize($checkPermission->name);
        }

        $make = Discount::with('business_name', 'service_name')->get();
        // dd($make);
        $makeData = Business::all();
        $makeService = Service::all();

        return view('admin.discount.discount_list', compact('make', 'makeData', 'makeService'));
    }

    public function discount_store(Request $request)
    {
        // dd($request->all());
        $profile_pic = $request->cover;
        $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
        $destinationPath = public_path('/discount/');
        $profile_pic->move($destinationPath, $ProfilePic);

        $discount_new = new Discount();
        $discount_new->serviceId = $request->service_id;
        $discount_new->businessId = $request->business_id;
        $discount_new->title = $request->title;
        $discount_new->cover = URL::to('/') . '/discount/' . $ProfilePic;
        $discount_new->highlight = $request->heighlight;
        $discount_new->description = $request->description;
        // $discount_new->cover = $ProfilePic;
        $discount_new->rate = $request->rate;
        $discount_new->value = $request->value;
        // dd($discount_new);
        $discount_new->save();

        return redirect('discounts/discount-list');

    }

    public function discount_edit_store(Request $request)
    {

        $discount_edit = Discount::where('id', $request->id)->first();
        if ($request->cover != '') {
            $profile_pic = $request->cover;
            $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
            $destinationPath = public_path('/discount/');
            $profile_pic->move($destinationPath, $ProfilePic);


            $discount_edit->serviceId = $request->service_id;
            $discount_edit->businessId = $request->business_id;
            $discount_edit->title = $request->title;
            $discount_edit->highlight = $request->heighlight;
            $discount_edit->description = $request->description;
            $discount_edit->cover = $ProfilePic;
            $discount_edit->rate = $request->rate;
            $discount_edit->value = $request->value;
            $discount_edit->active = $request->status;
            $discount_edit->save();
            return redirect('discounts/discount-list');
        } else {
            $discount_edit->serviceId = $request->service_id;
            $discount_edit->businessId = $request->business_id;
            $discount_edit->title = $request->title;
            $discount_edit->highlight = $request->heighlight;
            $discount_edit->description = $request->description;
            $discount_edit->cover = $discount_edit->cover;
            $discount_edit->rate = $request->rate;
            $discount_edit->value = $request->value;
            $discount_edit->active = $request->status;
            $discount_edit->save();
            return redirect('discounts/discount-list');
        }


    }

    public function discount_delete($id)
    {
        $discount = Discount::where('id', $id)->first();
        // dd($make_delete);
        $discount->delete();
        return redirect('discounts/discount-list');

    }


    // Business Offering

    function business_offer(Request $request)
    {

        $html = '<option>Select option </option>';
        $data = Offering::with('service_name')->whereHas('bussness_offers', function ($q) use ($request) {
            $q->where('businessId', '=', $request->id);
        })->get();

        foreach ($data as $item) {

            $html = $html . '<option value="' . $item->id . '">' . $item->title . ' </option>';
        }
        return $html;
    }

    public function business_offering_delete($id)
    {
        $business_offering_delete = BusinessOffering::where('id', $id)->first();

        $business_offering_delete->delete();
        return redirect('service/business-offering-list');
    }

    public function business_offering_add()
    {

     if(session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff') {
            $business = Business::get();

        }else{
            $business = Business::where('id',auth()->user()->businessId)->get();

        }




        return view('admin.businessoffering.addbusinessoffering', compact('business'));
    }

    public function business_offering_save(Request $request)
    {
        $arraySingle = array_map('current', $request->group_b);

        // dd($arraySingle);
        $imageArray =[];
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
        if(isset($request->icouponIds)){
            
        $arraySingle = array_map('current', $request->group_b);
        $arrayicouponIds = array_map('current', $request->icouponIds);
        $arraycouponIds = array_map('current', $request->couponIds);
        }else{
            
         $arrayicouponIds = [];
         $arraycouponIds = [];
         }


        $offering_cover = Offering::where('id', $request->offering)->first();

        if ($request->cover != '') {

            $profile_pic = $request->cover;
            $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
            $destinationPath = public_path('/offering_cover/');
            $profile_pic->move($destinationPath, $ProfilePic);

            $business_offering = new BusinessOffering();
            $business_offering->businessId = $request->business;
            $business_offering->offeringId = $request->offering;
            $business_offering->title = $request->title;
            $business_offering->about = $request->about;
            $business_offering->price = $request->price;
            $business_offering->cover = $ProfilePic;
            $business_offering->cover = URL::to('/') . '/offering_cover/' . $ProfilePic;
            $business_offering->subtitle = $request->subtitle;
            $business_offering->preTime = $request->pretime;
            $business_offering->preGrace = $request->pregrace;
            $business_offering->processTime = $request->processtime;
            $business_offering->processGrace = $request->processgrace;
            $business_offering->postTime = $request->posttime;
            $business_offering->postGrace = $request->postgrace;
            $business_offering->conditions = json_encode((object)$request->conditions);
            $business_offering->otherConditions = json_encode($arraySingle);
            $business_offering->gallery = json_encode($imageArray);
            $business_offering->icouponIds = json_encode($arrayicouponIds);
            $business_offering->couponIds = json_encode($arraycouponIds);

         
            $business_offering->save();

            return redirect('service/business-offering-list');
        } else {
            $business_offering = new BusinessOffering();
            $business_offering->businessId = $request->business;
            $business_offering->offeringId = $request->offering;
            $business_offering->title = $request->title;
            $business_offering->about = $request->about;
            $business_offering->price = $request->price;
            $business_offering->cover = $offering_cover->cover;
            $business_offering->subtitle = $request->subtitle;
            $business_offering->preTime = $request->pretime;
            $business_offering->preGrace = $request->pregrace;
            $business_offering->processTime = $request->processtime;
            $business_offering->processGrace = $request->processgrace;
            $business_offering->postTime = $request->posttime;
            $business_offering->postGrace = $request->postgrace;
            $business_offering->conditions = json_encode((object)$request->conditions);
            $business_offering->otherConditions = json_encode($arraySingle);
            $business_offering->gallery = json_encode($imageArray);
            $business_offering->icouponIds = json_encode($arrayicouponIds);
            $business_offering->couponIds = json_encode($arraycouponIds);
            
            $business_offering->save();

            return redirect('service/business-offering-list');
        }

    }

    public function business_offering_view($id)
    {
        $business = Business::get();
        $offering_list = BusinessOffering::where('id', $id)->with('business', 'offering')->first();
        //  dd($offering_list);
        $offering_link = Offering::where('serviceId', $offering_list->offering->serviceId)->get();


        $service_list = BusinessServices::where('businessId', $offering_list->business->id)->get();
        // dd($service_list);
        $data = count($service_list);

        for ($i = 0; $i < $data; $i++) {
            $service = Service::where('id', $service_list[$i]->serviceId)->first();
            // dd($service);
            $service_data_list [] = $service;
        }

        // dd($service_data_list);
        return view('admin.businessoffering.businessofferingview', compact('offering_list', 'business', 'service_list', 'service_data_list', 'offering_link'));
    }

    public function business_offering_edit($id)
    {
   
        $business = Business::get();
        $offering_list = BusinessOffering::where('id', $id)->with('business', 'offering')->first();
      
        $offering_link = Offering::where('serviceId', $offering_list->offering->serviceId)->get();

        $service_list = BusinessServices::where('businessId', $offering_list->business->id)->get();
        $data = count($service_list);

        for ($i = 0; $i < $data; $i++) {
            $service = Service::where('id', $service_list[$i]->serviceId)->first();

            $service_data_list [] = $service;
        }

        $icouponIds = DB::table('coupons')->where('businessId',$offering_list->businessId)->where('isInstant','1')->get();
        $couponIds = DB::table('coupons')->where('businessId',$offering_list->businessId)->where('isInstant','!=','1')->get();

        // dd($icouponIds);

        return view('admin.businessoffering.businessofferingedit', compact('icouponIds','couponIds','offering_list', 'business', 'service_list', 'service_data_list', 'offering_link'));
    }

    public function business_offering_edit_store(Request $request)
    {

        // dd($request->all());
//dd($imageArray);
        $arraySingle = array_map('current', $request->group_b);
        $business_offering_edit = BusinessOffering::where('id', $request->id)->first();

        if(isset($request->icouponIds)){
            $arraySingle = [];
            $arrayicouponIds = $request->icouponIds;
            $arraycouponIds = $request->couponIds;
        }else{
            // $arraySingle =[];
            $arrayicouponIds = [];
            $arraycouponIds = [];
        }
        if ($request->cover != "") {
            $profile_pic = $request->cover;
            $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
            $destinationPath = public_path('/offering_cover/');
            $profile_pic->move($destinationPath, $ProfilePic);


            $business_offering_edit->businessId = $request->business;
            $business_offering_edit->offeringId = $request->offering;
            $business_offering_edit->title = $request->title;
            $business_offering_edit->about = $request->about;
            $business_offering_edit->price = $request->price;
            $business_offering_edit->cover = $ProfilePic;
            // $business_offering_edit->cover = URL::to('/').'/offering_cover/'.$ProfilePic;
            $business_offering_edit->subtitle = $request->subtitle;
            $business_offering_edit->preTime = $request->pretime;
            $business_offering_edit->preGrace = $request->pregrace;
            $business_offering_edit->processTime = $request->processtime;
            $business_offering_edit->processGrace = $request->processgrace;
            $business_offering_edit->postTime = $request->posttime;
            $business_offering_edit->postGrace = $request->postgrace;
            $business_offering_edit->conditions = json_encode((object)$request->conditions);
            $business_offering_edit->otherConditions = json_encode($arraySingle);

            $business_offering_edit->icouponIds = json_encode($request->icouponIds);
            $business_offering_edit->couponIds = json_encode($request->couponIds);

            $business_offering_edit->save();
            if ($request->group_a) {
                $imageArray =[];
                foreach ($request->group_a as $key => $image) {

                    $profile_pic = $image['logo'];
                    $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
                    $destinationPath = public_path('/business_gallery/');
                    $profile_pic->move($destinationPath, $ProfilePic);
                    // $imageArray[] = $ProfilePic;
                    // $imageArray[] = $ProfilePic;
                    $imageArray[] = URL::to('/') . '/business_gallery/'.$ProfilePic;

                }
                $business_offering_edit->gallery = json_encode($imageArray);
            }
            return redirect('service/business-offering-list');
        } else {
            $business_offering_edit->businessId = $request->business;
            $business_offering_edit->offeringId = $request->offering;
            $business_offering_edit->title = $request->title;
            $business_offering_edit->about = $request->about;
            $business_offering_edit->price = $request->price;
            $business_offering_edit->cover = $business_offering_edit->cover;
            $business_offering_edit->subtitle = $request->subtitle;
            $business_offering_edit->preTime = $request->pretime;
            $business_offering_edit->preGrace = $request->pregrace;
            $business_offering_edit->processTime = $request->processtime;
            $business_offering_edit->processGrace = $request->processgrace;
            $business_offering_edit->postTime = $request->posttime;
            $business_offering_edit->postGrace = $request->postgrace;
            $business_offering_edit->conditions = json_encode((object)$request->conditions);
            $business_offering_edit->otherConditions = json_encode($arraySingle);
//            $business_offering_edit->gallery = json_encode($imageArray);

            $business_offering_edit->icouponIds = json_encode($request->icouponIds);
            $business_offering_edit->couponIds = json_encode($request->couponIds);
            if ($request->group_a) {
                $imageArray =[];
                foreach ($request->group_a as $key => $image) {

                    $profile_pic = $image['logo'];
                    $ProfilePic = rand() . '.' . $profile_pic->getClientOriginalName();
                    $destinationPath = public_path('/business_gallery/');
                    $profile_pic->move($destinationPath, $ProfilePic);
                    // $imageArray[] = $ProfilePic;
                    // $imageArray[] = $ProfilePic;
                    $imageArray[] = URL::to('/') . '/business_gallery/'.$ProfilePic;

                }
                $business_offering_edit->gallery = json_encode($imageArray);
            }
            $business_offering_edit->save();
            return redirect('service/business-offering-list');
        }
    }
   

    public function business_offering_list(Request $request)
    {
        // $permission = \Request::route()->getName();
        // $checkPermission = DB::table('permissions')->where('url',$permission)->first();
        // if(isset($checkPermission)){
        //     $this->authorize($checkPermission->name);
        // }
        $offering_list = [];

     if(session::get('active_role')->key == 'admin-ar' && Auth::user()->user_type == 'shenshah_staff') {

            $offering_list = BusinessOffering::with('business', 'offering')->get();
        }
         else
          {
            if (isset(auth()->user()->businessId))
                $offering_list = BusinessOffering::where('businessId', auth()->user()->businessId)->with('business', 'offering')->get();

        }
        // dd($offering_list);
        // dd($offering_list[0]->business[0]->title);
        return view('admin.businessoffering.businessofferinglist', compact('offering_list'));
    }


    function coupon_instant(Request $request)
    {
        $data = Coupon::where('businessId', $request->businessId)->where('businessId', $request->serviceId)->where('isInstant', 1)->get();
        return $data;
    }

    function coupon_others(Request $request)
    {
        $data = Coupon::where('businessId', $request->businessId)->where('businessId', $request->serviceId)->where('isInstant', 2)->get();
        return $data;
    }

}



