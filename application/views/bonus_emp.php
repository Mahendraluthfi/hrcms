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
                  <h3 class="mb-0">Bonus</h3>
                </div>           
                <div class="col-4 text-right">
                	<!-- <button type="button" class="btn btn-default btn-sm" onclick="add()">Add New</button> -->
                </div>     
              </div>
            </div>
            <div class="card-body">
            	
              <div class="table-responsive">
              <table class="table align-items-center table-flush" id="datatable-basic">
                  <thead class="thead-light">
                  	   <tr>
                            <th width="1%">No</th>                            
		        		            <th>Date</th>
                            <th>Bonus Amount</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i =1;  foreach ($get as $value) { ?>                                
                                <tr>
                                    <td><?php echo $i; ?></td>                                    
                                    <td><?php echo $value->bonus_date ?></td>
                                    <td><?php echo number_format($value->bonus_amount); ?></td>
                                    <td><?php echo $value->bonus_text ?></td>                              
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

    