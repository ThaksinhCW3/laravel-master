<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }
    public function authenticate(Request $request)

{
    $validate = Validator::make($request->all(), [
        'email' => 'required',
        'password' => 'required'
    ]);

    if ($validate->fails()) {
        return redirect()->route('account.login')->withInput()->withErrors($validate);
    }

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'user') {
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->route('account.dashboard'); 
        }
    }

    return redirect()->route('account.login')->withInput()->with('error', "Invalid credentials");
}

    public function register(){
        return view('register');
    }
    public function processregister(Request $request){
        
        $validate = Validator::make($request->all(),[
            'email'=> 'required|email|unique:users',
            'password'=> 'required|confirmed'
        ]);
        if($validate->passes()){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'customer';
            $user->save();
            return redirect()->route('account.login')->with('success',"regis suc");
        }
        else{
            return redirect()->route('account.register')->withInput()->withErrors('error',"kuyyy");
        }

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }
}
