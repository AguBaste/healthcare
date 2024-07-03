<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Prescription;
use App\Models\Appointment;
use App\Models\Diagnostic;
use App\Models\User;


use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        switch (auth()->user()->role) {
            case 'patient':
                $prescriptions = Prescription::where('user_id',auth()->user()->id)->get();
                $chart = Chart::with('user')->where('user_id',auth()->user()->id)->first();
                return view('chart.index',compact('chart','prescriptions'));
                break;
            case 'provider':
                $charts = Chart::with('user')
                ->paginate(5);
                return view('chart.index',compact('charts'));
            default:
                # code...
                break;
        }
        
        return view('chart.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $patient)
    {
        
        return view('chart.create',compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function onlyChart(Request $request){
       
        $patient = User::where('id',$request->id)->first();
    
        return view('chart.create',compact('patient'));
    }
    public function store(Request $request)
    {
       
        $request->validate([
            'smoke'=>'required',
            'glasses'=>'required',
            'user_id'=>'required',
            'height'=>'required',
            'weight'=>'required'
        ]);
 
       
        $chart = Chart::create([
            'height'=>floatval($request->height),
            'weight'=>floatval($request->weight),
            'smoke'=>$request->smoke,
            'glasses'=>$request->glasses,
            'user_id'=>$request->user_id,
        ]);
        // aca segun el rol tengo que desviar secretaryDash o providerDash
        if (auth()->user()->role == 'provider') {
            $date = date('Y-m-d');
            $appointment = Appointment::where('user_id',$chart->user_id)->where('date',$date)->first();
            return redirect(route('appointment.show',compact('appointment')))->with('status','cartilla creada exitosamente');
        } else {
            if(auth()->user()->role == 'secretary'){
                return redirect(route('secretaryDash'))->with('status','cartilla creada exitosamente');
            }
        }
        
        return redirect(route('providerDash'))->with('status','cartilla creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chart $chart)
    {
        $prescriptions = Prescription::where('user_id',$chart->user->id)->get();
        return view('chart.show',compact('chart','prescriptions'));
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
