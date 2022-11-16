<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class AuthController extends Controller
{
    use HasRoles, HasApiTokens;
    public function login(Type $var = null)
    {
        $validater = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
            
        ]);

        if($validater->fails())
        {
            return response()->json([
                'validation_errors'=>$validater->errors(),
            ]);
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $token = $user->createToken($user->email.'_Token')->plainTextToken;
            // $user->assignRole();
            $user->syncRoles($user->user_type);
            $user->getAllPermissions();
            
            return response()->json([
                'status'=>200,
                'username'=>$user->name,
                'user_email'=>$user->email.'_Token',
                'token'=>$token,
                'message'=>'Logged In',
                'user'  =>$user,
                // 'permission'=> $user->getAllPermissions()
            ]);
        } 
    else{ 
            return response()->json([
                                'status'=>401,
                                'message'=>'Invalid Credentials',
                    ]);
        } 
    }
}
