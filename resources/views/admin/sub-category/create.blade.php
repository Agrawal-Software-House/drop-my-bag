@extends('admin.app')

@section('main-content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subcategory - Create</h1>
          </div>
          <div class="col-sm-6 text-right">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.sub-category.index') }}">Sub Category</a></li>
              <li class="breadcrumb-item active">Create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form>
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-6">
              <div class="card card-primary">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Sub Category Name</label>
                    <input type="text" class="form-control form-control-border" name="name" id="name" placeholder="Enter Sub Category Name">
                    <span class="error text-danger" id="error_name"></span>
                  </div>

                  <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control form-control-border">
                      <option value="">Select</option>
                      @foreach (commanHelper::GET_ALL_CATEGORY() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                    <span class="error text-danger" id="error_category"></span>
                  </div>

                  <div class="form-group">
                    <label for="active">Active</label>
                    <input type="checkbox" id="active" name="active" data-bootstrap-switch value="1">
                  </div>

                  <button type="button" class="btn btn-success" onclick="

                    $('#loader').show();
                    var data = new FormData(this.form);
                    $.ajax({
                      type: 'POST',
                      url: '{{ route('admin.sub-category.store') }}',
                      data: data,
                      processData: false,
                      contentType: false,
                      dataType: 'json',
                      success: function(response){
                        successToast('Added Successfull!!','Sub Category');
                        window.location.replace('/admin/sub-category');
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

                        if(xhr.responseJSON.errors.category)
                        {
                          $('#error_category').text(xhr.responseJSON.errors.category);
                        }
                        else
                        {
                          $('#error_category').text('');
                        }

                        if(!xhr.responseJSON.errors)
                        {
                          errorToast('Please Contact the support','Techincal issue');
                        }
                        else
                        {

                          errorToast('Please Fill all required fields!','Validation Error');
                        }
                        }
                      
                    });
                    e.preventDefault();">Create</button>
               
                 
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
            <!--/.col (left) -->
           
          </div>
          <!-- /.row -->
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection