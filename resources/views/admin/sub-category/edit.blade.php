@extends('admin.app')

@section('main-content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subcategory - Edit</h1>
          </div>
          <div class="col-sm-6 text-right">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.sub-category.index') }}">Sub Category</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        {!! Form::model($subCategory, [
          'route' => ['admin.category.update', $subCategory],
          'method' => 'PATCH',
          ]) !!}
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-body">
                  <div class="form-group">
                    {!! Form::label('name', 'Sub Category Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control form-control-border', 'placeholder' => 'Enter Sub Category Name']) !!}
                    <span class="error text-danger" id="error_name"></span>
                  </div>

                  <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control form-control-border">
                      <option value="">Select</option>
                      @foreach (commanHelper::GET_ALL_CATEGORY() as $category)

                          <option value="{{$category->id}}"
                            @if ($category->id == $subCategory->category_id)
                              selected
                            @endif 
                            >{{$category->name}}</option>
                      @endforeach
                    </select>
                    <span class="error text-danger" id="error_category"></span>
                  </div>

                  <div class="form-group">
                    <label for="gst">Tax or Gst (In %)</label>
                    <input type="text" class="form-control form-control-border" name="gst" id="gst" placeholder="Enter Gst" value="{{$subCategory->gst}}">
                    <span class="error text-danger" id="error_gst"></span>
                  </div>

                  <div class="form-group">
                    {!! Form::label('active', 'Active') !!}
                    <input type="checkbox" name="active" @if ($subCategory->active == 1)
                      checked 
                    @endif data-bootstrap-switch>

                    @error('active')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <button type="button" class="btn btn-success" onclick="

                    var data = new FormData(this.form);
                    $.ajax({
                      type: 'POST',
                      url: '/admin/sub-category/'+{{$subCategory->id}},
                      data: data,
                      processData: false,
                      contentType: false,
                      dataType: 'json',
                      success: function(data){
                        successToast(data.message)
                        window.location.replace('/admin/sub-category');
                      },

                      complete: function(response){

                      },
                      
                      error: function(xhr, status, data)
                      {
                        var errors = xhr.responseJSON.errors;
                        $('.error').text('');
                        $('.text-danger').text('');
                        for (const [key, value] of Object.entries(errors)) {
                          $('#error_'+key).text(value);
                        }
                        
                        !xhr.responseJSON.errors ? errorToast('Technical issue!') : errorToast('Validation Error!');
                      }
                      
                    });
                    e.preventDefault();">Update</button>
               
                 
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
          </div>
          <!-- /.row -->
         {!! Form::close() !!}
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection