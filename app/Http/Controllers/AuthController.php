<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    use HasRoles, HasApiTokens;
    public function login(Request $request)
    {
        $validater = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
            
        ]);

        if($validater->fails())
        {
            return response()->json([
                'status'    =>'422',
                'message'   =>'Validation Error',
                'errors'=>$validater->errors(),
            ],422);
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            auth::user()->tokens()->delete();
            $token = $user->createToken($user->email.'_Token')->plainTextToken;
            $user->syncRoles($user->user_type);
            $user->getAllPermissions();
            
            return response()->json([
                'status'=>200,
                'data'=>
                ['user'  =>$user,]
                
                
            ])->withHeaders([
                'Token' =>$token,
            ]);
        }
        else
        { 
            return response()->json([
                'status'=>401,
                'message'=>'Invalid Credentials',
                ]);
        }
    }

    
    public function logout(Request $request)
    {
        $user = auth('sanctum')->user();
        if($user)
        {
            $user->currentAccessToken()->delete();
            return response()->json([
                'status'=>200,
                'message'=>"logged Out"
            ]);
        }
        else
        {
            return response()->json([
                'status'=>400,
                'message'=>"Something Went Wrong"
        ],400);
        }
    }

}
