<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Schedule;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index(){
        $providers = User::where('role', 'provider')->orderBy('lastname', 'desc')->get();
        return view('provider.index', compact('providers'));
    }

    public function show(User $provider){
        $schedule = Schedule::where('provider_id',$provider->id)->get();
        return view('provider.show', compact('provider','schedule'));
    }
}
