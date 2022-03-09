<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    public function createRole(Request $request)
    {
        $data = $request->only('role', 'permission');
        $validator = Validator::make($data, [
          'role' => 'required|string',
          'permission' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
    
        $role = Role::create([
          'role' => $request->role,
          'permission' => $request->permission,
        ]);
    }

    public function getRoles()
    {
        return response()->json(Role::all());
    }
    public function changeRole(Request $request, $id)
    {
        
        $role = Role::findOrFail($id);
        $data = $request->only('role', 'permission');
        $validator = Validator::make($data, [
          'role' => 'string',
          'permission' => 'string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        $role->update($validator);
    }
    public function deleteRole($id)
    {
        $role = Role::findOrFail($id)->delete();
        return response()->json('Delete Succesfully', 200);
    }
   
   
}
