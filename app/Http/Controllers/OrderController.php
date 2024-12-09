<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        // dd($id);
        
        $pizza_id = Pizza::find($id);
        // dd($pizza_id);
        return view('order', compact('pizza_id'));

    }

    public function order(Request $request){

        $pizza_id = Pizza::findOrFail($request->type);
        
        //declare variable
        $order = new Order();
        $order->customer_name   = $request->cusName;
        $order->customer_phone  = $request->phone;
        $order->pizza_id        = $pizza_id->id;
        $order->total_order     = $request->quantity;

        if ($request->size == 'small') {
            $order->grand_total     = $pizza_id->small * $request->quantity;
        } else if ($request->size == 'medium'){
            $order->grand_total     = $pizza_id->medium * $request->quantity;            
        } else if($request->size == 'large') {
            $order->grand_total     = $pizza_id->large * $request->quantity;
        }

        $order->save();//save database in db
        return redirect()->route('kitchen.success')->with('success', 'Pizza successfully has been ordered.');
    }

    public function kitchenOrder(){

        return view('kitchenOrder');

    }

    public function success(){
        return view('success_order');
    }

        public function getOrders()
    {
        $orders = Order::all();
        return response()->json(['data' => $orders]); 
    }


}
