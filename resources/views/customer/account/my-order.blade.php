@extends('customer.account.app')


@section('profile-content')


@foreach ($transactions as $transaction)
	
<article class="card mb-4">
	<header class="card-header">
		<a href="#" class="float-right"> <i class="fa fa-print"></i> Print</a>
		<strong class="d-inline-block mr-3">Order ID: {{$transaction->order_no}}</strong>
		<span>Order Date: {{ $transaction->created_at }}</span>
	</header>
	<div class="card-body">
		<div class="row"> 
			<div class="col-md-8">
				<h6 class="text-muted">Delivery to</h6>
				<p> {{ Str::ucfirst($transaction->address->name) }} <br>  
				Phone {{$transaction->address->phone_number}} Email: {{$transaction->address->email}} <br>
				Location: 
				{{$transaction->address->address}}, 
				{{$transaction->address->city}}, 
				{{$transaction->address->state}}, <br> 
				{{$transaction->address->zip}}
				<br>
				@if ($transaction->address->landmark)
					Landmark: {{$transaction->address->landmark}}
				@endif
				 </p>
			</div>
			<div class="col-md-4">
				<h6 class="text-muted">Payment</h6>
				<span class="text-success">
					{{-- <i class="fab fa-lg fa-cc-visa"></i> --}}
					Cash On Delivery
				</span>
				<p>
					@php
						$total = 0;
						foreach($transaction->orders as $order)	
						{
							$total = $total + $order->grand_amount;
						}
					@endphp
					Subtotal: RS {{$total}} <br>
				 	Shipping fee:  RS 0 <br> 
				 	<span class="b">Total:  RS {{$total}} </span>
				</p>
			</div>
		</div> <!-- row.// -->
	</div> <!-- card-body .// -->
	<div class="table-responsive">
		<table class="table table-hover">
			<tbody>
				@foreach ($transaction->orders as $order)
					<tr>
						<td width="65">
							<img src="{{Storage::url($order->product->product_image)}}" class="img-xs border">
						</td>

						<td> 
							<p class="title mb-0">{{$order->product->product_name}}</p>
							<var class="price text-muted">Rs {{$order->amount}}</var>
						</td>

						<td> Seller <br> {{$order->product->merchant->firm_name}} </td>

						<td width="250"> 
							<a href="#" class="btn btn-outline-primary">Track order</a> 

							{{-- <div class="dropdown d-inline-block">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle btn btn-outline-secondary">More</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item">Return</a>
									<a href="#"  class="dropdown-item">Cancel order</a>
								</div>
							</div>  --}}

						</td>
						
					</tr>
				@endforeach
				
		</tbody>
		</table>
	</div> <!-- table-responsive .end// -->
	</article> <!-- card order-item .// -->
	
@endforeach



@endsection