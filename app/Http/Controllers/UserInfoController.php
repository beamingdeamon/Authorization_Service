<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\JWT\Jwt;
use App\Models\UserInfo;
use App\Http\Requests\StoreUserInfoRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateUserInfoRequest;

class UserInfoController extends Controller
{
    public function getInfo(Request $request)
    {
        $user = Jwt::validation($request->bearerToken());
        return response()->json(UserInfo::with('user.mailVerification','role')->find($user->id), 200);
        
    }

    public function changeUserInfo(Request $request)
    {
        
        $user = Jwt::validation($request->bearerToken());
        $user_info = UserInfo::findOrFail($user->id);
        $validator = $this->validate($request, [
          'first_name' => 'string',
          'last_name' => 'string',
          'role_id' => 'int'
        ]);
        $user_info->update($validator);
        return response()->json(['Change succesfully'], 200);
    }

}
