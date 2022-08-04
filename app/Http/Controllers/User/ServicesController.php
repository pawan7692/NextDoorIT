<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Support\Facades\Validator;
use Response;
use Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class ServicesController extends Controller
{
    //
    public function showServiceForm()
    {
        $serviceTypes = ServiceType::where('status', 1)->get();
    	return view('user.services', compact('serviceTypes'));
    }

    public function registerServiceRequest(Request $request) {

    	$validator = Validator::make($request->all(), [
    		"user_name" => "required",
    		"user_phone" => "nullable",
    		"user_email" => "required|email",
    		"user_address" => "required",
            "service_type" => "required",
            "visit_date"  => "required",
            "visit_time" => "required",
            "service_description" => "required"
    	]);

    	if($validator->fails()) {

            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

        else {

            try {
                $serviceType = ServiceType::where('slug', $request->service_type)->first();
                $ticketNumber = mt_rand(1000000, 9999999);

                $service = new Service;
                $service->name = $request->user_name;
                $service->phone = $request->user_phone;
                $service->email = $request->user_email;
                $service->address =  $request->user_address;
                $service->service_type_id = $serviceType->id;
                $service->date = $request->visit_date;
                $service->time = $request->visit_time;
                $service->service_number = $ticketNumber;

                $service->description = $request->service_description;
                $service->status = 1;

                $service->save();
                
                $response = array(
                    'status' => true,
                    'message' => 'Request Registered Successfully',
                    'redirect' => route('user.service')
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
