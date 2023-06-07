<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\JsonResponseTrait;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'sometimes|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);

            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->password = bcrypt($request->input('password'));
            $user->active = true;
            $user->verified = true;
            $user->save();

        return view('pages.login');       
    }

    // public function login(Request $request){
    //     if(Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
    //         return \response()->json(['Token'=>auth()->user()->createToken('API Token')->plainTextToken]);
    //     }
    //     return \response()->json(['message'=>'Login failled','failed'=>true]);
    // }

    public function index()
    {
        return view('pages.login');     
    }

    public function forgotpassword()
    {
        return view('pages.forgot-password');     
    }

    public function registe()
    {
        return view('pages.register');     
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect(route('home'))->with([
                'message' => 'Successfully login.!',
                'alert-type' => 'success',
            ]);
        }
        return view('pages.login');  
    }
}
