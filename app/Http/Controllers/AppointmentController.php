<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Prescription;
use App\Models\User;
use App\Models\Chart;
use App\Models\Schedule;

use Illuminate\Http\Request;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role ==='secretary') {
            $appointments = Appointment::with('user')->get();
            $events=[];
            foreach ($appointments as $apo) {
                $events[]=[
                    'title'=>$apo->user->lastname,
                    'start'=>$apo->date,
                    'end'=>$apo->date,
                    'url'=>'appointment/'.$apo->id.'/edit',
                ];
            }
           
            return view('appointment.index',compact('events'));
        } else {
            $date =  date('Y-m-d');
        $appointments = Appointment::with('user')
        ->where('provider_id', auth()->user()->id)
        ->where('date',$date)
        ->where('status','reservada')
        ->get();
        return view('appointment.index',compact('appointments'));
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = User::where('role','provider')->orderBy('lastname','asc')->get();
        $patients = User::where('role','patient')->orderBy('lastname','asc')->get();
        return view('appointment.create',compact('providers','patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'time'=>'required',
            'provider_id'=>'required',
            'user_id'=>'required',
        ]);
        Appointment::create([
            'date'=>$request->date,
            'time'=>$request->time,
            'status'=>'reservada',
            'provider_id'=>$request->provider_id,
            'user_id'=>$request->user_id,
        ]);
        return redirect(route('appointment.index'))->with('status','cita agendada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {

        $chart = Chart::with('user')->where('user_id',$appointment->user_id)->first();
        $prescriptions = Prescription::where('user_id', $appointment->user->id)->get();
        return view('appointment.show',compact('appointment','chart','prescriptions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $providers =  User::where('role','provider')->orderBy('lastname','asc')->get();
        return view('appointment.edit',compact('appointment','providers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        
        $appointment->status = $request->status;
        $appointment->update();
        return redirect(route('providerDash'))->with('status','has terminado una cita pasemos a la siguiente');
    }

 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
