@extends('admin.app')

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category - Create</h1>
          </div>
          <div class="col-sm-6 text-right">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></li>
              <li class="breadcrumb-item active">Create</li>
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
                  <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control form-control-border" id="name" name="name" placeholder="Enter Category Name">
                    <div class="text-danger" id="error_name"></div>
                  </div>

                  <div class="form-group">
                    <label for="image">Category Image</label>
                    <input type="file" class="dropify" / name="image" id="image">
                    <div class="text-danger" id="error_image"></div>
                  </div>

                  <div class="form-group">
                    <label for="active">Active</label>
                    <input type="checkbox" checked data-bootstrap-switch name="active" id="active" value="1">
                  </div>

                  <button type="button" class="btn btn-success" onclick="

                    $('#loader').show();
                    var data = new FormData(this.form);
                    $.ajax({
                      type: 'POST',
                      url: '{{ route('admin.category.store') }}',
                      data: data,
                      processData: false,
                      contentType: false,
                      dataType: 'json',
                      success: function(response){
                        successToast('Category Added Successfully!!','Category');
                        window.location.replace('/admin/category');
                      },
                      complete: function(response){
                          $('#loader').hide();
                        }
                        ,
                      error: function(xhr, status, data){
                        if(xhr.responseJSON.errors.name)
                        {
                          $('#error_name').text(xhr.responseJSON.errors.name);
                        }
                        else
                        {
                          $('#error_name').text('');
                        }

                        if(xhr.responseJSON.errors.image)
                        {
                          $('#error_image').text(xhr.responseJSON.errors.image);
                        }
                        else
                        {
                          $('#error_image').text('');
                        }

                        if(!xhr.responseJSON.errors)
                        {
                          errorToast('Category', 'Techincal issue, contact your admin!');
                        }
                        else
                        {
                          errorToast('Please Fill all required fields','Validation Error!!');
                        }
                        }
                      
                    });
                    e.preventDefault();">Create</button>
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