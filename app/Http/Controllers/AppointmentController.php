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
        $events = [];
        switch (auth()->user()->role) {
            case 'patient':
                $appointments = Appointment::where('user_id',auth()->user()->id)->get();
                foreach($appointments as $event){
                    $events[] = [
                        'title'=> $event->provider->user->name .' '. $event->provider->user->lastname,
                        'start'=>$event->date,
                        'end'=>$event->date
                    ];
                }
        
                break;
            case 'provider':
                $provider =  auth()->user()->provider[0]->id;
                $appointments = Appointment::where('provider_id',$provider)->get();
                foreach($appointments as $event){
                    $events[] = [
                        'title'=> $event->user->name .' '. $event->user->lastname,
                        'start'=>$event->date,
                        'end'=>$event->date
                    ];
                }
                break;
            default://secretary
                $appointments = Appointment::with('user','provider')->get();
                foreach($appointments as $event){
                    $events[] = [
                        'title'=>$event->provider->user->name .' '.$event->provider->user->lastname,
                        'start'=>$event->date,
                        'end'=>$event->date
                    ];
                }
                break;
        }
        

        return view('appointment.index',compact('events'));
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
            'date'=>$request->date.' '.$request->time,
            'provider_id'=>$request->provider_id,
            'user_id'=>$request->patient_id,
        ]);
        return redirect(route('appointment.index'))->with('status','cita agendada exitosamente');
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
        return $request;
        $appointment->start_date = $request->start_date;
        $appointment->end_date = $request->end_date;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
