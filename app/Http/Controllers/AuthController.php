<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function registerIndex()
    {
        return view('auth.register');
    }

    /**
     * @throws ValidationException
     */
    public function  registerStore(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|confirmed'
        ]);

    }
}
