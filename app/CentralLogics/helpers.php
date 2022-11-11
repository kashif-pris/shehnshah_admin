<?php

namespace App\CentralLogics;

use App\Models\AddOn;
use App\Models\Business;
use App\Models\BusinessSetting;
use App\Models\Currency;
use App\Models\DMReview;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use App\CentralLogics\RestaurantLogic;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use App\Models\Area;
class Helpers
{      
    public $key;
    public static function get_settings($name)
    {
        $config = null;
        $data = BusinessSetting::where(['key' => $name])->first();
        if (isset($data)) {
            $config = json_decode($data['value'], true);
            if (is_null($config)) {
                $config = $data['value'];
            }
        }
        return $config;
    }  
    public static function get_cities()
    {
        $config = null;
        $data = City::with('areas')->get();
        if (isset($data)) {
            $config = ($data);
            if (is_null($config)) {
                $config = $data;
            }
        }
        return $config;
    }  

    // week map
    static  function getWeekMap(){

        $weekMap = [
            0 => 'SU',
            1 => 'MO',
            2 => 'TU',
            3 => 'WE',
            4 => 'TH',
            5 => 'FR',
            6 => 'SA',
        ];
        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $today = $weekMap[$dayOfTheWeek];
        
        // hours
        $hours = [];
        $startingTime = date('00,00');
        
        $time = Carbon::createFromFormat('H,i', $startingTime);
       for ($i=0; $i < 48; $i++) { 
         if( $i == 0 ){
            $hours[] = $time->format('H,i');
         }else{
            $hours[] = $time->addMinutes(30)->format('H,i');

         }
       }
       $data = [$weekMap,$hours];

       return $data ;
    }

    static function  timeFormate($time,$conversionType){
        if($conversionType == 'split'){
            $formated = explode(',',$time);
        }

        if($conversionType == 'merge'){
            $formated = implode(',',$time);
        }
        return $formated;

    }
    // static function  business_check($phone, $email){
    //     Business::select('contact')->json()
    //     return $formated;

    // }
 
}
