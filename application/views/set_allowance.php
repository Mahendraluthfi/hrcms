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
                  <h3 class="mb-0">Set Allowances</h3>
                </div> 
                <div class="col-4 text-right">
                  <h3 class="text-red"><?php echo $where->position_name ?></h3>
                </div>                          
              </div>
            </div>
            <div class="card-body">
            	<div class="row">
            		<div class="col-sm">   
            		<div class="row">
            			<div class="col-6">
            				<h4>List Allowance</h4>
            			</div>
            			<div class="col-6 text-right">
            			<?php echo form_open('position/save_allocated'); ?>
            				<input type="hidden" name="id" value="<?php echo $where->position_id ?>">
            				<button type="submit" class="btn btn-default btn-sm" disabled="disabled" id="chkout">Add <i class="fas fa-caret-square-o-right"></i></button>
            			</div>
            			</div>         			                    			
			              <div class="table-responsive">
			                <table class="table align-items-center table-flush" id="tb">
			                  <thead class="thead-light">
			                  	<tr>	
			                  		<th width="1%"><input type="checkbox" id="checkAll"></th>		                   
			                        <th>Allowance Name</th>            
			                        <th>Nominal</th>            			                        
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	  <?php foreach ($get_check as $values) { ?>                        
			                        <tr>			                            
			                        	<td><input type="checkbox" class="cb" name="cb[<?php echo $values->id ?>]"></td>
			                            <td><?php echo $values->allowance_name; ?></td>                                    
			                            <td><?php echo number_format($values->allowance_nominal); ?></td>                                    
			                        </tr>
			                            <?php } ?>
			                  </tbody>
			                </table>
			                <?php echo form_close(); ?>
			              </div>
            		</div>
            		<div class="col-sm">            			
            			<h4>List Allocated</h4>
			              <div class="table-responsive">
			                <table class="table align-items-center table-flush">
			                  <thead class="thead-light">
			                  	<tr>			                              
			                        <th>Allowance Name</th>            
			                        <th>Nominal</th>            
			                        <th width="15%">Action</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	  <?php foreach ($get_done as $value) { ?>                        
			                        <tr>			                            
			                            <td><?php echo $value->allowance_name; ?></td>                                    
			                            <td><?php echo number_format($value->allowance_nominal); ?></td>                                    
			                            <td>	                  						
	                  						<a href="<?php echo base_url('position/delete_allocated/'.$value->id_allo.'/'.$where->position_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">Delete</a>
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

<script>
 	$("#checkAll").click(function () {
		$('.cb').prop('checked',$(this).prop('checked'))
	});
	$('#tb').on('click','.cb',function(){
		var ca = true
		$('.cb').each(function(){
			if(!$(this).prop('checked')){
				ca =false
			}
		})
		$("#checkAll").prop('checked',ca)
	})
	var ckbox = $('.cb');
      $('input').on('click',function () {
          if (ckbox.is(':checked')) {
            $('#chkout').removeAttr('disabled');
          } else {
            $('#chkout').attr('disabled','disabled');              
            //alert('You Un-Checked it');
          }
      });
</script>