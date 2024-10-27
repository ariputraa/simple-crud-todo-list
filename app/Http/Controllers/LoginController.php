<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('Auth.login');
    }

    public function store(Request $request)
    {
        request()->validate([
            'email'=> ['required', 'email'],
            // 'username' => ['required', 'alpha_num'],
            'password' => ['required',],
        ]);

        $user = User::whereEmail($request->email)->first();
        if ($user){
            if (Hash::check($request->password, $user->password)){
                Auth::login($user);

                return redirect('/')->with('success', 'thourt one of us');
            }
        }
        throw ValidationException::withMessages([
            'email' => 'salah bawa golok'
        ]);
    }
}
