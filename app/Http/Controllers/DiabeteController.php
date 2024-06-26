<?php

namespace App\Http\Controllers;

use App\Models\Diabete;
use Illuminate\Http\Request;

class DiabeteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user()->id;
        $diabetes = Diabete::orderBy('date','desc')->where('user_id',$user)->get();
        return view('diabete.index',compact('diabetes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('diabete.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'bsl'=>'required',
            'date'=>'required',
            'time'=>'required',
            'comment'=>'max:255'
        ]);

        $user = auth()->user()->id;
        Diabete::create([
            'bsl'=>$request->bsl,
            'date'=>$request->date,
            'time'=>$request->time,
            'user_id'=>$user,
            'comment'=>$request->comment
        ]);
        return redirect(route('diabete.index'))->with('status','medición guardada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Diabete $diabete)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diabete $diabete)
    {
               return view('diabete.edit',compact('diabete'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diabete $diabete)
    {
        $request->validate([
            'bsl'=>'required',
            'date'=>'required',
            'time'=>'required',
            'comment'=>'max:255'
        ]);
        $diabete->bsl = $request->bsl;
        $diabete->date = $request->date;
        $diabete->time = $request->time;
        $diabete->comment = $request->comment;
        $diabete->update();
        return redirect(route('diabete.index'))->with('status','medición actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diabete $diabete)
    {
        $diabete->delete();
        return redirect(route('diabete.index'))->with('status','medición borrada exitosamente');
    }
}
