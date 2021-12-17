<!-- Logic to show the customer cart button starts here -->
@if (Auth::guard('customer')->check() && commanHelper::GET_CURRENT_CUSTOMER()->cart()->where('product_id',$product->id)->first())
    <!-- if customer already have this in add_to_cart -->
	<a type="button" class="btn btn-primary" target="_blank" href="{{route('customer.my-cart.index')}}">
		<i class="fas fa-cart-plus"></i> 
		Go to cart
	</a>
@else
	<!-- if customer dont have this item in cart -->
	<button type="button" class="btn btn-outline-primary" onclick="add_to_cart('{{Crypt::encryptString($product->id)}}', $('#quantity').val());"> 
		<i class="fas fa-cart-plus"></i> 
		Add to cart 
	</button>	
@endif
<!-- Logic to show the customer cart button ends here -->


<!-- Logic to show the customer wishlist button starts here -->
@if (Auth::guard('customer')->check() && commanHelper::GET_CURRENT_CUSTOMER()->wishlist()->where('product_id',$product->id)->first())
    <!-- if customer already have this in add_to_wishlist -->
	<a type="button" class="btn btn-primary" target="_blank" href="{{route('customer.wishlist.index')}}">
        <i class="fas fa-heart"></i>
        Go to wishlist
    </a>
    
@else
	<!-- if customer dont have this item in wishlist -->
	<button type="button" class="btn btn-outline-primary" onclick="add_to_wishlist('{{Crypt::encryptString($product->id)}}');">
		<i class="far fa-heart"></i> 
		Add to wishlist
	</button>
@endif
<!-- Logic to show the customer wishlist button ends here -->



