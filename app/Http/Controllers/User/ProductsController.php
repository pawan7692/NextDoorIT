<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Brand;


class ProductsController extends Controller
{
    //
    public function showProducts() {

    	$brands = Brand::where('status', 1)->get();
    	$products = Product::where('status', 1)->get();
    	return view('user.products', compact('products', 'brands'));
    }

    public function showProductDetails($productSlug) {

    	$product = Product::where('slug', $productSlug)->firstOrFail();
    	return view('user.productDetails', compact('product'));
    }
}
