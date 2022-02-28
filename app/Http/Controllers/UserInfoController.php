<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\JWT\Jwt;
use App\Models\UserInfo;
use App\Http\Requests\StoreUserInfoRequest;
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
        $data = $request->only('first_name', 'last_name', 'role_id');
        $validator = Validator::make($data, [
          'first_name' => 'string',
          'last_name' => 'string',
          'role_id' => 'int'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        $role->update($validator);
        return response()->json(['Change succesfully'], 200);
    }

}
