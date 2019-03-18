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
                  <h3 class="mb-0">Edit User</h3>
                </div> 
                <div class="col-4 text-right">
                  <a href="<?php echo base_url('userpermission') ?>" class="btn btn-primary btn-sm">Back</a>
                </div>                  
              </div>
            </div>
            <div class="card-body">
            	<div class="row">
            		<div class="col-6">            			
                <?php echo form_open('userpermission/save_edit'); ?>              
			                <div class="form-group row">
			                  <label class="col-sm-4 text-right control-label col-form-label">Username</label>
			                  <div class="col-sm-8">
			                      <input type="text" name="username" class="form-control disabled" placeholder="Username" disabled value="<?php echo $user->username ?>">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
			                  </div>
			                </div>    
			                 <div class="form-group row">
			                  <label class="col-sm-4 text-right control-label col-form-label">Name</label>
			                  <div class="col-sm-8">
			                      <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $user->name ?>">               
			                  </div>
			                </div>                                                                                 
			                <div class="form-group row">
			                  <label class="col-sm-4 text-right control-label col-form-label">Password</label>
			                  <div class="col-sm-8">
			                      <input type="password" name="password" class="form-control" placeholder="Password">
			                  </div>
			                </div>                                                                                 
			                <div class="form-group row">
			                  <label class="col-sm-4 text-right control-label col-form-label">Retype Password</label>
			                  <div class="col-sm-8">
			                      <input type="password" name="retype" class="form-control" placeholder="Password"><span id='message'></span>
			                  </div>
			                </div>                                                                                 	
            		</div>
            		<div class="col-6">  
            		<h4>Permissions Modul</h4> 
            			<?php foreach ($role as $key) {                       
                        $cek = $this->db->get_where('privilage', array('modul_id' => $key->modul_id, 'user_id' => $id))->num_rows();
                  ?>            				
        						<div class="custom-control custom-checkbox mb-3">
        						  <input class="custom-control-input" id="<?php echo $key->modul_icon ?>" type="checkbox" name="cb[<?php echo $key->modul_id ?>]" <?php if ($cek > 0) {
                        echo "checked";
                      } ?>>
        						  <label class="custom-control-label" for="<?php echo $key->modul_icon ?>"><?php echo $key->modul_span ?></label>
        						</div>
                    
            			<?php } ?>
            		</div>
            	</div>
                  <button type="submit" class="btn btn-primary btn-simpan">Submit</button>
            </div>            
          </div>
        </div>
            <?php echo form_close(); ?>
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

    <script>
      $('[name="username"]').keypress(function( e ) {
        if(e.which === 32) 
        return false;
      });
        $('[name="password"], [name="retype"]').on('keyup', function () {
          if ($('[name="password"]').val() == $('[name="retype"]').val()) {
            $('#message').html('Matching').css('color', 'green');            
          } else 
            $('#message').html('Not Matching').css('color', 'red');                        
        });
    </script>