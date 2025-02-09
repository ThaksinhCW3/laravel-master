<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{
    // public function index(){
    //     return view('admin.login');
    // }
    // public function authenticate(Request $request){
    //     $validate = Validator::make($request->all(),[
    //         'email'=> 'required',
    //         'password'=> 'required'
    //     ]);
    //     if($validate->passes()){
    //         if(Auth::guard('admin')->attempt(['email'=> $request->email,'password' => $request->password])){
    //             if(Auth::guard('admin')->user()->role != 'admin'){
    //                 Auth::guard('admin')->logout();
    //                 return redirect()->route('admin.login')->with('error',"ru not authized to access");
    //             }
    //             return redirect()->route('admin.dashboard');
    //         }else{
    //             return redirect()->route('admin.login')->withInput()->with('error',"kuyyyyyy hah");
    //         }
    //     }
    //     else{
    //         return redirect()->route('admin.login')->withInput()->withErrors('error',"kuyyy");
    //     }
    // }
    // public function logout(){
    //     Auth::guard('admin')->logout();
    //     return redirect()->route('admin.login');
    // }
}
