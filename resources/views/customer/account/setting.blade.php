@extends('customer.account.app')


@section('profile-content')
<div class="card">
  <div class="card-body">
 <form class="row">
 	<div class="col-md-9">
 		<div class="form-row">

			<div class="col-md-6 form-group">
				<label>First Name</label>
			  	<input type="text" class="form-control" value="{{$user->first_name}}">
			</div> <!-- form-group end.// -->


			<div class="col-md-6 form-group">
				<label>Last Name</label>
			  	<input type="text" class="form-control" value="{{$user->last_name}}">
			</div> <!-- form-group end.// -->


			<div class="col-md-6 form-group">
				<label>Email</label>
			  	<input type="email" class="form-control" value="{{$user->email}}">
			</div>
			 <!-- form-group end.// -->

			<!-- <div class="form-group col-md-6">
			  <label>Phone</label>
			  <input type="text" class="form-control" value="{{$user->phone_number}}">
			</div>  -->
			<!-- form-group end.// -->

		</div> <!-- form-row.// -->
		
		<div class="form-row">

			<div class="form-group col-md-6">
			  <label>City</label>
			  <input type="text" class="form-control" value="{{$user->city}}">
			</div> <!-- form-group end.// -->

			<div class="form-group col-md-6">
			  <label>State</label>
			  <select id="inputState" class="form-control">
				  <option selected value="">--- Select State ---</option>
				  @foreach($states as $state)
			      	<option value="{{$state->id}}">{{$state->name}}</option>
				  @endforeach
			  </select>
			</div> <!-- form-group end.// -->

			<div class="form-group col-md-6">
			  <label>Zip</label>
			  <input type="text" class="form-control" value="{{$user->zip}}">
			</div> <!-- form-group end.// -->

			
		</div> <!-- form-row.// -->


		<button class="btn btn-primary">Save</button>	
		<button class="btn btn-light">Change password</button>	

		<br><br><br><br><br><br>

 	</div> <!-- col.// -->
 	<div class="col-md">
 		<img src="images/avatars/avatar1.jpg" class="img-md rounded-circle border">
 	</div>  <!-- col.// -->
  </form>
  </div> <!-- card-body.// -->
</div> <!-- card .// -->
@endsection