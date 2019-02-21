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
                <div class="col-12">
                  <h3 class="mb-0">Salary Full Time</h3>
                </div>                
              </div>
            </div>
            <div class="card-body">
        
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">No</th>                      
                      <th scope="col">Name</th>
                      <th scope="col">Position</th>                      
                      <th scope="col">Salary</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i =1; foreach ($show as $data) { ?>
                      <tr>
                        <td><?php echo $i++; ?></td>                        
                        <td><?php echo $data->employee_name; ?></td> 
                        <td><?php echo $data->position_name; ?></td>                                            
                        <td><?php echo 'Rp. '.number_format($data->employee_salary); ?></td>
                        <td>
                          <a href="<?php echo base_url('salary_part/view/'.$data->employee_id) ?>" class="btn btn-default btn-sm">View</a>
                        </td>
                      </tr>
                        <?php } ?>
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