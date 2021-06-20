@extends('customer.account.app')


@section('profile-content')



<article class="card mb-4">
<header class="card-header">
	<a href="#" class="float-right"> <i class="fa fa-print"></i> Print</a>
	<strong class="d-inline-block mr-3">Order ID: 6123456789</strong>
	<span>Order Date: 16 December 2018</span>
</header>
<div class="card-body">
	<div class="row"> 
		<div class="col-md-8">
			<h6 class="text-muted">Delivery to</h6>
			<p>Michael Jackson <br>  
			Phone +1234567890 Email: myname@gmail.com <br>
	    	Location: Home number, Building name, Street 123, <br> 
	    	P.O. Box: 100123
	 		</p>
		</div>
		<div class="col-md-4">
			<h6 class="text-muted">Payment</h6>
			<span class="text-success">
				<i class="fab fa-lg fa-cc-visa"></i>
			    Visa  **** 4216  
			</span>
			<p>Subtotal: $356 <br>
			 Shipping fee:  $56 <br> 
			 <span class="b">Total:  $456 </span>
			</p>
		</div>
	</div> <!-- row.// -->
</div> <!-- card-body .// -->
<div class="table-responsive">
<table class="table table-hover">
	<tbody><tr>
		<td width="65">
			<img src="images/items/1.jpg" class="img-xs border">
		</td>
		<td> 
			<p class="title mb-0">Product name goes here </p>
			<var class="price text-muted">USD 145</var>
		</td>
		<td> Seller <br> Nike clothing </td>
		<td width="250"> <a href="#" class="btn btn-outline-primary">Track order</a> 
			<div class="dropdown d-inline-block">
				 <a href="#" data-toggle="dropdown" class="dropdown-toggle btn btn-outline-secondary">More</a>
				 <div class="dropdown-menu dropdown-menu-right">
				 	<a href="#" class="dropdown-item">Return</a>
				 	<a href="#"  class="dropdown-item">Cancel order</a>
				 </div>
			</div> <!-- dropdown.// -->
		</td>
	</tr>
	<tr>
		<td>
			<img src="images/items/2.jpg" class="img-xs border">
		</td>
		<td> 
			<p class="title mb-0">Another name goes here </p>
			<var class="price text-muted">USD 15</var>
		</td>
		<td> Seller <br> ABC shop </td>
		<td> 
			<a href="#" class="btn btn-outline-primary">Track order</a>
			<div class="dropdown d-inline-block">
				 <a href="#" data-toggle="dropdown" class="dropdown-toggle btn btn-outline-secondary">More</a>
				 <div class="dropdown-menu dropdown-menu-right">
				 	<a href="#" class="dropdown-item">Return</a>
				 	<a href="#"  class="dropdown-item">Cancel order</a>
				 </div>
			</div> <!-- dropdown.// -->
		</td>
	</tr>
	<tr>
		<td>
			<img src="images/items/3.jpg" class="img-xs border">
		</td>
		<td> 
			<p class="title mb-0">The name of the product  goes here </p>
			<var class="price text-muted">USD 145</var>
		</td>
		<td> Seller <br> Wallmart </td>
		<td> <a href="#" class="btn btn-outline-primary">Track order</a> 
			<div class="dropdown d-inline-block">
				 <a href="#" data-toggle="dropdown" class="dropdown-toggle btn btn-outline-secondary">More</a>
				 <div class="dropdown-menu dropdown-menu-right">
				 	<a href="#" class="dropdown-item">Return</a>
				 	<a href="#"  class="dropdown-item">Cancel order</a>
				 </div>
			</div> <!-- dropdown.// -->
		</td>
	</tr>
</tbody></table>
</div> <!-- table-responsive .end// -->
</article> <!-- card order-item .// -->


<article class="card order-item mb-4">
<header class="card-header">
	<a href="#" class="float-right"> <i class="fa fa-print"></i> Print</a>
	<strong class="d-inline-block mr-3">Order ID: 6123456789</strong>
	<span>Order Date: 16 December 2018</span>
</header>
<div class="card-body">
	<div class="row"> 
		<div class="col-md-8">
			<h6 class="text-muted">Delivery to</h6>
			<p>Michael Jackson <br>  
			Phone +1234567890 Email: myname@pixsellz.com <br>
	    	Location: Home number, Building name, Street 123,  Tashkent, UZB <br> 
	    	P.O. Box: 100123
	 		</p>
		</div>
		<div class="col-md-4">
			<h6 class="text-muted">Payment</h6>
			<span class="text-success">
				<i class="fab fa-lg fa-cc-visa"></i>
			    Visa  **** 4216  
			</span>
			<p>Subtotal: $356 <br>
			 Shipping fee:  $56 <br> 
			 <span class="b">Total:  $456 </span>
			</p>
		</div>
	</div> <!-- row.// -->
</div> <!-- card-body .// -->
<div class="table-responsive">
<table class="table table-hover">
	<tbody><tr>
		<td width="65">
			<img src="images/items/1.jpg" class="img-xs border">
		</td>
		<td> 
			<p class="title mb-0">Product name goes here </p>
			<var class="price text-muted">USD 145</var>
		</td>
		<td> Seller <br> Nike clothing </td>
		<td width="250"> <a href="#" class="btn btn-outline-primary">Track order</a>  
			<div class="dropdown d-inline-block">
				 <a href="#" data-toggle="dropdown" class="dropdown-toggle btn btn-outline-secondary">More</a>
				 <div class="dropdown-menu dropdown-menu-right">
				 	<a href="#" class="dropdown-item">Return</a>
				 	<a href="#"  class="dropdown-item">Cancel order</a>
				 </div>
			</div> <!-- dropdown.// -->
		</td>
	</tr>
	<tr>
		<td>
			<img src="images/items/2.jpg" class="img-xs border">
		</td>
		<td> 
			<p class="title mb-0">Another name goes here </p>
			<var class="price text-muted">USD 15</var>
		</td>
		<td> Seller <br> ABC shop </td>
		<td> <a href="#" class="btn btn-outline-primary">Track order</a>  
			<div class="dropdown d-inline-block">
				 <a href="#" data-toggle="dropdown" class="dropdown-toggle btn btn-outline-secondary">More</a>
				 <div class="dropdown-menu dropdown-menu-right">
				 	<a href="#" class="dropdown-item">Return</a>
				 	<a href="#"  class="dropdown-item">Cancel order</a>
				 </div>
			</div> <!-- dropdown.// -->
		</td>
	</tr>
</tbody></table>
</div> <!-- table-responsive .end// -->
</article> <!-- card order-item .// -->

@endsection