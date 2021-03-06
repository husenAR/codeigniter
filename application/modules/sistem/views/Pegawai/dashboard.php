<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi SMP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome --><!-- 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/superadmin/home/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/superadmin/home/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/css/style.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/superadmin/datatables/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/superadmin/datatables/datatables.net-buttons-bs/css/buttons.bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/superadmin/datatables/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/superadmin/datatables/datatables.net-responsive-bs/css/responsive.bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/superadmin/datatables/datatables.net-scroller-bs/css/scroller.bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/superadmin/datatables/datatables/searchcolumn.css'); ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/superadmin/sweetalert/sweetalert.css'); ?>">

    <script type="text/javascript" src="<?php echo base_url('assets/superadmin/sweetalert/sweetalert.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/admin/bootstrap/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/admin/bootstrap/js/moment.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/admin/bootstrap/js/transition.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/admin/bootstrap/js/collapse.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/admin/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/admin/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/bootstrap/css/bootstrap-datetimepicker.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo site_url('sistem/pegawai');?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SI</b>SMP</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- Notifications: style can be found in dropdown.less -->

            <!-- Tasks: style can be found in dropdown.less -->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url();?>assets/superadmin/fotoguru/<?php echo $foto; ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $nama; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url();?>assets/superadmin/fotoguru/<?php echo $foto; ?>" class="img-circle" alt="User Image">
                  <p>
                    <?php echo $nama; ?>
                    <small><?php echo $username; ?></small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body pdg">
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo site_url('sistem/pegawai/profile');?>" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo site_url('sistem/logout');?>" class="btn btn-default btn-flat">Log Out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- search form -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->


        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <!-- Sidebar user panel -->

        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          
                 <li class="header">MAIN NAVIGATION</li>

          <?php
          $arrmenuakses = explode(",", $this->session->userdata("menuakses"));
          ?>
          <!-- SIDE MENU PEGAWAI BARU -->
          <?php 
          if (in_array("1", $arrmenuakses)) {
            ?>
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Kesiswaan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu active">

                <!-- +++++++++++++++++++++++PPDB+++++++++++++++++++++++++ -->
                <?php 
                if (in_array("2", $arrmenuakses)) {
                  ?>
                  <li ><a href="#"><i class="fa fa-circle-o"></i> Penerimaan Peserta Didik Baru </a>
                   <ul class="treeview-menu">

                    <?php 
                    if (in_array("3", $arrmenuakses)) {
                      ?>
                      <li ><a href="<?php echo base_url();?>sistem/pegawai/ppdbujian"><i class="fa fa-circle-o text-red"></i> PPDB Ujian</a></li>
                      <?php
                    }
                    ?>

                    <?php 
                    if (in_array("4", $arrmenuakses)) {
                      ?>
                      <li ><a href="<?php echo base_url();?>sistem/pegawai/ppdbneg"><i class="fa fa-circle-o text-red"></i> PPDB UN</a></li>
                      <?php
                    }
                    ?>
                  </ul>
                </li>
                <?php
              }
              ?>
              <!-- tutup ppdb -->

              <!-- ++++++++++++++++++++++DAFTAR ULANG+++++++++++++++++++++++++++++++++ -->

              <?php 
              if (in_array("5", $arrmenuakses)) {
                ?>
                <li ><a href="#"><i class="fa fa-circle-o"></i> Daftar Ulang </a> 
                 <ul class="treeview-menu">

                  <?php 
                  if (in_array("6", $arrmenuakses)) {
                    ?>
                    <li ><a href="<?php echo base_url();?>sistem/pegawai/daftarulang"><i class="fa fa-circle-o text-red"></i>Peserta Didik Baru</a></li>
                    <?php
                  }
                  ?>

                  <?php 
                  if (in_array("7", $arrmenuakses)) {
                    ?>
                    <li ><a href="<?php echo base_url();?>sistem/pegawai/daftarkenaikan"><i class="fa fa-circle-o text-red"></i>Kenaikan Kelas</a></li>
                    <?php
                  }
                  ?>
                </ul>
              </li>
              <?php
            }
            ?>
            <!-- ++++++++++++++++++++++++TUTUP DAFTAR ULANG+++++++++++++++++++++++++ -->


            <!-- ++++++++++++++++++++++++dISTRIBUSI KELAS+++++++++++++++++++++++++ -->
            <?php 
            if (in_array("8", $arrmenuakses)) {
              ?>
              <li><a href="#"><i class="fa fa-circle-o"></i> Distribusi Kelas </a>
                <ul class="treeview-menu">

                  <?php 
                  if (in_array("9", $arrmenuakses)) {
                    ?>
                    <li ><a href="<?php echo site_url('sistem/pegawai/distribusi_reg');?>"><i class="fa fa-circle-o text-red"></i> Kelas Reguler </a></li>
                    <?php
                  }
                  ?>

                  <?php 
                  if (in_array("10", $arrmenuakses)) {
                    ?>
                    <li ><a href="<?php echo site_url('sistem/pegawai/distribusi_tam');?>"><i class="fa fa-circle-o text-red"></i> Kelas Tambahan </a></li>
                    <?php
                  }
                  ?>


                  <?php 
                  if (in_array("11", $arrmenuakses)) {
                    ?>
                    <li ><a href="<?php echo base_url();?>sistem/pegawai/klinik_un"><i class="fa fa-circle-o text-red"></i> Klinik UN</a></li>
                    <?php
                  }
                  ?>
                </ul>
              </li>
              <?php
            }
            ?>
            <!-- ++++++++++++++++++++++++TUTUP DISTRIBUSI KELAS++++++++++++++++++++++ -->


            <!-- ++++++++++++++++++++++++MUTASI++++++++++++++++++++++++ -->
            <?php 
            if (in_array("12", $arrmenuakses)) {
              ?>
              <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Mutasi </a>
                <ul class="treeview-menu" >
                  <?php 
                  if (in_array("13", $arrmenuakses)) {
                    ?>
                    <li class="active" ><a href="<?php echo base_url();?>sistem/pegawai/mutasi_masuk"><i class="fa fa-circle-o text-red"></i> Mutasi Masuk</a></li>
                    <?php
                  }
                  ?>

                  <?php 
                  if (in_array("14", $arrmenuakses)) {
                    ?>
                    <li class="active" ><a href="<?php echo base_url();?>sistem/pegawai/mutasi_keluar"><i class="fa fa-circle-o text-red"></i> Mutasi Keluar</a></li>
                    <?php
                  }
                  ?>
                </ul>
              </li>
              <?php
            }
            ?>
            <!-- ++++++++++++++++++++++++TUTUP MUTASI+++++++++++++++++++++++++ -->
            <?php 
            if (in_array("15", $arrmenuakses)) {
              ?>
              <li><a href="<?php echo base_url();?>sistem/pegawai/bukuinduk"><i class="fa fa-circle-o"></i>Buku Induk</a></li>
              <?php
            }
            ?>

          </ul>
        </li>
        <?php
      }
      ?>



      <!-- ++++++++++++++++++++++++++++KURIKULUM++++++++++++++++++++++++++++++ -->
      <?php 
      if (in_array("16", $arrmenuakses)) {
        ?>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Kurikulum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">



            <!-- ++++++++++++++++++++++++++++PENJADWALAN++++++++++++++++++++++++++++++ -->
            <?php 
            if (in_array("17", $arrmenuakses)) {
              ?>
              <li ><a href="#"><i class="fa fa-circle-o"></i> Penjadwalan</a>
               <ul class="treeview-menu">

                <?php 
                if (in_array("18", $arrmenuakses)) {
                  ?>
                  <li ><a href="<?php echo site_url('sistem/pegawai/namamapel'); ?>"><i class="fa fa-circle-o text-red"></i> Tambah Mapel</a></li>
                  <?php
                }
                ?>

                <?php 
                if (in_array("19", $arrmenuakses)) {
                  ?>
                  <li ><a href="<?php echo site_url('sistem/pegawai/mapel'); ?>"><i class="fa fa-circle-o text-red"></i> Mengelola Mapel</a></li>
                  <?php
                }
                ?>


                <?php 
                if (in_array("20", $arrmenuakses)) {
                  ?>
                  <li ><a href="<?php echo site_url('sistem/pegawai/harirentang'); ?>"><i class="fa fa-circle-o text-red"></i> Mengelola Hari & Jam</a></li>
                  <?php
                }
                ?>

                <?php 
                if (in_array("21", $arrmenuakses)) {
                  ?>
                  <li ><a href="<?php echo site_url('sistem/pegawai/jammengajar'); ?>"><i class="fa fa-circle-o text-red"></i> Jam Mengajar Guru</a></li>
                  <?php
                }
                ?>

                <?php 
                if (in_array("22", $arrmenuakses)) {
                  ?>
                  <li ><a href="<?php echo site_url('sistem/pegawai/jadwalmapel'); ?>"><i class="fa fa-circle-o text-red"></i> Jadwal Mapel</a></li>
                  <?php
                }
                ?>

                <?php 
                if (in_array("23", $arrmenuakses)) {
                  ?>
                  <li ><a href="<?php echo site_url('sistem/pegawai/jadwalpiketguru'); ?>"><i class="fa fa-circle-o text-red"></i> Jadwal Piket Guru</a></li>
                  <?php
                }
                ?>

                <?php 
                if (in_array("24", $arrmenuakses)) {
                  ?>
                  <li ><a href="<?php echo site_url('sistem/pegawai/jadwaltambahan'); ?>"><i class="fa fa-circle-o text-red"></i> Jadwal Tambahan</a></li>
                  <?php
                }
                ?>


                <?php 
                if (in_array("25", $arrmenuakses)) {
                  ?>
                  <li ><a href="<?php echo site_url('sistem/pegawai/Ekstrakurikuler'); ?>"><i class="fa fa-circle-o text-red"></i> Mengelola Ekstrakurikuler</a></li>
                  <?php
                }
                ?>

              </ul>
            </li>
            <?php
          }
          ?>
          <!-- ++++++++++++++++++++++++TUTUP PENJADWALAN++++++++++++++++++++++++++++-->


          <!-- ++++++++++++++++++++++++PENILAIAN++++++++++++++++++++++++++++-->
          <?php 
          if (in_array("26", $arrmenuakses)) {
            ?>
            <li class="active" ><a href="#"><i class="fa fa-circle-o"></i> Penilaian</a>
             <ul class="treeview-menu">

              <?php 
              if (in_array("27", $arrmenuakses)) {
                ?>
                <li ><a href="<?php echo base_url();?>sistem/pegawai/kaldik"><i class="fa fa-circle-o text-red"></i> KALDIK</a></li>
                <?php
              }
              ?>

              <?php 
              if (in_array("28", $arrmenuakses)) {
                ?>
                <li ><a href="<?php echo base_url();?>sistem/pegawai/kurikulum"><i class="fa fa-circle-o text-red"></i> Kurikulum Sekolah</a></li>
                <?php
              }
              ?>

              <?php 
              if (in_array("29", $arrmenuakses)) {
                ?>
                <li class="active"><a href="<?php echo base_url();?>sistem/pegawai/presensi_siswa"><i class="fa fa-circle-o text-red"></i> Presensi Siswa</a></li>
                <?php
              }
              ?>

              <?php 
              if (in_array("30", $arrmenuakses)) {
                ?>
                <li class="active"><a href="<?php echo base_url();?>sistem/pegawai/nilaisiswa"><i class="fa fa-circle-o text-red"></i> Nilai Siswa</a></li>  
                <?php
              }
              ?>

              <?php 
              if (in_array("31", $arrmenuakses)) {
                ?>
                <li ><a href="<?php echo base_url();?>sistem/pegawai/kategorinilai"><i class="fa fa-circle-o text-red"></i> Kategori Nilai</a></li>
                <?php
              }
              ?>

              <?php 
              if (in_array("32", $arrmenuakses)) {
                ?>
                <li ><a href="<?php echo base_url();?>sistem/pegawai/jenisnilaiakhir"><i class="fa fa-circle-o text-red"></i> Jenis Nilai Akhir</a></li>
                <?php
              }
              ?>

              <?php 
              if (in_array("33", $arrmenuakses)) {
                ?>
                <li><a href="<?php echo base_url();?>sistem/pegawai/deskripsinilai"><i class="fa fa-circle-o text-red"></i> Deskripsi Nilai</a></li>
                <?php
              }
              ?>

              <?php 
              if (in_array("34", $arrmenuakses)) {
                ?>
                <li><a href="<?php echo base_url();?>sistem/pegawai/rapor"><i class="fa fa-circle-o text-red"></i> Rapor</a></li>
                <?php
              }
              ?>

            </ul>
          </li>
          <?php
        }
        ?>

        <!-- ++++++++++++++++++++++++TUTUP PENILAIAN++++++++++++++++++++++++++++-->
      </ul>
    </li>
    <?php
  }
  ?>

  <!-- ++++++++++++++++++++++TUTUP KURIKULUM++++++++++++++++++++++++++++++++ -->

  <?php 
  if (in_array("35", $arrmenuakses)) {
    ?>
    <li class="treeview active">
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>Kepegawaian</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <?php 
        if (in_array("36", $arrmenuakses)) {
          ?>
          <li ><a href="<?php echo site_url('sistem/pegawai/datapegawai');?>"><i class="fa fa-circle-o"></i>Data Pegawai</a></li>
          <?php
        }
        ?>

        <?php 
        if (in_array("37", $arrmenuakses)) {
          ?>
           <li><a href="<?php echo site_url('sistem/pegawai/presensipegawai');?>"><i class="fa fa-circle-o"></i>Presensi Pegawai</a></li>
          <?php
        }
        ?>
        
      </ul>
    </li>
    <?php
  }
  ?>



  <?php 
  if (in_array("38", $arrmenuakses)) {
    ?>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>Non Akademik</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
  <ul class="treeview-menu">
      <?php 
      if (in_array("39", $arrmenuakses)) {
        ?>
      
          <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i> Ekstrakurikuler</a>
            <ul class="treeview-menu">

              <?php 
              if (in_array("40", $arrmenuakses)) {
                ?>
                <li><a href="<?php echo base_url();?>sistem/pegawai/pendaftaran"><i class="fa fa-circle-o text-red"></i>Pendaftaran</a></li>
                <?php
                }
                ?>

                <?php 
                if (in_array("41", $arrmenuakses)) {
                  ?>
                  <li><a href="<?php echo base_url();?>sistem/pegawai/jadwal"><i class="fa fa-circle-o text-red"></i> Jadwal Ekstrakurikuler</a></li>
                  <?php
                }
                ?>

                <?php 
                if (in_array("42", $arrmenuakses)) {
                  ?>
                  <li><a href="<?php echo base_url();?>sistem/pegawai/presensi"><i class="fa fa-circle-o text-red"></i> Presensi</a></li>
                  <?php
                }
                ?>

                <?php 
                if (in_array("43", $arrmenuakses)) {
                  ?>
                  <li><a href="<?php echo base_url();?>sistem/pegawai/nilai"><i class="fa fa-circle-o text-red"></i> Nilai</a></li>
                  <?php
                }
                ?>

                <?php 
                if (in_array("44", $arrmenuakses)) {
                  ?>
                  <li><a href="<?php echo base_url();?>sistem/pegawai/pembayaran"><i class="fa fa-circle-o text-red"></i> Pendanaan</a></li>
                  <?php
                }
                ?>

              </ul>
            </li>
            <?php 
          }
          ?>


          <?php 
                if (in_array("45", $arrmenuakses)) {
                  ?>
          <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i> Bimbingan Konseling</a>
           <ul class="treeview-menu">

            <?php 
                if (in_array("46", $arrmenuakses)) {
                  ?>
             <li ><a href="<?php echo base_url();?>sistem/pegawai/keterlambatan"><i class="fa fa-circle-o text-red"></i> Keterlambatan & Jam</a></li>
             <?php 
          }
          ?>

             <?php 
                if (in_array("47", $arrmenuakses)) {
                  ?>
             <li><a href="<?php echo base_url();?>sistem/pegawai/absensi_harian"><i class="fa fa-circle-o text-red"></i> Perizinan</a></li>
             <?php 
          }
          ?>

             <?php 
                if (in_array("48", $arrmenuakses)) {
                  ?>
             <li><a href="<?php echo base_url();?>sistem/pegawai/pelanggaran"><i class="fa fa-circle-o text-red"></i> Pelanggaran</a></li>
             <?php 
          }
          ?>

             <?php 
                if (in_array("49", $arrmenuakses)) {
                  ?>
             <li><a href="<?php echo base_url();?>sistem/pegawai/prestasi"><i class="fa fa-circle-o text-red"></i> Prestasi</a></li>
             <?php 
          }
          ?>
           </ul>
         </li>
         <?php 
          }
          ?>

       </ul>
     </li>
     <?php
   }
   ?>

  <br>

  <li class="header">OPTIONAL</li>

<li class="treeview">
  <a href="<?php echo site_url('sistem/pegawai/rekapkehadiran');?>">
    <i class="fa fa-circle-o text-aqua"></i> <span>Rekap Kehadiran Pribadi</span>
  </a>
</li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-circle-o text-aqua"></i> <span>Settings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo site_url('sistem/pegawai/gantipassword');?>">Ganti Password</a></li> 
            </ul> 
          </li>

        </ul>

      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->


    <!-- Main content -->
    <?php echo $contents; ?>
    <!-- /.content -->

    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
            <!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url();?>/assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>assets/superadmin/home/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url();?>/assets/admin/bootstrap/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <!-- Sparkline -->
  <script src="<?php echo base_url();?>/assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="<?php echo base_url();?>/assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?php echo base_url();?>/assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo base_url();?>/assets/admin/plugins/knob/jquery.knob.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="<?php echo base_url();?>/assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="<?php echo base_url();?>/assets/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo base_url();?>/assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?php echo base_url();?>/assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url();?>/assets/admin/plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url();?>/assets/admin/dist/js/app.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url();?>/assets/admin/dist/js/demo.js"></script>
</body>

<!-- diagram -->
<script src="<?php echo base_url();?>/assets/admin/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>/assets/admin/highcharts/modules/exporting.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url();?>/assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable();
    $('#example3').DataTable();
    $('#example4').DataTable();
    $('#example5').DataTable();
    $('#example6').DataTable();
    $('#example7').DataTable();
    $('#example8').DataTable();
    $('#example9').DataTable();
    $('#example100').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/bootstrap/css/jquery.datetimepicker.min.css"/ >
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/bootstrap/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
  $(function () {
    $('#datetimepicker').datetimepicker({
      timepicker:false,
      format:'Y-m-d',
    });
  });
</script>
<script type="text/javascript">
  $(function () {
    $('#datetimepicker1').datetimepicker({
      timepicker:false,
      format:'Y-m-d',
    });
  });
</script>
<script type="text/javascript">
  $(function () {
    $('#datetimepicker2').datetimepicker({
      timepicker:false,
      format:'Y-m-d',
    });
  });
</script>
<script type="text/javascript">
  $(function () {
    $('#datetimepicker3').datetimepicker({
      timepicker:false,
      format:'Y-m-d',
    });
  });
</script>


<?php
if (@$grafikpresensipegawai == TRUE) {
  ?>
  <script type="text/javascript">

    Highcharts.chart('container', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'Grafik Kehadiran Pegawai Tahun <?php 
                $thn = date('Y');
                if ($this->input->post('thn') != "") { $thn = $this->input->post('thn'); }
                ?><?php echo @$thn; ?>'
      },
    // subtitle: {
    //   text: 'Source: WorldClimate.com'
    // },
    xAxis: {
      categories: [
      'Jan',
      'Feb',
      'Mar',
      'Apr',
      'Mei',
      'Jun',
      'Jul',
      'Agu',
      'Sep',
      'Okt',
      'Nov',
      'Des'
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Persentase'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Hadir',
      data: [
      <?php
      for ($i=1;$i<=12;$i++) {
        if ($i>1) { echo ","; }
        if ($datpresensitotal[$i] <= 0) {
          echo 0+@$datpresensitotalbulan[$i]['H']; 
        } else {
          echo ((0+@$datpresensitotalbulan[$i]['H'] / @$datpresensitotal[$i]) * 100); 
        }
      }
      ?>
      ]

    }, {
      name: 'Sakit',
      data: [
      <?php
      for ($i=1;$i<=12;$i++) {
        if ($i>1) { echo ","; }
        if ($datpresensitotal[$i] <= 0) {
          echo 0+@$datpresensitotalbulan[$i]['S']; 
        } else {
          echo ((0+@$datpresensitotalbulan[$i]['S'] / @$datpresensitotal[$i]) * 100); 
        }
      }
      ?>
      ]

    }, {
      name: 'Izin',
      data: [
      <?php
      for ($i=1;$i<=12;$i++) {
        if ($i>1) { echo ","; }
        if ($datpresensitotal[$i] <= 0) {
          echo 0+@$datpresensitotalbulan[$i]['I']; 
        } else {
          echo ((0+@$datpresensitotalbulan[$i]['I'] / @$datpresensitotal[$i]) * 100); 
        }
      }
      ?>
      ]

    }, {
      name: 'Alfa',
      data: [
      <?php
      for ($i=1;$i<=12;$i++) {
        if ($i>1) { echo ","; }
        if ($datpresensitotal[$i] <= 0) {
          echo 0+@$datpresensitotalbulan[$i]['A']; 
        } else {
          echo ((0+@$datpresensitotalbulan[$i]['A'] / @$datpresensitotal[$i]) * 100); 
        }
      }
      ?>
      ]

    }]
  });
</script>

<?php
}
?>

<?php
if (@$grafikusia == TRUE) {
  ?>

    <script type="text/javascript">

Highcharts.chart('grafikusia', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Grafik Pengelompokan Pegawai Berdasarkan Usia'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f} % ({point.y:.1f} orang)</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} % ({point.y:.1f} orang)',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: '20-30',
            y: <?php echo $pegawai_20_30; ?>
        }, {
            name: '31-40',
            y: <?php echo $pegawai_31_40; ?>,
            sliced: true,
            selected: true
        }, {
            name: '41-50',
            y: <?php echo $pegawai_41_50; ?>
        }, {
            name: '51-60',
            y: <?php echo $pegawai_51_60; ?>
        }]
    }]
});
    </script>
<?php
}
?>

<?php
if (@$grafikpendidikan == TRUE) {
  ?>

    <script type="text/javascript">

Highcharts.chart('grafikpendidikan', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Grafik Pengelompokan Pegawai Berdasarkan Pendidikan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}% ({point.y:.1f} orang)</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} % ({point.y:.1f} orang)',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'SMA',
            y: <?php echo $total_sma; ?>
        }, {
            name: 'D3',
            y: <?php echo $total_d3; ?>,
            sliced: true,
            selected: true
        }, {
            name: 'S1',
            y: <?php echo $total_s1; ?>
        }, {
            name: 'S2',
            y: <?php echo $total_s2; ?>
        }, {
            name: 'S3',
            y: <?php echo $total_s3; ?>
        }]
    }]
});
    </script>
<?php
}
?>


<?php
if (@$grafikpensiun == TRUE) {
  ?>

    <script type="text/javascript">

Highcharts.chart('grafikpensiun', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Grafik Pegawai Pensiun'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}% ({point.y:.1f} orang)</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} % ({point.y:.1f} orang)',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Bakal Pensiun',
            y: <?php echo $sudahakanpensiun; ?>
        }, {
            name: 'Masih Aktif',
            y: <?php echo $belumakanpensiun; ?>,
            sliced: true,
            selected: true
        }]
    }]
});
    </script>
<?php
}
?>


<?php
if (@$persentase == TRUE) {
  ?>
  <script type="text/javascript">
    Highcharts.chart('visitor', {
      chart: {
            plotBackgroundColor: null, 
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
      title: {
            text: 'Grafik Kehadiran Pegawai Tahun <?php 
                $thn = date('Y');
                if ($this->input->post('thn') != "") { $thn = $this->input->post('thn'); }
                ?><?php echo @$thn; ?>'
        },
       tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },

      plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
      series: [{
        type: 'pie',
        name: 'Jumlah Persentase',
        colorByPoint: true,
      
        data: [
        ['Hadir',
        <?php
        for ($i=1;$i<=12;$i++) {
          if ($i>1) { echo ","; }
          echo 0+@$datpresensitotalbulan[$i]['H']; 
        }
        ?>
        
        ],

        ['Sakit',  <?php
        for ($i=1;$i<=12;$i++) {
          if ($i>1) { echo ","; }
          echo 0+@$datpresensitotalbulan[$i]['S']; 
        }
        ?>],
        ['Ijin', <?php
        for ($i=1;$i<=12;$i++) {
          if ($i>1) { echo ","; }
          echo 0+@$datpresensitotalbulan[$i]['I']; 
        }
        ?>],
        ['Alfa', <?php 
        for ($i=1;$i<=12;$i++) {
          if ($i>1) { echo ","; }
          echo 0+@$datpresensitotalbulan[$i]['A']; 
        }
        ?>],
        ]
      }]
    });


  </script>
  <?php
}
?>




<?php
if (@$rekap == TRUE) {
  ?>
<script type="text/javascript">

// Create the chart
Highcharts.chart('rekap', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Kehadiran Pegawai <?php echo $nama_tahun_ajaran; ?>'
    },
    // subtitle: {
    //     text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
    // },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }

    },
    legend: {
        enabled: true
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }

        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Hadir',
            y: <?php
                  if ($datpresensitotal <= 0) {
                    echo 0+@$datpresensitotaltanggal['H']; 
                  } else {
                    echo ((0+@$datpresensitotaltanggal['H'] / @$datpresensitotal) * 100); 
                  }
                ?>,
            //drilldown: 'Microsoft Internet Explorer'
        }, {
            name: 'Sakit',
            y: <?php
                  if ($datpresensitotal <= 0) {
                    echo 0+@$datpresensitotaltanggal['S']; 
                  } else {
                    echo ((0+@$datpresensitotaltanggal['S'] / @$datpresensitotal) * 100); 
                  }
                ?>,
            //drilldown: 'Chrome'
        }, {
            name: 'Izin',
            y: <?php
                  if ($datpresensitotal <= 0) {
                    echo 0+@$datpresensitotaltanggal['I']; 
                  } else {
                    echo ((0+@$datpresensitotaltanggal['I'] / @$datpresensitotal) * 100); 
                  }
                ?>,
            //drilldown: 'Firefox'
        }, {
            name: 'Alpa',
            y: <?php
                  if ($datpresensitotal <= 0) {
                    echo 0+@$datpresensitotaltanggal['A']; 
                  } else {
                    echo ((0+@$datpresensitotaltanggal['A'] / @$datpresensitotal) * 100); 
                  }
                ?>,
            //drilldown: 'Safari'
        }]
    }]
});
    </script>

<?php
}
?>

</html>

