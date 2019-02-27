<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Dashboard Admin HRCMS</title>
  <!-- Favicon -->
  <link href="<?php echo base_url() ?>asset/extra/assets/img/brand/NewLogo.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?php echo base_url() ?>asset/extra/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>asset/extra/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>asset/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css">     -->
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/vendor/bootstrap/css/bootstrap.css">    
  <!-- Argon CSS -->
  <link type="text/css" href="<?php echo base_url() ?>asset/extra/assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <!-- font awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link href="<?php echo base_url() ?>asset/extra/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">    
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/libs/select2/dist/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>asset/libs/bootstrap-daterangepicker/daterangepicker.css">    
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">  
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/argon.mine209.css?v=1.0.0" type="text/css">   -->
  <script src="<?php echo base_url() ?>asset/extra/assets/vendor/jquery/dist/jquery.min.js"></script>
  
<style type="text/css">
    #profile_pic {
        width: 100px;
    }

    #notifications {
      cursor: pointer;
      position: fixed;
      right: 0px;
      z-index: 9999;
      bottom: 0px;
      margin-bottom: 22px;
      margin-right: 15px;
      min-width: 300px; 
      max-width: 800px;   
    }
  </style>  
<style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style></head>

<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.html">
        <img src="<?php echo base_url() ?>asset/extra/assets/img/brand/New-Logo-Text-Hitam.png" width="150px" height="200px" class="navbar-brand-img" alt="...">
      </a>
      <!-- User Profil -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="<?php echo base_url() ?>asset/extra/assets/img/theme/team-1-800x800.jpg">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>

      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="<?php echo base_url() ?>asset/extra/assets/img/brand/New-Logo-Text-Hitam.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form Searching pencarian -->
        <form class="mt-6 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Sidebar samping kiri -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>">
              <i class="ni ni-tv-2 text-info"></i> Dashboard
            </a>
          </li>

          <?php 
          $id = $this->session->userdata('iduser'); 
          $role = $this->session->userdata('level');
          $query = $this->db->query("SELECT * FROM privilage JOIN modul ON privilage.modul_id=modul.modul_id WHERE modul.modul_parent='0' AND modul.modul_role='$role' AND privilage.user_id='$id' ORDER BY modul.modul_id ASC");
              foreach ($query->result() as $main) {
                  if ($main->modul_level == "1") {
                      echo "<li class='nav-item'>
                            <a class='nav-link' href='".base_url($main->modul_url)."'>
                              <i class='".$main->modul_icon."'></i> ".$main->modul_span."
                            </a>
                          </li>";                    
                  }elseif($main->modul_level == "0"){
                      $parent = $this->db->get_where('modul', array('modul_parent' => $main->modul_id));
                      echo "<a class='nav-link' href='#".$main->modul_url."' data-toggle='collapse' aria-expanded='false'>
                            <i class='".$main->modul_icon."'></i> ".$main->modul_span." </a>
                          <ul class='collapse list-unstyled' id='".$main->modul_url."'>
                            <li class='nav-item'>";
                      foreach ($parent->result() as $sub) {
                          echo "<a class='nav-link' href='".base_url($sub->modul_url)."'>
                                <i class='".$sub->modul_icon."'></i> ".$sub->modul_span." </a>";          
                      }
                      echo "</li></ul>";
                  }
              }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir Sidebar kiri -->


  <!-- Main content -->
  <div class="main-content">

    <!-- Top atas navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Akhir Top atas navbar -->

        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Dashboard <?php echo $this->session->userdata('name'); ?></a>
        <!-- Form -->
        
        <!-- User Admin-->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?php echo base_url() ?>asset/extra/assets/img/theme/team-1-800x800.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $this->session->userdata('name'); ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('login/logout') ?>" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
        <!-- Akhir User Admin-->
      </div>
    </nav>


    <!-- Header -->
    <?php $this->load->view($content); ?>
  <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>    
  </div>

  <!-- Akhir  Main content -->
  <!-- Argon Scripts -->
  <!-- Core -->
  <!-- <script src="<?php echo base_url() ?>asset/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>asset/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
  <script src="<?php echo base_url() ?>asset/extra/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="<?php echo base_url() ?>asset/extra/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>asset/extra/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url() ?>asset/extra/assets/js/argon.js?v=1.0.0"></script>
  <script src="<?php echo base_url(); ?>asset/libs/select2/dist/js/select2.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/libs/jquery.currency/jquery.currency.js"></script>
  <script src="<?php echo base_url(); ?>asset/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/libs/moment/min/moment.min.js"></script>    
  <script src="<?php echo base_url(); ?>asset/libs/bootstrap-daterangepicker/daterangepicker.js"></script>    
  <script src="<?php echo base_url(); ?>asset/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>asset/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>asset/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url() ?>asset/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>asset/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url() ?>asset/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?php echo base_url() ?>asset/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url() ?>asset/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/argon.mine209.js?v=1.0.0"></script>  
  <script>

    /****************************************
     *       Basic Table                   *
     ****************************************/        
     var DatatableBasic=function(){var e=$("#datatable-basic");e.length&&e.on("init.dt",function(){$("div.dataTables_length select").removeClass("custom-select custom-select-sm")}).DataTable({language:{paginate:{previous:"<i class='fas fa-angle-left'>",next:"<i class='fas fa-angle-right'>"}}})}();
     var DatatableBasic2=function(){var e=$("#datatable-basic2");e.length&&e.on("init.dt",function(){$("div.dataTables_length select").removeClass("custom-select custom-select-sm")}).DataTable({language:{paginate:{previous:"<i class='fas fa-angle-left'>",next:"<i class='fas fa-angle-right'>"}}})}();
    $('#drp').daterangepicker({                                   
      locale: {
        format: 'DD-MM-YYYY'      
      }
    });
    $('#drp2').daterangepicker({                                   
      locale: {
        format: 'DD-MM-YYYY'
      }
    });
    $('#drp3').daterangepicker({                                   
      locale: {
        format: 'DD-MM-YYYY'
      }
    });    
    $('#drp4').daterangepicker({                                   
      locale: {
        format: 'YYYY-MM-DD'
      },
      "minDate": new Date()            
    });    
     $('#drp4').on('apply.daterangepicker', function(ev, picker) {
        var ax = picker.startDate.format('YYYY-MM-DD');
        var bx = picker.endDate.format('YYYY-MM-DD');
        var a = moment(ax, 'YYYY-MM-DD');
        var b = moment(bx, 'YYYY-MM-DD');
        var days = b.diff(a, 'days') + 1;
        $('#nod').text(days);
        var rem = $('#ttlrem').val();
        var diff = rem - days;
        if (diff < 0) {
            var r = confirm("You Have Exceed the number of Remaining Leave, Your Salary will be deducted if you still Proceed it");
            if (r == false) {
                document.getElementById("drp").value = "";
                $('#nod').text("");
            }else{
                $('#diff').text(' / '+diff);                
            }
        }else{
            $('#diff').text(' / '+diff);                          
        }
    });
    $('#zero_config').DataTable();
    $(".select2").select2();
   jQuery('.mydatepicker').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
   });
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
    });
  jQuery('#datepicker-autoclose2').datepicker({
        autoclose: true,
        todayHighlight: true,
    });

    $('#notifications').slideDown('slow').delay(2500).slideUp('slow');          

  </script>


</body></html>