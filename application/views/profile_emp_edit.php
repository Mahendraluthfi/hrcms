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
                  <h3 class="mb-0">Edit Profile</h3>
                </div>           
                <div class="col-4 text-right">
                    <a href="<?php echo base_url('profile_emp') ?>" class="btn btn-primary">Back</a>
                </div>                
              </div>
            </div>
            <div class="card-body">
            	
            	   <?php  echo form_open_multipart(base_url().'profile_emp/update', array('id'=>'form-price', 'class'=>'form-horizontal', 'name'=>'form_employee', 'method'=>'post')) ?>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-alternative" name="emp_name" value="<?php echo $get->employee_name ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" class="form-control form-control-alternative" name="emp_username" value="<?php echo $get->employee_username ?>">
                                </div>
                            </div>                            
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control form-control-alternative" name="emp_address"><?php echo $get->employee_username ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-alternative" name="username" value="<?php echo $get->employee_phone ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Birth Date</label>
                                <div class="col-sm-9">
                                     <input type="text" class="form-control form-control-alternative" id="datepicker-autoclose" placeholder="mm/dd/yyyy" name="birth_date" value="<?php echo $get->employee_birth; ?>">
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                <div class="col-sm-3">
                                	<select class="select2 form-control form-control-alternative custom-select" style="width: 100%;" name="emp_gender">
                                        <option value="Women" <?php                                         
                                            if ($get->employee_gender == "Women") {echo "selected='selected'";}
                                        ?>>Women</option>
                                        <option value="Man" <?php                                         
                                            if ($get->employee_gender == "Man") {echo "selected='selected'";}
                                        ?>>Man</option>
                                    </select>
                                </div>
                            </div>							
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Picture</label>
                                <div class="col-sm-9">
                                    <img id="profile_pic" alt="" class="img-responsive radius" src="<?php echo base_url($get->employee_picture); ?>">
                                    <input type="file" class="emp_picture" id="validatedCustomFile" name="emp_picture" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">ID Card Scan</label>
                                <div class="col-sm-9">
                                    <img id="profile_pic" alt="" class="img-responsive radius" src="<?php echo base_url($get->employee_idcard); ?>">
                                    <input type="file" class="emp_idcard" id="validatedCustomFile" name="emp_idcard" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Academic Certificate</label>
                                <div class="col-sm-9">
                                    <img id="profile_pic" alt="" class="img-responsive radius" src="<?php  echo base_url($get->employee_certificate); ?>">
                                    <input type="file" class="emp_certificate" id="validatedCustomFile" name="emp_certificate" accept="image/*">
                                </div>
                            </div>  
                             <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <button type="button" class="btn btn-success btn-sm" id="cp">Change Password</button>
                                </div>
                            </div>  
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>                                                                            
            </div>            
          </div>
        </div>
        <!-- Column -->
      </div>
      <!-- Akhir Progress Box -->
      
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Change Password</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
        <form action="<?php echo base_url('profile_emp/update_password'); ?>" method="post" id="form">
            <div class="form-group row">
                <label for="password" class="col-sm-4 text-right control-label col-form-label">New Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="new" placeholder="New Password" name="password" required="">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-4 text-right control-label col-form-label">Retype Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="retype" placeholder="Retype Password" name="retype_password" required=""><span id='message'></span>
                </div>
            </div>           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </form>
        </div>
      </div>
    </div>

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
        $('#cp').on('click', function(){
            $('#form')[0].reset();
            $('#exampleModal').modal('show');
            $('#message').html('');
        });
        $('#new, #retype').on('keyup', function () {
          if ($('#new').val() == $('#retype').val()) {
            $('#message').html('Matching').css('color', 'green');
          } else 
            $('#message').html('Not Matching').css('color', 'red');
        });
    </script>