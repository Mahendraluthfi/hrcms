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
                  <h3 class="mb-0">Salary View</h3>
                </div> 
                <div class="col-4 text-right">
                  <a href="javascript:history.back()" class="btn btn-primary"><i class="ni ni-bold-left"></i> Back</a>
                </div>                          
              </div>
            </div>
            <div class="card-body">            
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Name</th>                      
                      <th scope="col">Year</th>                      
                      <th scope="col">Jan</th>
                      <th scope="col">Feb</th>
                      <th scope="col">Mar</th>
                      <th scope="col">Apr</th>
                      <th scope="col">Mei</th>
                      <th scope="col">Jun</th>
                      <th scope="col">Jul</th>
                      <th scope="col">Aug</th>
                      <th scope="col">Sep</th>
                      <th scope="col">Okt</th>
                      <th scope="col">Nov</th>
                      <th scope="col">Des</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $show->employee_name ?></td>
                      <td><?php echo $year ?></td>
                      <td><?php echo $get1; ?></td>
                      <td><?php echo $get2; ?></td>
                      <td><?php echo $get3; ?></td>
                      <td><?php echo $get4; ?></td>
                      <td><?php echo $get5; ?></td>
                      <td><?php echo $get6; ?></td>
                      <td><?php echo $get7; ?></td>
                      <td><?php echo $get8; ?></td>
                      <td><?php echo $get9; ?></td>
                      <td><?php echo $get10; ?></td>
                      <td><?php echo $get11; ?></td>
                      <td><?php echo $get12; ?></td>                      
                    </tr>
                  </tbody>
                </table>
              </div><br>
              <h3 class="mb-0">Salary History</h3>  <br>                
              <div class="table-responsive">
                <table class="table align-items-center table-flush" id="datatable-basic">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">No</th>                      
                      <th scope="col">Year/Month</th>                      
                      <th scope="col">Date Release</th>
                      <th scope="col">Salary</th>
                      <th scope="col">Deducted Attendande</th>
                      <th scope="col">Deducted Leave</th>                      
                      <th scope="col">Total Allowance</th>
                      <th scope="col">Total Salary</th>
                      <th scope="col">Action</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($result as $key) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('M', strtotime($key->month)).' / '.$key->year; ?></td>
                        <td><?php echo $key->date_release ?></td>
                        <td><?php echo number_format($key->salary) ?></td>
                        <td><?php echo number_format($key->deduct_attendance) ?></td>
                        <td><?php echo number_format($key->deduct_leave) ?></td>
                        <td><?php echo number_format($key->total_allowance) ?></td>
                        <td><?php echo number_format($key->total_salary) ?></td>
                        <td>
                          
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