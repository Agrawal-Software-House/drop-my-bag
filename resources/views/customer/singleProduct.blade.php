@extends('customer.app')

@section('navbar-content')
	@include('customer.layout.nav')
@endsection

@section('main-content')

<section class="py-3 bg-light">
  <div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('customer.home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('customer.category',$product->category->slug) }}">{{$product->category->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$product->product_name}}</li>
    </ol>
  </div>
</section>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg-white padding-y">
<div class="container">

<!-- ============================ ITEM DETAIL ======================== -->
	<div class="row">
		<aside class="col-md-3">
			<div class="card">
			<article class="gallery-wrap"> 
				<div class="img-big-wrap">
				  <div> <a href="#"><img src="/storage/{{$product->product_image}}" style="width: 100%; height: 100%;"></a></div>
				</div> <!-- slider-product.// -->
				{{-- <div class="thumbs-wrap">
				  <a href="#" class="item-thumb"> <img src="images/items/15.jpg"></a>
				  <a href="#" class="item-thumb"> <img src="images/items/15-1.jpg"></a>
				  <a href="#" class="item-thumb"> <img src="images/items/15-2.jpg"></a>
				  <a href="#" class="item-thumb"> <img src="images/items/15-1.jpg"></a>
				</div> --}} <!-- slider-nav.// -->
			</article> <!-- gallery-wrap .end// -->
			</div> <!-- card.// -->
		</aside>


		<main class="col-md-6">
<article class="product-info-aside">

<h2 class="title mt-3">{{$product->product_name}}</h2>

<div class="rating-wrap my-3">
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
	<small class="label-rating text-muted">132 reviews</small>
	<small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 orders </small>
</div> <!-- rating-wrap.// -->

<div class="mb-3"> 
	<var class="price h4">Rs {{number_format($product->selling_price)}}</var> 
	<span class="text-muted">USD 562.65 incl. VAT</span> 
</div> <!-- price-detail-wrap .// -->

<p></p>


<dl class="row">
  <dt class="col-sm-3">Manufacturer</dt>
  <dd class="col-sm-9"><a href="#">{{$product->merchant->firm_name}}</a></dd>

  <dt class="col-sm-3">Guarantee</dt>
  <dd class="col-sm-9">2 year</dd>

  <dt class="col-sm-3">Delivery time</dt>
  <dd class="col-sm-9">3-4 days</dd>

  <dt class="col-sm-3">Availabilty</dt>
  <dd class="col-sm-9">
  	@if ($product->piece >= 1)
  		<img src="{{ asset('customer\images\instock.png') }}" alt="" height="17">
  		In Stock
  	@else
  		<img src="{{ asset('customer\images\soldout.png') }}" alt="" height="17">
  		Not Available
  	@endif
  </dd>
</dl>

{{-- form starts here --}}
<form method="post">
	{{ csrf_field() }}
	<input type="hidden" name="product_id" value="{{Crypt::encryptString($product->id)}}">
	<div class="form-row  mt-4">
		
		<!-- included the button blade -->
		@include('customer._partial.product_add_minus_button')
		<div class="form-group col-md">
			<!-- included the button blade -->
			@include('customer._partial.product_add_button')

		</div> 
	</div> <!-- row.// -->
</form>
{{-- form ends here --}}

</article> <!-- product-info-aside .// -->
		</main> <!-- col.// -->
	</div> <!-- row.// -->

<!-- ================ ITEM DETAIL END .// ================= -->


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y bg">
<div class="container">

<div class="row">
	<div class="col-md-8">
		<h5 class="title-description">Description</h5>
		{!! htmlspecialchars_decode($product->specification) !!}
	</div> 

	@if ($similar_products->count() > 0)
		<aside class="col-md-4">
			<div class="box">

			    <h5 class="title-description">Similar Products</h5>
			    

			    @foreach ($similar_products as $similar_product)
			    	<article class="media mb-3">

			    	  <a href="{{ route('customer.productPage',
						[
							$similar_product->category->slug,
							$similar_product->slug,
							Crypt::encryptString($similar_product->id)
						]) }}">

			    	  	<img class="img-sm mr-3" src="{{Storage::url($similar_product->product_image)}}">
			    	  </a>

			    	  <div class="media-body">
			    	    <h6 class="mt-0">
			    	    	<a href="{{ route('customer.productPage',
									[
										$similar_product->category->slug,
										$similar_product->slug,
										Crypt::encryptString($similar_product->id)
									]) }}"
							>

			    	    		{{$similar_product->product_name}}
			    	    	</a>
			    	    </h6>

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
			    	    	
			    	    </div>

			    	    <small class="label-rating text-muted">132 reviews</small>
			    	    <small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 orders </small>


			    	    {{-- <p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p> --}}

			    	  </div>

			    	</article>
			    @endforeach
			    
			</div> 
		</aside> 
	@endif
	
	
</div> 

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

@include('customer.scripts.add_to_cart')
@include('customer.scripts.add_to_wishlist')

@endsection