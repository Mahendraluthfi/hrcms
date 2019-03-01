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
                  <h3 class="mb-0">Profile</h3>
                </div>           
                <div class="col-4 text-right">
                    <a href="<?php echo base_url('profile_emp/edit') ?>" class="btn btn-primary">Edit</a>
                </div>                
              </div>
            </div>
            <div class="card-body">
            	
            	   <?php  echo form_open_multipart(base_url().'employees/update_employee', array('id'=>'form-price', 'class'=>'form-horizontal', 'name'=>'form_employee', 'method'=>'post')) ?>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <label for="" class="control-label col-form-label text-red"><?php echo $get->employee_name ?></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <label for="" class="control-label col-form-label text-red"><?php echo $get->employee_username ?></label>
                                </div>
                            </div>                            
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <label for="" class="control-label col-form-label text-red"><?php echo $get->employee_address ?></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <label for="" class="control-label col-form-label text-red"><?php echo $get->employee_phone	 ?></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Birth Date</label>
                                <div class="col-sm-9">
                                    <label for="" class="control-label col-form-label text-red"><?php echo date('d M Y', strtotime($get->employee_birth)) ?></label>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                <div class="col-sm-3">
                                	<label for="" class="control-label col-form-label text-red"><?php echo $get->employee_gender ?></label>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Start Date</label>
                                <div class="col-sm-9">                                
                                    <label for="" class="control-label col-form-label text-red"><?php echo date('d M Y', strtotime($get->employee_start)) ?></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Picture</label>
                                <div class="col-sm-9">
                                    <img id="profile_pic" alt="profile_pic" class="img-responsive radius" src="<?php echo base_url($get->employee_picture); ?>">                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">ID Card Scan</label>
                                <div class="col-sm-9">
                                    <img id="profile_pic" alt="profile_pic" class="img-responsive radius" src="<?php echo base_url($get->employee_idcard); ?>">                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Academic Certificate</label>
                                <div class="col-sm-9">
                                    <img id="profile_pic" alt="profile_pic" class="img-responsive radius" src="<?php  echo base_url($get->employee_certificate); ?>">                                	
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Position</label>
                                <div class="col-sm-9">
                                	<label for="" class="control-label col-form-label text-red"><?php echo $get->position_name ?></label>
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Duration of Work</label>
                                <div class="col-sm-3">
                                	<label for="" class="control-label col-form-label text-red"><?php echo $get->employee_duration ?></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email1" class="col-sm-3 text-right control-label col-form-label">Salary</label>
                                <div class="col-sm-9">
                                	<label for="" class="control-label col-form-label text-red"><?php echo number_format($get->employee_salary) ?></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Overtime Cost</label>
                                <div class="col-sm-9">
                                	<label for="" class="control-label col-form-label text-red"><?php echo number_format($get->employee_overtime) ?></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                <div class="col-sm-3">
                                	<label for="" class="control-label col-form-label text-red"><?php if ($get->employee_status=='1') { echo "Active"; }else{ echo "Not Active";} ?></label>
                                </div>
                            </div>                           
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Quota Leave</label>
                                <div class="col-sm-2">
                                	<label for="" class="control-label col-form-label text-red">
                                		<?php echo $get->employee_leave; ?>
                                	</label>
                                </div>
                                <label for="fname" class="col-sm-2 text-right control-label col-form-label">Validity</label>
                                <div class="col-sm-5">
                                	<label for="" class="control-label col-form-label text-red">
                                		<?php echo date('d-m-Y', strtotime($get->employee_start_leave)).' - '.date('d-m-Y', strtotime($get->employee_end_leave)); ?>
                                	</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Quota Off</label>
                                <div class="col-sm-2">
                                	<label for="" class="control-label col-form-label text-red">
                                		<?php echo $get->employee_off; ?>                                		
                                	</label>
                                </div>
                                 <label for="fname" class="col-sm-2 text-right control-label col-form-label">Validity</label>
                                <div class="col-sm-5">
                                	<label for="" class="control-label col-form-label text-red">
                                		<?php echo date('d-m-Y', strtotime($get->employee_start_off)).' - '.date('d-m-Y', strtotime($get->employee_end_off)); ?>
                                	</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Quota Sick</label>
                                <div class="col-sm-2">
                                	<label for="" class="control-label col-form-label text-red">
                                		<?php echo $get->employee_sick; ?>                                		
                                	</label>
                                </div>
                                 <label for="fname" class="col-sm-2 text-right control-label col-form-label">Validity</label>
                                <div class="col-sm-5">
                                	<label for="" class="control-label col-form-label text-red">
                                		<?php echo date('d-m-Y', strtotime($get->employee_start_sick)).' - '.date('d-m-Y', strtotime($get->employee_end_sick)); ?>
                                	</label>
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