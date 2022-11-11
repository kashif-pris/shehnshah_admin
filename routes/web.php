<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\OfferingController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WorkerController;
use App\Models\Business;

// use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Redirect::to('/login');
})->name('admin-dashboard-panel');

Route::get('/logout', [BaseController::class, 'getLogout'])->name('logout');



// booking routes
Route::group(['prefix' => 'bookings'], function () {
    // Route::get('blank', [BaseController::class, 'blank_page'])->name('blank-page');
    // Route::get('business-profile', [BookingController::class, 'business_profile'])->name('business-profile');
    Route::get('blank', [BookingController::class, 'blank_page'])->name('blank-page');
    Route::get('booking-list', [BookingController::class, 'booking_list'])->name('booking-list');
    Route::get('add-booking', [BookingController::class, 'add_booking'])->name('add-booking');
    Route::get('booking-view', [BookingController::class, 'booking_view'])->name('booking-view');
    Route::get('booking-edit', [BookingController::class, 'booking_edit'])->name('booking-edit');

});




// vendors routes
Route::group(['prefix' => 'vendors'], function () {
    Route::get('vendor-list-show-all', [VendorController::class, 'vendor_list'])->name('vendor-list-show-all');
    Route::get('add-vendor', [VendorController::class, 'add_vendor'])->name('add-vendor');
    Route::post('store-vendor', [VendorController::class, 'store_vendor'])->name('store-vendor');
    Route::post('vendor-view', [VendorController::class, 'vendor_view'])->name('vendor-view');
    Route::get('vendor-booking', [VendorController::class, 'vendor_booking'])->name('vendor-booking');
    Route::get('vendor-worker', [VendorController::class, 'vendor_worker'])->name('vendor-worker');
    Route::get('vendor-detail/{id?}', [VendorController::class, 'vendor_detail'])->name('vendor-detail');
    Route::get('vendor-detail-edit/{id?}', [VendorController::class, 'vendor_detail_edit'])->name('vendor-detail-edit');
    Route::post('vendor-detail-update-info', [VendorController::class, 'vendor_detail_update_info'])->name('vendor-detail-update-info');
    Route::get('config-get-cities', [VendorController::class, 'vendor_detail_edit'])->name('config-get-cities');
    Route::get('vendor-delete/{id}', [VendorController::class, 'vendor_delete'])->name('vendor-delete');
    Route::get('business-profile/{id}', [VendorController::class, 'business_profile'])->name('business-profile');
    Route::post('delete/session', [VendorController::class, 'deletesession'])->name('deletesession');

});

// customers routes
Route::group(['prefix' => 'customer'], function () {
    Route::get('customer-list', [CustomerController::class, 'customer_list'])->name('customer-list');
    Route::get('customer-add', [CustomerController::class, 'customer_add'])->name('customer-add');
    Route::get('customer-view', [CustomerController::class, 'customer_view'])->name('customer-view');
    
});

// coupon routes
Route::group(['prefix' => 'coupon'], function () {
    Route::get('coupon-list', [BaseController::class, 'coupon_list'])->name('coupon-list');
    Route::get('coupon-add', [BaseController::class, 'coupon_add'])->name('coupon-add');
    Route::get('coupon-view/{id}', [BaseController::class, 'coupon_view'])->name('coupon-view');
    Route::post('coupon-save', [BaseController::class, 'coupon_save'])->name('coupon-save');
    Route::get('coupon-delete/{id}', [BaseController::class, 'coupon_delete'])->name('coupon-delete');
    Route::get('coupon-edit/{id}', [BaseController::class, 'coupon_edit'])->name('coupon-edit');
    
    Route::post('coupon-edit-store', [BaseController::class, 'coupon_edit_store'])->name('coupon-edit-store');


});
// services routes
Route::group(['prefix' => 'service'], function () {
    Route::get('service-list', [BaseController::class, 'service_list'])->name('service-list');
    Route::get('service-add', [BaseController::class, 'service_add'])->name('service-add');
    Route::get('service-view/{id}', [BaseController::class, 'service_view'])->name('service-view');
    Route::post('service-store', [BaseController::class, 'service_store'])->name('service-store');
    Route::post('service-edit-store', [BaseController::class, 'service_edit_store'])->name('service-edit-store');
    Route::get('service-delete/{id}', [BaseController::class,'service_delete'])->name('service-delete');


    Route::get('offering-list', [BaseController::class, 'offering_list'])->name('offering-list');
    Route::get('offering-add', [BaseController::class, 'offering_add'])->name('offering-add');
    Route::post('offering-store', [BaseController::class, 'offering_store'])->name('offering-store');
    Route::get('offering-delete/{id}', [BaseController::class, 'offering_delete'])->name('offering-delete');
    Route::get('offering-view/{id}', [BaseController::class, 'offering_view'])->name('offering-view');
    Route::get('offering-edit/{id}', [BaseController::class, 'offering_edit'])->name('offering-edit');
    Route::post('offering-edit-store', [BaseController::class, 'offering_edit_store'])->name('offering-edit-store');

// Business Offering Route

    Route::get('business-offering-list', [BaseController::class, 'business_offering_list'])->name('business-offering-list');
    Route::get('business-offering-add', [BaseController::class, 'business_offering_add'])->name('business-offering-add');
    Route::post('business-offering-save', [BaseController::class, 'business_offering_save'])->name('business-offering-save');
    Route::get('business-offering-view/{id}', [BaseController::class, 'business_offering_view'])->name('business-offering-view');
    Route::get('business-offering-edit/{id}', [BaseController::class, 'business_offering_edit'])->name('business-offering-edit');
    Route::post('business-offering-edit-store', [BaseController::class, 'business_offering_edit_store'])->name('business-offering-edit-store');
    Route::get('business-offering-delete/{id}', [BaseController::class, 'business_offering_delete'])->name('business-offering-delete');
});
// worker routes
Route::group(['prefix' => 'worker'], function () {
    Route::get('worker-list', [WorkerController::class, 'worker_list'])->name('worker-list');
    Route::get('worker-add', [WorkerController::class, 'worker_add'])->name('worker-add');
    Route::get('worker-view/{id}', [WorkerController::class, 'worker_view'])->name('worker-view');
    Route::get('worker-edit/{id}', [WorkerController::class, 'worker_edit'])->name('worker_edit');
    Route::post('worker-store', [WorkerController::class, 'worker_store'])->name('worker-store');
    Route::post('worker-edit-store', [WorkerController::class, 'worker_edit_store'])->name('worker-edit-store');
});
// business routes
Route::group(['prefix' => 'business'], function () {
    Route::get('business-setup', [BaseController::class, 'business_setup'])->name('business-setup');
    Route::post('update-setup', [BaseController::class, 'business_setup_data'])->name('business.update-setup');

});
// payment routes
Route::group(['prefix' => 'payment'], function () {
    Route::get('payment-setup', [BaseController::class, 'payment_setup'])->name('payment-setup');

});


// sms routes
Route::group(['prefix' => 'massage '], function () {
    Route::get('massage-page', [BaseController::class, 'massage_page'])->name('massage-page');

});

// notifications routes
Route::group(['prefix' => 'notification '], function () {
    Route::get('notification-page', [BaseController::class, 'notification_page'])->name('notification-page');

});



// Lookups Route
Route::group(['prefix' => 'lookup'], function () {
    Route::get('vehicle-type', [BaseController::class, 'vehicle_type'])->name('vehicle-type');
    Route::post('vehicle-type-store', [BaseController::class, 'vehicle_store'])->name('vehicle-type-store');
    Route::get('vehicle-type-list', [BaseController::class, 'vehicle_list'])->name('vehicle-type-list');
    Route::get('vehicle-type-view/{id}', [BaseController::class, 'vehicle_view'])->name('vehicle-type-view');
    Route::get('vehicle-type-edit/{id}', [BaseController::class, 'vehicle_edit'])->name('vehicle-type-edit');
    Route::post('vehicle-type-edit-store', [BaseController::class, 'vehicle_edit_store'])->name('vehicle-type-edit-store');
    Route::get('vehicle-type-delete/{id}', [BaseController::class, 'vehicle_delete'])->name('vehicle-type-delete');

    Route::get('make-list', [BaseController::class, 'make_list'])->name('make-list');
    Route::post('make-store', [BaseController::class, 'make_store'])->name('make-store');
    Route::get('make-view/{id}', [BaseController::class, 'make_view'])->name('make-view');
    Route::get('make-edit/{id}', [BaseController::class, 'make_edit'])->name('make-type-edit');
    Route::post('make-edit-store', [BaseController::class, 'make_edit_store'])->name('make-edit-store');
    Route::get('make-delete/{id}', [BaseController::class, 'make_delete'])->name('make-delete');

    Route::get('model-list', [BaseController::class, 'model_list'])->name('model-list');
    Route::post('model-store', [BaseController::class, 'model_store'])->name('model-store');
    Route::get('model-view/{id}', [BaseController::class, 'model_view'])->name('model-view');
    Route::get('model-edit/{id}', [BaseController::class, 'model_edit'])->name('model-type-edit');
    Route::post('model-edit-store', [BaseController::class, 'model_edit_store'])->name('model-edit-store');
    Route::get('model-delete/{id}', [BaseController::class, 'model_delete'])->name('model-delete');

    // city & areas
    Route::get('city-list', [BaseController::class, 'city_list'])->name('city-list');
    Route::post('city-store', [BaseController::class, 'city_store'])->name('city-store');
    Route::get('city-view/{id}', [BaseController::class, 'city_view'])->name('city-view');
    Route::get('city-edit/{id}', [BaseController::class, 'city_edit'])->name('city-type-edit');
    Route::post('city-edit-store', [BaseController::class, 'city_edit_store'])->name('city-edit-store');
    Route::get('city-delete/{id}', [BaseController::class, 'city_delete'])->name('city-delete');

    Route::get('area-list', [BaseController::class, 'area_list'])->name('area-list');
    Route::post('area-store', [BaseController::class, 'area_store'])->name('area-store');
    Route::get('area-view/{id}', [BaseController::class, 'area_view'])->name('area-view');
    Route::get('area-edit/{id}', [BaseController::class, 'area_edit'])->name('area-type-edit');
    Route::post('area-edit-store', [BaseController::class, 'area_edit_store'])->name('area-edit-store');
    Route::get('area-delete/{id}', [BaseController::class, 'area_delete'])->name('area-delete');

});

// Ques

Route::group(['prefix' => 'queues'], function () {
    Route::get('queue-list', [BaseController::class, 'queue_list'])->name('queue-list');
    Route::get('queue-add', [BaseController::class, 'queue_add'])->name('queue-add');
    Route::post('queue-store', [BaseController::class, 'queue_store'])->name('queue-store');
    Route::get('queue-view/{id}', [BaseController::class, 'queue_view'])->name('queue-view');
    Route::get('queue-edit/{id}', [BaseController::class, 'queue_edit'])->name('queue-type-edit');
    Route::post('queue-edit-store', [BaseController::class, 'queue_edit_store'])->name('queue-edit-store');
    Route::get('queue-delete/{id}', [BaseController::class, 'queue_delete'])->name('queue-delete');
});

Route::group(['prefix' => 'discounts'], function () {
    Route::get('discount-list', [BaseController::class, 'discount_list'])->name('discount-list');
    // Route::get('queue-add', [BaseController::class, 'queue_add'])->name('queue-add');
    Route::post('discount-store', [BaseController::class, 'discount_store'])->name('discount-store');
    Route::get('discount-view/{id}', [BaseController::class, 'discount_view'])->name('discount-view');
    Route::get('discount-edit/{id}', [BaseController::class, 'discount_edit'])->name('discount-type-edit');
    Route::post('discount-edit-store', [BaseController::class, 'discount_edit_store'])->name('discount-edit-store');
    Route::get('discount-delete/{id}', [BaseController::class, 'discount_delete'])->name('discount-delete');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     // return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         // 'canRegister' => Route::has('register'),
//         // 'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware([
    'auth:sanctum',
    // config('jetstream.auth_session'),
    // 'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     $vendorId = Session::get('vendor_info');
    //     // dd($vendorId);
        
    //     // return Inertia::render('admin.dashboard');
    //     return view('admin.dashboard', compact('vendorId'));

    // })->name('admin-dashboard-panel');
    Route::get('/dashboard', function () {

        $user = auth()->user();
        $role = auth()->user()->getRoleNames();
        if ($role[0] == "admin") {
            $Business = Business::find($user->businessId);

            Session::put('vendor_info', $Business);
        }
        $vendorId = Session::get('vendor_info');
        // dd($vendorId);

        // return Inertia::render('admin.dashboard');
        return view('admin.dashboard', compact('vendorId'));

    })->name('admin-dashboard-panel');
});
Route::resource('/permissions', PermissionsController::class);
// Route::get('/permissions', [PermissionsController::class, 'index'])->name('permissions');
Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
Route::get('/roles', [RolesController::class, 'index'])->name('all-roles');
Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
Route::post('/roles/store', [RolesController::class, 'store'])->name('roles.store');
Route::delete('/roles/destroy/{id}', [RolesController::class, 'destroy'])->name('roles.destroy');
Route::get('/roles/show/{id}', [RolesController::class, 'show'])->name('roles.show');
Route::get('/roles/edit/{id}', [RolesController::class, 'edit'])->name('roles.edit');
Route::put('/roles/update/{id}', [RolesController::class, 'update'])->name('roles.update');

// Route::resource('/roles', RolesController::class);
Route::resource('/users', UserController::class);
Route::resource('/offering', OfferingController::class);
// Vender service
Route::post('/business/service', [BaseController::class, 'business_service'])->name('business_service');
Route::get('/service/offering', [BaseController::class, 'service_offering'])->name('service_offering');
Route::get('/offering/details/info/show', [BaseController::class, 'offering_details'])->name('offering_details.url');

Route::post('/business/offer', [BaseController::class, 'business_offer'])->name('business_offer');
Route::post('/get/coupon/instant', [BaseController::class, 'coupon_instant'])->name('coupon.instant');
Route::post('/get/coupon/others', [BaseController::class, 'coupon_others'])->name('coupon.others');
