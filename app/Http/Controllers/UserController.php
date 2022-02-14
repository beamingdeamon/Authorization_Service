<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

  public function register(Request $request){
    $data = $request->only('email', 'first_name', 'last_name', 'password','role','permission');
    $validator = Validator::make($data, [
      'email' => 'required|email|unique:users',
      'first_name' => 'required|string',
      'last_name' => 'required|string',
      'password' => 'required|string|min:6|max:50',
      'role'=> 'required|string',
      'permission'=>'required|string'
    ]);
    if ($validator->fails()) {
        return response()->json(['error' => $validator->messages()], 200);
    }

    $user = User::create([
      'email' => $request->email,
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'password' => bcrypt($request->password),
      'role'=>$request->role,
      'permission' => $request->permission,
    ]);

    return response()->json([
      'success' => true,
      'message' => 'User created successfully',
      'data' => $user
    ], Response::HTTP_OK);

  }
  
  public function authenticate(Request $request){
    $credentials = $request->only('email', 'password');

    $validator = Validator::make($credentials, [
        'email' => 'required|email',
        'password' => 'required|string|min:6|max:50'
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->messages()], 200);
    }

    try {
      if (! $token = JWTAuth::attempt($credentials)) {
        return response()->json([
          'success' => false,
          'message' => 'Login credentials are invalid.',
        ], 400);
      }
    } catch (JWTException $e) {
    return $credentials;
      return response()->json([
          'success' => false,
          'message' => 'Could not create token.',
        ], 500);
    }

    return response()->json([
        'success' => true,
        'token' => $token,
    ]);
  }

  public function getUsers(){
      $data = User::all();
      return $data ;
  }

  public function getUserInfo(){
    $data = User::all();
    return $data ;
  }


  public function changeUser($id, Request $request){
    $user = User::findOrFail($id);
    $user->update($request->all());
    return response()->json($user, 200);
  }

  public function deleteUser($id){
    User::findOrFail($id)->delete();
    return response('Delete sucesfully', 200);
  }
 
}

    

