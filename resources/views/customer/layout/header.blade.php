{{-- <section style="background-color: red; color: white; padding: 10px;">
	<marquee width="70%" direction="left" style="font-size: 20px; font-weight: bold !important;">
	This site is under constrution
	</marquee>
</section> --}}
<section class="header-main border-bottom">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xl-2 col-lg-3 col-md-12">
				<a href="/" class="brand-wrap">
					<img class="logo" src="/logo/dmbF5.png">
				</a> 
			</div>
			<div class="col-xl-6 col-lg-5 col-md-6">
				{{-- <form action="#" class="search-header">
					<div class="input-group w-100">
						<select class="custom-select border-right"  name="category_name">
								<option value="">All type</option><option value="codex">Special</option>
								<option value="comments">Only best</option>
								<option value="content">Latest</option>
						</select>
					    <input type="text" class="form-control" placeholder="Search">
					    
					    <div class="input-group-append">
					      <button class="btn btn-primary" type="submit">
					        <i class="fa fa-search"></i> Search
					      </button>
					    </div>
				    </div>
				</form> --}}
			</div> 
			<!-- col.// -->
			<div class="col-xl-4 col-lg-4 col-md-6">
				<div class="widgets-wrap float-md-right">
					
					@if (!Auth::guard('customer')->check())
						<div class="widget-header mr-3">
							<a href="{{ route('customer.login') }}" class="widget-view">
								<div class="icon-area">
									<i class="fas fa-sign-in-alt"></i>
								</div>
								<small class="text"> Login </small>
							</a>
						</div>


						<div class="widget-header mr-3">
							<a href="{{ route('customer.register') }}" class="widget-view">
								<div class="icon-area">
									<i class="fas fa-user-plus"></i>
								</div>
								<small class="text"> Register </small>
							</a>
						</div>

					@else
						<div class="widget-header mr-3">
							<a href="{{ url('/customer/home') }}" class="widget-view">
								<div class="icon-area">
									<i class="fa fa-user"></i>
									<span class="notify">3</span>
								</div>
								<small class="text"> My profile </small>
							</a>
						</div>
					@endif


					<div class="widget-header mr-3">
						<a href="{{ route('customer.orders.index') }}" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-store"></i>
							</div>
							<small class="text"> Orders </small>
						</a>
					</div>
					<div class="widget-header">
						<a href="{{ route('customer.my-cart.index') }}" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-shopping-cart"></i>
							</div>
							<small class="text"> Cart </small>
						</a>
					</div>
				</div> <!-- widgets-wrap.// -->
			</div> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->