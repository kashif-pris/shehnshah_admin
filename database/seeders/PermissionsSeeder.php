<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'permission',
            'guard_name' => 'web',
            'parent_id' => 0,
            'main' => 1,
        ];
        $main = Permission::create($data);
        Permission::insert([

            [
                'name' => 'Add_Booking',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [
                'name' => 'booking_list',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],


            [
                'name' => 'permission_create',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'permission_edit',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'permission_delete',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
        ]);

        $data = [
            'name' => 'role',
            'guard_name' => 'web',
            'parent_id' => 0,
            'main' => 1,
        ];
        $main = Permission::create($data);
        Permission::insert([
            [
                'name' => 'role_create',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'role_edit',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'role_delete',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
        ]);


        $data = [
            'name' => 'All_Booking',
            'guard_name' => 'web',
            'parent_id' => 0,
            'main' => 1,
        ];
        $main = Permission::create($data);
        Permission::insert([
            [
                'name' => 'booking_create',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'booking_edit',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'booking_delete',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
        ]);



        $data = [
            'name' => 'Manage_Vendor',
            'guard_name' => 'web',
            'parent_id' => 0,
            'main' => 1,
        ];
        $main = Permission::create($data);
        Permission::insert([


            [
                'name' => 'Vendor_List',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [
                'name' => 'Add_Vendor',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [
                'name' => 'vendor_create',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'vendor_edit',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'vendor_delete',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
        ]);


        $data = [
            'name' => 'Manage_Customer',
            'guard_name' => 'web',
            'parent_id' => 0,
            'main' => 1,
        ];
        $main = Permission::create($data);
        Permission::insert([


            [
                'name' => 'Customer',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            
            [
                'name' => 'Add_Customer',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            
            [
                'name' => 'customer_create',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'customer_edit',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'customer_delete',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
        ]);



        $data = [
            'name' => 'Manage_Coupons',
            'guard_name' => 'web',
            'parent_id' => 0,
            'main' => 1,
        ];
        $main = Permission::create($data);
        Permission::insert([

            [
                'name' => 'Coupons_List',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [
                'name' => 'Add_Coupons',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [
                'name' => 'coupon_create',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'coupon_edit',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'coupon_delete',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
        ]);

        $data = [
            'name' => 'Manage_Services',
            'guard_name' => 'web',
            'parent_id' => 0,
            'main' => 1,
        ];
        $main = Permission::create($data);
        Permission::insert([
            [
                'name' => 'Service_List',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [
                'name' => 'Add_Service',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [
                'name' => 'mange_service_create',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'mange_service_edit',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'mange_service_delete',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
        ]);


        $data = [
            'name' => 'Manage_Workers',
            'guard_name' => 'web',
            'parent_id' => 0,
            'main' => 1,
        ];
        $main = Permission::create($data);
        Permission::insert([

            [
                'name' => 'Worker_List',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [
                'name' => 'Add_Worker',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [
                'name' => 'mange_worker_create',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'mange_worker_edit',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'mange_worker_delete',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
        ]);


        $data = [
            'name' => 'user',
            'guard_name' => 'web',
            'parent_id' => 0,
            'main' => 1,
        ];
        $main = Permission::create($data);
        Permission::insert([
            [
                'name' => 'user_create',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'user_edit',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
            [

                'name' => 'user_delete',

                'guard_name' => 'web',

                'main' => 0,

                'created_at' => \Carbon\Carbon::now(),

                'updated_at' => \Carbon\Carbon::now(),

                'parent_id' => $main->id,

            ],
        ]);

        $data = [
            'name' => 'business_setup',
            'guard_name' => 'web',
            'parent_id' => 0,
            'main' => 1,
        ];
        $main = Permission::create($data);



        $data = [
            'name' => 'payment_mode',
            'guard_name' => 'web',
            'parent_id' => 0,
            'main' => 1,
        ];
        $main = Permission::create($data);

        $data = [
            'name' => 'sms',
            'guard_name' => 'web',
            'parent_id' => 0,
            'main' => 1,
        ];
        $main = Permission::create($data);  $data = [
            'name' => 'notification',
            'guard_name' => 'web',
            'parent_id' => 0,
            'main' => 1,
        ];
        $main = Permission::create($data);


    }
}