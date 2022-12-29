<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RefereeController extends Controller
{
    //
    public function index()
    {
       return view('ferwafa.referee.index');
    }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'fname' => 'required|unique:teams,name',
            'stadium' => 'required',
            'logo' => 'required|mimes:jpg,bmp,png',
            'username' => 'required|unique:teams,username',
            'password' => 'required|min:5',
        ]);
    }
}
