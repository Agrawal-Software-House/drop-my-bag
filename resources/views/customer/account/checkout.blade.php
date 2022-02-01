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
						<input type="radio" name="address" id="address" value="{{$address->id}}" @if($address->active) checked @endif >
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
			@csrf

		  	<div class="form-row">
			  	<div class="form-group col-sm-6">
					<label class="js-check box active">
						<input type="radio" name="payment_method" value="1" checked>
						<h6 class="title">Cash On Delivery</h6>
						<p class="text-muted">
							Pay when you get it
						</p>
					</label> 
				</div>
			</div>


			<div id="cashOnDelivery" class="mb-3">
				{{ $captcha->form_field() }}

				<div class="form-group col-md-4">
					<label for="captcha_code">Enter the code</label>
					<input type="text" class="form-control" id="captcha_code" name="captcha_code">
					<div class="error" id="error_captcha_code"></div>	
				</div>

				<div class="col-md-12">
					{{ $captcha->html_image(['onclick' => 'jsFunction()', 'style' => 'border:1px solid #ddd']) }}
				</div>
			</div>

			<button class="subscribe btn btn-primary btn-block" type="button" onclick="confirmOrder();"> 
				Confirm  Order
			</button>
		</form>
      </div> 
	  <!-- card-body.// -->
    </div> <!-- card .// -->


<br><br> 

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->



@push('scripts')
	<script>
		function confirmOrder()
		{
			var data = new FormData(this.form);
			data.append("_token", "{{ csrf_token() }}");
			data.append("captcha_id", "{{ $captcha->id() }}");
			data.append("captcha_code", $('#captcha_code').val());
			data.append("address", $("#address").val());

			$.ajax({
				type: 'POST',
				url: "{{route('customer.orders.store')}}",
				data: data,
				processData: false,
				contentType: false,
				dataType: 'json',
				
				success: function(data){
					if(data.captcha_verifed == false)
					{
						errorToast(data.message);
						location.reload();
					}
					else{
						successToast(data.message);
						window.location = "{{route('customer.orders.index')}}";
					}
					
				},

				complete: function(response){

				},

				error: function(xhr, status, data)
				{
					var errors = xhr.responseJSON.errors;
					$('.error').text('');
					$('.text-danger').text('');

					for (const [key, value] of Object.entries(errors)) {
						$('#error_'+key).text(value);
					}
					xhr.responseJSON.errors ? errorToast('Please Fill all required fields','Validation Error!!') : errorToast('Techincal issue!!');
				}
				
			});
			e.preventDefault();
		}
	</script>
@endpush


@endsection