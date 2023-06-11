<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
class ProfileController extends Controller
{
    public function index(){
        $data = [];
        $data['orders'] = Order::where('user_id',Auth::user()->id)->get();
        
        return view('site.profile.index',$data);
    }
}
