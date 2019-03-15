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
                  <h3 class="mb-0">Setting</h3>
                </div> 
                <div class="col-4 text-right">
                  <a href="<?php echo base_url('setting/add') ?>" class="btn btn-primary btn-sm">Add New</a>
                </div>                  
              </div>
            </div>
            <div class="card-body">
            	<h4>Users Permissions</h4>
        	  <div class="table-responsive">
                <table class="table align-items-center table-flush" id="datatable-basic">
                  <thead class="thead-light">
                  	<tr>
                        <th width="1%">No</th>            
                        <th>Username</th>            
                        <th>Name</th>            
                        <th>Role</th>            
                        <th>Status</th>            
                        <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	  <?php $i =1;  foreach ($get as $value) { ?>                        
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value->username; ?></td>                                    
                            <td><?php echo $value->name; ?></td>
                            <td><?php echo 'Employer' ?></td>
                            <td><?php if($value->status == '1'){ echo "Active"; }else{ echo "Inactive"; } ?></td>
                            <td>
                                  <a href="<?php echo base_url('setting/edit/'.$value->user_id) ?>" class="btn btn-success btn-sm">Edit</a>
                              <?php if ($value->status == '1'){ ?>
                                  <a href="<?php echo base_url('setting/status/0/'.$value->user_id) ?>" class="btn btn-danger btn-sm">Inactive</a>
                              <?php }else{ ?>
                                  <a href="<?php echo base_url('setting/status/1/'.$value->user_id) ?>" class="btn btn-danger btn-sm">Active</a>
                              <?php } ?>
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