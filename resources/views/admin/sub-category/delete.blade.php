<div class="modal fade" id="deleteSubCategoryModal">
  <div class="modal-dialog">
    <form>
      {{csrf_field()}}
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold">Delete Sub Category?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" class="form-control" id="sub_category_id" name="sub_category_id">
        <p>Are you sure you want to delete this sub category? This will delete all data under this sub category and cant be undone.</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="$('#loader').show();
                    var data = new FormData(this.form);
                    var id = $('#sub_category_id').val();
                    data.append('_method','DELETE')
                    $.ajax({
                      type: 'post',
                      url: '/admin/sub-category/'+id,
                      data: data,
                      processData: false,
                      contentType: false,
                      dataType: 'json',
                      success: function(data){
                        $('#deleteSubCategoryModal').modal('hide');
                        successToast('Deleted Successfully!', 'Sub Category');
                        $('.buttons-reload').trigger('click');
                      },
                      complete: function(data){
                          $('#loader').hide();
                        }
                        ,
                      error: function(xhr, status, data){
                        if(!xhr.responseJSON.errors)
                        {
                          errorToast('Please contact your support!', 'Techincal issue!');
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