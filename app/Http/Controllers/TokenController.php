<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\JWT\Jwt;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function deleteToken(Request $request)
    {
        $user = Jwt::validation($request->bearerToken());
        $role = Token::findOrFail($user->id)->delete();
        return response()->json('Logout Succesfully', 200);
    }
}
