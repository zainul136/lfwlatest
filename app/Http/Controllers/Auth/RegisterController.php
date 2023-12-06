<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DeathConfirmation;
use App\Models\UserInformation;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'regex:/^[a-zA-Z\s]+$/i', 'max:255'],
            'last_name' =>['required', 'regex:/^[a-zA-Z\s]+$/i', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        if ($user){
            $userInformation =  new UserInformation();
            $userInformation->user_id = $user->id;
            $userInformation->save();

            $deathConfirmation = new DeathConfirmation();
            $deathConfirmation->user_id = $user->id;
            $deathConfirmation->is_alive = true;
            $deathConfirmation->save();

        }
    
        return $user;
    }

    protected function registered(Request $request, $user)
    {
        return redirect()->route('profile.edit')->with('status', 'Registration successful. Please log in.');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
