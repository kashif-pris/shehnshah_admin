<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin', 
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        $user = User::find(1);
        $Role = Role::find(1);
        $user->syncRoles($Role);
    }
}
