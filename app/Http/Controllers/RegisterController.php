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
        if($response==1){return redirect()->route('home');}
        if($response==0){return redirect('login');}
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
    public function store(Request $request)
    {
        $rules=array(
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric|digits:10',
            'pass'=>'required|min:6',
            'confpass'=>'required|same:pass'
        );
        $message=array(
            'name.required'=>'Name Shoud not be Empty',
            'email.required'=>'Email Should not be Emoty',
            'phone.required'=>'Phone Should not be Emoty',
            'pass.required'=>'Password Should not be Emoty',
            'confpass.required'=>'Confirm Password Should not be Emoty',
            'email.email'=>'Email Formate Incurrect',
            'phone.size'=>'Phone number must be 10 digit',
            'conf.same'=>'Confirm Password is not matching with Password',
            'pass.min'=>'Password lenght atleast 6 character'
        );
        $this->validate($request,$rules,$message);
        User::insert($request);//calling the method(insert) of model user
        return redirect('login');//if validations are true
    }
}
