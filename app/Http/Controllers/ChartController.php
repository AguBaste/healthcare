<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Treatment;
use App\Models\Diagnostic;
use App\Models\User;
use App\Models\Insurance;


use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $chart = Chart::where('user_id',auth()->user()->id)->first();
        $diagnostics = Diagnostic::where('user_id',auth()->user()->id)->get();
        return view('chart.index',compact('chart','diagnostics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = User::where('role','patient')->get();
        $insurances = Insurance::orderBy('description','desc')->get();
        return view('chart.create',compact('patients','insurances'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'smoke'=>'required',
            'glasses'=>'required',
            'user_id'=>'required',
            'insurance'=>'required',
            'height'=>'required',
            'weight'=>'required'
        ]);
 
       
       Chart::create([
            'height'=>floatval($request->height),
            'weight'=>floatval($request->weight),
            'member_id'=>$request->member_id,
            'smoke'=>$request->smoke,
            'glasses'=>$request->glasses,
            'user_id'=>$request->user_id,
            'insurance_id'=>$request->insurance 
        ]);
        return redirect(route('providerDash'))->with('status','cartilla creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chart $chart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chart $chart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chart $chart)
    {
        //
    }
}
