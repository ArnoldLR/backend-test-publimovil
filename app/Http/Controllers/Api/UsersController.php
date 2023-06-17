<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function users(){

        $users = User::orderBy('id', 'desc')->get();

        return response()->json($users);
    }

    public function user(Request $request){

        try {
            if($request->id){ //update user
                $user = User::findOrFail($request->id);
                $user->fill($request->all());
                $user->password = Hash::make($request->password);
                $user->save();
            }else{ //create new user
                //validate
                $validateUser = Validator::make($request->all(), 
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'username' => 'required|unique:users,username',
                    'telefono' => 'numeric',
                    'fecha_nacimiento' => 'date_format:Y-m-d',
                    'password' => 'required'
                ]);
    
                if($validateUser->fails()){
                    return response()->json([
                        'status' => false,
                        'message' => 'Error de validación!',
                        'errors' => $validateUser->errors()
                    ], 401);
                }
                $user = new User();
                $user->fill($request->all());
                $user->password = Hash::make($request->password);
                $user->save();
            }
            
            return response()->json($user);

        } catch (\Throwable $th) {
             return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
        
    }

    public function delete($id){
        
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json('eliminado');
    }
}
