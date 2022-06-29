<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\ServiceType;

class ServicesController extends Controller
{
    //

	public function registerServiceRequest(Request $request) {

		$this->validate($request, [
			"user_name" => "required",
			"user_phone" => "nullable",
			"user_email" => "required|email",
			"user_address" => "required",
			"service_type" => "required",
			"visit_date"  => "required",
			"visit_time" => "required",
			"service_description" => "required"
		]);

		
		
		
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
		
		
		


		return response()->json([
			'status' => true,
			'message'=>'Request Registered Successfully',
			'ticket_number' => $ticketNumber], 
			200);

		
		
	}
}
