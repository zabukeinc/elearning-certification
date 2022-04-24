<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

class AuthLearningController extends Controller
{
  public function create()
  {
    return view('registration.create');
  }

  public function store(Request $request)
  {
    $validator = $this->validate($request, [
      'name' => 'required|min:5',
      'email' => 'required|email',
      'password' => 'required',
      'phone' => 'required',
      'company_name' => 'required',
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'phone' => $request->phone,
      'company_name' => $request->company_name,
      'role' => 'user'
    ]);

    auth()->login($user);

    return redirect()->to('/');
  }

  public function login(Request $request)
  {
    $credentials = [
      'email' => $request->email,
      'password' => $request->password
    ];

    if (!Auth::Attempt($credentials)) {
      Session::flash('error', 'Email atau Password Salah');
      return redirect()->to('/login-page');
    }

    if (Auth::user()->role == 'admin') {
      return redirect()->to('/admin/home');
    } else {
      return redirect()->to('/');
    }
  }

  public function logout()
  {
    Auth::logout();
    \Cookie::forget('kd-carts');


    return redirect()->to('/login-page');
  }
}
