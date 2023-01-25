<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email'=>'required|unique'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email= $request->email;
        $user->password = $request->password;
        $user->save();
        
        return $user;
    }
}
