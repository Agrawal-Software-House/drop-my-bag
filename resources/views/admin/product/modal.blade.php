@push('custom-scripts')
<script>
  function showApproveModal(id)
  {
    var data = new FormData(this.form);
    data.append('_token',"{{csrf_token()}}");
    data.append('id',id)
    $.ajax({
      url: '/admin/product/'+id,
      type: 'GET',
      processData: false,
      contentType: false,
      dataType: 'json',
      data: data,
    })
    .done(function(data) {
      if(window.location.pathname == '/admin/product/disapproved')
      {
        $("#disapproveModalBtn").hide();
        $("#showProductModal .modal-title").text('Approve Product?')
      }
      $("#showData").html(data.view);
      $("#product_id").val(id);
      $("#showProductModal").modal('show');
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  }

  function approveProduct(id)
  {
    $("#approve_id").val(id);
    $("#approveProductModal").modal('show');
  }

  function disapproveProduct(id)
  {
    $("#disapprove_id").val(id);
    $("#disApproveProductModal").modal('show');
  }
</script>
@endpush

<div class="modal fade" id="showProductModal">
  <div class="modal-dialog modal-lg">
    <form>
      {{csrf_field()}}
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold">Approve/Disapprove Product?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button id="disapproveModalBtn" type="button" class="btn btn-danger" onclick="
        var id = $('#product_id').val();
        disapproveProduct(id);
        "
        >Disapprove</button>

        <button type="button" class="btn btn-success" onclick="
        var id = $('#product_id').val();
        approveProduct(id);
        "
        >Approve</button>
      </div>

      <div class="modal-body">
        <input type="hidden" class="form-control" id="product_id" name="product_id">

        <div id="showData">
        </div>

      </div>
      
    </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="approveProductModal">
  <div class="modal-dialog">
    <form>
      {{csrf_field()}}
      {{ method_field('PUT') }}
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold">Approve Product?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <input type="hidden" class="form-control" id="approve_id" name="approve_id">
        <p>Are you sure wanna approve this product?</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button type="button" class="btn btn-success" onclick="
          $('#loader').show();
          var data = new FormData(this.form);
          var id = $('#approve_id').val();
          data.append('query','approve_product');
          $.ajax({
            type: 'POST',
            url: '/admin/product/'+ id,
            data: data,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data){
              $('.modal').modal('hide');
              successToast('Product approved successfully!','Product');
              $('.buttons-reload').trigger('click');
            },
            complete: function(data){

            },
            error: function(xhr, status, data){
              !xhr.responseJSON.errors ?? errorToast('Technical issue! please contact support','Product');
            }
            
          });
          e.preventDefault();
        ">Approve</button>
      </div>
      
    </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<div class="modal fade" id="disApproveProductModal">
  <div class="modal-dialog">
    <form>
      {{csrf_field()}}
      {{ method_field('PUT') }}
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold">Disapprove Product?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <input type="hidden" class="form-control" id="disapprove_id" name="disapprove_id">
        <p>Are you sure wanna disapprove this product?</p>

        <div class="form-group">
          <label for="note">Put a note</label>
          <textarea class="form-control" id="note" name="note" rows="4"></textarea>
          <span class="error text-danger" id="error_note"></span>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button type="button" class="btn btn-success" onclick="
          $('#loader').show();
          var data = new FormData(this.form);
          var id = $('#disapprove_id').val();
          data.append('query','disapprove_product');
          $.ajax({
            type: 'POST',
            url: '/admin/product/'+ id,
            data: data,
            processData: false,
            contentType: false,
            dataType: 'json',

            success: function(data){
              $('.modal').modal('hide');
              successToast('Product disapproved successfully!','Product');
              $('.buttons-reload').trigger('click');
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

              !xhr.responseJSON.errors ?? errorToast('Technical issue! please contact support','Product');
            }
            
          });
          e.preventDefault();
        ">Approve</button>
      </div>
      
    </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->