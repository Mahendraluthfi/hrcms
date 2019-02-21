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
                  <h3 class="mb-0">Salary Generate</h3>
                </div>  
                <div class="col-4 text-right">
                  <a href="javascript:history.back()" class="btn btn-primary"><i class="ni ni-bold-left"></i> Back</a>
                </div>
                <!-- <a href="">Go Back</a>                          -->
              </div>
            </div>
            <div class="card-body">
            	<form action="" method="POST" class="form-horizontal" role="form"> 
                    <div class="form-group row">
                    	<label class="col-sm-3 text-right text-primary control-label col-form-label">Employee Name</label>
                		<label class="col-sm-3 control-label col-form-label"><?php echo $show->employee_name ?></label>
          					</div>			            								
          					<div class="form-group row">
                    	<label class="col-sm-3 text-right text-primary control-label col-form-label">Month</label>
                  		<label class="col-sm-3 control-label col-form-label"><?php echo date('M', strtotime('1970-'.$month.'-01')).' '.date('Y') ?></label>
          					</div>			            			
            	</form>
              	<legend>Detail Salary</legend>
              	<div class="row">
    				<div class="col-5">
			        	<form action="" method="POST" class="form-horizontal" role="form"> 
			                <div class="form-group row">
			                	  <label class="col-sm-6 text-right text-primary control-label col-form-label">Salary</label>
			            	    	<label class="col-sm-6 control-label col-form-label text-right"><?php echo "IDR ".number_format($show->employee_salary) ?></label>                		
        							</div>			            			
        							<div class="form-group row">
  			                	<label class="col-sm-6 text-right text-primary control-label col-form-label">Deducted Leave</label>
        			            		
        							</div>
        							<div class="form-group row">
  			                	<label class="col-sm-6 text-right text-primary control-label col-form-label">Deducted Attendance</label>
        							</div>			          
        							<div class="form-group row">
                        	<label class="col-sm-6 text-right text-primary control-label col-form-label">Total Allowance</label>
                      		<label class="col-sm-1 control-label col-form-label"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i></button></label>                				
                          <label class="col-sm-5 control-label col-form-label text-right total"></label>                			
        							</div>	
							        <div class="form-group row">
                          <label class="col-sm-6 text-right text-primary control-label col-form-label">Total Salary</label>
                      </div>                
			        	</form>
			        </div>
			        <div class="col-7">	                  
			          <div class="table-responsive">
                  <h4>Detail Allowance</h4>
			            <table class="table align-items-center table-flush">
			              <thead class="thead-light">
			                <tr>
			                  <th scope="col" width="1%">No</th>                      
			                  <th scope="col">Allowance Name</th>
			                  <th scope="col">Nominal</th>                      
			                  <th scope="col">Action</th>
			                </tr>
			              </thead>
			              <tbody id="show_data">
			
			              </tbody>
			            </table>
			          </div>            
			        </div>			        
			    </div>
            	
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
              <h5 class="modal-title" id="exampleModalLabel">Add Allowance</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">  
            <form id="add">
                <div class="form-group row">
                  <label class="col-sm-4 text-right text-primary control-label col-form-label">Allowance Name</label>
                  <div class="col-sm-8">
                      <input type="text" name="allowance" class="form-control" placeholder="Allowance Name">               
                  </div>
                </div>                                  
                <div class="form-group row">
                  <label class="col-sm-4 text-right text-primary control-label col-form-label">Nominal</label>
                  <div class="col-sm-8">
                      <input type="number" name="nominal" class="form-control" placeholder="Nominal" min="0">
                  </div>
                </div>                      
              </form>                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btn_simpan">Save changes</button>
            </div>
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
      $(document).ready(function(){
      tampil(); 
      function tampil(){    
        $.ajax({
            url : "<?php echo site_url('index.php/salary_full/get')?>/",
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html = '';
                var i;
                var no = 1;
                for(i=0; i<data.length; i++){
                
                var bilangan = data[i].nominal;
                var number_string = bilangan.toString(),
                sisa  = number_string.length % 3,
                rupiah  = number_string.substr(0, sisa),
                ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                if (ribuan) {
                  separator = sisa ? ',' : '';
                  rupiah += separator + ribuan.join(',');
                }          

                    html += '<tr>'+
                            '<td>'+no+++'</td>'+                          
                            '<td>'+data[i].allowance_name+'</td>'+
                            '<td>'+rupiah+'</td>'+                            
                            '<td style="text-align:right;">'+                                    
                                    '<a href="javascript:;" class="btn btn-danger btn-sm item_hapus" data="'+data[i].id+'"><span class="fas fa-trash"></span></a>'+
                                '</td>'+
                            '</tr>';
                }
                $('#show_data').html(html);              
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });
        $.ajax({            
            url : "<?php echo site_url('index.php/salary_full/get_allowance')?>",
            type: "GET",
            dataType: "JSON",
            success: function(data){
                // var bilangan1 = data.total;
                // var num_string1 = bilangan1.toString(),
                // sisa1  = num_string1.length % 3,
                // rupiah1  = num_string1.substr(0, sisa1),
                // ribuan1  = num_string1.substr(sisa1).match(/\d{3}/g);
                // if (ribuan1) {
                //   sep1 = sisa1 ? ',' : '';
                //   rupiah1 += sep1 + ribuan1.join(',');
                // }   
                var number = data.total;
                var x = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'IDR' }).format(number);
                $('.total').text(x);  
                // console.log(rupiah1);

            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });            
  }

    // function save(){
   
    //   }    
  $('#btn_simpan').on('click',function(){            
          var allowance = $('[name="allowance"]').val();
          var nominal = $('[name="nominal"]').val();  
          // console.log(allowance);                
          $.ajax({
          type : "POST",
          url  : "<?php echo base_url('index.php/salary_full/add_allowance')?>",
          dataType : "JSON",
          data : {allowance:allowance , nominal:nominal},
          success: function(data)
          {                     
              $('#exampleModal').modal('hide');
              $('[name="allowance"]').val("");
              $('[name="nominal"]').val("");                    
              tampil();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error adding / update data');
          }
      });    
  });

   $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');            
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/salary_full/delete')?>",
            dataType : "JSON",
                    data : {id: id},
                    success: function(data){                        
                        tampil();
                    }
                });
                return false;
            // alert('OK');
            });
  }); 
    </script>