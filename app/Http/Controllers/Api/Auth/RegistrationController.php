<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class RegistrationController extends Controller
{
    //
    public function register(Request $request)
    {

        $this->validate($request, [
            "user_name" => "required",
    		"user_phone" => "nullable",
    		"user_email" => "required|email",
    		"user_password" => "required"
        ]);
 
        $user = User::create([
            'name' => $request->user_name,
            'phone' => $request->user_phone,
            'email' => $request->user_email,
            'password' => bcrypt($request->password)
        ]);
       
        $access_token = $user->createToken('NextDoorIT')->accessToken;
 
        return response()->json([
        	'success' => true,
        	'message'=>'User Registered Successfully',
        	'access_token' => $access_token], 
        	200);
    }
 
}
