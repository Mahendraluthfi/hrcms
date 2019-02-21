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
		            	<?php echo form_open('att_setting/part_save'); ?>
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
    						  <?php echo form_open('att_setting/work_part'); ?>
    						  <?php foreach ($wd as $key) { ?>
    						  <input type="checkbox" name="cb[<?php echo $key->id ?>]" <?php if ($key->status == "1") { echo "checked=''";} ?> value="<?php echo $key->id ?>"> <?php echo $key->day ?><br>
    						  <?php } ?>						   <p></p>
    							<button type="submit" class="btn btn-primary">Save</button>
    						  <?php echo form_close(); ?>						
                </div>
            	</div>
              <div class="row">
                <div class="col-md-12 col-lg-12">
                    
                </div>
              </div>
            </div>            
          </div>
        </div>
        <!-- Column -->
      </div>
      <!-- Akhir Progress Box -->
      <!-- Page visit -->
      
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