<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('Auth.register');
    }

    public function store(Request $request)
    {
        request()->validate([
            'email'=> ['required', 'email'],
            'name'=> ['required', 'string'],
            // 'username' => ['required', 'alpha_num'],
            'password' => ['required', 'min:5'],
        ]);

        User::create([
            'email' => $request->email,
            'name' => $request->name,
            // 'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/');
    }
}
