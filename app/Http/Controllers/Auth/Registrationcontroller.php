<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
class Registrationcontroller extends Controller
{
    public function index() {
        return view('auth.registration');
    }

    public function store(SignUpRequest $request) {
        $data=$request->only(['name','email']);
        // dd($data);
        $data['password']= Hash::make($request->get('password'));
        // dd($data);
        User::create($data); 
        return redirect('/login')->with('signupsuccess','registration complete successfully');      
    }
}
