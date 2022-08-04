<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

uSe App\Models\Brand;
use Illuminate\Support\Facades\Validator;
use Response;
use Str;
use Illuminate\Support\Facades\Log;

class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.brands.create');
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
            "brand_name" => "required|unique:brands,name",
            "brand_image" => "nullable",
            "brand_description" => "nullable"
        ]);

        if($validator->fails()) {

            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()->toArray()
            );

            return Response::json($response, 422);
        }

        else {

            try {

                $brand = new Brand;
                
                $brand->name = $request->brand_name;
                $brand->slug = Str::slug($request->brand_name);
                $brand->description = $request->brand_description;             
                $brand->status = $request->brand_status?1:0;

                if($file= $request->file('brand_image')) {

                    $fileOriginalName = $file->getClientOriginalName();
                    $fileName = pathInfo($fileOriginalName, PATHINFO_FILENAME);
                    $fileExtension = pathInfo($fileOriginalName, PATHINFO_EXTENSION);

                    $folderToUpload = '/admin/uploads/brand';

                    $destinationPath = public_path().$folderToUpload;
                    $safeName = $fileName.'_'.time().'_'.$fileExtension;
                    $file->move($destinationPath, $safeName);

                    $brand->image = $safeName;

                }

                $brand->save();
                
                $response = array(
                    'status' => true,
                    'message' => 'Brand Added Successfully',
                    'redirect' => route('admin.brands.index')
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
        try {

            $brand = Brand::find($id);
            $brand->delete($id);

            Log::info("Brand with Id ". $id." Delete Successfully");

            $response = array(
                'status' => true,
                'message' => 'Brand Deleted Successfully',
                'redirect' => route('admin.brands.index')
            );

        } catch (\Exception $e) {
           Log::error($e->getMessage());

            $response = array(
                'status' => false,
                'message' => 'Error Occurred'
            );

       }

       return Response::json($response);
    }
}
