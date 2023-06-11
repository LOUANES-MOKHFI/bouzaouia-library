<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Order;
use App\Models\Category;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $data = [];
        $data['books'] = Book::all();
        $data['active_books'] = Book::where('is_active',1)->get();
        $data['inactive_books'] = Book::where('is_active',0)->get();
        $data['orders'] = Order::all();
        $data['last_orders'] = Order::orderBy('created_at','DESC')->limit(5)->get();
        $data['notconfirmerd_orders'] = Order::where('status',0)->get();
        $data['confirmed_orders'] = Order::where('status',1)->get();
        $data['categories'] = Category::where('is_active',1)->get();
        $data['best_books'] = Book::orderBy('nbr_saled','DESC')->limit(20)->get();
        //dd($data['confirmed_orders']->details->sum('price'));
        
        $data['sum_sale'] = OrderDetail::whereHas('order',function($query){
            $query->where('status',1);
        })->sum('price');
    	return view('admin.index',$data);
    }
}
