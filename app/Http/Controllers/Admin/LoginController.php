<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Response;
use Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Auth;

class LoginController extends Controller
{
    //

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showAdminLoginForm()
	{
		return view('admin.login');
	}

    public function AdminLogin(Request $request) {

    	$validator = Validator::make($request->all(), [
    		"admin_email" => "required|email",
    		"admin_password" => "required",

    	]);

    	if($validator->fails()) {

            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

        else {

            try {

            	$credentials = $request->only('admin_email', 'admin_password');
                
                if (auth()->guard('admin')->attempt(['email' => $request->input('admin_email'), 'password' => $request->input('admin_password')])) {
                // if(auth()->guard('admin')->attempt(['email' => $request->admin_email, 'password' => $request->admin_email])) {
            		 $response = array(
                    'status' => true,
                    'message' => 'You have Successfully Logged In',
                    'redirect' => route('admin.home')
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
