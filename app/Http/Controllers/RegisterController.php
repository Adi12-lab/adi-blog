<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        return view("register.index", [
          "title" => "Register",
          "active" => "Register"
          ]);
    }
    public function store(Request $request) {
      $validated = $request->validate([
        "name" => "required|max:225",
        "username" => ["required", "unique:users", "max:225"],
        "email" => ["required", "email"],
        "password" => ["required", "min:3", "confirmed"],
        "password_confirmation" => ["required", "min:3"]
        ]);
        $validated["password"] = bcrypt($validated["password"]);
        User::create($validated);
        
        // $request->session()->flash("succes", "Your registration is succesful");
        
        return redirect("/login")->with("succes","Your registration is succesful");
    }
    
}
