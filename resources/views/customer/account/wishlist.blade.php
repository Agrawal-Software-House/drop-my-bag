@extends('customer.account.app')


@section('profile-content')
<article class="card">
	<div class="card-body">

<div class="row">

		@foreach($wishlists as $wishlist)		
		<div class="col-md-6">
			<figure class="itemside mb-4">
				<div class="aside"><img src="{{Storage::url($wishlist->product->product_image)}}" class="border img-md"></div>
				<figcaption class="info">
					
					<a href="#" class="title">{{$wishlist->product->product_name}}</a>

					<p class="price mb-2">Rs {{$wishlist->product->selling_price}}</p>

					<!-- Logic to show the customer cart button starts here -->
					@if (Auth::guard('customer')->check() && commanHelper::GET_CURRENT_CUSTOMER()->cart()->where('product_id',$wishlist->product->id)->first())
						<!-- if customer already have this in add_to_cart -->
						<a target="_blank" href="{{route('customer.my-cart.index')}}" class="btn btn-secondary btn-sm text-white"> 
							Go to cart 
						</a>
					@else
						<!-- if customer dont have this item in cart -->
						<a onclick="add_to_cart('{{Crypt::encryptString($wishlist->product->id)}}', $('#quantity').val());" class="btn btn-secondary btn-sm text-white"> 
							Add to cart 
						</a>
					@endif
					<!-- Logic to show the customer cart button ends here -->

					

					<a onclick="removeFromWishlist('{{Crypt::encryptString($wishlist->id)}}')" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" title="" data-original-title="Remove from wishlist"> 
						<i class="fa fa-times"></i> 
					</a>

				</figcaption>
			</figure>
		</div> 
		@endforeach
		
	</div> <!-- row .//  -->

	</div> <!-- card-body.// -->
</article>


@include('customer.scripts.add_to_cart')
@include('customer.scripts.remove_from_wishlist')


@endsection