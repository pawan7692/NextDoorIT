<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MemberDiscount;
use Illuminate\Support\Facades\Validator;
use Response;
use Str;
use Illuminate\Support\Facades\Log;

class MemberDiscountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $memberDiscounts = MemberDiscount::all();
        return view('admin.memberDiscounts.index', compact('memberDiscounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.memberDiscounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            "member_discount_type" => "required|unique:member_discounts,type",
            "member_discount_price" => "required",
            "member_discount_duration" => "required"
        ]);

        if($validator->fails()) {

            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

        else {

            try {

                $memberDiscount = new MemberDiscount;
                
                $memberDiscount->type = $request->member_discount_type;
                $memberDiscount->price = $request->member_discount_price;
                $memberDiscount->duration = $request->member_discount_duration;
                $memberDiscount->slug = Str::slug($request->member_discount_type);               
                $memberDiscount->status = $request->member_discount_status?1:0;

                $memberDiscount->save();
                
                $response = array(
                    'status' => true,
                    'message' => 'Member Discount Added Successfully',
                    'redirect' => route('admin.member-discounts.index')
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
