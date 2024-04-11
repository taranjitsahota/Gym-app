<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class Auth_controller extends Controller
{
    public function login(){
        return view("auth.login");
    }
    function loginPost(Request $request){
        $request->validate([
            "email"=>"required|email",
            "password"=>['required', Password::min(8)->mixedCase()]
         ]);
         $credentials = $request->only("email","password");
         if(Auth::attempt($credentials)){
            return view("welcome");
         }
         return redirect(route("wecolme"))->with("error","Login Failed");
    }
    public function register(){
        return view("auth.register");
    }
    function registerPost(Request $request){
        $request->validate([
           "name"=>"required",
           "email"=>"required|email",
           "password"=>['required', Password::min(8)->mixedCase()]
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
          if($user->save()){
               return redirect(route("login"))->with ("success","User registered successfully");
          }
          return redirect("register")->with ("error","Failed to register User");

    }
    
      function changepassword(){
        return view('auth.changepassword');
      }
      function updatepassword(Request $request){
        // dd($request);
        $request->validate([
            'oldpassword' => 'required'
            // 'newpassword' => 'required|confirmed',
        ]);
        //matching The old password
        if(!Hash::check($request->oldpassword, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        //updatimg the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->newpassword)
        ]);

        return back()->with("status", "Password changed successfully!");




      }
}
