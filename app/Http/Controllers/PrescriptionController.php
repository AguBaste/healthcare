<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Diagnostic;
use App\Models\User;
use App\Models\Chart;
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
        $patient = User::where('id',$request->patient_id)->first();
        $insurance = Chart::where('user_id',$patient->id)->first();

        $prescription = Prescription::create([
            'formula' =>$request->formula,
            'dosis'=>$request->dosis,
            'diagnostic'=>$request->diagnostic,
            'date'=>$request->date,
            'provider_id'=> auth()->user()->provider[0]->id,
            'patient'=>$patient->lastname .' '.$patient->name .' '.$patient->dni,
            'insurance'=>$insurance->insurance->description .' '. $insurance->member_id
        ]);
    
        Diagnostic::create([
            'treatment'=>$request->formula.' '.$request->dosis,
            'user_id'=> $request->patient_id,
            'provider_id'=>auth()->user()->provider[0]->id,
            'description'=>$request->diagnostic,
            'date'=>$request->date
        ]);

        return redirect(route('prescription.show',compact('prescription')))->with('status','receta generada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
        return view('prescription.show',compact('prescription'));
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
