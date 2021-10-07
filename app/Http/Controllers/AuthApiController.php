<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function login()
    {
        try {
            $this->validate(request(), [
                'email' => 'required|email',
                'password' => 'required|string'
            ]);

            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)) {
                return response()->json(['errors' => ['Usuario y Contraseña no coinciden']], 401);
            }

            $user = request()->user();


            $token = $user->createToken('Personal Access Client');

            return response()->json([
                'user' => $user,
                'access_token' => $token->accessToken,
            ]);

        } catch (ValidationException $e) {
            return response()->json($e->validator->errors());
        }

    }
}
