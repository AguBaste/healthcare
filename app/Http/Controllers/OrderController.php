<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = User::where('role','patient')->orderBy('lastname','asc')->get();
        return view('order.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $patient)
    {   
        $patients = User::where('role','patient')->orderBy('lastname','asc')->get();
        return view('order.create',compact('patients'));
    }

    public function onlyOrder(Request $request){
        $patient = User::find($request->user_id);
        $patients = null;
        return view('order.create',compact('patient','patients'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'user_id'=>'required',
            'date'=>'required',
            'diagnostic'=>'required',
            'study'=>'required'
        ]);
        $provider_id = auth()->user()->id;
        $order = Order::create([
            'date'=> $request->date,
            'study'=>$request->study,
            'diagnostic'=>$request->diagnostic,
            'provider_id'=>$provider_id,
            'user_id'=>$request->user_id
        ]);
        return redirect(route('order.show',compact('order')))->with('status','orden generada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('order.show',compact('order'));
    }

    public function search(Request $request){
        
        $orders = Order::where('user_id', $request->user_id)->orderBy('date','asc')->paginate(5);
        
        return view('order.search',compact('orders'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $patients = User::where('role','patient')
        ->orderBy('lastname','asc')
        ->get();
        return view('order.edit',compact('order','patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id'=>'required',
            'date'=>'required',
            'diagnostic'=>'required',
            'study'=>'required'
        ]);
        $order->date = $request->date;
        $order->user_id = $request->user_id;
        $order->study = $request->study;
        $order->diagnostic = $request->diagnostic;
        $order->provider_id = auth()->user()->id;
        $order->update();
        return redirect(route('order.show',compact('order')))->with('status','orden actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
