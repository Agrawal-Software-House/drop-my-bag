<div class="modal fade" id="deleteCategoryModal">
  <div class="modal-dialog">
    <form>
      {{csrf_field()}}
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold">Delete Category?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" class="form-control" id="category_id" name="category_id">
        <p>Are you sure you want to delete this category? This will delete all data under this category and cant be undone.</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="$('#loader').show();
                    var data = new FormData(this.form);
                    var id = $('#category_id').val();
                    data.append('_method','DELETE')
                    $.ajax({
                      type: 'post',
                      url: '/admin/category/'+id,
                      data: data,
                      processData: false,
                      contentType: false,
                      dataType: 'json',
                      success: function(data){
                        $('#deleteCategoryModal').modal('hide');
                        successToast('Category Deleted Successfully!!','Category');
                        $('.buttons-reload').trigger('click');
                      },
                      complete: function(data){
                          $('#loader').hide();
                        }
                        ,
                      error: function(xhr, status, data){
                        if(!xhr.responseJSON.errors)
                        {
                          errorToast('Please Contact the support','Techincal issue!');
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