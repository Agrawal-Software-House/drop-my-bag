@push('custom-scripts')
<script>
  function showDeleteModal(id)
  {
    $("#product_id").val(id);
    $("#deleteProductModal").modal('show');
  }
</script>
@endpush

<div class="modal fade" id="deleteProductModal">
  <div class="modal-dialog">
    <form>
      {{csrf_field()}}
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold">Delete Product?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" class="form-control" id="product_id" name="product_id">
        <p>Are you sure you want to delete this product? This cant be undone.</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="$('#loader').show();
                    var data = new FormData(this.form);
                    var id = $('#product_id').val();
                    data.append('_method','DELETE')
                    $.ajax({
                      type: 'post',
                      url: '/admin/product/'+id,
                      data: data,
                      processData: false,
                      contentType: false,
                      dataType: 'json',
                      success: function(data){
                        $('#deleteProductModal').modal('hide');
                        successToast('Product Deleted succesfully!','Product');
                        $('.buttons-reload').trigger('click');
                      },
                      complete: function(data){
                        $('#loader').hide();
                      },
                      error: function(xhr, status, data)
                      {
                        if(!xhr.responseJSON.errors)
                        {
                          !xhr.responseJSON.errors ?? errorToast('Technical issue! please contact support','Product');
                        }
                      }
                      
                    });
                    e.preventDefault();">Delete</button>
      </div>
    </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->