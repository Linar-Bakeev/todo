<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function save(Request $request){
        if(Auth::check()){
            return redirect(route('user.private'));
        }

        $validateFields = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password'=>Password::default()
        ]);

        if(User::where('email', $validateFields['email'])->exists()){
            return redirect(route('user.reg'))->withErrors([
                'formError'=>'This user already exist'
            ]);
        }

        $user = User::create($validateFields);
        if($user){
            Auth::login($user);
            return redirect(route('user.private'));
        }
        return redirect(route('user.login'))->withErrors([
            'formError'=>'An error occurred while saving a user'
        ]);
    }
}
