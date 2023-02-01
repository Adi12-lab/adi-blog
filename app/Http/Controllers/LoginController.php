<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
  public function index() {
    return view("login.index",[
    "title" => "Login",
    "active" => "Login"
    ]);
  }
  public function authenticate(Request $request) {
    $credentials = $request->validate([
    "username" => "required|max:225",
    "password" => "required"
    ]);
    //Jika berhasil
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->intended('/dashboard');
    }
    //Jika gagal
    return back()->with("loginFail", "invalid username or password");
  }
  public function logout(Request $request) {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }
}