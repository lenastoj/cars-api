<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        $token = Auth::login($user);

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }

    public function login(Request $request) {
        $credentials = $request->only(['email', 'password']);

        $token = Auth::attempt($credentials);

        if($token) {
            return response()->json([
                'token' => $token,
                'user' => Auth::user(),
            ]);
        } else {
            return response()->json(
                ['message' =>'Invalid credentials'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function logout() {
        Auth::logout();
    }

    public function active_user() {
        return response()->json(Auth::user());
    }
}
