<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get_users(){
        $data = User::all();
        return $data ;
    }

    public function create_user(Request $request){
      $data = $request->all();
      $inser_data = json_encode($data);
      User::insert($inser_data);
      return Redirect::to("laravel-json")->withSuccess('Great! Successfully store data in json format in datbase');
      #$data = User::create($request->all());
      #$data->save();
      #return get_users();
  }
 
}

    

