<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
class OrderController extends Controller
{
    public function index(){
        $data = [];
        $data['orders'] = Order::orderBy('created_at','DESC')->get();
        return view('admin.orders.index',$data);
    }

    public function OrderDetail($id){
        $data = [];
        $data['order'] = Order::where('id',$id)->first();
        $data['order_details'] = OrderDetail::where('order_id',$data['order']->id)->get();

        return view('admin.orders.details',$data);
    }

    public function changeStatus($id){
    
        $order = Order::where('id',$id)->first();
        if(!$order){
            return redirect()->back()->with(['error'=>'لا توجد هذه الطلبية']); 
        }
        $order->status = 1;
        $order->save();
        return redirect()->back()->with(['success'=>'تم تغيير حالة الطلبية بنجاح']);
    }
}
