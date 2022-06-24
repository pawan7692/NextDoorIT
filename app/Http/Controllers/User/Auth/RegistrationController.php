<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Response;
use Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    //

	public function showUserRegister()
	{
		return view('user.auth.register');
	}

    public function userRegister(Request $request) {

    	$validator = Validator::make($request->all(), [
    		"user_name" => "required",
    		"user_phone" => "nullable",
    		"user_email" => "required|email",
    		"user_password" => "required",

    	]);

    	if($validator->fails()) {

            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

        else {

            try {

                $user = new User;
                $user->name = $request->user_name;
                $user->phone = $request->user_phone;
                $user->email = $request->user_email;
                $user->password = Hash::make($request->user_password);
                $user->save();
                
                $response = array(
                    'status' => true,
                    'message' => 'User Registered Successfully',
                    'redirect' => route('user.register')
                );
               

            } catch(\Exception $e) {
                Log::error($e->getMessage());

                $response = array(
                    'status' => false,
                    'message' => 'Error Occurred'
                );
            }
        }


        return Response::json($response);

    }
}
