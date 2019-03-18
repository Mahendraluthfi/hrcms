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
                  <h3 class="mb-0"><?php echo $title; ?></h3>
                </div>
                <div class="col-4 text-right">
                  <a href="<?php echo base_url('employees'); ?>" class="btn btn-primary"><i class="ni ni-bold-left"></i> Back</a>
                </div>
              </div>
            </div>
            <div class="card-body">
            	   <?php  echo form_open_multipart(base_url().'employees/update_employee', array('id'=>'form-price', 'class'=>'form-horizontal', 'name'=>'form_employee', 'method'=>'post')) ?>
                        <input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Full Name" class="form-control" id="emp_name" name="emp_name" value="<?php if(is_numeric($this->uri->segment(3))) { echo $value->employee_name; } ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Username" class="form-control" id="emp_username" name="emp_username" value="<?php if(is_numeric($this->uri->segment(3))) { echo $value->employee_username; } ?>" >
                                </div>
                            </div>
                            <?php if (is_numeric($this->uri->segment(3))) { ?>
                            
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                <div class="col-sm-3"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal2" >Update Password</button></div>
                            </div>
                            
                            <?php } else { ?>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" placeholder="Password" class="form-control" id="emp_password" name="emp_password">
                                </div>
                            </div>

                            <?php } ?>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Address" class="form-control" id="emp_address" name="emp_address" value="<?php if(is_numeric($this->uri->segment(3))) { echo $value->employee_address; } ?>" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Phone Number" class="form-control" id="emp_phone" name="emp_phone" value="<?php if(is_numeric($this->uri->segment(3))) { echo $value->employee_phone; } ?>" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Birth Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" name="birth_date" value="<?php if(is_numeric($this->uri->segment(3))) { echo $value->employee_birth; } ?>">
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                <div class="col-sm-3">
                                    <select class="form-control custom-select" style="width: 100%; height:36px;" name="emp_gender">
                                        <option value="Women" <?php 
                                        if (is_numeric($this->uri->segment(3))) {
                                            if ($value->employee_gender == "Women") {echo "selected='selected'";}
                                        }?>>Women</option>
                                        <option value="Man" <?php 
                                        if (is_numeric($this->uri->segment(3))) {
                                            if ($value->employee_gender == "Man") {echo "selected='selected'";}
                                        }?>>Man</option>
                                    </select>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Start Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="datepicker-autoclose2" placeholder="mm/dd/yyyy" name="start_date" value="<?php if(is_numeric($this->uri->segment(3))) { echo $value->employee_start; } ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Picture</label>
                                <div class="col-sm-9">
                                    <img id="" alt="" class="img-responsive radius" src="<?php if(is_numeric($this->uri->segment(3))) { echo base_url($value->employee_picture);} ?>" height="150">
                                    <div class="custom-file">
                                        <input type="file" class="emp_picture" id="validatedCustomFile" name="emp_picture" accept="image/*">
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">ID Card Scan</label>
                                <div class="col-sm-9">
                                    <img id="" alt="" class="img-responsive radius" src="<?php if(is_numeric($this->uri->segment(3))) { echo base_url($value->employee_idcard);} ?>" height="150">
                                    <div class="custom-file">
                                        <input type="file" class="emp_idcard" id="validatedCustomFile" name="emp_idcard" accept="image/*">
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Academic Certificate</label>
                                <div class="col-sm-9">
                                    <img id="" alt="" class="img-responsive radius" src="<?php if(is_numeric($this->uri->segment(3))) { echo base_url($value->employee_certificate);} ?>" height="150">
                                	<div class="custom-file">
                                        <input type="file" class="emp_certificate" id="validatedCustomFile" name="emp_certificate" accept="image/*">
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                	</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Position</label>
                                <div class="col-sm-9">
                                    <select class="form-control custom-select" style="width: 100%; height:36px;" name="emp_position">
                                        <?php foreach ($positions as $position) { ?>
                                            <option value="<?php echo $position->position_id;?> " <?php if(is_numeric($this->uri->segment(3))) { 
                                                if ($position->position_id == $value->employee_position) {
                                                    echo "selected='selected'";
                                                }
                                             } ?>> <?php echo $position->position_name; ?></option>
                                        <?php } ?>                                            
                                    </select>

                                </div>
                            </div>
							<div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Employment Type</label>
                                <div class="col-sm-3">
                                    <select class="form-control custom-select" style="width: 100%; height:36px;" name="emp_duration">
                                      <?php foreach ($type as $datatype) { ?>
                                          <option value="<?php echo $datatype->id ?>"><?php echo $datatype->attendance_name; ?></option>
                                      <?php } ?>
                                          <option value="0">Shift Time</option>                                      
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email1" class="col-sm-3 text-right control-label col-form-label">Salary</label>
                                <div class="col-sm-9">
                                    <input type="number" placeholder="Salary" class="form-control" id="emp_salary" name="emp_salary" value="<?php if(is_numeric($this->uri->segment(3))) { echo $value->employee_salary; } ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Overtime Cost</label>
                                <div class="col-sm-9">
                                    <input type="number" placeholder="Overtime Cost" class="form-control" id="emp_overtime" name="emp_overtime" value="<?php if(is_numeric($this->uri->segment(3))) { echo $value->employee_overtime; } ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                <div class="col-sm-3">
                                    <select class="form-control custom-select" style="width: 100%; height:36px;" name="emp_status">
                                        <option value="1" <?php 
                                        if (is_numeric($this->uri->segment(3))) {
                                            if ($value->employee_status == 1) {echo "selected='selected'";}
                                        }?>>Active</option>
                                        <option value="0" <?php 
                                        if (is_numeric($this->uri->segment(3))) {
                                            if ($value->employee_status == 0) {echo "selected='selected'";}
                                        }?>>Not Active</option>
                                    </select>
                                </div>
                            </div>                           
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Quota Leave</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" class="form-control" id="quota_leave" name="quota_leave" value="<?php if(is_numeric($this->uri->segment(3))) { echo $value->employee_leave; }else{ echo "0"; } ?>">
                                </div>
                                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Validity</label>
                                <div class="col-sm-5">
                                  <input type="text" name="daterange" class="form-control" id="drp" value="<?php if(is_numeric($this->uri->segment(3))) { echo date('d-m-Y', strtotime($value->employee_start_leave)).' - '.date('d-m-Y', strtotime($value->employee_end_leave)); } ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Quota Off</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" class="form-control" id="quota_off" name="quota_off" value="<?php if(is_numeric($this->uri->segment(3))) { echo $value->employee_off; }else{ echo "0"; } ?>">
                                </div>
                                 <label for="fname" class="col-sm-2 text-right control-label col-form-label">Validity</label>
                                <div class="col-sm-5">
                                  <input type="text" name="daterange2" class="form-control" id="drp2" value="<?php if(is_numeric($this->uri->segment(3))) { echo date('d-m-Y', strtotime($value->employee_start_off)).' - '.date('d-m-Y', strtotime($value->employee_end_off)); } ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Quota Sick</label>
                                <div class="col-sm-2">
                                    <input type="number" min="0" class="form-control" id="quota_sick" name="quota_sick" value="<?php if(is_numeric($this->uri->segment(3))) { echo $value->employee_sick; }else{ echo "0"; } ?>">
                                </div>
                                 <label for="fname" class="col-sm-2 text-right control-label col-form-label">Validity</label>
                                <div class="col-sm-5">
                                  <input type="text" name="daterange3" class="form-control" id="drp3" value="<?php if(is_numeric($this->uri->segment(3))) { echo date('d-m-Y', strtotime($value->employee_start_sick)).' - '.date('d-m-Y', strtotime($value->employee_end_sick)); } ?>">
                                </div>
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

      <!-- Page visit -->
    <!-- Modal -->
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('employees/update_password'); ?>" method="post">
            <div class="form-group row">
                <label for="password" class="col-sm-4 text-right control-label col-form-label">New Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="update_position_name" placeholder="" name="password">
                </div>
            </div>
            <input type="hidden" id="id_update_position" name="id" value="<?php echo $this->uri->segment(3); ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
      </div>
    </div>
  </div>
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
