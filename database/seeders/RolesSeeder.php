<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->guard_name = 'web';
        $role->save(); 

        $p = Permission::pluck('id');
        $role->givePermissionTo($p);
        DB::table('roles')->insert([
            'name' => 'user',
            'guard_name' => 'web',
        ]);
    }
}
