<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\ValidationException;
use function MongoDB\BSON\toRelaxedExtendedJSON;

class AuthController extends Controller
{
    public function registerIndex()
    {
        return view('auth.register');
    }
    public function loginIndex()
    {
        return view('auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function  registerStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'email|required|max:255',
            'password' => 'required|confirmed'
        ]);
       $user = User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        auth()->attempt($request->only(['email', 'password']));

        return to_route('dashboard');

    }

    public  function loginStore(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required'
        ]);
        if(!auth()->attempt($request->only(['email', 'password']), $request->input('remember'))){
            return  back()->with('login_status', 'Invalid login details');
        }
        session()->regenerate();
        return to_route('dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return to_route('home');
    }
}
