<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Auth;
use App\Models\Ferwafa;

class FerwafaController extends Controller
{
    public function index()
    {
        return view('ferwafa.login');
    }
    public function home()
    {
        return view('ferwafa.dashboard');
    }
    public function login(Request $request)
    {
        $formField = $request->validate([
            'email' => 'required',
            'password' => 'required|min:3'
        ]);
        // dd($formField);

        if (Auth::guard('ferwafa')->attempt(['email' => $formField['email'], 'password' => $formField['password']])) {
           return redirect()->route('home')->with('success', "Login successfully");
        }
        else {
            return back()->with('fail', "Login Fail Check your Email or Password");
        }
    }
    public function logout()
    {
        Auth::guard('ferwafa')->logout();
        return redirect()->route('fa_login')->with('success', "Logout successfully");
    }

}
