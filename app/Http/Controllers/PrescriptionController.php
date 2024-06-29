<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Diagnostic;
use App\Models\Treatment;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = User::where('role','patient')->get();
        return view('prescription.create',compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id'=> 'required',
            'date'=>'required',
            'formula'=>'required',
            'dosis'=>'required',    
            'diagnostic'=>'required'
        ]);
        Prescription::create([
            'formula' =>$request->formula,
            'dosis'=>$request->dosis,
            'diagnostic'=>$request->diagnostic,
            'date'=>$request->date,
            'provider_id'=> auth()->user()->provider[0]->id,
            'user_id'=>$request->patient_id
        ]);
        Treatment::create([
            'description'=>$request->formula.' '.$request->dosis,
            'start_date'=>$request->date,
            'provider_id'=>auth()->user()->provider[0]->id,
            'user_id'=>$request->patient_id,
        ]);
        Diagnostic::create([
            'user_id'=> $request->patient_id,
            'provider_id'=>auth()->user()->provider[0]->id,
            'description'=>$request->diagnostic
        ]);
        return redirect(route('prescription.create'))->with('status','receta generada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
