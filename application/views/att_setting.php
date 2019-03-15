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
                  <h3 class="mb-0">Attendances Setting</h3>
                </div>
                <div class="col-4 text-right"></div>
              </div>
            </div>
            <div class="card-body">             
              <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#workhours"><i class="fa fa-clock"></i> Work Hours</button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#workdays"><i class="fa fa-calendar"></i> Work Days</button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#setholidays"><i class="fa fa-calendar-check"></i> Set Holidays</button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#shiftime"><i class="fa fa-hourglass-half"></i> Shift Time</button>
                </div>
              </div>  <p></p>


      <div class="modal fade" id="workhours" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Work Hours</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <?php echo form_open('att_setting/full_save'); ?>
                  <div class="form-group">                    
                      <label for="">Start Time</label>
                      <div class="row">                       
                      <div class="col-md-6 col-lg-6">
                    <input type="number" min="0" max="23" class="form-control" name="sh1" placeholder="00" value="<?php echo substr($type->start_time, 0,2); ?>">
                      </div>
                      <div class="col-md-6 col-lg-6">
                    <input type="number" min="00" max="59" class="form-control" name="sh2" placeholder="00" value="<?php echo substr($type->start_time, 3,2); ?>">
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">End Time</label>
                      <div class="row">                       
                      <div class="col-md-6 col-lg-6">
                    <input type="number" min="0" max="23" class="form-control" name="eh1" placeholder="00" value="<?php echo substr($type->end_time, 0,2); ?>">
                      </div>
                      <div class="col-md-6 col-lg-6">
                    <input type="number" min="00" max="59" class="form-control" name="eh2" placeholder="00" value="<?php echo substr($type->end_time, 3,2); ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Tolerance (minute)</label>
                      <input type="number" class="form-control" name="tol" min="0" placeholder="minutes" value="<?php echo $wh->tolerance; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Late Penalty Duration</label>
                      <input type="number" class="form-control" name="cal" min="0" placeholder="minutes" value="<?php echo $wh->calculation; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Late Penalty Calculation</label>
                    </div>
                    <div class="form-group row">                                
                        <div class="col-sm-8">
                          <input type="number" class="form-control" name="charge" min="0" placeholder="nominal" value="<?php echo $wh->charge; ?>">                                              
                        </div>
                        <label for="fname" class="col-sm-3 control-label col-form-label lpd"><h5>By <?php echo $wh->calculation; ?> minutes</h5></label>
                    </div>                    
                  </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>            
            </form>            
          </div>
        </div>
      </div>
    </div>
 
    <div class="modal fade" id="workdays" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Work Days</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <?php echo form_open('att_setting/work'); ?>
                  <?php foreach ($wd as $key) { ?>                  
                  <div class="custom-control custom-checkbox mb-3">
                      <input class="custom-control-input" id="<?php echo $key->day ?>" type="checkbox" name="cb[<?php echo $key->id ?>]" <?php if ($key->status == '1') {
                        echo "checked"; } ?>>
                      <label class="custom-control-label" for="<?php echo $key->day ?>"><?php echo $key->day ?></label>
                    </div>  
                  <?php } ?>                   
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>            
            <?php echo form_close(); ?>  
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="setholidays" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Set Holidays</h3>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
            <div class="pull-right">
              <button type="button" onclick="add()" class="btn btn-default btn-sm">Add</button>
            </div>         
          </div>
          <div class="modal-body">
              <table class="table align-items-center table-flush" id="datatable-basic">
                <thead class="thead-light">
                    <tr>
                    <th scope="col" width="1%">No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no=1;
                  foreach ($holiday as $data) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo date('d M Y', strtotime($data->date)); ?></td>
                      <td><?php echo $data->information; ?></td>
                      <td>
                        <a href="<?php echo base_url('att_setting/delete/'.$data->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>                    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>           

    <div class="modal fade bs-example-modal-lg" id="shiftime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Shift Time</h3>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
            <div class="pull-right">
              <button type="button" onclick="add_shift()" class="btn btn-default btn-sm">Add</button>
            </div>         
          </div>
          <div class="modal-body">
            
              <table class="table align-items-center table-flush" id="datatable-basic2">
                <thead class="thead-light">
                    <tr>
                    <th scope="col" width="1%">No</th>
                    <th scope="col">Shift Name</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no=1;
                  foreach ($shift as $data2) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data2->attendance_name ?></td>
                      <td><?php echo $data2->start_time ?></td>
                      <td><?php echo $data2->end_time ?></td>                      
                      <td>
                        <button type="button" class="btn btn-primary btn-sm" onclick="edit('<?php echo $data2->id ?>')"><i class="fa fa-edit"></i> Edit</button>
                        <a href="<?php echo base_url('att_setting/delete/') ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>                    
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>            
          </div>
        </div>
      </div>
    </div> 

            </div>            
          </div>
        </div>
        <!-- Column -->
      </div>
      <!-- Akhir Progress Box -->
      <!-- Page visit -->
      
    <div class="modal fade" id="modal_view" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Holiday Date</small></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="" method="post" id="form">
                    <div class="form-group row">
                      <label class="col-sm-3 text-right control-label col-form-label">Date</label>
                      <div class="col-sm-9">
                          <input type="text" name="date" class="form-control mydatepicker" placeholder="Date">    
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 text-right control-label col-form-label">Remarks</label>
                      <div class="col-sm-9">
                          <textarea class="form-control" name="info" placeholder="Information"></textarea>
                      </div>
                    </div>
                </form>
            </div>
          <div class="modal-footer">     
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-warning" id="close">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>


 <div class="modal fade" id="modal_shift" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Shift Time</small></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <?php echo form_open('att_setting/shift_save'); ?>
                    <div class="form-group row">
                      <label class="col-sm-3 text-right control-label col-form-label">Shift Name</label>
                      <div class="col-sm-9">
                          <input type="text" name="name" placeholder="Shift Name" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 text-right control-label col-form-label">Start Time</label>
                      <div class="col-sm-9">
                          <input type="time" name="start" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 text-right control-label col-form-label">End Time</label>
                      <div class="col-sm-9">
                          <input type="time" name="end" class="form-control">                          
                      </div>
                    </div>
            </div>
          <div class="modal-footer">     
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-warning" id="close_shift">Close</button>
          </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
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


<script>
  function add() {
    $('#modal_view').modal('show'); // show bootstrap modal when complete loaded                            
    $('#setholidays').modal('hide'); // show bootstrap modal when complete loaded                            
  }

  function add_shift() {
    $('#modal_shift').modal('show'); // show bootstrap modal when complete loaded                            
    $('#shiftime').modal('hide'); // show bootstrap modal when complete loaded                            
  }

  $('#close').on('click', function(){
    $('#modal_view').modal('hide'); 
    $('#setholidays').modal('show'); // show bootstrap modal when complete loaded                             
  });

  $('#close_shift').on('click', function(){
    $('#modal_shift').modal('hide'); 
    $('#shiftime').modal('show'); // show bootstrap modal when complete loaded                             
  });

  function edit(id){
    // console.log(id);
  }
  
  function save(){
      var url;            
      url = "<?php echo site_url('index.php/att_setting/holidate')?>";               
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_view').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }   
    
</script>