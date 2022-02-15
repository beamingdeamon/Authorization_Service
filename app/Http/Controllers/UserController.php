<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\JWT\Jwt;
use Carbon\Carbon;

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
      return response()->json(['jwt' => $jwt], 200);
    }else{
      return response()->json(['succes' => 'false'], 401);
    }
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

    

