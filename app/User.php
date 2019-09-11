<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Hash;
class User extends Authenticatable
{
    Protected $table ='registration_table';

    protected $hidden=[
        'created_at',
        'updated_at'
    ];

    public static function insert($data)
    {
        $rules=array(
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'pass'=>'required',
            'confpass'=>'required|same:pass'
        );

        $data->validate($rules);

        $user = new User;
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->phone=$data['phone'];
        $user->password=Hash::make($data['pass']);
        $user->save();
        return 1;
    }
    public static function login($request){
        $value=array(
            'email'=>$request->email,
            'password'=>$request->password
        );
        $rules=array(
            'email'=>'required|email',
            'password'=>'required'
        );
        $request->validate($rules);
        if(Auth::attempt($value))
        {
            return 1;
        }
        else {
            return 0;
        }
    }

    public function message()
    {
        return $this->hasMany('App\messages','sender_id');
    }
}
