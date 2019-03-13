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
                  <h3 class="mb-0">Add New User</h3>
                </div> 
                <div class="col-4 text-right">
                  <a href="<?php echo base_url('setting') ?>" class="btn btn-primary btn-sm">Back</a>
                </div>                  
              </div>
            </div>
            <div class="card-body">
            	<div class="row">
            		<div class="col-6">
            			<form id="add">
			                <div class="form-group row">
			                  <label class="col-sm-4 text-right control-label col-form-label">Username</label>
			                  <div class="col-sm-8">
			                      <input type="text" name="allowance" class="form-control" placeholder="Allowance Name">               
			                  </div>
			                </div>    
			                 <div class="form-group row">
			                  <label class="col-sm-4 text-right control-label col-form-label">Name</label>
			                  <div class="col-sm-8">
			                      <input type="number" name="nominal" class="form-control" placeholder="Nominal" min="0">               
			                  </div>
			                </div>                                                                                 
			                <div class="form-group row">
			                  <label class="col-sm-4 text-right control-label col-form-label">Password</label>
			                  <div class="col-sm-8">
			                      <input type="number" name="nominal" class="form-control" placeholder="Password" min="0">               
			                  </div>
			                </div>                                                                                 
			                <div class="form-group row">
			                  <label class="col-sm-4 text-right control-label col-form-label">Retype Password</label>
			                  <div class="col-sm-8">
			                      <input type="number" name="nominal" class="form-control" placeholder="Password" min="0">               
			                  </div>
			                </div>                                                                                 
			              </form>    
            		</div>
            		<div class="col-6">  
            		<h4>Permissions Modul</h4> 
            		<?php echo form_open('setting/save'); ?>         			
            			<?php foreach ($role as $key) { ?>            				
						<div class="custom-control custom-checkbox mb-3">
						  <input class="custom-control-input" id="<?php echo $key->modul_icon ?>" type="checkbox" name="cb[<?php echo $key->modul_id ?>]">
						  <label class="custom-control-label" for="<?php echo $key->modul_icon ?>"><?php echo $key->modul_span ?></label>
						</div>						
            			<?php } ?>
            			<button type="submit" class="btn btn-primary btn-sm">Submit</button>
            		<?php echo form_close(); ?>
            		</div>
            	</div>
            </div>            
          </div>
        </div>
        <!-- Column -->
      </div>
      
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