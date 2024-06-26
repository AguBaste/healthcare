<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'lastname'=>['required', 'string','max:30'],
            'dob'=>['required','date',],
            'dni'=>['required','string','min:7'],
            'phone'=>['required','string','min:10'],
            'role'=>['required','string'],
            'insurance'=>['string','max:255'],
            'plan'=>['string','max:255'],
            'specialty'=>['string', 'max:255'],
            'license'=>['string','max:255'],
            'member_id'=>['string','max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'lastname'=>$request->lastname,
            'dob'=>$request->dob,
            'dni'=>$request->dni,
            'phone'=>$request->phone,
            'insurance'=>$request->insurance,
            'license'=>$request->license,
            'specialty'=>$request->specialty,
            'member_id'=>$request->member_id,
            'plan'=>$request->plan,
            'role'=>$request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

         Auth::login($user);
        return redirect(route('dashboard', absolute: false));
    }
}
