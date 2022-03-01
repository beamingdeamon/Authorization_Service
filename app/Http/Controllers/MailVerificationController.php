<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\JWT\Jwt;
use App\Models\MailVerification;
use Illuminate\Support\Facades\Validator;

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
        $validator = $this->validate($request, [
          'verified' => 'required|boolean'
        ]);
        
        $mail_verification->update($validator);
        return response()->json('succes', 200);
    }

}
