<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
//use App\Auth;
class RegisterController extends Controller
{

    public function index()
    {
        $users=User::all();
        return view('home')->with('users',$users);
    }
    //for login checking
    public function login(Request $request)
    {
        $response=User::login($request);
        if($response==1){return redirect()->route('home')->with('users',$users=User::all());}
        if($response==0){return redirect('login');}
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
    public function store(Request $request)
    {
        $response=User::insert($request);//calling the method(insert) of model user
        if($response==1){return redirect('login')->with(['msg'=>'Registered Successfully You can Login Now']);}//if validations are true
    }
}
