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
	    {{-- <li class="breadcrumb-item"><a href="#">Sub category</a></li> --}}
	    {{-- <li class="breadcrumb-item active" aria-current="page">Items</li> --}}
	</ol>  
	</nav> <!-- col.// -->
</div> <!-- row.// -->
<hr>
<div class="row">
	<div class="col-md-2">Filter by</div> <!-- col.// -->
	<div class="col-md-10"> 
		<ul class="list-inline">
		  {{-- subcategory filter --}}
		  <li class="list-inline-item mr-3 dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Sub Category</a>
            <div class="dropdown-menu p-3" style="max-width:400px;">	
            	@foreach ($category->subCategory as $subCategory)
            		<label class="form-check">
            			 <input type="radio" name="sub_category" class="form-check-input"> {{$subCategory->name}}
            		</label>
            	@endforeach
            </div> 
	      </li>

	      {{-- brand name --}}
	      <li class="list-inline-item mr-3 dropdown">
	      	<a href="#" class="dropdown-toggle" data-toggle="dropdown">  Brand Name </a>
            <div class="dropdown-menu p-3">	
		      <label class="form-check"> 	 
		      	<input type="checkbox" name="brand[]" class="form-check-input"> 
		      		China    
		      </label>
            </div>
	      </li>
		
		  <li class="list-inline-item mr-3">
		  	<div class="form-inline">
		  		<label class="mr-2">Price</label>
				<input class="form-control form-control-sm" placeholder="Min" type="number">
					<span class="px-2"> - </span>
				<input class="form-control form-control-sm" placeholder="Max" type="number">
				<button type="submit" class="btn btn-sm btn-light ml-2">Ok</button>
			</div>
		  </li>
		  <li class="list-inline-item mr-3">
		  	<label class="custom-control mt-1 custom-checkbox">
			  <input type="checkbox" class="custom-control-input">
			  <div class="custom-control-label">Returnable
			  </div>
			</label>
		  </li>
		</ul>
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- card-body .// -->
</div> <!-- card.// -->
<!-- ============================ FILTER TOP END.// ================================= -->

<header class="mb-3">
		<div class="form-inline">
			<strong class="mr-md-auto">32 Items found </strong>
			<select class="mr-2 form-control">
				<option>Latest items</option>
				<option>Trending</option>
				<option>Most Popular</option>
				<option>Cheapest</option>
			</select>
			<div class="btn-group">
				<a href="#" class="btn btn-light active" data-toggle="tooltip" title="List view"> 
					<i class="fa fa-bars"></i></a>
				<a href="#" class="btn btn-light" data-toggle="tooltip" title="Grid view"> 
					<i class="fa fa-th"></i></a>
			</div>
		</div>
</header><!-- sect-heading -->

<div class="row">
	@foreach ($products as $product)
		<div class="col-md-3">
			<figure class="card card-product-grid">
				<div class="img-wrap"> 
					<span class="badge badge-danger"> NEW </span>
					<img src="/storage/{{$product->product_image}}" style="width: 100%;">
				</div> <!-- img-wrap.// -->
				<figcaption class="info-wrap">
						<a href="{{ route('customer.productPage',[$category->slug,$product->slug]) }}" class="title mb-2">{{$product->product_name}}</a>
						<div class="price-wrap">
							<span class="price">Rs 32.00</span> 
							<small class="text-muted">/per item</small>
						</div> <!-- price-wrap.// -->
						
						{{-- <p class="mb-2"> 2 Pieces  <small class="text-muted">(Min Order)</small></p> --}}
						
						<p class="text-muted ">{{$product->brand_name}}</p>
					   
						<hr>
						
						<p class="mb-3">
							<span class="tag"> <i class="fa fa-check"></i> Verified</span> 
							<span class="tag"> 23 reviews </span>
							<span class="tag"> India </span>
						</p>

						<div class="text-center text-nowrap">
							<a href="#" class="btn btn-outline-primary"> <i class="fas fa-cart-plus"></i> Add to cart </a>	
							<a href="#" class="btn btn-outline-primary"><i class="far fa-heart"></i> Add to wishlist </a>	
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


@endsection