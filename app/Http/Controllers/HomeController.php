<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id)
    {
        return view('message')->with('id',$id);
    }
}
