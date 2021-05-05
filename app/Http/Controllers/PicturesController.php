<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;




class PicturesController extends Controller
{
    function index(){
        //Api data
        //Cache::forget('pictures');
        
       if(Cache::has('pictures')){
            $picturesJson = Cache::get('pictures');
            $timeExpire = Cache::get('expirePictures');
            $array = (array) $timeExpire;
            $newDate = strtotime ( '+24 hours' , strtotime ( $array['date'] ) ) ;
            $dataTime = new DateTime('@' .$newDate);
            $interval = $dataTime->diff(now());
            $timeExpirate = $interval->format('%h hours %i minutes');
            return view('pictures',['picturesJson'=>$picturesJson['hits'],"timeExpiration"=>$timeExpirate]);
        }else{
            $apikey = env('APIKEY');
            $picturesJson= Http::get("https://pixabay.com/api/?key=$apikey&image_type=photo");
            Cache::put('pictures', $picturesJson->json(),now()->addDay(1));
            Cache::put('expirePictures', now());
            return view('pictures',['picturesJson'=>$picturesJson['hits']]);
        }
        
    }

    function save(){
        //save data
        print_r("data save");
        return view('save');
    }
}
