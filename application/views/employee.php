    <div class="header bg-gradient-success pb-5 pt-5 pt-md-8">
      <div class="container">
        <div class="header-body"></div>
      </div>
    </div>

    <!-- Latest Post 6 kolom-->
    <div class="container-fluid mt--6">
      <div class="row">
        <!-- Column -->
        <div class="col-12">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Employee</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="<?php echo base_url('employees/employee_form'); ?>" class="btn btn-primary">Add New Employee</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table align-items-center table-flush" id="datatable-basic">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">No</th>                      
                      <th scope="col">Name</th>                      
                      <th scope="col">Position</th>                                         
                      <th scope="col">Employment Type</th>                      
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i =1; foreach ($show as $data) { ?>
                      <tr>
                        <td><?php echo $i++; ?></td>                        
                        <td><?php echo $data->employee_name; ?></td>                        
                        <td><?php echo $data->position_name; ?></td>
                        <td><?php echo $data->attendance_name; ?></td>
                        <td><?php 
                          if($data->employee_status == '1') echo "<span style='color: green;'> Active </span>"; 
                          else {echo "<span style='color: red;'> Deactived </span>"; } ?>
                        </td>
                        <td>
                          <button type="button" class="btn btn-success btn-sm" onclick="detail('<?php echo $data->employee_id; ?>')">View</button>
                          <span><a href="<?php echo base_url('/employees/employee_form/').$data->employee_id; ?>">
                          <button type="button" class="btn btn-warning btn-sm">Edit</button></a></span>&nbsp;
                          <div class="btn-group">
                          <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">Delete <span class="caret"></span></button>
                          <ul class="dropdown-menu">
                              <?php 
                              if($data->employee_status == "0"){ ?>
                              <li><a class="dropdown-item" href="<?php echo base_url('employees/activation/1/'.$data->employee_id) ?>" onclick="return confirm('Are you sure ?')">Active</a></li>
                        <?php } 
                          if($data->employee_status == "1"){ ?>
                          <li><a class="dropdown-item" href="<?php echo base_url('employees/activation/0/'.$data->employee_id) ?>" onclick="return confirm('Are you sure ?')" >Deactived</a></li>
                        <?php } ?>
                          <li><a class="dropdown-item" href="<?php echo base_url('employees/delete/'.$data->employee_id) ?>" onclick="return confirm('Are you sure ?')">Permanently Delete</a></li>
                                  </ul>
                              </div>
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
      <div class="modal fade" id="modal_detail" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Detail Employees</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">                
                    <div class="form-group row">
                        <label class="control-label col-md-4 text-right">Name</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="name"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4 text-right">Username</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="username"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4 text-right">Address</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="address"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4 text-right">Phone</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="phone"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4 text-right">Birth Date</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="birthdate"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4 text-right">Gender</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="gender"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4 text-right">Start Date</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="startdate"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4 text-right">Picture</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <img src="" width="150" class="img-thumbnail" id="picture">                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4 text-right">ID Card Scan</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <img src="" width="150" class="img-thumbnail" id="idcard">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4 text-right">Academic Certificate</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <img src="" width="150" class="img-thumbnail" id="certificate">                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4 text-right">Position</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="position"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4 text-right">Employee Type</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="dow"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4 text-right">Salary</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="gaji"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4 text-right">Overtime Cost</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="overtime"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4 text-right">Status</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="status"></p>
                        </div>
                    </div>                    
                    <div class="form-group row">
                        <label class="control-label col-md-3 text-right">Quota Leave</label>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <p class="form-control-static" id="ql"></p>
                        </div>
                        <label class="control-label col-md-2 text-right">Validity</label>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <p class="form-control-static" id="vql"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 text-right">Quota Off</label>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <p class="form-control-static" id="qo"></p>
                        </div>
                        <label class="control-label col-md-2 text-right">Validity</label>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <p class="form-control-static" id="vqo"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 text-right">Quota Sick</label>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <p class="form-control-static" id="qs"></p>
                        </div>
                        <label class="control-label col-md-2 text-right">Validity</label>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <p class="form-control-static" id="vqs"></p>
                        </div>
                    </div>
                </form>
          </div>
          <div class="modal-footer"> 
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
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
    /****************************************
     *       Basic Table                   *
     ****************************************/           

    function detail(id){        
        var ffoto;  
        $.ajax({
        url : "<?php echo site_url('index.php/employees/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {            
            $("#name").text(data.employee_name);                               
            $("#username").text(data.employee_username);                               
            $("#position").text(data.employee_position);                               
            $("#gender").text(data.employee_gender);                               
            $("#birthdate").text(data.employee_birth);                               
            $("#phone").text(data.employee_phone);                               
            $("#status").text(data.employee_status);                               
            $("#gaji").text(data.employee_salary);                               
            $("#overtime").text(data.employee_overtime);                               
            $("#dow").text(data.attendance_name);                               
            $("#vql").text(data.employee_start_leave+ ' until ' +data.employee_end_leave);                               
            $("#vqo").text(data.employee_start_off+ ' until ' +data.employee_end_off);                               
            $("#vqs").text(data.employee_start_sick+ ' until ' +data.employee_end_sick);                               
            $("#ql").text(data.employee_leave);                               
            $("#qo").text(data.employee_off);                               
            $("#qs").text(data.employee_sick);                               
            $("#startdate").text(data.employee_start);                               
            $("#address").text(data.employee_address);                               
            $("#picture").attr("src", data.employee_picture);           
            $("#idcard").attr("src", data.employee_idcard);           
            $("#certificate").attr("src", data.employee_certificate);                                                                
            $('#modal_detail').modal('show'); // show bootstrap modal when complete loaded                        

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });           
}


</script>