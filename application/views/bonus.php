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
                	<button type="button" class="btn btn-default btn-sm" onclick="add()">Add New</button>
                </div>     
              </div>
            </div>
            <div class="card-body">
            	
              <div class="table-responsive">
              <table class="table align-items-center table-flush" id="datatable-basic">
                  <thead class="thead-light">
                  	   <tr>
                            <th width="1%">No</th>
                            <th>Employee</th>
				            <th>Date</th>
                            <th>Bonus Amount</th>
                            <th>Description</th>                                
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i =1;  foreach ($get as $value) { ?>                                
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value->employee_name; ?></td>
                                    <td><?php echo $value->bonus_date ?></td>
                                    <td><?php echo number_format($value->bonus_amount); ?></td>
                                    <td><?php echo $value->bonus_text ?></td>
                                    <td>
                  						<button type="button" class="btn btn-success btn-sm" onclick="edit('<?php echo $value->bonus_id ?>')">Edit</button>
                  						<a href="<?php echo base_url('bonus/delete/'.$value->bonus_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">Delete</a>                           	
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title" id="exampleModalLabel">Add Bonus</h5>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">  
	        <form id="add">
	            <div class="form-group row">
	              <label class="col-sm-4 text-right control-label col-form-label">Employee Name</label>
	              <div class="col-sm-8">
	                  <select name="employee" class="select2 form-control" style="width: 100%;">
	                  	<?php foreach ($employee as $key) { ?>	                  		
	                  		<option value="<?php echo $key->employee_id ?>"><?php echo $key->employee_name ?></option>	                 
	                  	<?php } ?>
	                  </select>
	              </div>
	            </div>                                                                  
	            <div class="form-group row">
	              <label class="col-sm-4 text-right control-label col-form-label">Date</label>
	              <div class="col-sm-8">
	                  <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" name="date">
	              </div>
	            </div>                                                                  
	            <div class="form-group row">
	              <label class="col-sm-4 text-right control-label col-form-label">Bonus Amount</label>
	              <div class="col-sm-8">
	                  <input type="number" name="amount" class="form-control" placeholder="Bonus Amount" min="0">
	              </div>
	            </div>  
	            <div class="form-group row">
	              <label class="col-sm-4 text-right control-label col-form-label">Description</label>
	              <div class="col-sm-8">
	                  <textarea class="form-control" name="text" rows="3" placeholder="Description"></textarea>
	              </div>
	            </div>                                                                                                                                  
	          </form>                
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	          <button type="button" class="btn btn-primary" onclick="save()">Save</button>
	        </div>
	      </div>
	    </div>
	  </div>

    <script>

	var save_method; //for save method string
    var table;
    var gid;
    function add()
    {
      save_method = 'add';
      $('#add')[0].reset(); // reset add on modals
      $('#exampleModal').modal('show'); // show bootstrap modal      

    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
    function edit(id)
    {
      save_method = 'update';
      gid = id;
      $('#add')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/bonus/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
                        
            $('[name="employee"]').val(data.employee_id);            
            $('[name="date"]').val(data.bonus_date);            
            $('[name="amount"]').val(data.bonus_amount);            
            $('[name="text"]').val(data.bonus_text);            
            $('[name="employee"]').trigger('change')
            $('#exampleModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Position'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
    function save(){
      var url;      
      if(save_method == 'add'){
          url = "<?php echo site_url('index.php/bonus/add')?>";          
      }else{          
          url = "<?php echo site_url('index.php/bonus/edit/')?>" + gid;         
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#add').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
              $('#exampleModal').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

</script>