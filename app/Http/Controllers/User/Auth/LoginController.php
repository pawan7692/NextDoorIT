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
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;
  
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showUserLoginForm()
	{
		return view('user.auth.login');
	}

    public function userLogin(Request $request) {

    	$validator = Validator::make($request->all(), [
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

            	$credentials = $request->only('user_email', 'user_password');

            	if(Auth::attempt(['email' => $request->user_email, 'password' => $request->user_password])) {
            		 $response = array(
                    'status' => true,
                    'message' => 'You have Successfully Logged In',
                    'redirect' => route('user.home')
                	);
                } else {

                	$response = array(
                    'status' => false,
                    'message' => 'Wrong Credentials',
                    
                	);          	
               	
                }

                 

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
