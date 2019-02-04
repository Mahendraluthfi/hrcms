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
                  <h3 class="mb-0">Off Management</h3>
                </div>                
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Start End date</th>
                        <th>Days</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i =1;  foreach ($joined_values as $value) { ?>
                                
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value->employee_name; ?></td>
                                    <td><?php echo $value->position_name; ?></td>
                                    <td><?php echo date('d M Y', strtotime($value->leave_date_start))." / ".date('d M Y', strtotime($value->leave_date_end)); ?></td>
                                    <td><?php echo $value->leave_days; ?></td>
                                    <td><?php echo $value->leave_status; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_view" onclick="view('<?php echo $value->leave_id; ?>')">View Detail</button>        
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

    <div class="modal fade" id="modal_view" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">View</small></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <div class="form-group row">
                        <label class="control-label col-md-4">Datetime</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="datetime"></p> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Employee Name</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="employeename"></p> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Leave Reason</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="l_reason"></p>                             
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Start-End Date</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="s_e_date"></p>                             
                        </div>
                    </div>
                      <div class="form-group row">
                        <label class="control-label col-md-4">Days</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="days"></p>                             
                        </div>
                    </div>
                    <div class="form-group row" id="img">
                        <label class="control-label col-md-4">Attachment</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <img src="" alt="" width="150" id="att">
                        </div>
                    </div>                    
                    <div class="form-group row">
                        <label class="control-label col-md-4">Status</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="status"></p>                             
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Quota Leave</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="ql"></p>                             
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Quota Remaining</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="qr"></p>                             
                        </div>
                    </div>
                </form>
          </div>
          <div class="modal-footer">                     
            <span class="reject_button"></span>
            <span class="approve_button"></span>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
 <!-- Modal -->


 <!-- Modal -->
<div class="modal fade" id="RejectionReason" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rejection Reason </h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('off/leave_rejected'); ?>" method="post">
                    
                    <div class="form-group row">
                        <label for="position_name" class="col-sm-3 text-right control-label col-form-label">Reason</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="detail_leave_reason" name="rejection_reason"></textarea>
                        </div>
                    </div>

                    <input type="hidden" id="reject_id_leave" name="id" value="">                    
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Reject</button>
            </div>
             </form>
        </div>
    </div>
</div>

<script>
     function view(id) {
        $.ajax({
        url : "<?php echo site_url('index.php/off/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
            if (data.action_timestamp == "0000-00-00 00:00:00") {
                at = "";
            }else{
                at = data.action_timestamp;
            }                                        
            if (data.leave_status == "PENDING") {                
                status = data.leave_status;
                var rejectButton = "<a href='' class='btn btn-danger'  data-dismiss='modal' data-toggle='modal' data-target='#RejectionReason'>Reject</a>";
                var approveButton = '<a href="<?php echo base_url()?>off/leave_approval/'+id+'" class="btn btn-success" onclick="return confirm(\'Are you sure?\')">Approve</a>';
                $('#reject_id_leave').val(data.leave_id);                
                $('.reject_button').html(rejectButton);
                $('.approve_button').html(approveButton);                
            }else{
                status = data.leave_status+" at "+at;
            }             
            if (data.leave_category == "1") {
                ql = data.employee_leave;
                qr = data.employee_leave_rem;
            }else if(data.leave_category == "2"){
                ql = data.employee_off;
                qr = data.employee_off_rem;
            }else{
                ql = data.employee_sick;
                qr = data.employee_sick_rem;
            }
            if (data.leave_attachment !== "") {
                $('#att').attr("src","<?php echo base_url()?>files/attachment/"+data.leave_attachment);                
                $('#img').show();
            }  
            $('#datetime').text(data.leave_timestamp);
            $('#employeename').text(data.employee_name);
            $('#l_reason').text(data.leave_message);
            $('#s_e_date').text(data.leave_date_start+" / "+data.leave_date_end);
            $('#r_message').text(data.leave_reply_messages);            
            $('#days').text(data.leave_days);            
            $('#ql').text(ql);            
            $('#qr').text(qr);            
            $('#status').text(status);
            $('#modal_view').modal('show'); // show bootstrap modal when complete loaded                        
        },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });   
    }
</script>