<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function login(Request $request)
    {
       $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad credentials'
            ], 401);
        }

        $token = $user->createToken('inventoryapp')->plainTextToken;
        return response([
            'user' => $user,
            'token' => $token
        ],200);
    }

    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        // Hash password
        $fields['password'] =Hash::make($fields['password']);

        // Create user
        $user = User::create($fields);

        // Create token
        $token = $user->createToken('inventoryapp')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 201);
    }

}
