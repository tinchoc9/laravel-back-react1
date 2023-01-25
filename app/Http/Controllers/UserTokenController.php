<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserTokenController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'email'=>'required|unique',
            'password'=>'required'
        ]);
        $user = DB::table('users')
            ->where('email', '=', $request->email)
            ->where('password', '=', $request->password)
            ->get();

        if ($user) {
            $token = $user->createToken($request->token_name);
            return  response()->json(['token' => $token->plainTextToken]);
        } else {
            return response()->json(['message'=>'El email o usuario es incorrecto']);
        };
    }
}
