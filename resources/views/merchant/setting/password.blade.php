@extends('merchant.app')

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting - Change Password</h1>
          </div>
          <div class="col-sm-6 text-right">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Setting - Change Password</li>
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
          <div class="col-md-5">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-body">

                <form method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control form-control-border" id="password" name="password" placeholder="Enter Password">
                    <div class="text-danger" id="error_password"></div>
                  </div>

                  <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control form-control-border" id="password_confirmation" name="password_confirmation" placeholder="Enter Password Again">
                    <div class="text-danger" id="error_password_confirmation"></div>
                  </div>

                  <button type="button" class="btn btn-success" onclick="

                    var data = new FormData(this.form);

                    $.ajax({
                      type: 'POST',
                      url: '{{ route('merchant.setting.password.update') }}',
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

                      error: function(xhr, status, data){

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