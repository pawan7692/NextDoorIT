<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;

use Illuminate\Support\Facades\Validator;
use Response;
use Str;
use Illuminate\Support\Facades\Log;


class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:product-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brands = Brand::where('status', 1)->get();
        return view('admin.products.create', compact('brands'));
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
       // dd($request->all());
        $validator = Validator::make($request->all(), [
            "product_name" => "required|unique:products,name",
            "product_brand" => "required",
            "product_images.*" => "required",
            "product_images.*" => "mimes:jpg,png,jpeg,svg",
            "product_quantity" => "required",
            "product_weight" => "required",
            "product_price" => "required",
            "product_description" => "required"
        ]);
        if($validator->fails()) {

            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

        else {

            try {
               // dd($request->total;
                $product = new Product;
                
                $product->name = $request->product_name;
                $product->slug = Str::slug($request->product_name); 
                $product->brand_id = $request->product_brand;
                $product->quantity = $request->product_quantity;
                $product->weight = $request->product_weight;
                $product->price = $request->product_price;
                $product->description = $request->product_description;             
                $product->status = $request->product_status?1:0;

                $product->save();
                if($request->totalImages > 0) {

                    for($i = 0; $i<$request->totalImages; $i++) {

                        $productImage = new ProductImage;
                        
                        if($file = $request->file('product_images'.$i)) {

                            $fileOriginalName = $file->getClientOriginalName();
                            $fileName = pathInfo($fileOriginalName, PATHINFO_FILENAME);
                            $fileExtension = pathInfo($fileOriginalName, PATHINFO_EXTENSION);

                            $folderToUpload = '/admin/uploads/product';

                            $destinationPath = public_path().$folderToUpload;
                            $safeName = $fileName.'_'.time().'_'.$fileExtension;
                            $file->move($destinationPath, $safeName);

                            $productImage->image = $safeName;
                            $productImage->product_id = $product->id;
                            $productImage->Status = 1;
                            $productImage->save();

                        }
                    }

                    
                } 


                $response = array(
                    'status' => true,
                    'message' => 'Post Added Successfully',
                    'redirect' => route('admin.products.index')
                );

            }
            catch(\Exception $e) {
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
