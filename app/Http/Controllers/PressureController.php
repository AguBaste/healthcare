<?php

namespace App\Http\Controllers;

use App\Models\Pressure;
use Illuminate\Http\Request;

class PressureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pressures = Pressure::orderBy('date','desc')->get();
        return view('pressure.index',compact('pressures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pressure.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'systolic'=>'required',
            'diastolic'=>'required',
            'heart'=>'required',
            'date'=>['required','date'],
            'time'=>'required',
            'comments'=>'max:255'
        ]);
        $user_id = auth()->user()->id;
        Pressure::create([
            'systolic'=>$request->systolic,
            'diastolic'=>$request->diastolic,
            'heart'=>$request->heart,
            'date'=>$request->date,
            'time'=>$request->time,
            'comment'=>$request->comment,
            'user_id'=>$user_id
        ]);
        return redirect(route('pressure.index'))->with('status', 'medición guardada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pressure $pressure)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pressure $pressure)
    {
                return view('pressure.edit',compact('pressure'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pressure $pressure)
    {
        $request->validate([
            'systolic'=>'required',
            'diastolic'=>'required',
            'heart'=>'required',
            'date'=>['required','date'],
            'time'=>'required',
            'comments'=>'max:255'
        ]);
        $pressure->systolic = $request->systolic;
        $pressure->diastolic = $request->diastolic; 
        $pressure->heart = $request->heart;
        $pressure->comment = $request->comment;
        $pressure->date = $request->date;
        $pressure->time = $request->time;
        $pressure->update();
        return redirect(route('pressure.index'))->with('status','medición actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pressure $pressure)
    {
        $pressure->delete();
        return redirect(route('pressure.index'))->with('status','medición borrada exitosamente');
    }
}
