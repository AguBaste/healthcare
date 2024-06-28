<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Provider;
use App\Models\User;
use App\Models\Schedule;

use Illuminate\Http\Request;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provider = auth()->user()->provider[0]->id;
        $appointments = Appointment::where('provider_id',$provider)->get();
        $providers = Provider::with('user','specialty')->get();
        $patients = User::where('role','patient')->orderBy('lastname','desc')->get();
        $events = [];
        foreach($appointments as $event){
            $events[] = [
                'title'=> $event->user->name .' '. $event->user->lastname,
                'start'=>$event->start_date,
                'end'=>$event->end_date
            ];
        }
        return view('appointment.index',compact('events','providers','patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::with('user','specialty')->get();
        $patients = User::where('role','patient')->orderBy('lastname','desc')->get();
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
            'patient_id'=>'required',
        ]);
        Appointment::create([
            'day'=>$request->date,
            'time'=>$request->time,
            'provider_id'=>$request->provider_id,
            'user_id'=>$request->patient_id,
            'reason'=>$request->comment
        ]);
        return redirect(route('secretary'))->with('status','cita agendada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
