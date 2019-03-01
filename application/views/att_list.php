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
                  <h3 class="mb-0">Attendances List</h3>
                </div>           
                <div class="col-4 text-right">
                  <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">Generate QR <span class="caret"></span></button>       
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo base_url('att_list/view_qr/shf/'.$shf) ?>" target="_blank">Start Hours/Full Time</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('att_list/view_qr/ehf/'.$ehf) ?>" target="_blank">End Hours/Full TIme</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('att_list/view_qr/shp/'.$shp) ?>" target="_blank">Start Hours/Part Time</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('att_list/view_qr/ehp/'.$ehp) ?>" target="_blank">End Hours/Part TIme</a></li>
                  </ul>
                </div>     
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table align-items-center table-flush" id="datatable-basic">
                  <thead class="thead-light">
                  	   <tr>
                            <th>No</th>
                            <th>Date</th>
							<th>Name</th>
                            <th>Check In</th>
                            <th>Check Out</th>                                
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i =1;  foreach ($list as $value) { ?>                                
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value->attendance_timestamp; ?></td>
                                    <td><?php echo $value->employee_name; ?></td>
                                    <td><?php echo date("F j, Y H:i:s", strtotime($value->attendance_in)); ?></td>
                                    <td><?php echo date("F j, Y H:i:s", strtotime($value->attendance_out)); ?></td>
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