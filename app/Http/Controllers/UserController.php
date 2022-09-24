<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\Performance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Participants;
use Carbon\Carbon;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        $products = Products::all();
        $auth = Auth::user()->id;
        return view('dashboards.users.index',[
            'products'=>$products,
            'auth'=>$auth,
        ]);
    }
    public function show($id)
    {
        $product = Products::find($id);
        $auth = Auth::user()->id;
        return view('dashboards.users.product',[
            'auth'=>$auth,
            'product'=>$product,
        ]);
    }
    public function admin($id){
        DB::update('update users set role = 1 where id = ?', [$id]);
        Auth::logout();
        return redirect()->route('login');

    }

    public function participant($id){
        $auth = Auth::user()->id;
        $participant = Participants::all()->where('name','=',$id)->first();
        $time = new Carbon($participant->created_at);
        $time->format('Y-m-d H:i:s');
        return view('dashboards.users.participant',[
            'participant'=>$participant,
            'auth'=>$auth,
            'time'=>$time,
        ]);
    }

    public function addToCart(Request $req) 
    {
        $cart = new Cart();
        $cart->user_id = $req->user_id;
        $cart->product_id = $req->product_id;
        $cart->quantities = 1;
        $cart->save();
        return redirect()->route('user.dashboard');
    }

    //update cart item quantity
    public function addToQuant(Request $req) 
    {
        $update = Cart::join('products','products.id','=','carts.product_id')->where('user_id', auth()->user()->id)->where('product_id', $req->product_id)
        ->update(['quantities' => $req->product_quantity, 'total_price' => $req->product_quantity*(int)'price']);
        return redirect()->route('user.cart');
    }

    //delete an item on cart
    public function destroy($id)
    {
        $item = Cart::findOrFail($id);

        $item->delete();

        return back();
    }

    //cart
    public function fromCart()
    {
        if(Cart::where('user_id', auth()->user()->id)){

            $cartlists = Cart::join('products','products.id','=','carts.product_id')->where('carts.status',1)->get();

            
            return view('dashboards.users.cart', compact('cartlists'));
    
        }

    }

    //checkout

    public function checkOut(Request $req)
    {
        if(Cart::where('user_id', $req->user_id)){
            $status = Cart::where('user_id', auth()->user()->id)->update(['status' => 0]);
            
            $quants = Cart::join('products','products.id','=','carts.product_id')->where('user_id', auth()->user()->id)->get();

            foreach($quants as $quant){

                $pName = $quant->product;
                $pId = $quant->product_id;
                $uname = $quant->uname;
                $user_quantity = $quant->quantities;
                $part_quantity = $quant->quantity;

                    //$cart = Cart::join('products','products.id','=','carts.product_id')->first();
                    
                    Cart::join('products','products.id','=','carts.product_id')->where('product_id', $req->productid)
                    ->update(['quantity' => ((int)$part_quantity-(int)$user_quantity)]);
                
            

                //saving checkout cart to db
                $cron = new Orders();
                $cron->user = $req->user_id;
                $cron->product_id = $pId;
                $cron->quantitiez = $user_quantity;
                $cron->save();

                //saving Updating Performance of the participants
                if(Orders::where('user', auth()->user()->id)->first() && $user_quantity>1){
                    //Awarding points
                    Performance::join('products','products.uname','=','performances.participant')->increment('points',4);
                }elseif(Orders::where('user', auth()->user()->id)->first()) {
                    Performance::join('products','products.uname','=','performances.participant')->increment('points',2);
                }else {
                    Performance::join('products','products.uname','=','performances.participant')->increment('points',1);
                }

                if(Performance::join('products','products.uname','=','performances.participant')){
                    $table = Performance::join('products','products.uname','=','performances.participant')->first();
                    foreach($table as $table){
                        Performance::join('products','products.uname','=','performances.participant')
                        ->update(['quantity_left' => ((int)$part_quantity-(int)$user_quantity)]);

                    }
                    
                }else{
                    $perf = new Performance();
                    $perf->participant = $uname;
                    $perf->quantity_left = (int)$part_quantity-(int)$user_quantity;
                    $perf->save();

                }

            }
                
                
            
            
                
        }
        return redirect()->route('user.dashboard');
    }
}
