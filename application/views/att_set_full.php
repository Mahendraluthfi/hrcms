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
                  <h3 class="mb-0">Setting Full Time</h3>                
                </div>
                <div class="col-4 text-right">
                  <a href="<?php echo base_url('att_setting'); ?>" class="btn btn-primary"><i class="ni ni-bold-left"></i> Back</a>
                </div>
              </div>
            </div>
            <div class="card-body">
            	<div class="row">
            		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		            	<?php echo form_open('att_setting/full_save'); ?>
		        			<div class="form-group">		        				
		        					<label for="">Start Hours</label>
		        					<div class="row">		        						
		        					<div class="col-md-6 col-lg-6">
										<input type="number" min="0" max="23" class="form-control" name="sh1" placeholder="00" value="<?php echo substr($wh->start_hours, 0,2); ?>">
		        					</div>
		        					<div class="col-md-6 col-lg-6">
										<input type="number" min="00" max="59" class="form-control" name="sh2" placeholder="00" value="<?php echo substr($wh->start_hours, 3,2); ?>">
		        					</div>
		        					</div>
		        				</div>
		        				<div class="form-group">
		        					<label for="">End Hours</label>
		        					<div class="row">		        						
		        					<div class="col-md-6 col-lg-6">
										<input type="number" min="0" max="23" class="form-control" name="eh1" placeholder="00" value="<?php echo substr($wh->end_hours, 0,2); ?>">
		        					</div>
		        					<div class="col-md-6 col-lg-6">
										<input type="number" min="00" max="59" class="form-control" name="eh2" placeholder="00" value="<?php echo substr($wh->end_hours, 3,2); ?>">
		        					</div>
		        				</div>
		        				<div class="form-group">
		        					<label for="">Tolerance Delay</label>
		        					<input type="number" class="form-control" name="tol" min="0" placeholder="minutes" value="<?php echo $wh->tolerance; ?>">
		        				</div>
		        				<div class="col-sm-10 col-sm-offset-2">
		        					<button type="submit" class="btn btn-primary">Save</button>
		        				</div>
		        			</div>
		            	</form>            			            			
            		</div>
            		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">            			
    						  <h3>Work Days</h3>
    						  <?php echo form_open('att_setting/work'); ?>
    						  <?php foreach ($wd as $key) { ?>
    						  <input type="checkbox" name="cb[<?php echo $key->id ?>]" <?php if ($key->status == "1") { echo "checked=''";} ?> value="<?php echo $key->id ?>"> <?php echo $key->day ?><br>
    						  <?php } ?>						   <p></p>
    							<button type="submit" class="btn btn-primary">Save</button>
    						  <?php echo form_close(); ?>						
                </div>
            	</div>
               <div class="row">
                  <div class="col">
                    <div class="pull-right">
                      <button type="button" onclick="add()" class="btn btn-default">Add</button>
                    </div>
                    <div>
                      <h4>Set Holiday</h4>
                    </div>
                     <div class="table-responsive">
                      <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $no=1;
                          foreach ($holiday as $data) { ?>
                            <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?php echo date('d M Y', strtotime($data->date)); ?></td>
                              <td><?php echo $data->information; ?></td>
                              <td>
                                <a href="<?php echo base_url('att_setting/delete/'.$data->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash"></i> Delete</a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>                    
                  </div>                 
                </div>
            </div>            
          </div>
        </div>
        <!-- Column -->
      </div>
      <!-- Akhir Progress Box -->
      <!-- Page visit -->
      
     <div class="modal fade" id="modal_view" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Holiday Date</small></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="" method="post" id="form">
                    <div class="form-group row">
                      <label class="col-sm-3 text-right control-label col-form-label">Date</label>
                      <div class="col-sm-9">
                          <input type="text" name="date" class="form-control mydatepicker" placeholder="Date">    
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 text-right control-label col-form-label">Information</label>
                      <div class="col-sm-9">
                          <textarea class="form-control" name="info" placeholder="Information"></textarea>
                      </div>
                    </div>
                </form>
            </div>
          <div class="modal-footer">     
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

</div>    
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              © 2019 <a href="https://tri-niche.com" class="font-weight-bold ml-1" target="_blank">Tri-Niche Pte Ltd</a>
            </div>
          </div>
        </div>
      </footer>

<script>
  function add() {
    $('#modal_view').modal('show'); // show bootstrap modal when complete loaded                            
  }

   function save(){
      var url;            
      url = "<?php echo site_url('index.php/att_setting/holidate')?>";               
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_view').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }    
</script>