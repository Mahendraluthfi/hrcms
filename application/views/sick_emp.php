    <div class="header bg-gradient-success pb-5 pt-5 pt-md-8">
      <div class="container">
        <div class="header-body">
            
           <div class="row">
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Quota Leave</h5>
                      <span class="h2 font-weight-bold mb-0"><?php  echo $total ?></span>
                    </div>

                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-hourglass"></i>
                      </div>
                    </div>
                  </div>                 
                </div>
              </div>
            </div>
            <!-- akhir employess merah -->

            <!-- Chart oranye -->
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Remaining</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $rem ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-hourglass-end "></i>
                      </div>
                    </div>
                  </div>                 
                </div>
              </div>
            </div>
            <!-- Akhir Chart oranye -->

            <!-- Widgets atas kuning -->
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Validity </h5>
                      <span class="h3 font-weight-bold mb-0"><?php echo $val_start." / ".$val_end; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fa fa-calendar"></i>
                      </div>
                    </div>
                  </div>                 
                </div>
              </div>
            </div>
            <!-- Akhir Widget -->

            <!-- Performance atas biru -->            
            <!-- Akhir performance -->
          </div>
        
        </div>
      </div>
    </div>

    <!-- Latest Post 6 kolom-->
    <div class="container-fluid mt--4">
      <div class="row">
        <!-- Column -->
        <div class="col-12">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Sick</h3>
                </div>
                <div class="col-4 text-right">
                   <button type="button" class="btn btn-success" onclick="add()">Request New Sick</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Datetime</th>
                        <th>Leave Reason</th>
                        <th>Start-End Date</th>
                        <th>Days</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; 
                        foreach ($row as $data) { ?>
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data->leave_timestamp ?></td>
                            <td><?php echo $data->leave_message ?></td>
                            <td><?php echo $data->leave_date_start." / ".$data->leave_date_end ?></td>
                            <td><?php echo $data->leave_days; ?></td>
                            <td><?php echo $data->leave_status ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" onclick="v_leave('<?php echo $data->leave_id ?>')">View</button>
                                <?php if ($data->leave_status == "PENDING") { ?>
                                    <button type="button" class="btn btn-danger" onclick="cancel('<?php echo $data->leave_id ?>')">Cancel</button>
                                <?php } ?>
                                
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

    <div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Request New Sick</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <?php echo form_open_multipart('sick_emp/save', array('class' => 'form-horizontal', 'id' => 'form')); ?>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Start End Date</label>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <input type="text" name="startend" class="form-control" id="drp4" placeholder="Start - End Date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Leave Reason</label>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <textarea name="message" class="form-control" placeholder="Leave Reason"></textarea>
                        </div>
                    </div>
                    <div class="form-group row" id="attachment">
                        <label class="control-label col-md-3">Attachment</label>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <input type="file" name="foto" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Number of Days</label>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <p class="form-control-static" id="nod"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Total of Leave</label>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <p class="form-control-static"><?php echo $total; ?></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Remaining Leave</label>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <p class="form-control-static"><?php echo $rem ?><span id="diff"></span></p>
                            <input type="hidden" id="ttlrem" value="<?php echo $rem ?>">
                        </div>
                    </div>
          </div>
          <div class="modal-footer"> 
            <button type="submit" class="btn btn-primary">Save</button>            
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
 <!-- Modal -->


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
                    <div class="form-group row" id="img" style="display: none;">
                        <label class="control-label col-md-4">Attachment</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <img src="" alt="" width="150" id="att">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Rejection Reason</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="r_message"></p>                             
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Status</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="status"></p>                             
                        </div>
                    </div>
                </form>
          </div>
          <div class="modal-footer">                     
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
 <!-- Modal -->
 <div class="modal fade" id="modal_cancel" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Cancel Leave</small></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <h4 class="text-center">Are you sure ?</h4>
            </div>
            <div class="modal-footer">                     
            <a href="" type="button" class="btn btn-primary" id="link">Yes</a>
            <a href="#" type="button" class="btn btn-danger" data-dismiss="modal">No</a>            
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
 <!-- Modal -->




<script>
    var save_method;
    var url;
    var at;
   
    function add()
    {
      save_method = 'add';      
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal      
    }

     function v_leave(id){                
        $.ajax({
        url : "<?php echo site_url('index.php/sick_emp/get')?>/" + id,
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
            }else{
                status = data.leave_status+" at "+at;
            }
            if (data.leave_attachment !== "") {
                $('#att').attr("src","files/attachment/"+data.leave_attachment);                
                $('#img').show();
            }                      
            $('#datetime').text(data.leave_timestamp);
            $('#l_reason').text(data.leave_message);
            $('#s_e_date').text(data.leave_date_start+" / "+data.leave_date_end);
            $('#r_message').text(data.leave_reply_messages);            
            $('#days').text(data.leave_days);            
            $('#status').text(status);
            $('#modal_view').modal('show'); // show bootstrap modal when complete loaded                        
        },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });           
    }

     function save(){
        var url;            
        url = "<?php echo site_url('index.php/sick_emp/save')?>";                

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
               location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function cancel(id) {        
        $("#link").attr("href","<?php echo base_url('sick_emp/cancel/') ?>"+id);
        $("#modal_cancel").modal("show");
    }

</script>