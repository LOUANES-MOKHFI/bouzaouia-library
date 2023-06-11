<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jackiedo\Cart\Cart;
use App\Models\Book;
use App\Models\Order;
use App\Models\State;
use App\Models\User;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;
use DB;
class CartController extends Controller
{
    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart->name('shopping');
    }
    public function content(){
        $items = $this->cart->name('shopping')->getDetails()->get('items');
        //dd($items);
        return view('site.cart.index',compact('items'));
    }
    public function addToCart(Request $request)
    {
        
        $id = $request->id;
        $qty = $request->qty;
        $book = Book::where('id',$id)->first();
        $shoppingCart   = $this->cart->name('shopping');
        $productItem  = $shoppingCart->addItem([
            
                'id'       => $book->id,
                'title'    => $book->title,
                'quantity' => $qty,
                'price'    => $book->special_price == 1 ? $book->special_price_value : $book->price,
        ]);

        //dd($this->cart->getDetails()->get('items')->groupBy('title'));
        return redirect()->back()->with(['success'=>'تمت اضافة الكتاب الى السلة']);
    }
    
    public function updateItemInCart(Request $request){
        $id = $request->id;
        $qty = $request->qty;
        $hash = $request->hash;
        $updatedItem = $this->cart->updateItem($hash, [
            'quantity' => $qty,
        ]);
       // dd($updatedItem);
        return redirect()->back()->with(['success'=>'تم التعديل على السلة']);
    }

    public function clearCart()
    {
        $scart = $this->cart->name('shopping');
        $scart->clearItems();
        return redirect()->back();
        //\Jackiedo\Cart\Facades\Cart::name('shopping')->clearItems($withEvent = true);
        //dd(\Jackiedo\Cart\Facades\Cart::name('shopping')->getItems());
    }

    public function clearItem($hash){

        $this->cart->removeItem($hash,$withEvent=true);
        //$this->cart->removeItem($item, $withEvent = true);
       
       return redirect()->back();
    }

    public function checkout(){

        $data = [];
        $data['items'] = $this->cart->name('shopping')->getDetails()->get('items');
        $data['states'] = State::all();
        return view('site.cart.checkout',$data);
    }

    public function validateCheckout(Request $request){
        
       // try{
            DB::beginTransaction();
            $code = mt_rand('10000','99999');
            if(Auth::user()){
                $user_id = Auth::user()->id;
            }else{
                $user = User::where('email',$request->email)->first();
                if(!$user){
                    $password = Str::random(8);
                    $new_user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($password),
                    ]);
                    $user_id = $new_user->id;
                }else{
                    $user_id = $user->id;
                }
                
            }
            
            $id = Order::create([
                'user_id'        => $user_id,
                'state_id'       => $request->state, 
                'commune'        => $request->commune,
                'adresse'        => $request->adresse,
                'code_postal'    => $request->postal_code,
                'phone'          => $request->phone,
                'paid_methode'  => $request->paid_methode == 0 ? 'الدفع عند التوصيل' : 'الدفع بCCP',
                'note'           => $request->note,
                'code'           => $code,
            ])->id;
            
            $items = $this->cart->name('shopping')->getDetails()->get('items');
            
            foreach($items as $key => $item){
                $orderDetail = OrderDetail::create([
                    'order_id' => $id,
                    'book_id' => $item->id,
                    'qty' => $item->quantity,
                    'price' => $item->price,
                ]);
                $book = Book::where('id',$item->id)->first();
                $book->nbr_saled = $book->nbr_saled+1;
                $book->qty = $book->qty - $item->quantity;
                if($book->qty<0){
                    $book->qty=0;
                }
                $book->save();
            }
            if($id && $orderDetail){
                $this->clearCart();
                $this->sendMail($request->name,$request->email,$code);
                DB::commit();
                return redirect()->route('home')->with(['success'=>'تم تأكيد الطلبية ']);
            }else{
                return redirect()->route('home')->with(['error'=>'هناك خطأ في السيرفر, عليك التأكيد لاحقا']);
            }
            
        /*}catch(\Exception $e){
            return redirect()->route('home')->with(['error'=>'هناك خطأ في السيرفر']);
           // DB::rollback();
        }*/
        
        
    }
    function sendMail($client_name,$client_email,$code_order){
        //$to_email = 'louanes.mokhfi@gmail.com';
        $to_email = 'louanes.mokhfi@gmail.com';
        $data = array('name'=>$client_name, "header" => "لديك طلبية جديدة :",
        "Email" => "إيمايل العميل :".$client_email,
        "Name" => "اسم العميل :".$client_name,
        "codeOrder" => "كود الطلبية  :".$code_order);
        Mail::send('emails.mail', $data, function($message) use ($client_name, $to_email) {
        $message->to($to_email, $client_name)
        ->subject('الأكادمية للنشر و الترجمة');
        $message->from('library@g-clinique.com','الأكادمية للنشر و الترجمة');
        });
        
    }
}


