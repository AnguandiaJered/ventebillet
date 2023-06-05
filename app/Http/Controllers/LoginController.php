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
        $this->validate($request, [
            'nom' => 'required',
            'taille' => 'required',
            'nbr_place' => 'required',
        ]);

        $stade = new Stade;
        $stade->nom = $request->input('nom');
        $stade->taille = $request->input('taille');
        $stade->nbr_place = $request->input('nbr_place');    
        $stade->save();

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
            return view('home');
        }
        return view('pages.login');  
    }
}
