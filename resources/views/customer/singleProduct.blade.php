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
		<aside class="col-md-6">
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
	<var class="price h4">Rs 465,00</var> 
	<span class="text-muted">USD 562.65 incl. VAT</span> 
</div> <!-- price-detail-wrap .// -->

<p>Compact sport shoe for running, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat </p>


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
  		in Stock
  	@else
  		Not Available
  	@endif
  </dd>
</dl>

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
		<!-- col.// -->


	</div> <!-- row.// -->
</form>

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
	</div> <!-- col.// -->
	
	<aside class="col-md-4">

		<div class="box">
{{-- 		
		<h5 class="title-description">Files</h5>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p> --}}

    <h5 class="title-description">Similar Products</h5>
      

    <article class="media mb-3">
      <a href="#"><img class="img-sm mr-3" src="images/posts/3.jpg"></a>
      <div class="media-body">
        <h6 class="mt-0"><a href="#">How to use this item</a></h6>
        <p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p>
      </div>
    </article>

    <article class="media mb-3">
      <a href="#"><img class="img-sm mr-3" src="images/posts/2.jpg"></a>
      <div class="media-body">
        <h6 class="mt-0"><a href="#">New tips and tricks</a></h6>
        <p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p>
      </div>
    </article>

    <article class="media mb-3">
      <a href="#"><img class="img-sm mr-3" src="images/posts/1.jpg"></a>
      <div class="media-body">
        <h6 class="mt-0"><a href="#">New tips and tricks</a></h6>
        <p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin </p>
      </div>
    </article>


		
	</div> <!-- box.// -->
	</aside> <!-- col.// -->
</div> <!-- row.// -->

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->



@endsection