<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participants;
use App\Models\Products;
use App\Models\Performance;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index(){
        $quantities = Products::all();
        $sum_quantity = DB::table('performances')->sum('quantity_left');
        $sum_orders = DB::table('orders')->sum('quantitiez');
        $max_points = DB::table('performances')->max('points');
        $best_participant = Performance::all()->where('points','=',$max_points)->first();
        $per_sales = ($sum_orders/($sum_orders+$sum_quantity))*100;
        $dataPoints = [];
        foreach ($quantities as $quantity) {
            
            $dataPoints[] = [
                "name" => $quantity['product'],
                "y" => floatval($quantity['quantity'])
            ];
        }
        $participants = Participants::all();
        $products = Products::all();
        $customers = User::all()->where('role','=', 2);
        $latest_sales = Orders::join('users','orders.user','=','users.id')->join('products','orders.product_id','=','products.id')->orderBy('products.id', 'desc')->get()->take(6);
        return view('dashboards.admins.index',[
            'participants'=>$participants,
            "customers"=>$customers,
            'products'=>$products,
            'latest_sales'=>$latest_sales,
            'per_sales'=>$per_sales,
            'best_participant'=>$best_participant,
            "data" => json_encode($dataPoints)
        ]);
    }
    function participants(){
        $participants = Participants::all();
        return view('dashboards.admins.participants',[
            'participants'=>$participants,
        ]);
    }
    function customers(){
        $customers = User::all()->where('role','=', 2);
        return view('dashboards.admins.customers',[
            "customers"=>$customers,
        ]);
    }
    function products(){
        $products = Products::all();
        return view('dashboards.admins.products',[
            'products'=>$products,
        ]);
    }
    function sales(){
        $sales = Orders::join('users','orders.user','=','users.id')->join('products','orders.product_id','=','products.id')->get();
        return view('dashboards.admins.sales',[
            'sales'=>$sales,
        ]);
    }
}
