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
                  <h3 class="mb-0">Allowances</h3>
                </div> 
                <div class="col-4 text-right">
                  <button type="button" class="btn btn-primary btn-sm" onclick="add()">Add New</button>
                </div>                  
              </div>
            </div>
            <div class="card-body">
            	
            	
              <div class="table-responsive">
                <table class="table align-items-center table-flush" id="datatable-basic">
                  <thead class="thead-light">
                  	<tr>
                        <th width="1%">No</th>            
                        <th>Allowance Name</th>            
                        <th>Allowance Nominal</th>            
                        <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	  <?php $i =1;  foreach ($values as $value) { ?>                        
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value->allowance_name; ?></td>                                    
                            <td><?php echo number_format($value->allowance_nominal); ?></td>
                            <td>          						
          						<button type="button" class="btn btn-success btn-sm" onclick="edit('<?php echo $value->id ?>')">Edit</button>
          						<a href="<?php echo base_url('allowances/delete/'.$value->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">Delete</a>                                        
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
              <h5 class="modal-title" id="exampleModalLabel">Add Position</h5>
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
        url : "<?php echo site_url('index.php/allowances/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="allowance"]').val(data.allowance_name);                       
            $('[name="nominal"]').val(data.allowance_nominal);                       
            $('#exampleModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Allowances'); // Set title to Bootstrap modal title

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
          url = "<?php echo site_url('index.php/allowances/add')?>";          
      }else{          
          url = "<?php echo site_url('index.php/allowances/edit/')?>" + gid;         
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