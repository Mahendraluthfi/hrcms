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
                  <h3 class="mb-0">Salary View</h3>
                </div> 
                <div class="col-4 text-right">
                  <a href="javascript:history.back()" class="btn btn-primary"><i class="ni ni-bold-left"></i> Back</a>
                </div>                          
              </div>
            </div>
            <div class="card-body">            
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Name</th>                      
                      <th scope="col">Year</th>                      
                      <th scope="col">Jan</th>
                      <th scope="col">Feb</th>
                      <th scope="col">Mar</th>
                      <th scope="col">Apr</th>
                      <th scope="col">Mei</th>
                      <th scope="col">Jun</th>
                      <th scope="col">Jul</th>
                      <th scope="col">Aug</th>
                      <th scope="col">Sep</th>
                      <th scope="col">Okt</th>
                      <th scope="col">Nov</th>
                      <th scope="col">Des</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $show->employee_name ?></td>
                      <td><?php echo $year ?></td>
                      <td><?php echo $get1; ?></td>
                      <td><?php echo $get2; ?></td>
                      <td><?php echo $get3; ?></td>
                      <td><?php echo $get4; ?></td>
                      <td><?php echo $get5; ?></td>
                      <td><?php echo $get6; ?></td>
                      <td><?php echo $get7; ?></td>
                      <td><?php echo $get8; ?></td>
                      <td><?php echo $get9; ?></td>
                      <td><?php echo $get10; ?></td>
                      <td><?php echo $get11; ?></td>
                      <td><?php echo $get12; ?></td>                      
                    </tr>
                  </tbody>
                </table>
              </div><br>
              <h3 class="mb-0">Salary History</h3>  <br>                
              <div class="table-responsive">
                <table class="table align-items-center table-flush" id="datatable-basic">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" width="1%">No</th>                      
                      <th scope="col">Year/Month</th>                      
                      <th scope="col">Date Release</th>                      
                      <th scope="col">Total Salary</th>
                      <th scope="col">Action</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($result as $key) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('M Y', strtotime($key->year.'-'.$key->month.'-01')); ?></td>
                        <td><?php echo $key->date_release ?></td>                        
                        <td><?php echo number_format($key->total_salary) ?></td>
                        <td>
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-salary="<?php echo $key->salary ?>"  data-idallowance="<?php echo $key->id_allowance ?>" data-datt="<?php echo $key->deduct_attendance ?>" data-dleave="<?php echo $key->deduct_leave ?>" data-tallowance="<?php echo $key->total_allowance ?>" data-tsalary="<?php echo $key->total_salary ?>" id="detail">
                            Detail
                          </button>
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
      
      <div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Salary Detail</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-6">
                
                <form action="" method="POST" class="form-horizontal" role="form"> 
                      <div class="form-group row">
                          <label class="col-sm-6 text-right text-primary control-label col-form-label">Salary</label>
                          <label class="col-sm-6 control-label col-form-label text-right salary"></label>
                      </div>                        
                      <div class="form-group row">
                          <label class="col-sm-6 text-right text-primary control-label col-form-label">Deducted Leave</label>
                          <label class="col-sm-6 text-right control-label col-form-label deduct-leave"></label>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-6 text-right text-primary control-label col-form-label">Deducted Attendance</label>
                           <label class="col-sm-6 text-right control-label col-form-label deduct-att"></label>
                      </div>                
                      <div class="form-group row">
                          <label class="col-sm-6 text-right text-primary control-label col-form-label">Total Allowance</label>
                          <label class="col-sm-6 control-label text-right col-form-label tallowance"></label>
                      </div>  
                      <div class="form-group row">
                          <label class="col-sm-6 text-right text-primary control-label col-form-label">Total Salary</label>
                          <label class="col-sm-6 text-right text-red control-label col-form-label total-salary"></label>                          
                      </div>                
                </form>              
              </div>
              <div class="col-6">
                <h4>Allowance Detail</h4>
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" width="1%">No</th>                      
                        <th scope="col">Allowance Name</th>
                        <th scope="col">Nominal</th>                                              
                      </tr>
                    </thead>
                    <tbody id="show_data">
      
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
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
      $('#detail').on('click', function(){
        var salary = $(this).data('salary');
        var datt = $(this).data('datt');
        var dleave = $(this).data('dleave');
        var tallowance = $(this).data('tallowance');
        var tsalary = $(this).data('tsalary');
        var idallo = $(this).data('idallowance');
        var a = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'IDR' }).format(salary);
        var b = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'IDR' }).format(datt);
        var c = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'IDR' }).format(dleave);
        var d = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'IDR' }).format(tallowance);
        var e = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'IDR' }).format(tsalary);        
        $('.salary').text(a);
        $('.deduct-att').text(b);
        $('.deduct-leave').text(c);
        $('.tallowance').text(d);
        $('.total-salary').text(e);
        // console.log(a);
        $.ajax({
        url : "<?php echo site_url('index.php/salary_full/get_detail')?>/" + idallo,
        type: "GET",
        dataType: "JSON",
        success: function(data)
          {   
                // console.log(data);
                var html = '';
                var i;
                var no = 1;
                for(i=0; i < data.length; i++){
                
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
                            '<td>'+rupiah+'</td>'                                     
                            '</tr>';
                }
                $('#show_data').html(html);
                // alert('Oke')
          },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
          }
        });
      });
    </script>