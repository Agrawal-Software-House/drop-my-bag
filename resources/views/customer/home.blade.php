@extends('customer.app')

@section('navbar-content')
	@include('customer.layout.nav')
@endsection

@section('main-content')

<div class="container">
<!-- ========================= SECTION MAIN  ========================= -->
<section class="section-main padding-y">
<main class="card">
	<div class="card-body">

<div class="row">
	<aside class="col-lg col-md-3 flex-lg-grow-0">
		<nav class="nav-home-aside">
			<h6 class="title-category">MY MARKETS <i class="d-md-none icon fa fa-chevron-down"></i></h6>
			<ul class="menu-category">
				@foreach ($categories as $category)
					<li><a href="{{ route('customer.category',$category->slug) }}">{{$category->name}}</a></li>
				@endforeach
			</ul>
		</nav>
	</aside> <!-- col.// -->

	<div class="col-md-9 col-xl-7 col-lg-7">

		<!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
		<div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel1_indicator" data-slide-to="1"></li>
		    <li data-target="#carousel1_indicator" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="{{ asset('customer\images\banners\veg2.jpg') }}" alt="First slide"> 
		    </div>
		    {{-- <div class="carousel-item">
		      <img src="/customer/images/banners/slide2.jpg" alt="Second slide">
		    </div>
		    <div class="carousel-item">
		      <img src="/customer/images/banners/slide3.jpg" alt="Third slide">
		    </div> --}}
		  </div>
		  <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div> 
		<!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->	

	</div> <!-- col.// -->

	<div class="col-md d-none d-lg-block flex-grow-1">
		<aside class="special-home-right">
			<h6 class="bg-site-color text-center text-white mb-0 p-2">Popular category</h6>


			@foreach ($categories as $category)
			<div class="card-banner border-bottom">
			  <div class="py-3" style="width:80%">
			    <h6 class="card-title">{{$category->name}}</h6>
			    <a href="{{ route('customer.category',$category->slug) }}" class="btn btn-secondary btn-site-color btn-sm"> Source now </a>
			  </div> 
			  <img src="{{Storage::url($category->image)}}" height="80" class="img-bg">
			</div>
			@endforeach

		</aside>
	</div> 
	<!-- col.// -->
</div> <!-- row.// -->

	</div> <!-- card-body.// -->
</main> <!-- card.// -->

</section>
<!-- ========================= SECTION MAIN END// ========================= -->



@foreach ($categories as $category)
<!-- =============== SECTION 1 =============== -->
<section class="padding-bottom">
	<header class="section-heading heading-line">
		<h4 class="title-section text-uppercase">{{$category->name}}</h4>
	</header>

	<div class="card card-home-category">
		<div class="row no-gutters">
			<div class="col-md-3">
				<div class="bg-light row">
					<div class="col-4 py-5">
						<a href="{{ route('customer.category', $category->slug) }}" class="btn btn-outline-primary" style="border-radius: 13px;">View All</a>
					</div>

					<div class="col-8">
						<img src="{{Storage::url($category->image)}}" class="img-fluid" style="height: 100%;">
					</div>
					
				</div>
			</div> 
			<!-- col.// -->
			
			<div class="col-md-9">
				<ul class="row no-gutters bordered-cols">
					@foreach ($category->product as $product)
						<li class="col-lg-3 col-md-4">
							<a href="{{ route('customer.productPage',[$category->slug,$product->slug,Crypt::encryptString($product->id)]) }}" class="item"> 
								<div class="card-body">
									<h6 class="title">{{$product->product_name}}</h6>
									<img class="img-sm float-right" src="{{Storage::url($product->product_image)}}"> 

									<p class="m-0 p-0">
										<strong>
											Rs {{$product->selling_price}}
										</strong> 
										<strike>
											Rs {{$product->selling_price}}
										</strike>

										<div class="rating-wrap">
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

									</p>
								</div>
							</a>
						</li>
					@endforeach
					
				</ul>
			</div> 
			<!-- col.// -->
		</div> 
		<!-- row.// -->
	</div> <!-- card.// -->
</section>
<!-- =============== SECTION 1 END =============== -->
@endforeach


<!-- =============== SECTION SERVICES =============== -->
<section  class="padding-bottom">


</div>  
<!-- container end.// -->
@endsection