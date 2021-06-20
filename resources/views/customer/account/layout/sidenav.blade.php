
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

<div class="row">
	<aside class="col-md-3">
		<nav class="list-group">
			<a class="list-group-item active" href="{{ url('/customer/home') }}"> Account overview  </a>
			<a class="list-group-item" href="{{ url('/customer/my-address') }}"> My Address </a>
			<a class="list-group-item" href="{{ url('/customer/orders') }}"> My Orders </a>
			<a class="list-group-item" href="{{ url('/customer/wishlist') }}"> My wishlist </a>
			<a class="list-group-item" href="{{ url('/customer/setting') }}"> Settings </a>
			<a  href="{{ url('/customer/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item"> Log out </a>
            <form id="logout-form" action="{{ url('/customer/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
		</nav>
	</aside> <!-- col.// -->
	<main class="col-md-9">

		@section('profile-content')
			@show

		

	</main> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

