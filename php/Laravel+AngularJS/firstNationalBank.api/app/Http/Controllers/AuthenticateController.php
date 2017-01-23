<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function authenticate(Request $request)
    {
        $user = $request->json()->all();
        Auth::attempt(['name' => $user['userName'], 'password' => $user['userPassword']]);
    }

}

