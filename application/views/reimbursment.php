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
                  <h3 class="mb-0">Reimbursment</h3>
                </div> 
                <div class="col-4 text-right">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"">Category</button>
                </div>                  
              </div>
            </div>
            <div class="card-body">
            	
              <div class="table-responsive">
                <table class="table align-items-center table-flush" id="datatable-basic">
                  <thead class="thead-light">
                  	<tr>
                        <th width="1%">No</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Cost</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	  <?php $i =1;  foreach ($values as $value) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value->employee_name; ?></td>
                            <td><?php echo $value->date; ?></td>
                            <td><?php echo $value->category ?></td>
                            <td><?php echo $value->description; ?></td>
                            <td><?php echo number_format($value->cost); ?></td>
                            <td><?php if ($value->sts == 0) {
                              echo "PROCESS"; }elseif($value->sts == 1){ echo "APPROVED"; }else{ echo "REJECTED"; } ?></td>                            
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_view" onclick="view('<?php echo $value->id_reimbursment; ?>')">View Detail</button>        
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

    <!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-primary" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Reimbursment Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-secondary" role="alert">
                              
                <div class="table-responsive">                  
                  <table class="table align-items-center table-flush table-category">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" width="1%">No</th>                      
                        <th scope="col">Category Name</th>                                            
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody id="show_data">
      
                    </tbody>
                  </table>
                </div>            
              
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="add-new">Add New</button>
      </div>
    </div>
  </div>
</div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#" id="form" class="form-horizontal">
                    <div class="form-body">                  
                      <div class="form-group row">
                          <label class="control-label col-md-3">Category</label>
                          <div class="col-md-9">
                            <input type="text" name="ctg" class="form-control ctgr" placeholder="Category Name">
                          </div>
                      </div>                  
                    </div>
                </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="save-ctg">Save</button>        
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
          </div>
        </div>
      </div>
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
                        <label class="control-label col-md-4">Employee Name</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="en"></p> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Date</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="date"></p> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Description</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="description"></p>                             
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Category</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="ctg"></p>                             
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Cost</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static" id="cost"></p>                             
                        </div>
                    </div>
                    <div class="form-group row" id="img" style="display: none;">
                        <label class="control-label col-md-4">Attachment</label>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <img src="" alt="" width="150" id="att" data-foto="">
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
            <span class="reject_button"></span>
            <span class="approve_button"></span>                 
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

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
                    <form action="<?php echo base_url('reimbursment/reimbursment_rejected'); ?>" method="post">                
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

    <div class="modal fade bs-example-modal-lg" id="view_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header"></div> -->
      <div class="modal-body text-center">
          <img src="" alt="" height="600" id="view_att">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>

    <script>
      $(document).ready(function(){
      tampil(); 
      function tampil(){            
        $.ajax({
            url : "<?php echo site_url('index.php/reimbursment/get_category')?>/",
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html = '';
                var i;
                var no = 1;
                for(i=0; i<data.length; i++){                              
                    html += '<tr>'+
                            '<td>'+no+++'</td>'+                          
                            '<td>'+data[i].category+'</td>'+                            
                            '<td>'+                                    
                                    '<a href="javascript:;" class="btn btn-primary btn-sm item_edit" data="'+data[i].id+'"><span class="fas fa-edit"></span> Edit</a>'+
                                    '<a href="javascript:;" class="btn btn-danger btn-sm item_hapus" data="'+data[i].id+'"><span class="fas fa-trash"></span> Delete</a>'+
                                '</td>'+
                            '</tr>';
                }                                
                $('#show_data').html(html);              
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });        
      }
     var save_method; 
    var table;
    var gid;
    $('#add-new').on('click', function(){
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#exampleModal2').modal('show'); // show bootstrap modal      
    })
    
     $('#show_data').on('click','.item_edit',function(){
        var id = $(this).attr('data'); 
        save_method = 'update';
        gid = id;
        $('#form')[0].reset(); // reset form on modals
        $.ajax({
          url : "<?php echo site_url('reimbursment/get_ctg_id')?>/" + id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {                            
              $('[name="ctg"]').val(data.category);                        
              $('#exampleModal2').modal('show'); 
              $('.modal-title').text('Edit Category');               
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
        });
    })

      $('#show_data').on('click','.item_hapus',function(){
            var id = $(this).attr('data');            
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/reimbursment/delete_ctg')?>",
            dataType : "JSON",
                    data : {id: id},
                    success: function(data){                        
                        tampil();
                    }
                });
                return false;
            // alert('OK');
            });

    $('#save-ctg').on('click', function(){
      var url;      
      if(save_method == 'add'){
          url = "<?php echo site_url('reimbursment/save_ctg')?>";          
      }else{          
          url = "<?php echo site_url('reimbursment/edit_ctg/')?>" + gid;         
      }    
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               tampil();
               $('#exampleModal2').modal('hide');
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });      
    })    
  });
   

      function view(id){                
        $.ajax({
        url : "<?php echo site_url('index.php/reimbursment/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
            if (data.status == "0") {
                status = "PROCESS";
                var rejectButton = "<a href='' class='btn btn-danger'  data-dismiss='modal' data-toggle='modal' data-target='#RejectionReason'>Reject</a>";
                var approveButton = '<a href="<?php echo base_url()?>reimbursment/reimbursment_approval/'+id+'" class="btn btn-success" onclick="return confirm(\'Are you sure?\')">Approve</a>';
                $('#reject_id_leave').val(data.id_reimbursment);                
                $('.reject_button').html(rejectButton);
                $('.approve_button').html(approveButton); 
            }else{
                status = "APPROVED";
            }
            if (data.foto !== "") {
                $('#att').attr("src","files/attachment/"+data.foto);                
                $('#view_att').attr("src","files/attachment/"+data.foto);                                
                $('#img').show();
            }                      
            $('#en').text(data.employee_name);
            $('#date').text(data.date);
            $('#ctg').text(data.category);
            $('#description').text(data.description);
            var x = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'IDR' }).format(data.cost);
            $('#cost').text(x);                        
            $('#status').text(status);
            $('#modal_view').modal('show'); // show bootstrap modal when complete loaded                        
        },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });           
    }

    $('#att').on('click', function(){
      $('#view_image').modal('show');
    })
    </script>