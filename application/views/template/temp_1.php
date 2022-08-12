<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Website Admin Service Komputer</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="<?php echo base_url() ?>assets/content/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/content/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>assets/content/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url() ?>assets/content/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="<?php echo base_url() ?>assets/content/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/content/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/content/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url() ?>assets/content/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang</span>
                <h2><?php echo $this->session->userdata('ses_nama'); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <?php if ($this->session->userdata('ses_akun') == 1): ?>

              <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">              
                <div class="menu_section">
                  <h3>Menu</h3>
                  <ul class="nav side-menu">
                    <li><a href="<?php echo base_url() ?>"><i class="fa fa-laptop"></i> Dashboard </a></li>
                    <li><a><i class="fa fa-home"></i> Master Akun<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?php echo base_url() ?>Akun">Akun Aktif</a></li>
                        <li><a href="<?php echo base_url() ?>Akun/nonaktif">Akun NON Aktif</a></li>
                      </ul>
                    </li>
                    
                    <li><a href="<?php echo base_url() ?>ServicePengeluaran"><i class="fa fa-laptop"></i> Data Pengeluaran </a></li>

                    <li><a><i class="fa fa-home"></i> Data Service <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?php echo base_url() ?>ServiceRequest">Service Request</a></li>
                        <li><a href="<?php echo base_url() ?>ServiceMasuk">Service Masuk</a></li>
                        <li><a href="<?php echo base_url() ?>ServiceProses">Service Proses</a></li>
                        <li><a href="<?php echo base_url() ?>ServiceSelesai">Service Selesai</a></li>
                        <li><a href="<?php echo base_url() ?>ServiceTerima">Service Diterima</a></li>
                      </ul>
                    </li>
                    
                  </ul>
                </div>

              </div>
              <!-- /sidebar menu -->

            <?php else: ?>

            <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">              
                <div class="menu_section">
                  <h3>Menu</h3>
                  <ul class="nav side-menu">
                    <li><a href="<?php echo base_url() ?>"><i class="fa fa-laptop"></i> Dashboard </a></li>
                    
                    <li><a href="<?php echo base_url() ?>ServicePengeluaran"><i class="fa fa-laptop"></i> Data Pengeluaran </a></li>

                    <li><a><i class="fa fa-home"></i> Data Service <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?php echo base_url() ?>ServiceRequest">Service Request</a></li>
                        <li><a href="<?php echo base_url() ?>ServiceMasuk">Service Masuk</a></li>
                        <li><a href="<?php echo base_url() ?>ServiceProses">Service Proses</a></li>
                        <li><a href="<?php echo base_url() ?>ServiceSelesai">Service Selesai</a></li>
                        <li><a href="<?php echo base_url() ?>ServiceTerima">Service Diterima</a></li>
                      </ul>
                    </li>
                    
                  </ul>
                </div>

              </div>
              <!-- /sidebar menu -->

            <?php endif ?>


            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <?php echo $this->session->userdata('ses_nama'); ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="<?php echo base_url() ?>Login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
                  
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->
