<div class="header bg-gradient-success pb-5 pt-5 pt-md-8">
  <div class="container">
    <div class="header-body"></div>
  </div>
</div>

 <div class="container-fluid mt--6">
      <div class="row">
        <!-- Column -->
        <div class="col-12">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Reimbursment</h3>
                </div> 
                <div class="col-4 text-right">
                  <button type="button" class="btn btn-primary btn-sm" onclick="add()">Add New</button>
                </div>                  
              </div>
            </div>
            <div class="card-body">
            	
              <div class="table-responsive">
                <table class="table align-items-center table-flush" id="datatable-basic">
                  <thead class="thead-light">
                  	<tr>
                        <th width="1%">No</th>                        
                        <th>Date</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Cost</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	  <?php $i =1;  foreach ($values as $value) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>                            
                            <td><?php echo $value->date; ?></td>
                            <td><?php echo $value->category ?></td>
                            <td><?php echo $value->description; ?></td>
                            <td><?php echo number_format($value->cost); ?></td>
                            <td><?php if ($value->sts == 0) {
                              echo "PROCESS"; }elseif($value->sts == 1){ echo "APPROVED"; }else{ echo "REJECTED"; } ?></td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_view" onclick="view('<?php echo $value->id_reimbursment; ?>')">Detail</button>        
                                <?php if ($value->sts == 0): ?>
                                <a href="<?php echo base_url('reimbursment_emp/delete/'.$value->id_reimbursment.'/'.$value->foto) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">Delete</a>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php $i++; } ?>
                  </tbody>
                </table>
              </div>
            
            </div>            
          </div>
        </div>
        <!-- Column -->
      </div>
      <!-- Akhir Progress Box -->
      

      <!-- Page visit -->
      
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              © 2019 <a href="https://tri-niche.com" class="font-weight-bold ml-1" target="_blank">Tri-Niche Pte
                Ltd</a>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <div class="modal fade" id="modal_form" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Request New Leave</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <?php echo form_open_multipart('reimbursment_emp/save', array('class' => 'form-horizontal', 'id' => 'form')); ?>                  
                     <div class="form-group row">
                        <label class="control-label col-md-3">Date</label>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <input type="text" name="date" class="form-control" placeholder="Date" id="datepicker-autoclose">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Description</label>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <textarea name="description" class="form-control" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Category</label>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <select name="ctg" class="form-control">
                            <?php foreach ($ctg as $key) { ?>
                              <option value="<?php echo $key->id ?>"><?php echo $key->category ?></option>
                            <?php } ?>                             
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Cost</label>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <input type="number" name="cost" class="form-control" placeholder="Cost" min="0">
                        </div>
                    </div>
                    <div class="form-group row" id="attachment">
                        <label class="control-label col-md-3">Attachment</label>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <input type="file" name="foto" accept="image/*">
                        </div>
                    </div>                                                        
          </div>
          <div class="modal-footer"> 
            <button type="submit" class="btn btn-primary">Save</button>            
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal_view" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">View</small></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <div class="form-group row">
                        <label class="control-label col-md-4">Date</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="date"></p> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Description</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="description"></p>                             
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Category</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="ctg"></p>                             
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Cost</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="cost"></p>                             
                        </div>
                    </div>
                    <div class="form-group row" id="img" style="display: none;">
                        <label class="control-label col-md-4">Attachment</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <img src="" alt="" width="150" id="att">
                        </div>
                    </div>                    
                    <div class="form-group row">
                        <label class="control-label col-md-4">Status</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="status"></p>                             
                        </div>
                    </div>
                </form>
          </div>
          <div class="modal-footer">                     
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
 <!-- Modal -->

    <div class="modal fade bs-example-modal-lg" id="view_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header"></div> -->
      <div class="modal-body text-center">
          <img src="" alt="" height="600" id="view_att">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>

    <script>
      var save_method;
      var url;
      var at;
    
      function add()
      {
        save_method = 'add';      
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal      
      }

       function view(id){                
        $.ajax({
        url : "<?php echo site_url('index.php/reimbursment_emp/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
            if (data.status == "0") {
                status = "PROCESS";
            }else{
                status = "APPROVED";
            }
            if (data.foto !== "") {
                $('#att').attr("src","files/attachment/"+data.foto); 
                $('#view_att').attr("src","files/attachment/"+data.foto)
                $('#img').show();
            }                      
            $('#date').text(data.date);
            $('#ctg').text(data.category);
            $('#description').text(data.description);
            $('#cost').text(data.cost);                        
            $('#status').text(status);
            $('#modal_view').modal('show'); // show bootstrap modal when complete loaded                        
        },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });           
    }

    $('#att').on('click', function(){
      $('#view_image').modal('show');
    })
    </script>