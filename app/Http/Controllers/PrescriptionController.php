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
        $patients = User::where('role','patient')
        ->orderBy('lastname','asc')
        ->get();
        return view('prescription.index',compact('patients'));
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
            'user_id'=> 'required',
            'date'=>'required',
            'formula'=>'required',
            'dosis'=>'required',    
            'diagnostic'=>'required'
        ]);
        
        $prescription = Prescription::create([
            'formula' =>$request->formula,
            'dosis'=>$request->dosis,
            'diagnostic'=>$request->diagnostic,
            'date'=>$request->date,
            'provider_id'=> auth()->user()->id,
            'user_id'=>$request->user_id
        ]);

        return redirect(route('prescription.show',compact('prescription')))->with('status','receta generada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
        $provider = User::where('id',$prescription->provider_id)->first();
        return view('prescription.show',compact('prescription','provider'));
    }

    public function search(Request $request){
        $prescriptions = Prescription::where('user_id', $request->user_id)->orderBy('date','asc')->paginate(5);
        return view('prescription.search',compact('prescriptions'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prescription $prescription)
    {
        $patients = User::where('role', 'patient')->orderBy('lastname','desc')->get();
        return view('prescription.edit',compact('prescription','patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prescription $prescription)
    {
         $request->validate([
            'user_id'=> 'required',
            'date'=>'required',
            'formula'=>'required',
            'dosis'=>'required',    
            'diagnostic'=>'required'
        ]);

        $prescription->user_id = $request->user_id;
        $prescription->date = $request->date;
        $prescription->formula = $request->formula;
        $prescription->dosis = $request->dosis;
        $prescription->diagnostic = $request->diagnostic;
        $prescription->provider_id = auth()->user()->id;
        $prescription->update();
        return redirect(route('prescription.index'))->with('status','receta actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
