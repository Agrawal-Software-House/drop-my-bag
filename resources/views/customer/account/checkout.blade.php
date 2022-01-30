@extends('customer.app')

@section('navbar-content')
	@include('customer.layout.nav')
@endsection

@section('main-content')


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container" style="max-width: 720px;">

<div class="card mb-4">
      <div class="card-body">
      <h4 class="card-title mb-3">Delivery info</h4>

	  <div class="form-row">
		  	@foreach($addresses as $address)
			  	<div class="form-group col-sm-6">
					<label class="js-check box active">
						<input type="radio" name="address" value="{{$address->id}}" @if($address->active) checked @endif >
						<h6 class="title">{{$address->name}}</h6>
						<p class="text-muted">
							{{$address->address}}
							<br>
							{{$address->city}}, {{$address->state}}, {{$address->zip}}
							<br>
							{{$address->landmark}}
							<br>
							{{$address->phone_number}}
						</p>
					</label> 
				</div>
			@endforeach

			<!-- <div class="col-sm-12">
				<button class="btn btn-outline-success">Add New</button>
			</div> -->

		</div>


		<div id="add_new_address">
			
		</div>

      </div> 
	  <!-- card-body.// -->
    </div>  
	<!-- address card ends here .// -->


	<!-- payment card starts here -->
	<div class="card mb-4">
      <div class="card-body">
      	<h4 class="card-title mb-4">Payment</h4>
      	<form role="form">

		  	<div class="form-row">
			  	<div class="form-group col-sm-6">
					<label class="js-check box active">
						<input type="radio" name="payment_method" value="" checked>
						<h6 class="title">Cash On Delivery</h6>
						<p class="text-muted">
							Pay when you get it
						</p>
					</label> 
				</div>

				<!-- <div class="form-group col-sm-6">
					<label class="js-check box active">
						<input type="radio" name="payment_method" value="" checked>
						<h6 class="title">Debit Card</h6>
						<p class="text-muted">
							Pay now to avoid the hassle
						</p>
					</label> 
				</div> -->
			</div>


			<div id="cashOnDelivery" class="mb-3">
				{{ $captcha->form_field() }}

				<div class="form-group col-md-4">
					<label for="">Enter the code</label>
					<input type="text" class="form-control" id="" name="">
				</div>

				<div class="col-md-12">
					{{ $captcha->html_image(['onclick' => 'jsFunction()', 'style' => 'border:1px solid #ddd']) }}
				</div>

				

				
			</div>

			<!-- debit card div ends here -->
			<div id="debitCard" style="display:none;">
				<div class="form-group">
					<label for="username">Name on card</label>
					<input type="text" class="form-control" name="username" placeholder="Ex. John Smith" required="">
				</div> 
				<!-- form-group.// -->

				<div class="form-group">
					<label for="cardNumber">Card number</label>
					<div class="input-group">
						<input type="text" class="form-control" name="cardNumber" placeholder="">
						<div class="input-group-append">
							<span class="input-group-text">
								<i class="fab fa-cc-visa"></i> &nbsp; <i class="fab fa-cc-amex"></i> &nbsp; 
								<i class="fab fa-cc-mastercard"></i> 
							</span>
						</div>
					</div> 
					<!-- input-group.// -->
				</div> 
				<!-- form-group.// -->

				<div class="row">
					<div class="col-md flex-grow-0">
						<div class="form-group">
							<label class="hidden-xs">Expiration</label>
							<div class="form-inline" style="min-width: 220px">
								<select class="form-control" style="width:100px">
									<option>MM</option>
									<option>01 - Janiary</option>
									<option>02 - February</option>
									<option>03 - February</option>
								</select>
								<span style="width:20px; text-align: center"> / </span>
								<select class="form-control" style="width:100px">
									<option>YY</option>
									<option>2018</option>
									<option>2019</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label data-toggle="tooltip" title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
							<input class="form-control" required="" type="text">
						</div> 
						<!-- form-group.// -->
					</div>
				</div> 
				<!-- row.// -->
			</div>
			<!-- debit card div ends here -->

		  	

			
			<button class="subscribe btn btn-primary btn-block" type="button"> Confirm  </button>
		</form>
      </div> 
	  <!-- card-body.// -->
    </div> <!-- card .// -->


<br><br> 

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->



@endsection