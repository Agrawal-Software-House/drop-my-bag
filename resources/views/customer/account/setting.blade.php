@extends('customer.account.app')


@section('profile-content')
<div class="card">
  <div class="card-body">
 	<form class="row">
		 @csrf
		<div class="col-md-9">
			<div class="form-row">

				<div class="col-md-6 form-group">
					<label>First Name</label>
					<input type="text" class="form-control" value="{{$user->first_name}}" name="first_name" id="first_name">
					<span class="text-danger" id="error_first_name"></span>
				</div> <!-- form-group end.// -->


				<div class="col-md-6 form-group">
					<label>Last Name</label>
					<input type="text" class="form-control" value="{{$user->last_name}}" name="last_name" id="last_name">
					<span class="text-danger" id="error_last_name"></span>
				</div> <!-- form-group end.// -->


				<div class="col-md-6 form-group">
					<label>Email</label>
					<input type="email" class="form-control" value="{{$user->email}}" name="email" id="email">
					<span class="text-danger" id="error_email"></span>
				</div>
				<!-- form-group end.// -->

				<div class="form-group col-md-6">
					<label>Phone</label>
					<input type="text" class="form-control" value="{{$user->phone_number}}" name="phone_number" id="phone_number">
					<span class="text-danger" id="error_phone_number"></span>
				</div> 
				<!-- form-group end.// -->

			</div> <!-- form-row.// -->
			
			<div class="form-row">

				<div class="form-group col-md-6">
					<label>City</label>
					<input type="text" class="form-control" value="{{$user->city}}" name="city" id="city">
					<span class="text-danger" id="error_city"></span>
				</div> <!-- form-group end.// -->

				<div class="form-group col-md-6">
					<label>State</label>
					<select id="state" class="form-control" name="state">
						<option value="">--- Select State ---</option>
						@foreach($states as $state)
							@if($state->id == $user->state_id)
								<option selected value="{{$state->id}}">{{$state->name}}</option>
							@else
								<option value="{{$state->id}}">{{$state->name}}</option>
							@endif
							
						@endforeach
					</select>
					<span class="text-danger" id="error_state"></span>
				</div> <!-- form-group end.// -->

				<div class="form-group col-md-6">
					<label>Zip</label>
					<input type="text" class="form-control" value="{{$user->zip}}" name="zip" id="zip">
					<span class="text-danger" id="error_zip"></span>
				</div> <!-- form-group end.// -->

				
			</div> <!-- form-row.// -->


			<button type="button" class="btn btn-primary" onclick="

					var data = new FormData(this.form);
                    $.ajax({
                      type: 'POST',
                      url: '{{ route('single_user.update', $user->id) }}',
                      data: data,
                      processData: false,
                      contentType: false,
                      dataType: 'json',
                      success: function(data){
                        successToast(data.message);
                        // window.location.replace('{{ route('customer.my-address.index') }}');
                      },

                      complete: function(response){
                    
                      },

                      error: function(xhr, status, data){
                            var errors = xhr.responseJSON.errors;
                            $('.error').text('');
                            $('.text-danger').text('');
                            for (const [key, value] of Object.entries(errors)) {
                              $('#error_'+key).text(value);
                            }

                            xhr.responseJSON.errors ? errorToast('Validation Error!','User')  : errorToast('Technical Error!');
                        }
                    });

                    e.preventDefault();
			
			
			">Save</button>	
			<button class="btn btn-light">Change password</button>	

			<br><br><br><br><br><br>

		</div> <!-- col.// -->
		<div class="col-md">
			<img src="images/avatars/avatar1.jpg" class="img-md rounded-circle border">
		</div>  <!-- col.// -->
  	</form>
  </div> <!-- card-body.// -->
</div> 
@endsection