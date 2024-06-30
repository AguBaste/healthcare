<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function create(){
        return view('patient.create');
    }

    public function store(Request $request){
          $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'lastname'=>['required', 'string','max:30'],
            'dob'=>['required','date',],
            'dni'=>['required','string','min:7'],
            'phone'=>['required','string','min:10'],
            'role'=>['required','string'],
            'insurance'=>['string','max:255'],
            'plan'=>['string','min:0','max:255'],
            'member_id'=>['string','min:0','max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        User::create([
            'name' => $request->name,
            'lastname'=>$request->lastname,
            'dob'=>$request->dob,
            'dni'=>$request->dni,
            'phone'=>$request->phone,
            'insurance'=>$request->insurance,
            'license'=>null,
            'specialty'=>null,
            'member_id'=>$request->member_id,
            'plan'=>$request->plan,
            'role'=>$request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('secretaryDash'))->with('status','paciente dado de alta exitosamente');
    }
}
