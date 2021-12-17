@extends('customer.app')

@section('navbar-content')
	@include('customer.layout.nav')
@endsection

@section('main-content')

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

<div class="row">
	<main class="col-md-9">
		<div class="card" style="padding: 20px !important;">

			{!! $dataTable->table(['class' => 'table table-borderless table-shopping-cart']) !!}


			<div class="card-body border-top" style="margin-top: 20px;">
				<a onclick="refreshTable();" class="btn btn-primary float-md-right"> Make Purchase <i class="fa fa-chevron-right"></i> </a>
				<a href="{{ route('customer.home') }}" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
			</div>	

		</div> <!-- card.// -->

		<div class="alert alert-success mt-3">
			<p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks</p>
		</div>

	</main> <!-- col.// -->


	<aside class="col-md-3">
		<div class="card mb-3">
			<div class="card-body">
			<form>
				<div class="form-group">
					<label>Have coupon?</label>
					<div class="input-group">
						<input type="text" class="form-control" name="" placeholder="Coupon code">
						<span class="input-group-append"> 
							<button class="btn btn-primary">Apply</button>
						</span>
					</div>
				</div>
			</form>
			</div> <!-- card-body.// -->
		</div>  <!-- card .// -->
		<div class="card">
			<div class="card-body">
					<dl class="dlist-align">
					  <dt>Total price:</dt>
					  <dd class="text-right">Rs <span id="total_price">0</span></dd>
					</dl>
					<dl class="dlist-align">
					  <dt>Discount:</dt>
					  <dd class="text-right">Rs 0</dd>
					</dl>
					<dl class="dlist-align">
					  <dt>Grand Total:</dt>
					  <dd class="text-right  h5"><strong>Rs <span id="grand_total">0</span></strong></dd>
					</dl>

					<hr>

					<p class="text-center mb-3">
						<img src="images/misc/payments.png" height="26">
					</p>
					
			</div> <!-- card-body.// -->
		</div>  <!-- card .// -->
	</aside> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

@include('customer._partial.refund_policy')

@push('styles')
	<style>
		table
		{
			width: 100% !important;
		}
	</style>
@endpush


@push('scripts')
	<script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}



	<script>
		function refreshTable()
		{
			$('#customercartdatatable-table').DataTable().ajax.reload();

		}

		$(document).ready(function() {
			refreshTable();
			
		});


		function setTotal()
		{
			var total = $('#customercartdatatable-table').DataTable().ajax.json().extra.total_price;
			console.log(total);
			$("#total_price").html(total);
			$("#grand_total").html(total);
		}

		function updateQuantity(cart_id, quantity)
		{
			var id = quantity;
			var quantity = $("#quantity_val" + quantity).val();

			var data = new FormData(this.form);

			data.append("_token", "{{ csrf_token() }}");
			data.append('_method','PUT');
			data.append('cart_id',cart_id);
			data.append('quantity',quantity);

			$.ajax({
				type: 'POST',
				url: "/customer/my-cart/"+id,
				data: data,
				processData: false,
				contentType: false,
				dataType: 'json',
				
				success: function(data){
					successToast(data.message);
				},

				complete: function(response){
					refreshTable();
				},

				error: function(xhr, status, data)
				{
					errorToast('Techincal Error!');
				}
				
			});
			e.preventDefault();
		}
	</script>




	
@endpush

@include('customer.scripts.remove_from_cart')


@endsection