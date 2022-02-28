<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\JWT\Jwt;
use App\Models\MailVerification;

class MailVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyEmail(Request $request)
    {
        $user = Jwt::validation($request->bearerToken());
        $mail_verification = MailVerification::findOrFail($user->id);
        $validator = Validator::make($request->only('verified'), [
          'verified' => 'required|boolean'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        $mail_verification->update($validator);
        return response()->json(['succes'], 200);
    }

}
