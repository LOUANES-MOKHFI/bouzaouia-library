<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Settings;
use App\Models\Book;
use App\Models\Lists;
use App\Models\State;
use App\Models\Exhibition;
use App\Models\Slider;

class HomeController extends Controller
{
    
    public function index()
    {
    	$data = [];
    	$data['categories'] = Category::where('is_active',1)->orderBy('name','ASC')->get();
    	
    	$data['best_sellers'] = Book::where('is_active',1)->orderBy('nbr_saled','DESC')->limit(6)->get();

        $data['new_arrivals'] = Book::where('is_active',1)
        ->selectRaw('*, datediff(created_at, now())')
        ->whereRaw('datediff(now(),created_at) < ?', [30])
        ->orderBy('created_at','DESC')
        ->limit(8)->get();
        $data['sliders'] = Slider::where('is_active',1)->get();
        //\Jackiedo\Cart\Facades\Cart::name('shopping')->clearItems($withEvent = true);
        //dd(\Jackiedo\Cart\Facades\Cart::name('shopping')->getDetails());
        return view('site.home.index',$data);
    }

    public function about(){
        return view('site.about.index');
    }
    public function downloadList(){
        $data = [];
        $data['lists'] = Lists::where('is_active',1)->get();
        return view('site.download_list.index',$data);
    }
    public function purchaseMethod(){
        return view('site.purchase_method.index');
    }
    public function Exhibitions(){
        $exhibitions = Exhibition::where('is_active',1)->get();
        return view('site.exhibitions.index',compact('exhibitions'));
    }

    public function Categories(){
        $data = [];
    	$data['categories'] = Category::where('is_active',1)->get();
        return view('site.categories.index',$data);
    }

    public function getStateInfo($state_id){
        $data = [];
        $state = State::where('id',$state_id)->first();
        if(!$state){
            $data['status'] = 401;
            $data['msg'] = "erreur de systeme, veuillez réessayer plus tard";
            return response()->json($data);
        }
        else{
            $data['status'] = 200;
            $data['state'] =  $state;
            return response()->json($data);
        }
    }


    public function addYourBook(){
        return view('site.book.add');
    }

    
    
    

}
