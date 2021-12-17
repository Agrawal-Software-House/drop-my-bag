@extends('customer.account.app')


@section('profile-content')
<form>
    @csrf
    <h2>Edit Address</h2>
    <article class="box mb-4">
        <div class="row mb-3">
            <div class="col-xl-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$customer_address->name}}">
                    <span class="text-danger" id="error_name"></span>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="form-group">
                    <label for="phone_number">Mobile Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{$customer_address->phone_number}}">
                    <span class="text-danger" id="error_phone_number"></span>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="form-group">
                    <label for="address">Address(Area and street)</label>
                    <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{$customer_address->address}}
                    </textarea>
                    <span class="text-danger" id="error_address"></span>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label for="city">City/District/Town</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{$customer_address->city}}">
                    <span class="text-danger" id="error_city"></span>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label for="state">State</label>
                    <select class="form-control" name="state" id="state">
                        <option value="" disabled="">--Select State--</option>
                        <option value="Andaman &amp; Nicobar Islands">Andaman &amp; Nicobar Islands</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadra &amp; Nagar Haveli &amp; Daman &amp; Diu">Dadra &amp; Nagar Haveli &amp; Daman &amp; Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu &amp; Kashmir">Jammu &amp; Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Ladakh">Ladakh</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Madhya Pradesh" selected>Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                    <span class="text-danger" id="error_state"></span>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label for="zip">Zip Code</label>
                    <input type="text" class="form-control" id="zip" name="zip" value="{{$customer_address->zip}}">
                    <span class="text-danger" id="error_zip"></span>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label for="landmark">Landmark (optional)</label>
                    <input type="text" class="form-control" id="landmark" name="landmark" value="{{$customer_address->landmark}}">
                    <span class="text-danger" id="error_landmark"></span>
                </div>
            </div>

            <div class="col-xl-6">
                <label class="float-left custom-control custom-checkbox"> 
                    <input type="checkbox" name="active" class="custom-control-input" 

                    {{$customer_address->active ? 'checked' : ''}}
                    
                    > 
                    <div class="custom-control-label"> Make Default Address </div> 
                </label>
            </div>
        </div>

        <button type="button" class="btn btn-success" onclick="

                    var data = new FormData(this.form);
                    data.append('_method','PUT');

                    $.ajax({
                      type: 'POST',
                      url: '{{ route('customer.my-address.update', $customer_address->id) }}',
                      data: data,
                      processData: false,
                      contentType: false,
                      dataType: 'json',
                      success: function(data){
                        successToast(data.message);
                        window.location.replace('{{ route('customer.my-address.index') }}');
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

                            xhr.responseJSON.errors ? errorToast('Validation Error!','Address')  : errorToast('Technical Error!');
                        }
                    });

                    e.preventDefault();

        ">Save</button>


        <a href="{{ route('customer.my-address.index') }}" class="btn btn-danger">Cancel</a>
    </article>
</form>

@endsection

