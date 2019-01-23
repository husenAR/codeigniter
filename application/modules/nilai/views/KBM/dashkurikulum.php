<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="dashboard.php" class="logo">
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
                      <img src="<?php echo base_url();?>/assets/Superadmin/Fotoguru/<?php echo $foto ?>" class="user-image" alt="User Image">
                      <span class="hidden-xs"><?php echo $nama ?></span>
                    </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url();?>/assets/Superadmin/Fotoguru/<?php echo $foto ?>" class="img-circle" alt="User Image">

                  <p>
                     
                     
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body pdg">
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                     
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo site_url('sistem/logout');?>" ><i class="fa fa-sign-out"></i>Log Out</a>
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
          <li class="header">KBM</li>
          <?php
          if ($this->session->userdata("jabatan") == "Admin") {
            ?>
            <li class="treeview">
              <a href="<?php echo base_url(); ?> ('nilaisiswa.php')">


                <i class="fa fa-dashboard"></i> <span>Kesiswaan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li ><a href="harirentang.php"><i class="fa fa-circle-o"></i> Penerimaan Peserta Didik Baru </a>
                 <ul class="treeview-menu">
                  <li ><a href="ppdbujian.php"><i class="fa fa-circle-o text-red"></i> PPDB Ujian</a></li>
                  <li ><a href="ppdbneg.php"><i class="fa fa-circle-o text-red"></i> PPDB UN</a></li>
                </ul>
              </li>
              <li ><a href="harirentang.php"><i class="fa fa-circle-o"></i> Daftar Ulang </a> 
               <ul class="treeview-menu">
                <li ><a href="daftarulang.php"><i class="fa fa-circle-o text-red"></i>Peserta Didik Baru</a></li>
                <li ><a href="daftarkenaikan.php"><i class="fa fa-circle-o text-red"></i>Kenaikan Kelas</a></li>
              </ul>
            </li>

            <li ><a href="distribusi.php"><i class="fa fa-circle-o"></i> Distribusi Kelas </a>
              <ul class="treeview-menu">
                <li ><a href="distribusi.php"><i class="fa fa-circle-o text-red"></i> Kelas Reguler </a></li>
                <li ><a href="distribusi2.php"><i class="fa fa-circle-o text-red"></i> Kelas Tambahan </a></li>
              </ul>
              <li ><a href="mutasi.php"><i class="fa fa-circle-o"></i> Mutasi </a>
                <ul class="treeview-menu">
                  <li ><a href="masuk.php"><i class="fa fa-circle-o text-red"></i> Mutasi Masuk</a></li>
                  <li ><a href="keluar.php"><i class="fa fa-circle-o text-red"></i> Mutasi Keluar</a></li>
                </ul>
              </li>
            </li>

          </ul>
        </li>
        <?php
      }
      ?>
      <?php
      if ($this->session->userdata("jabatan") == "Kurikulum") {
      ?>
      <li class="treeview active">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Kurikulum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="harirentang.php"><i class="fa fa-circle-o"></i> Penjadwalan</a>
              <ul class="treeview-menu active">
                <li ><a href="<?php echo site_url('penjadwalan/kurikulum/namamapel'); ?>"><i class="fa fa-circle-o text-red"></i> Tambah Mapel</a></li>
                <li ><a href="<?php echo site_url('penjadwalan/kurikulum/mapel'); ?>"><i class="fa fa-circle-o text-red"></i> Mengelola Mapel</a></li>
                <li ><a href="<?php echo site_url('penjadwalan/kurikulum/harirentang'); ?>"><i class="fa fa-circle-o text-red"></i> Mengelola Hari & Jam</a></li>
                <li ><a href="<?php echo site_url('penjadwalan/kurikulum/jammengajar'); ?>"><i class="fa fa-circle-o text-red"></i> Jam Mengajar Guru</a></li>
                <li ><a href="<?php echo site_url('penjadwalan/kurikulum/jadwalmapel'); ?>"><i class="fa fa-circle-o text-red"></i> Jadwal Mapel</a></li>
                <li ><a href="<?php echo site_url('penjadwalan/kurikulum/jadwalpiketguru'); ?>"><i class="fa fa-circle-o text-red"></i> Jadwal Piket Guru</a></li>
                <li ><a href="<?php echo site_url('penjadwalan/kurikulum/jadwaltambahan'); ?>"><i class="fa fa-circle-o text-red"></i> Jadwal Tambahan</a></li>
                <li ><a href="<?php echo site_url('penjadwalan/kurikulum/Ekstrakurikuler'); ?>"><i class="fa fa-circle-o text-red"></i> Jadwal Ekskul</a></li>
              </ul>
            </li>
            <li class="active"><a href="harirentang.php"><i class="fa fa-circle-o"></i> Penjadwalan</a>
              <ul class="treeview-menu active">
                <li class=""><a href="<?php echo base_url('nilai/akademik/KALDIK') ?>"><i class="fa fa-circle-o text-red "></i> <span>Kaldik</span></a></li>
                <li><a href="<?php echo base_url('nilai/akademik/kurikulum') ?>"><i class="fa fa-circle-o text-red"></i> <span>Kurikulum</span></a></li>
                <li class=""><a href="<?php echo base_url('nilai/akademik/presensi') ?>"><i class="fa fa-circle-o text-red"></i> <span>Presensi Siswa</span></a></li>
                <li class=""><a href="#"><i class="fa fa-circle-o "></i> Penilaian</a>
                  <ul class="treeview-menu active">
                    <li class=""><a href="<?php echo base_url('nilai/penilaian/nilaisiswa') ?>"><i class="fa fa-circle-o text-red"></i> Nilai Siswa</a></li>
                    <li class=""><a href="<?php echo base_url('nilai/penilaian/Kompetensi') ?>"><i class="fa fa-circle-o text-red"></i> Kompetensi Dasar</a></li>
                    <li ><a href="<?php echo base_url('nilai/penilaian/Kategorinilai') ?>"><i class="fa fa-circle-o text-red"></i> Kategori Nilai</a></li>
                    <li><a href="<?php echo base_url('nilai/penilaian/jenisNA') ?>"><i class="fa fa-circle-o text-red"></i> Jenis Nilai Akhir</a></li>
                    <li ><a href="<?php echo base_url('nilai/penilaian/deskripsinilai') ?>"><i class="fa fa-circle-o text-red"></i> Deskripsi Nilai</a></li>
                    <li ><a href="<?php echo base_url('nilai/penilaian/rapor') ?>"><i class="fa fa-circle-o text-red"></i> Rapor</a></li>
                  </ul>
                </li>
              </ul>
            </li>

           <!--  <li ><a href="jadwalmapel.php"><i class="fa fa-circle-o"></i> Penilaian</a>
             <ul class="treeview-menu">
              <li ><a href="nilaisiswa.php"><i class="fa fa-circle-o text-red"></i> Nilai Siswa</a></li>
              <li ><a href="kategorinilai.php"><i class="fa fa-circle-o text-red"></i> Kategori Nilai</a></li>
              <li ><a href="jenisnilaiakhir.php"><i class="fa fa-circle-o text-red"></i> Jenis Nilai Akhir</a></li>
              <li><a href="deskripsinilai.php"><i class="fa fa-circle-o text-red"></i> Deskripsi Nilai</a></li>
              <li><a href="rapor.php"><i class="fa fa-circle-o text-red"></i> Rapor</a></li>
            </ul>
          </li> -->

        </ul>
      </li>
      <?php
      }
      if ($this->session->userdata("jabatan") == "Guru") {
        ?>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Kurikulum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo base_url('nilai/akademik/KALDIK') ?>"><i class="fa fa-circle-o text-red "></i> <span>Kaldik</span></a></li>

            <li><a href="<?php echo base_url('nilai/akademik/kurikulum') ?>"><i class="fa fa-circle-o text-red"></i> <span>Kurikulum</span></a></li>
            
            <?php
      if (($this->session->userdata("jabatan") == "Kurikulum") || ($this->session->userdata("jabatan") == "Guru") ) {
        ?>
            <li class=""><a href="<?php echo base_url('nilai/akademik/presensi') ?>"><i class="fa fa-circle-o text-red"></i> <span>Presensi Siswa</span></a></li>
            <?php
          }
          ?>

            <li ><a href="harirentang.php"><i class="fa fa-circle-o"></i> Penjadwalan</a>
              <ul class="treeview-menu">
                <li><a href="mapel.php"><i class="fa fa-circle-o"></i> Manajemen Mata Pelajaran</a></li>
                <li ><a href="harirentang.php"><i class="fa fa-circle-o text-red"></i> Manajemen Hari & Jam</a></li>
                <li ><a href="jadwalmapel.php"><i class="fa fa-circle-o text-red"></i> Jadwal Mapel</a></li>
                <li><a href="jadwalpiketguru.php"><i class="fa fa-circle-o text-red"></i> Jadwal Piket Guru</a></li>
                <li><a href="jadwaltambahan.php"><i class="fa fa-circle-o text-red"></i> Jadwal Tambahan</a></li>
              </ul>
            </li>

            <li class=""><a href="#"><i class="fa fa-circle-o "></i> Penilaian</a>
             <ul class="treeview-menu active">
              <li class=""><a href="<?php echo base_url('nilai/penilaian/nilaisiswa') ?>"><i class="fa fa-circle-o text-red"></i> Nilai Siswa</a></li>
              <li class=""><a href="<?php echo base_url('nilai/penilaian/Kompetensi') ?>"><i class="fa fa-circle-o text-red"></i> Kompetensi Dasar</a></li>
               <?php
      if (($this->session->userdata("jabatan") == "Kurikulum") ) {
        ?>
              <li ><a href="<?php echo base_url('nilai/penilaian/Kategorinilai') ?>"><i class="fa fa-circle-o text-red"></i> Kategori Nilai</a></li>
              <li><a href="<?php echo base_url('nilai/penilaian/jenisNA') ?>"><i class="fa fa-circle-o text-red"></i> Jenis Nilai Akhir</a></li>
              <?php
          }
          ?>
              <li ><a href="<?php echo base_url('nilai/penilaian/deskripsinilai') ?>"><i class="fa fa-circle-o text-red"></i> Deskripsi Nilai</a></li>
              <li ><a href="<?php echo base_url('nilai/penilaian/rapor') ?>"><i class="fa fa-circle-o text-red"></i> Rapor</a></li>
            </ul>
          </li>

        </ul>
      </li>
      <?php
    }
    ?>
    <?php
    if ($this->session->userdata("jabatan") == "Admin") {
      ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Kepegawaian</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li ><a href="Datapegawai.php"><i class="fa fa-circle-o"></i>Data Pegawai</a></li>
          <li ><a href="presensipegawai.php"><i class="fa fa-circle-o"></i> Presensi Pegawai</a></li>
          <li><a href="jadwalmengajar.php"><i class="fa fa-circle-o"></i>Jadwal Mengajar</a></li>

        </ul>
      </li>
      <?php
    }
    ?>
    <?php
    if ($this->session->userdata("jabatan") == "Admin") {
      ?>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>Non akademik</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i> Ekstrakurikuler</a>
          <ul class="treeview-menu">
            <li><a href="pendaftaran.php"><i class="fa fa-circle-o text-red"></i>Pendaftaran</a></li>
            <li><a href="jadwal.php"><i class="fa fa-circle-o text-red"></i> Jadwal Ekstrakurikuler</a></li>
            <li><a href="presensi.php"><i class="fa fa-circle-o text-red"></i> Presensi</a></li>
            <li><a href="nilai.php"><i class="fa fa-circle-o text-red"></i> Nilai</a></li>
            <li><a href="pembayaran.php"><i class="fa fa-circle-o text-red"></i> Pendanaan</a></li>
          </ul>
        </li>

        <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i> Bimbingan Konseling</a>
          <ul class="treeview-menu">
            <li ><a href="keterlambatan.php"><i class="fa fa-circle-o text-red"></i> Keterlambatan & Jam</a></li>
            <li><a href="absensi_harian.php"><i class="fa fa-circle-o text-red"></i> Perizinan</a></li>
            <li><a href="pelanggaran.php"><i class="fa fa-circle-o text-red"></i> Pelanggaran</a></li>
            <li><a href="prestasi.php"><i class="fa fa-circle-o text-red"></i> Prestasi</a></li>
          </ul>
        </li>
      </li>
      <?php
    }
    ?>  
</ul>

</section>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->

    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12 ">

        <!-- Profile Image -->
        <div class="box box-primary box-dashboard">
          <div class="box-body box-profile">
            <h3 class="profile-username text-center">Selamat Datang <?php echo $nama ?>!</h3>
            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>/assets/Superadmin/Fotoguru/<?php echo $foto ?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?php echo $jabatan ?></h3>

            
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>

    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>