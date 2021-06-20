@extends('merchant.app')

@push('custom-scripts')

<script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
<script type="text/javascript">
  var editor = CKEDITOR.replace('specification');
</script>

@endpush



@section('main-content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product - Edit</h1>
          </div>
          <div class="col-sm-6 text-right">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('merchant.home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('merchant.product.approved') }}">Product</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
                  {{ method_field('PUT') }}
                  <div class="row">
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control form-control-border" id="product_name" name="product_name" placeholder="Enter Product name" value="{{$product->product_name}}">
                        <div class="text-danger" id="error_product_name"></div>
                      </div>
                    </div>

                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control form-control-border">
                          <option value="">Select Category</option>
                          @foreach (commanHelper::GET_ALL_CATEGORY() as $category)
                            <option value="{{$category->id}}"
                              @if ($category->id == $product->category->id)
                                selected 
                              @endif
                              >{{$category->name}}</option>
                          @endforeach
                        </select>
                        <div class="text-danger" id="error_category"></div>
                      </div>
                    </div>

                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="sub_category">Sub Category</label>
                        <select name="sub_category" id="sub_category" class="form-control form-control-border">
                          <option value="">Select Subcategory</option>
                          @foreach (commanHelper::GET_ALL_SUB_CATEGORY() as $subcategory)
                            <option value="{{$subcategory->id}}"

                              @if ($subcategory->id == $product->subCategory->id)
                                selected 
                              @endif

                              >{{$subcategory->name}}</option>
                          @endforeach
                        </select>
                        <div class="text-danger" id="error_sub_category"></div>
                      </div>
                    </div>

                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="brand_name">Brand Name</label>
                        <input type="text" class="form-control form-control-border" id="brand_name" name="brand_name" placeholder="Enter Brand Name" value="{{$product->brand_name}}">
                        <div class="text-danger" id="error_brand_name"></div>
                      </div>
                    </div>

                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="mrp_price">MRP Price</label>
                        <input type="number" class="form-control form-control-border" id="mrp_price" name="mrp_price" placeholder="Enter MRP Price" value="{{$product->mrp_price}}">
                        <div class="text-danger" id="error_mrp_price"></div>
                      </div>
                    </div>

                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="selling_price">Selling Price</label>
                        <input type="number" class="form-control form-control-border" id="selling_price" name="selling_price" placeholder="Enter Selling Price" value="{{$product->selling_price}}">
                        <div class="text-danger" id="error_selling_price"></div>
                      </div>
                    </div>

                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="piece">Piece</label>
                        <input type="number" class="form-control form-control-border" id="piece" name="piece" placeholder="Enter Piece" value="{{$product->piece}}">
                        <div class="text-danger" id="error_piece"></div>
                      </div>
                    </div>

                    <div class="col-xl-6">
                      <div class="form-group mt-lg-4">
                        <label for="returnable">Returnable</label>
                        <input type="checkbox" id="returnable" name="returnable" data-bootstrap-switch value="1" 
                        @if ($product->returnable == 1)
                          checked 
                        @endif>
                      </div>
                    </div>

                    <div class="col-xl-12">
                      <div class="form-group">
                        <label for="specification">Specification</label>
                        <textarea id="specification" name="specification" cols="30" rows="10" class="form-control">{{$product->specification}}</textarea>
                        <div class="text-danger" id="error_specification"></div>
                      </div>
                    </div>

                    <div class="col-xl-12">
                      <div class="form-group">
                        <label for="product_image">Product Image</label>
                        <input type="file" class="dropify" / name="product_image" id="product_image"
                        @if ($product->product_image)
                          data-default-file="/storage/{{$product->product_image}}"
                        @endif >
                        <div class="text-danger" id="error_product_image"></div>
                      </div>
                    </div>
                  </div>


                  <button type="button" class="btn btn-success" onclick="

                    $('#loader').show();
                    var data = new FormData(this.form);
                    var specification = editor.getData();
                    data.append('specification',specification);
                    $.ajax({
                      type: 'POST',
                      url: '/merchant/product/'+{{$product->id}},
                      data: data,
                      processData: false,
                      contentType: false,
                      dataType: 'json',
                      success: function(response){
                        window.location.replace('/merchant/product/pending');
                      },
                      complete: function(response){
                          $('#loader').hide();
                        }
                        ,
                      error: function(xhr, status, data){
                          var errors = xhr.responseJSON.errors;
                          $('.error').text('');
                          $('.text-danger').text('');
                          for (const [key, value] of Object.entries(errors)) {
                            $('#error_'+key).text(value);
                          }

                            if(!xhr.responseJSON.errors)
                            {
                              alert('Can not Update Data!! Please Contact Your Developer');
                            }
                        }
                      
                    });
                    e.preventDefault();">Update</button>
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