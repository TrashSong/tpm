<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register'); // view for register page
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:254'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(5), 'confirmed']
        ]);
        
        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/');
    }
}
