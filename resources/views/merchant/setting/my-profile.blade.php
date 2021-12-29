@extends('merchant.app')

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting - My-profile</h1>
          </div>
          <div class="col-sm-6 text-right">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Setting - My Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-body">

                <form method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firm_name">Firm Name</label>
                        <input type="text" class="form-control form-control-border" id="firm_name" name="firm_name" placeholder="Enter Name" value="{{$merchant->firm_name}}">
                        <div class="text-danger" id="error_firm_name"></div>
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control form-control-border" id="name" name="name" placeholder="Enter Name" value="{{$merchant->name}}">
                        <div class="text-danger" id="error_name"></div>
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control form-control-border" id="email" name="email" placeholder="Enter email" disabled readonly value="{{$merchant->email}}">
                        <div class="text-danger" id="error_email"></div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control form-control-border" id="phone_number" name="phone_number" disabled="" readonly="" placeholder="Enter Name" value="{{$merchant->phone_number}}">
                        <div class="text-danger" id="error_phone_number"></div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="gst">GST</label>
                        <input type="text" class="form-control form-control-border" id="gst" name="gst" placeholder="Enter Name" value="{{$merchant->gst}}">
                        <div class="text-danger" id="error_gst"></div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control form-control-border" id="address" name="address" placeholder="Enter Name" value="{{$merchant->address}}">
                        <div class="text-danger" id="error_address"></div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="pincode">Pincode</label>
                        <input type="text" class="form-control form-control-border" id="pincode" name="pincode" placeholder="Enter Name" value="{{$merchant->pincode}}">
                        <div class="text-danger" id="error_pincode"></div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="business_type">Business Type</label>
                        <input type="text" class="form-control form-control-border" id="business_type" name="business_type" placeholder="Enter Name" value="{{$merchant->business_type}}">
                        <div class="text-danger" id="error_business_type"></div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="avtar">Profile Pic</label>
                        <input type="file" class="dropify" / name="avtar" id="avtar" data-default-file="{{Storage::url($merchant->avtar)}}">

                        <div class="text-danger" id="error_avtar"></div>
                      </div>
                    </div>

                  </div>
                  

                  <button type="button" class="btn btn-success" onclick="
                    var data = new FormData(this.form);
                    $.ajax({
                      type: 'POST',
                      url: '{{ route('merchant.setting.my-profile.update') }}',
                      data: data,
                      processData: false,
                      contentType: false,
                      dataType: 'json',
                      success: function(data){
                        successToast(data.message);
                        location.reload();
                      },

                      complete: function(data){

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
                    e.preventDefault();">Save</button>
                </form>
             
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection