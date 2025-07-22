<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginAdmin()
    {
        $user = User::find(1);
        Auth::login($user);

        return redirect()
            ->route('home');
    }

    public function loginEmployee()
    {
        $user = User::find(2);
        Auth::login($user);

        return redirect()
            ->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()
            ->route('login');
    }
}
