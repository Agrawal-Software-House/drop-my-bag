@extends('customer.app')

@section('navbar-content')
	@include('customer.layout.nav')
@endsection

@section('main-content')

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">


<!-- ============================  FILTER TOP  ================================= -->
<div class="card mb-3">
	<div class="card-body">
<div class="row">
	<div class="col-md-2"> Your are here: </div> <!-- col.// -->
	<nav class="col-md-8"> 
	<ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{ route('customer.home') }}">Home</a></li>
	    <li class="breadcrumb-item"><a href="#">{{$category->name}}</a></li>
	</ol>  
	</nav> <!-- col.// -->
</div> <!-- row.// -->
<hr>
<div class="row">
	<div class="col-md-2">Filter by</div> <!-- col.// -->
	<div class="col-md-10">
		<form action="{{ route('customer.category', $category->slug) }}" id="productSearchForm">
			@csrf
			<ul class="list-inline">
			  {{-- subcategory filter --}}
			  <li class="list-inline-item mr-3 dropdown">
			  	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sub Category</a>
	            <div class="dropdown-menu p-3" style="max-width:400px;">	
	            	@foreach ($category->subCategory as $subCategory)
	            		<label class="form-check">
	            			 <input type="radio" name="sub_category"

	            			 @if ($selected_sub_category == $subCategory->id)
	            			 	checked 
	            			 @endif

	            			  class="form-check-input" value="{{$subCategory->id}}"> {{$subCategory->name}}
	            		</label>
	            	@endforeach
	            </div> 
		      </li>

		      {{-- brand name --}}
		      <li class="list-inline-item mr-3 dropdown">
		      	<a href="#" class="dropdown-toggle" data-toggle="dropdown">  Brand Name </a>
	            <div class="dropdown-menu p-3">	
	              @foreach ($brand_names as $brand)
	              	<label class="form-check"> 	 
	              		<input type="checkbox" name="brand[]"
	              			@if ($selected_brand)
	              				@if (in_array($brand, $selected_brand))
	              					checked 
	              				@endif
	              			@endif

	              			 class="form-check-input" value="{{$brand}}"> 
	              			{{$brand}}    
	              	</label>
	              @endforeach
			      
	            </div>
		      </li>
			
			  <li class="list-inline-item mr-3">
			  	<div class="form-inline">
			  		<label class="mr-2">Price</label>
					<input class="form-control form-control-sm" name="min_price" min="0" placeholder="Min" type="number" value="{{$selected_min_price}}">
						<span class="px-2"> - </span>
					<input class="form-control form-control-sm" name="max_price" placeholder="Max" type="number" value="{{$selected_max_price}}">

					<button type="submit" class="btn btn-sm btn-light ml-2">Filter</button>
				</div>
			  </li>

			  <li class="list-inline-item mr-3">
			  	<label class="custom-control mt-1 custom-checkbox">
				  <input type="checkbox" class="custom-control-input"
				  	@if ($selected_returnable == 1)
				  		checked 
				  	@endif
				   name="returnable">
				  <div class="custom-control-label">Returnable
				  </div>
				</label>
			  </li>


			</ul>
		</form> 
		
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- card-body .// -->
</div> <!-- card.// -->
<!-- ============================ FILTER TOP END.// ================================= -->

<header class="mb-3">
		<div class="form-inline">
			<strong class="mr-md-auto">{{$products->count()}} Items found </strong>
			{{-- <select class="mr-2 form-control">
				<option>Latest items</option>
				<option>Trending</option>
				<option>Most Popular</option>
				<option>Cheapest</option>
			</select> --}}
		</div>
</header>
<!-- sect-heading -->



<div class="row">
	@foreach ($products as $product)
		<div class="col-md-3">
			<figure class="card card-product-grid" style="height: 100% !important;">
				<div class="img-wrap"> 
					<span class="badge badge-danger"> 
						@if ($product->piece >= 1)
					  		In Stock
					  	@else
					  		Out of Stock
					  	@endif 	
					</span>

					<img src="{{Storage::url($product->product_image)}}" style="width: 100%;">
					
				</div> <!-- img-wrap.// -->
				<figcaption class="info-wrap">
						<a href="{{ route('customer.productPage',
						[
							$category->slug,
							$product->slug,
							Crypt::encryptString($product->id)
						]) }}" 
						class="title mb-2">{{$product->product_name}}</a>

						<div class="rating-wrap my-1">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
									<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
									<i class="fa fa-star"></i> 
								</li>
								<li>
									<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
									<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
									<i class="fa fa-star"></i> 
								</li>
							</ul>
							<small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 orders </small>
						</div>

						<div class="price-wrap">
							<span class="price">
								Rs 
								{{number_format($product->selling_price)}}
							</span> 
							<small class="text-muted">/per item</small>
						</div> <!-- price-wrap.// -->
						
						<p class="text-muted ">{{$product->brand_name}}</p>

						<hr>
						
						<p class="mb-3">
							<span class="tag"> <i class="fa fa-check"></i> Verified</span> 
							<span class="tag"> 23 reviews </span>
						</p>

						<div class="text-center text-nowrap">
							<form method="post">
								{{ csrf_field() }}
								<input type="hidden" name="product_id" value="{{Crypt::encryptString($product->id)}}">
								<input type="hidden" name="quantity" value="1">
								<!-- included the button blade -->
								@include('customer._partial.product_add_button')

							</form>
						</div>
						
				</figcaption>
			</figure>
		</div> <!-- col.// -->
	@endforeach

</div> <!-- row end.// -->

<div class="justify-content-center">
	{{ $products->links() }}
</div>

<div class="box text-center mt-5">
	<p>Did you find what you were looking for？</p>
	<a href="" class="btn btn-light">Yes</a>
	<a href="" class="btn btn-light">No</a>
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


@include('customer.scripts.add_to_cart')
@include('customer.scripts.add_to_wishlist')
@include('customer.scripts.filterProduct')

@endsection