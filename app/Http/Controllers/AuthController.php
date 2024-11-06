<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if (!$user || !\Hash::check($password, $user->password)) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        } else {
            $token = $user->createToken('token-name');

            return response()->json([
                'message' => 'success',
                'token' => $token->plainTextToken
            ]);
        }
    }
}
