<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('login');
        
    }

    public function login(Request $request){

        $credentials=request()->validate([
            'username'=>'required',
            'password'=>'required|min:6',
        ]);

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            return redirect('user/home');
            
        }
        else{
            return redirect('/')->with('error','password incorrect');
        }
    }

    public function registerform(){
        return view('register');
    }

    public function register(Request $request){
        $credentials=request()->validate([
            'name'=>'required',
            'username'=>'required',
            'password'=>'required|min:6',
            'repassword'=>'required|same:password',
        ]);


        User::create([
            'name' =>$credentials['name'],
            'username'=>$credentials['username'],
            'password'=>Hash::make($credentials['password']),
        ]);

        // return view('register');
        return redirect()->back()->with('status', 'success');
    }

    public function changepasswordshow(){
        return view('user.changepassword');
    }

    public function changepasswordstore(Request $request){
        $credentials=request()->validate([
            'password'=>'required|min:6',
            'newpassword'=>'required|min:6',
            'repassword'=>'required|same:newpassword',
        ]);
        
        $user=Auth::user();
        
        if(Hash::check($request->password,$user->password)){
            
            $user->password=Hash::make($request->newpassword);
            $user->save();
            
            return redirect()->back()->with('success','password changed');
        }
        
        return redirect()->back()->with('error','password incorrect');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
