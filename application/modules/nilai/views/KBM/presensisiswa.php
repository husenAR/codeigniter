<!DOCTYPE html>
<html>

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
      if (($this->session->userdata("jabatan") == "Guru")) {
        ?>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Kurikulum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php
      if (($this->session->userdata("jabatan") == "Kurikulum") || ($this->session->userdata("jabatan") == "Guru") || ($this->session->userdata("jabatan") == "Siswa")) {
        ?>
            <li><a href="<?php echo base_url('nilai/akademik/KALDIK') ?>"><i class="fa fa-circle-o text-red "></i> <span>Kaldik</span></a></li>

            <li><a href="<?php echo base_url('nilai/akademik/kurikulum') ?>"><i class="fa fa-circle-o text-red"></i> <span>Kurikulum</span></a></li>
      <?php
      }
      if (($this->session->userdata("jabatan") == "Kurikulum") || ($this->session->userdata("jabatan") == "Guru") ||($this->session->userdata("jabatan") == "Karyawan") || ($this->session->userdata("jabatan") == "Siswa")) {
      ?>
            <li class="active"><a href="<?php echo base_url('nilai/akademik/presensi') ?>"><i class="fa fa-circle-o text-red"></i> <span>Presensi Siswa</span></a></li>
            <?php
      }
      ?> 
      <?php
      if (($this->session->userdata("jabatan") == "Kurikulum") || ($this->session->userdata("jabatan") == "Guru") ) {
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
            <?php
          }
          ?>
            <?php
      if (($this->session->userdata("jabatan") == "Kurikulum") || ($this->session->userdata("jabatan") == "Guru") || ($this->session->userdata("jabatan") == "Siswa")) {
        ?>
            <li class=""><a href="#"><i class="fa fa-circle-o "></i> Penilaian</a>
             <ul class="treeview-menu active">
              <li class="active"><a href="<?php echo base_url('nilai/penilaian/nilaisiswa') ?>"><i class="fa fa-circle-o text-red"></i> Nilai Siswa</a></li>
              <?php
            }
            ?>
             <?php
      if (($this->session->userdata("jabatan") == "Kurikulum") || ($this->session->userdata("jabatan") == "Guru") ) {
        ?>
              <li class=""><a href="<?php echo base_url('nilai/penilaian/Kompetensi') ?>"><i class="fa fa-circle-o text-red"></i> Kompetensi Dasar</a></li>
              <?php
            }
            ?>
              <?php
      if (($this->session->userdata("jabatan") == "Kurikulum") ) {
        ?>
              <li ><a href="<?php echo base_url('nilai/penilaian/Kategorinilai') ?>"><i class="fa fa-circle-o text-red"></i> Kategori Nilai</a></li>
              <li><a href="<?php echo base_url('nilai/penilaian/jenisNA') ?>"><i class="fa fa-circle-o text-red"></i> Jenis Nilai Akhir</a></li>
              <?php
      }
      ?>
      <?php
      if (($this->session->userdata("jabatan") == "Kurikulum") || ($this->session->userdata("jabatan") == "Guru")) {
        ?>
              <li ><a href="<?php echo base_url('nilai/penilaian/deskripsinilai') ?>"><i class="fa fa-circle-o text-red"></i> Deskripsi Nilai</a></li>
              <li ><a href="<?php echo base_url('nilai/penilaian/rapor') ?>"><i class="fa fa-circle-o text-red"></i> Rapor</a></li>
            <?php
          }
          ?>
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
    <?php
          if ($this->session->userdata("jabatan") == "Siswa") {
            ?>
                 <li class="treeview">
                    <a href="http://localhost/sia/index.php/kesiswaan/siswa/siswa">
                        <i class="fa fa-dashboard"></i> <span>Profil Siswa</span>
                          <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                          </span>
                    </a>
                    </li>
                <ul class="sidebar-menu">
                  <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Daftar Ulang</span>
                          <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                          </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="http://localhost/sia/index.php/kesiswaan/siswa/daftarulang_ppdb_siswa"><i class="fa fa-circle-o"></i>Siswa Baru</a></li>
                      <li><a href="<?php echo base_url();?>penjadwalan/siswa/siswa_mutasi"><i class="fa fa-circle-o"></i>Siswa Mutasi</a></li>
                      <li><a href="http://localhost/sia/index.php/kesiswaan/siswa/daftarulang_kenaikan_siswa"><i class="fa fa-circle-o"></i>Daftar Kelas</a></li>
                    </ul>
                  </li>
                 </ul>
              
            <ul class="sidebar-menu">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>KBM</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li ><a href="#"><i class="fa fa-circle-o"></i>Jadwal </a>
                 <ul class="treeview-menu">
                  
                  <li ><a href="<?php echo base_url();?>penjadwalan/siswa/jadwalmapel_siswa"><i class="fa fa-circle-o"></i> Mapel</a></li>
                  <li ><a href="<?php echo base_url();?>penjadwalan/siswa/jadwaltambahan_siswa"><i class="fa fa-circle-o"></i> Tambahan</a></li>
                  <!-- <li ><a href="#"><i class="fa fa-circle-o text-red"></i> Jadwal tambahan</a></li> -->
                </ul>
              </li>
              <li><a href="presensiswa.php"><i class="fa fa-circle-o"></i>Presensi</a></li>
              <li ><a href="#"><i class="fa fa-circle-o"></i> Nilai </a> 
               <ul class="treeview-menu">
                <li ><a href="kaldiksiswa.php"><i class="fa fa-circle-o text-red"></i> Kalender akademik</a></li>
                <li ><a href="#"><i class="fa fa-circle-o text-red"></i>Rapor</a></li>
                <li ><a href="#"><i class="fa fa-circle-o text-red"></i>Tugas</a></li>
                <li ><a href="#"><i class="fa fa-circle-o text-red"></i>Ulangan Harian</a></li>
              </ul>
            </li>
            </ul>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Non Akademik</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li ><a href="#"><i class="fa fa-circle-o"></i>Ekstrakurikuler </a>
                 <ul class="treeview-menu">
                  <li ><a href="daftareks.php"><i class="fa fa-circle-o text-red"></i> Pendaftaran Ekskul</a></li>
                </ul>
              </li>
            </li>
            </ul>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Tambahan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li ><a href="<?php echo base_url();?>penjadwalan/siswa/klinik_un_siswa"><i class="fa fa-circle-o"></i>Klinik UN </a></li>
              </li>
            </ul>
          </li>

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
                   <li class=""><a href="<?php echo base_url('nilai/akademik/presensi') ?>"><i class="fa fa-circle-o text-red"></i> <span>Presensi Siswa</span></a></li>
       
      <!--             <li ><a href="harirentang.php"><i class="fa fa-circle-o"></i> Penjadwalan</a>
                    <ul class="treeview-menu">
                      <li><a href="mapel.php"><i class="fa fa-circle-o"></i> Manajemen Mata Pelajaran</a></li>
                      <li ><a href="harirentang.php"><i class="fa fa-circle-o text-red"></i> Manajemen Hari & Jam</a></li>
                      <li ><a href="jadwalmapel.php"><i class="fa fa-circle-o text-red"></i> Jadwal Mapel</a></li>
                      <li><a href="jadwalpiketguru.php"><i class="fa fa-circle-o text-red"></i> Jadwal Piket Guru</a></li>
                      <li><a href="jadwaltambahan.php"><i class="fa fa-circle-o text-red"></i> Jadwal Tambahan</a></li>
                    </ul>
                  </li> -->

                  <li class=""><a href="#"><i class="fa fa-circle-o "></i> Penilaian</a>
                   <ul class="treeview-menu active">

                    <li class=""><a href="<?php echo base_url('nilai/penilaian/nilaisiswa') ?>"><i class="fa fa-circle-o text-red"></i> Nilai Siswa</a></li>
                    <li class=""><a href="<?php echo base_url('nilai/penilaian/Kompetensi') ?>"><i class="fa fa-circle-o text-red"></i> Kompetensi Dasar</a></li>
                    
                    <li ><a href="<?php echo base_url('nilai/Penilaian/Kategorinilai') ?>"><i class="fa fa-circle-o text-red"></i> Kategori Nilai</a></li>
                    <li><a href="<?php echo base_url('nilai/penilaian/jenisNA') ?>"><i class="fa fa-circle-o text-red"></i> Jenis Nilai Akhir</a></li>
                  
                    <li ><a href="<?php echo base_url('nilai/penilaian/deskripsinilai') ?>"><i class="fa fa-circle-o text-red"></i> Deskripsi Nilai</a></li>
                    <li ><a href="<?php echo base_url('nilai/penilaian/rapor') ?>"><i class="fa fa-circle-o text-red"></i> Rapor</a></li>
                  </ul>
                </li>

              </ul>
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
      <center style="color: navy;">Presensi Siswa SMP Yogyakarta <br></center>
      <center><small>Tahun Ajaran <?php echo $judul_tahun_ajaran; ?></small></center>
    </h1>
    <ol class="breadcrumb">
      <li><a href="dashboard.php">Dashboard</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->

    <!-- /.row -->
    <!-- Main row -->
    <div class="row">

      <!-- /.col -->
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#presensisiswa" data-toggle="tab">Presensi Siswa</a></li>
            <?php
      if (($this->session->userdata("jabatan") == "Kurikulum") || ($this->session->userdata("jabatan") == "Guru")|| ($this->session->userdata("jabatan") == "Karyawan") ) {
        ?>
            <li><a href="#imporpresensi" data-toggle="tab">Import Presensi</a></li>
            <?php
          }
          ?>
            <?php
      if (($this->session->userdata("jabatan") == "Kurikulum") || ($this->session->userdata("jabatan") == "Guru") ) {
        ?>
            <li><a href="#laporanpresensi" data-toggle="tab">Laporan Presensi Per Bulan</a></li>
            <li><a href="#laporanpersemester" data-toggle="tab">Laporan Presensi Per Semester</a></li>
          <?php
    }
    ?> 
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="presensisiswa">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Presensi Siswa</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <select id="pilihkelaspresensi" onchange="document.location='<?php echo site_url('nilai/akademik/presensi'); ?>/'+document.getElementById('pilihkelaspresensi').value+'/'+document.getElementById('tahun').value+'/'+document.getElementById('bulan').value;">
                    <option value="">Pilih Kelas</option>
                    <?php
                    foreach ($kelas_reguler_berjalan as $d){
                      ?>
                      <option value="<?php echo $d->id_kelas_reguler_berjalan; ?>" <?php if ($id_kelas_reguler_berjalan == $d->id_kelas_reguler_berjalan) { echo " selected"; } ?>><?php echo $d->nama_kelas;?></option>
                      <?php
                    }?>
                  </select>

                  <?php
      if (($this->session->userdata("jabatan") == "Kurikulum") || ($this->session->userdata("jabatan") == "Guru")|| ($this->session->userdata("jabatan") == "Karyawan") ) {
        ?>
                  <div class="posisikanan">
                    <select name="bulan" id="bulan" onchange="document.location='<?php echo site_url('akademik/presensi'); ?>/'+document.getElementById('pilihkelaspresensi').value+'/'+document.getElementById('tahun').value+'/'+document.getElementById('bulan').value;">
                      <option value="1" <?php if ($bln == '01') { echo " selected"; } ?>>Januari</option>
                      <option value="2" <?php if ($bln == '02') { echo " selected"; } ?>>Februari</option>
                      <option value="3" <?php if ($bln == '03') { echo " selected"; } ?>>Maret</option>
                      <option value="4" <?php if ($bln == '04') { echo " selected"; } ?>>April</option>
                      <option value="5" <?php if ($bln == '05') { echo " selected"; } ?>>Mei</option>
                      <option value="6" <?php if ($bln == '06') { echo " selected"; } ?>>Juni</option>
                      <option value="7" <?php if ($bln == '07') { echo " selected"; } ?>>Juli</option>
                      <option value="8" <?php if ($bln == '08') { echo " selected"; } ?>>Agustus</option>
                      <option value="9" <?php if ($bln == '09') { echo " selected"; } ?>>September</option>
                      <option value="10" <?php if ($bln == '10') { echo " selected"; } ?>>Oktober</option>
                      <option value="11" <?php if ($bln == '11') { echo " selected"; } ?>>November</option>
                      <option value="12" <?php if ($bln == '12') { echo " selected"; } ?>>Desember</option>
                    </select>
                    <select name="tahun" id="tahun" onchange="document.location='<?php echo site_url('akademik/presensi'); ?>/'+document.getElementById('pilihkelaspresensi').value+'/'+document.getElementById('tahun').value+'/'+document.getElementById('bulan').value;">
                      <option value="2017" <?php if ($thn == '2017') { echo " selected"; } ?>>2017</option>
                      <option value="2018" <?php if ($thn == '2018') { echo " selected"; } ?>>2018</option>
                    </select>
                  </div>
                  <br/><br/>
                  <form method="post" action="<?php echo site_url('akademik/simpanpresensi'); ?>">
                    <input type="hidden" name="bln" value="<?php echo $bln; ?>">
                    <input type="hidden" name="thn" value="<?php echo $thn; ?>">
                    <input type="hidden" name="id_kelas_reguler_berjalan" value="<?php echo $id_kelas_reguler_berjalan; ?>">

                  <div style="overflow: auto">
                    <table class="table table-bordered table-striped" style="width: 100%">
                      <thead>
                        <tr class="barishari">
                          <th class="fit">No</th>
                          <th>Nama Siswa</th>
                          <?php
                          //for($i=1;$i<=date('t');$i++) {
                          for($i=1;$i<=cal_days_in_month(CAL_GREGORIAN, $bln, $thn);$i++) {
                            ?>
                            <th><?php echo $i; ?></th>
                            <?php
                          }
                          ?>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>


                         <?php
                         $z=0; 
                         foreach ($siswaperkelas as $rowsiswa) {
                          $z++;
                          ?>
                          <tr>
                            <td><?php echo $z; ?></td>
                            <td><?php echo $rowsiswa->nama; ?></td>
                            <?php
                            //for($i=1;$i<=date('t');$i++) {
                            for($i=1;$i<=cal_days_in_month(CAL_GREGORIAN, $bln, $thn);$i++) {
                              ?>
                            <th>
                              <?php
                                //echo @$libur[$thn][ltrim($bln, "0")][ltrim($i, "0")];
                                if ((@$libur[$thn][ltrim($bln, "0")][ltrim($i, "0")] == "") && (@$liburnasional[ltrim($bln, "0")][ltrim($i, "0")] == "")) {
                              ?>
                              <select class="kodeguru"  name="presensi_<?php echo $rowsiswa->nisn; ?>_<?php echo $i; ?>">
                               <option value="">-</option>
                               <option value="H" <?php if (@$datpresensi[$rowsiswa->nisn][$i] == "H") { echo " selected"; } ?>>H</option>
                               <option value="S" <?php if (@$datpresensi[$rowsiswa->nisn][$i] == "S") { echo " selected"; } ?>>S</option>
                               <option value="I" <?php if (@$datpresensi[$rowsiswa->nisn][$i] == "I") { echo " selected"; } ?>>I</option>
                               <option value="A" <?php if (@$datpresensi[$rowsiswa->nisn][$i] == "A") { echo " selected"; } ?>>A</option> 
                             </select>
                             <?php
                              }
                             ?>
                           </th>
                           <?php
                         }
                         ?>
</tr>

  <?php 
}
?>

</tbody>
</table>
</div>
<br>

<<a class="pull-right btn-jdwl" href="<?php  echo site_url('nilai/akademik/exportpresensi/'.@$this->uri->segment(4)); ?>">Export</a> 
<!-- <button type="button" class="pull-right btn-jdwl" onclick="document.location='<?php //echo site_url('akademik/exportpresensi/'.@$this->uri->segment(3)); ?>">Export</button> -->


<button class=" btn btn-danger pull-right" style="margin-right: 20px;">Submit</button>
</form>

</div>
<?php
}
?>
<div class="box-body">
  <div class="box-header">
    <h3 class="box-title center" style="margin-left: 35%">Presensi Siswa Bulan <?php if ($bln == '01') { echo "Januari";} elseif ($bln == '02') {echo "Februari";} elseif ($bln == '03') {echo "Maret";} elseif ($bln == '04') {echo "April";} elseif ($bln == '05') {echo "Mei";} elseif ($bln == '06') {echo "Juni";} elseif ($bln == '07') {echo "Juli";} elseif ($bln == '08') {echo "Agustus";} elseif ($bln == '09') {echo "September";} elseif ($bln == '10') {echo "Oktober";} elseif ($bln == '11') {echo "November";} elseif ($bln == '12') {echo "Desember";}?></h3>
  </div>
  <table class="table table-bordered table-striped" style="width: 100%">
    <thead>
      <tr class="barishari">
        <th class="fit">No</th>
        <th>Nama Siswa</th>
        <?php
        //for($i=1;$i<=date('t');$i++) {
        for($i=1;$i<=cal_days_in_month(CAL_GREGORIAN, $bln, $thn);$i++) {
          ?>
          <th><?php echo $i; ?></th>
          <?php
        }
        ?>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
         $z=0; 
         foreach ($siswaperkelas as $rowsiswa) {
          $z++;
          ?>
          <tr>
            <td><?php echo $z; ?></td>
            <td><?php echo $rowsiswa->nama; ?></td>
            <?php
              //for($i=1;$i<=date('t');$i++) {
              for($i=1;$i<=cal_days_in_month(CAL_GREGORIAN, $bln, $thn);$i++) {
                ?>
              <th><?php echo @$datpresensi[$rowsiswa->nisn][$i]; ?>
             </th>
             <?php
           }
           ?>
          </tr>
          <?php 
        }
        ?> 
      </tbody>

    </table>

  </div>

  <!-- /.box-body -->
</div> 
</div>

      <div class="tab-pane" id="imporpresensi">
             <form class="form-horizontal formmapel" action="<?php echo site_url('nilai/akademik/importpresensi'); ?>" method="post" enctype="multipart/form-data">
              <div class="bigbox-mapel"> 
                <div class="box-mapel">
                  <!-- <div class="form-group formgrup jarakform">
                    <label for="inputKurikulum" class="col-sm-2 control-label">Import Presensi</label>
                    <div class="col-sm-4">
                      <input type="text" required="required" class="form-control"  name="katnilai" placeholder="Nama file">
                    </div>
                  </div> -->
                  <span></span>
                  <br>
                  <div class=" col-md-12">
                    <label>Pilih kelas</label>
                    <select name="kelasimportpresensi" class="">
                   
                    <option value="">Pilih kelas</option>
                    
                    <?php

                    foreach ($kelas_reguler_berjalan as $d){
                      ?>
                      <option value="<?php echo $d->id_kelas_reguler_berjalan; ?>" <?php if ($id_kelas_reguler_berjalan == $d->id_kelas_reguler_berjalan) { echo " selected"; } ?>><?php echo $d->nama_kelas;?></option>
                      <?php
                    }?>
                  </select>
                  </div>
                  <br>
                  <span>
                  <div class="form-group formgrup jarakform col-sm-12">
                    <label for="inputKurikulum" class="col-sm-2 control-label">Pilih File</label>
                    <div class="col-xs-4">
                      <input type="file" class="" required="required" name="filepresensi" placeholder="">
                      <br>
                    </div>
                  </div>
                </div>
              </div>
              </span>
              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger">Submit</button>
                </div>
              </div>
            </form>

          </div>

<!-- /.tab-pane -->
<div class=" tab-pane" id="laporanpresensi">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Laporan Presensi Siswa Per Bulan</h3>
      <form class="posisikanan">
        <select id="pilihkelasperbulan" onchange="document.location='<?php echo site_url('nilai/akademik/presensi'); ?>/'+document.getElementById('pilihkelasperbulan').value+'/'+document.getElementById('tahun').value+'/'+document.getElementById('bulan').value;">
          <option value="">Pilih Kelas</option>
          <?php
          foreach ($kelas_reguler_berjalan as $d){
            ?>
            <option value="<?php echo $d->id_kelas_reguler_berjalan; ?>" <?php if ($id_kelas_reguler_berjalan == $d->id_kelas_reguler_berjalan) { echo " selected"; } ?>><?php echo $d->nama_kelas;?></option>
            <?php
          }?>
        </select></form>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div style="overflow: auto">
          <table class="table table-bordered table-striped" style="width: 100%">
            <thead>
              <tr class="barishari">
                <th>Bulan</th>
                <th class="fit">Nomor Absen</th>
                <th class="fit">Nama Siswa</th>
                <th class="fit">Sakit</th>
                <th class="fit">Ijin</th>
                <th class="fit">Absen</th>
              </tr>
            </thead>
            <tbody>
              <?php
                for ($i=1;$i<=12;$i++) {
                  ?>
              <tr>
                <th class="fit" rowspan="<?php echo count($siswaperkelas)+1; ?>"><?php 
                        if ($i == 1) {
                          echo "Januari";
                        } else if ($i == 2) {
                          echo "Februari";
                        } else if ($i == 3) {
                          echo "Maret";
                        } else if ($i == 4) {
                          echo "April";
                        } else if ($i == 5) {
                          echo "Mei";
                        } else if ($i == 6) {
                          echo "Juni";
                        } else if ($i == 7) {
                          echo "Juli";
                        } else if ($i == 8) {
                          echo "Agustus";
                        } else if ($i == 9) {
                          echo "September";
                        } else if ($i == 10) {
                          echo "Oktober";
                        } else if ($i == 11) {
                          echo "November";
                        } else if ($i == 12) {
                          echo "Desember";
                        }
                        //echo $i;
                         ?></th>
              </tr>
                <?php
                $z=0; 
                foreach ($siswaperkelas as $rowsiswa) {
                  $z++;
                  ?>
                  <tr>
                    <td><?php echo $z; ?></td>
                    <td><?php echo $rowsiswa->nama; ?></td>
                    <th><?php echo $datpresensibulan[$rowsiswa->nisn][$i]['S']; ?></th>
                    <th><?php echo $datpresensibulan[$rowsiswa->nisn][$i]['I']; ?></th>
                    <th><?php echo $datpresensibulan[$rowsiswa->nisn][$i]['A']; ?></th>
                  </tr>
                  <?php
                }
              }
                ?>
             

                </tbody>
              </table>
            </div>
            <a class="btn btnjdwl" href="<?php echo site_url('akademik/cetak_presensi/'.$id_kelas_reguler_berjalan.'/'.$thn.'/'.$bln); ?>">PRINT</a>
          </div>
          <!-- /.box-body -->
        </div> 
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="laporanpersemester">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Laporan Presensi Siswa Per Semester</h3>
            <form class="posisikanan">
              <select id="pilihkelassemester" onchange="document.location='<?php echo site_url('nilai/akademik/presensi'); ?>/'+document.getElementById('pilihkelassemester').value+'/'+document.getElementById('tahun').value+'/'+document.getElementById('bulan').value;">
                <option value="">Pilih Kelas</option>
                <?php
                foreach ($kelas_reguler_berjalan as $d){
                  ?>
                  <option value="<?php echo $d->id_kelas_reguler_berjalan; ?>" <?php if ($id_kelas_reguler_berjalan == $d->id_kelas_reguler_berjalan) { echo " selected"; } ?>><?php echo $d->nama_kelas;?></option>
                  <?php
                }?>
              </select></form>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div style="overflow: auto">
                <table class="table table-bordered table-striped" style="width: 100%">
                  <thead>
                    <tr class="barishari">
                      <th>Semester</th>
                      <th class="fit">Nomor Absen</th>
                      <th class="fit">Nama Siswa</th>
                      <th class="fit">Sakit</th>
                      <th class="fit">Ijin</th>
                      <th class="fit">Absen</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                  for ($i=1;$i<=2;$i++) {
                    ?>
                    <tr>
                      <th class="fit" rowspan="<?php echo count($siswaperkelas)+1; ?>">Semester <?php 
                        if ($i == 1) {
                          echo "Ganjil";
                        } else {
                          echo "Genap";
                        }
                        //echo $i;
                         ?></th>
                       </tr>
                      <?php
                      $z=0; 
                      foreach ($siswaperkelas as $rowsiswa) {
                        $z++;
                        ?>
                        <tr>
                          <td><?php echo $z; ?></td>
                          <td><?php echo $rowsiswa->nama; ?></td>
                          <th><?php echo $datpresensisemester[$rowsiswa->nisn][$i]['S']; ?></th>
                          <th><?php echo $datpresensisemester[$rowsiswa->nisn][$i]['I']; ?></th>
                          <th><?php echo $datpresensisemester[$rowsiswa->nisn][$i]['A']; ?></th>
                        </tr>
                        <?php
                      }

                    }
                      ?>

                      </tbody>
                    </table>
                  </div>
                  <a class="btn btnjdwl" href="<?php echo site_url('akademik/cetak_presensisem/'.$id_kelas_reguler_berjalan.'/'.$thn.'/'.$bln); ?>">PRINT</a>
                  <!-- <button class="btn btnjdwl">PRINT</button> -->
                </div>
                <!-- /.box-body -->
              </div> 
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
      var max_fields      = 50; //maximum input boxes allowed
      var wrapper         = $(".bigbox-mapel"); //Fields wrapper
      var add_button      = $("#tambahmapel"); //Add button ID
      var box_mapel       = `<div class="box-mapel">
      <div class="form-group formgrup jarakform">
      <label for="inputKurikulum" class="col-sm-2 control-label">Nama Mata Pelajaran</label>
      <div class="col-sm-4">
      <input type="text" class="form-control" id="inputName" placeholder="Nama Mata Pelajaran">
      </div>
      </div>

      <div class="form-group formgrup jarakform">
      <label for="inputKurikulum" class="col-sm-2 control-label">KKM</label>
      <div class="col-sm-4">
      <input type="text" class="form-control" id="inputName" placeholder="KKM">
      </div>
      </div>

      <div class="form-group formgrup jarakform">
      <label for="inputKurikulum" class="col-sm-2 control-label">Jam Belajar</label>
      <div class="col-sm-4">
      <input type="text" class="form-control" id="inputName" placeholder="Jam Belajar">
      </div>
      </div>
      <i class="fa fa-minus-circle text-red tambahmapel"></i><a style="color:red" href="#" class="remove_field"> Hapus mapel</a>

      </div>`;
      
      var x = 1; //initlal text box count
      $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
          if(x < max_fields){ //max input box allowed
              x++; //text box increment
              $(wrapper).append(box_mapel); //add input box
            }
          });
      
      $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
      })
    });
  </script>
  </html>

