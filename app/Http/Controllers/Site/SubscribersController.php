<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribers;
class SubscribersController extends Controller
{
    public function checksubscribe(Request $request){
        if($request->ajax()){
            
            $data = $request->all();
              //print_r($data);
            $subscribeCount = Subscribers::where('email',$data['email'])->count();
            if($subscribeCount>0){
                echo "exist";
            }
        }
       }
        public function addsubscribe(Request $request){
        if($request->ajax()){
            $data = $request->all();
              //print_r($data);
            $subscribeCount = Subscribers::where('email',$data['email'])->count();
            if($subscribeCount>0){
                echo "exist";
            }else{
                $newsletter = new Subscribers;
                $newsletter->email = $data['email'];
                $newsletter->save();
                echo "Enregistre";
            }
        }
       }
}
