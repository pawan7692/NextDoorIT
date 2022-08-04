@extends('admin.layout.master')

@section('head-section')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('main-content')

<div class = "container-fluid">
	<div class ="row">
		<div class="col-md-12">
			<h4>Add Product</h4>
		</div>
	</div>

	<div class = "row">
		<form action="{{route('admin.products.store')}}" method="post" id="productCreateForm">
			@csrf
			<div class="mb-3 form-group">
				<label for="productName" class="form-label">Title</label>
				<input type="text" class="form-control" id="productName" aria-describedby="productName" name="product_name">
				
			</div>

			<div class="form-group mb-3">
			  <label for="formFile" class="form-label">Product Images</label>
			  <input class="form-control" type="file" id="imageUpload" name="product_images[]" multiple="multiple">
			  <div id="previewImg"></div>
			  
			</div>
			
			<div class="form-group">
				<label for="serviceType">Brand</label>
				<select class="form-control" name="product_brand">
					<option selected="selected" disabled="disabled">--Select Brand--</option>
					@foreach($brands as $brand)
					<option value="{{$brand->id}}">{{$brand->name}}</option>
					@endforeach
				</select>
			</div> <br/>

			<div class="mb-3 form-group">
				<label for="productQuantity" class="form-label">Product Quantity</label>
				<input type="number" class="form-control" id="productQuantity" aria-describedby="productQuantity" name="product_quantity">
				
			</div>

			<div class="mb-3 form-group">
				<label for="productQuantity" class="form-label">Product Weight</label>
				<input type="number" class="form-control" id="productWeight" aria-describedby="productWeight" name="product_weight">
				
			</div>

			<div class="mb-3 form-group">
				<label for="productQuantity" class="form-label">Product Price</label>
				<input type="number" class="form-control" id="productPrice" aria-describedby="productPrice" name="product_price">
				
			</div>

			<div class="form-group">
				<label for="productDescription">Product Description</label>
				<textarea class="summernote" name="product_description" id="productDescription"></textarea>
			</div>
			<br/>

			<div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input" id="productStatus" name="product_status">
				<label class="form-check-label" for="productStatus">Status</label>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@endsection

@section('footer-section')


<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{asset('admin/js/toggle-switch/lc_switch.js')}}"></script>

<script>
	

	lc_switch('input[name="product_status"]');


	$('select').select2();

</script>
<script src="{{asset('admin/js/custom/products.js')}}"></script>
@endsection