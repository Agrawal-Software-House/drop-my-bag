@extends('admin.app')

@section('main-content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category - Edit</h1>
          </div>
          <div class="col-sm-6 text-right">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        {!! Form::model($category, [
          'route' => ['admin.category.update', $category],
          'method' => 'PATCH',
          'files' => true,
          ]) !!}
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-body">
                <div class="form-group">
                  {!! Form::label('name', 'Category Name') !!}
                  {!! Form::text('name', null, ['class' => 'form-control form-control-border', 'placeholder' => 'Enter Category Name']) !!}
                  @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="image">Category Image</label>
                  <input type="file" class="dropify" name="image" id="image" data-default-file="{{Storage::url($category->image)}}" />
                  @error('image')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  {!! Form::label('active', 'Active') !!}
                  <input type="checkbox" name="active" @if ($category->active == 1)
                    checked 
                  @endif data-bootstrap-switch>

                  @error('active')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                {!! Form::submit('Update',['class'=> 'btn btn-success']) !!}
               
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