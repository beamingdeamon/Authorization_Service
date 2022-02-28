<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\Token;
use App\Models\Role;
use App\Models\MailVerification;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\JWT\Jwt;
use Carbon\Carbon;

class UserController extends Controller
{

  public function register(Request $request){
    $data = $request->only('email', 'first_name', 'last_name', 'password','role_id');
    $validator = Validator::make($data, [
      'email' => 'required|email|unique:users',
      'first_name' => 'required|string',
      'last_name' => 'required|string',
      'password' => 'required|string|min:6|max:50',
      'role_id'=> 'required|int',
    ]);
    if ($validator->fails()) {
        return response()->json(['error' => $validator->messages()], 300);
    }

    $user = User::create([
      'email' => $request->email,
      'password' => bcrypt($request->password),
    ]);



    UserInfo::create([
      'user_id'=>$user->id,
      'first_name'=> $request->first_name,
      'last_name'=> $request->last_name,
      'role_id'=> $request->role_id,
    ]);
    MailVerification::create([
      'user_id'=>$user->id,
      'verified'=> false
    ]);

    return response()->json([
      'success' => true,
      'message' => 'User created successfully',
      'data' => $user
    ], Response::HTTP_OK);

  }
  
  public function authenticate(Request $request){
    $validator = Validator::make($request->only('email', 'password'), [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|string|min:6|max:50'
    ]);
    if ($validator->fails()) {
        return response()->json(['error' => $validator->messages()], 200);
    }

    $user = User::where('email', $request->email)->first();
    if (Hash::check($request->password, $user->password)){
      
      $payload = json_encode([
        'id' => $user->id,
        'exp' => Carbon::now()->addDays(1)->timestamp
      ]);

        
      $jwt = Jwt::generate($payload);
      $tokens = Token::create([
        'user_id'=>$user->id,
        'access_token'=>$jwt,
      ]);
      return response()->json(['accessToken' => $jwt], 200);
    }else{
      return response()->json(['succes' => 'false'], 401);
    }
  }

  public function deleteUser(){
    $user = Jwt::validation($request->bearerToken());
    User::findOrFail($user->id)->delete();
    return response()->json('Delete succesfuly', 200);
  }
 
}

    

