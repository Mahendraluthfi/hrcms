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
                  <h3 class="mb-0">Salary List</h3>
                </div>                
              </div>
            </div>
            <div class="card-body">
            	
                <table class="table align-items-center table-flush" id="datatable-basic">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" width="1%">No</th>                      
                      <th scope="col">Month</th>
                      <th scope="col">Release Date</th>
                      <th scope="col">Total Salary</th>                                                               
                      <th scope="col">Action</th>                      
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i =1; foreach ($row as $data) { ?>
                      <tr>
                        <td><?php echo $i++; ?></td>                        
                        <td><?php echo date('M Y' , strtotime('01-'.$data->month.'-'.$data->year)); ?></td>
                        <td><?php echo $data->date_release; ?></td>
                        <td><?php echo $data->total_salary; ?></td>                                           
                        <td>
                        	
                        </td>                        
                      </tr>
                        <?php } ?>
                  </tbody>
                </table>
              
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