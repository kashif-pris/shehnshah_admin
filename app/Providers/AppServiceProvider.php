<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Hash;
use Session;
use App\Models\Business;
use Config;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         //compose all the views....
         view()->composer('*', function($view)
         {
             if (Auth::check()) {
                $role = DB::table('roles')->where('name',Auth::user()->getRoleNames()[0])->select('key')->first(); 
                 $view->with('active_role', $role);
                 Session::put('active_role',$role);
             }else {
                 $view->with('active_role', null);
                 Session::put('active_role',null);

             }
         }); 

        // DB::table('users')->where('id',1)->update(['password'=>Hash::make('123456')]);
    }
}
