@extends('admin.app')

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
          <div class="col-md-5">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-body">

                <form method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control form-control-border" id="name" name="name" placeholder="Enter Name" value="{{$admin->name}}">
                    <div class="text-danger" id="error_name"></div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control form-control-border" id="email" name="email" placeholder="Enter email" value="{{$admin->email}}">
                    <div class="text-danger" id="error_email"></div>
                  </div>

                  <div class="form-group">
                    <label for="profile_image">Profile Pic</label>
                    <input type="file" class="dropify" / name="profile_image" id="profile_image" data-default-file="{{Storage::url($admin->profile_image)}}">

                    <div class="text-danger" id="error_profile_image"></div>
                  </div>

                  <button type="button" class="btn btn-success" onclick="
                    var data = new FormData(this.form);
                    $.ajax({
                      type: 'POST',
                      url: '{{ route('admin.setting.my-profile.update') }}',
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