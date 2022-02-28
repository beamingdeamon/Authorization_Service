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
        $token = Token::where('user_id',$user->id)->firstOrFail()->delete();
        return response()->json('Logout Succesfully', 200);
    }
}
