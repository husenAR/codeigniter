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
                    <a href="<?php echo site_url('logout');?>" ><i class="fa fa-sign-out"></i>Log Out</a>
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
      if (($this->session->userdata("jabatan") == "Guru") ) {
        ?>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Kurikulum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('nilai/akademik/KALDIK') ?>"><i class="fa fa-circle-o text-red "></i> <span>Kaldik</span></a></li>

            <li><a href="<?php echo base_url('nilai/akademik/kurikulum') ?>"><i class="fa fa-circle-o text-red"></i> <span>Kurikulum</span></a></li>
            
            <li><a href="<?php echo base_url('nilai/akademik/presensi') ?>"><i class="fa fa-circle-o text-red"></i> <span>Presensi Siswa</span></a></li>

            <li ><a href="harirentang.php"><i class="fa fa-circle-o"></i> Penjadwalan</a>
              <ul class="treeview-menu">
                <li><a href="mapel.php"><i class="fa fa-circle-o"></i> Manajemen Mata Pelajaran</a></li>
                <li ><a href="harirentang.php"><i class="fa fa-circle-o text-red"></i> Manajemen Hari & Jam</a></li>
                <li ><a href="jadwalmapel.php"><i class="fa fa-circle-o text-red"></i> Jadwal Mapel</a></li>
                <li><a href="jadwalpiketguru.php"><i class="fa fa-circle-o text-red"></i> Jadwal Piket Guru</a></li>
                <li><a href="jadwaltambahan.php"><i class="fa fa-circle-o text-red"></i> Jadwal Tambahan</a></li>
              </ul>
            </li>

            <li class="active"><a href="#"><i class="fa fa-circle-o "></i> Penilaian</a>
             <ul class="treeview-menu active">
              <li class=""><a href="<?php echo base_url('nilai/penilaian/nilaisiswa') ?>"><i class="fa fa-circle-o text-red"></i> Nilai Siswa</a></li>
              <li class="active"><a href="<?php echo base_url('nilai/penilaian/Kompetensi') ?>"><i class="fa fa-circle-o text-red"></i> Kompetensi Dasar</a></li>
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
      <center style="color:navy;">Jenis Nilai Akhir Mata Pelajaran SMP Yogyakarta <br></center>
      <center><small>Tahun Ajaran <?php echo $judul_tahun_ajaran; ?></small></center>
    </h1>
    <ol class="breadcrumb">
      <li><a href="dashboard.php">Dashboard</a></li>
    </ol>
  </section>

  <!-- =========================================================================================== -->
  <!-- =========================================================================================== -->
  <!-- =========================================================================================== -->
  <!-- =========================================================================================== -->
  <!-- =========================================================================================== -->
  <!-- =========================================================================================== -->
  <!-- =========================================================================================== -->
  <!-- =========================================================================================== -->



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
            <li class="active"><a href="#lihatNA" data-toggle="tab">Lihat Kompetensi Dasar</a></li>
            <li ><a href="#tambahkurikulum" data-toggle="tab">Tambah Kompetensi Dasar</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane" id="tambahkurikulum">
             <form class="form-horizontal formmapel" method="post" action="<?php echo base_url('penilaian/tambah_kompetensi'); ?>">
              <div class="bigbox-mapel"> 
                <div class="box-mapel">
                  <select id="pilihkelaskd" onchange="document.location='<?php echo site_url('penilaian/Kompetensi'); ?>/'+document.getElementById('pilihkelaskd').value+'/'+document.getElementById('pilihmapelkd').value;">
                    <option value="" ></option>
                    <?php

                    foreach ($kelas_reguler_berjalan as $d){
                      ?>
                      <option value="<?php echo $d->id_kelas_reguler_berjalan; ?>" <?php if ($id_kelas_reguler_berjalan == $d->id_kelas_reguler_berjalan) { echo " selected"; } ?>><?php echo $d->nama_kelas;?></option>
                      <?php
                    }?>
                  </select>
                  <!--form class=""-->
                    <select id="pilihmapelkd" name="id_mapel" onchange="document.location='<?php echo site_url('penilaian/Kompetensi'); ?>/'+document.getElementById('pilihkelaskd').value+'/'+document.getElementById('pilihmapelkd').value;">
                      <?php
                      foreach ($mapel as $x){
                        ?>
                        <option value="<?php echo $x->id_mapel;?>" <?php if ($id_mapel == $x->id_mapel) { echo " selected"; } ?>><?php echo $x->nama_mapel; echo $x->jenjang?></option>
                        <?php
                      }?></select>
                    <!--/form-->
                    <select name="id_jenis_na" >
                            <?php
                            foreach ($jenis_nilai_akhir as $d){
                              ?>
                              <option value="<?php echo $d->id_jenis_na;?>"><?php echo $d->Jenis_na;?></option>
                              <?php
                            }?>
                          </select>
                    <div class="form-group formgrup jarakform">
                      <label for="inputKurikulum" class="col-sm-2 control-label">Kode KD</label>
                      <div class="col-sm-2">
                        <input type="text" value="" class="form-control" name="kode_kd" id="inputName" placeholder="Kode KD">
                      </div>
                    </div>
                    <div class="form-group formgrup jarakform">
                      <label for="inputKurikulum" class="col-sm-2 control-label">Deskripsi KD</label>
                      <div class="col-lg-8">

                        <textarea type="text" class="col-lg-8"  name="deskripsi_kd"> <?php echo set_value('deskripsi_kd'); ?> </textarea>

                        <!-- <input type="text" class="form-control" id="inputName" placeholder="Deskripsi nilai"> -->
                      </div>
                    </div>

                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </div>
                <!-- <div class="tambahmapel">
                  <i class="fa fa-plus-circle text-red"></i><a style="color:red" href="#" id="tambahmapel"> Tambah jenis</a>
                </div> -->

              </form>

            </div>
            <!-- /.tab-pane -->

            <!-- /.tab-pane -->

            <div class="active tab-pane" id="lihatNA">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kompetensi</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <select id="pilihkelaskdview" onchange="document.location='<?php echo site_url('penilaian/Kompetensi'); ?>/'+document.getElementById('pilihkelaskdview').value+'/'+document.getElementById('pilihmapelkdview').value;">
                    <option value="" ></option>
                    <?php

                    foreach ($kelas_reguler_berjalan as $d){
                      ?>
                      <option value="<?php echo $d->id_kelas_reguler_berjalan; ?>" <?php if ($id_kelas_reguler_berjalan == $d->id_kelas_reguler_berjalan) { echo " selected"; } ?>><?php echo $d->nama_kelas;?></option>
                      <?php
                    }?>
                  </select>
                  <!--form class=""-->
                    <select id="pilihmapelkdview" name="id_mapel" onchange="document.location='<?php echo site_url('penilaian/Kompetensi'); ?>/'+document.getElementById('pilihkelaskd').value+'/'+document.getElementById('pilihmapelkdview').value;">
                      <?php
                      foreach ($mapel as $x){
                        ?>
                        <option value="<?php echo $x->id_mapel;?>" <?php if ($id_mapel == $x->id_mapel) { echo " selected"; } ?>><?php echo $x->nama_mapel; echo $x->jenjang?></option>
                        <?php
                      }?></select>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th class="fit">No</th>
                        <th>Kode_KD</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no=0;
                      foreach ($k_dasar as $a){
                        $no=$no+1;
                        echo "<tr>";
                        echo "<td>$no</td>"; 

                        echo "<td>{$a->kode_kd}</td>";
                        echo "<td>{$a->deskripsi_kd}</td>";
                        echo "<td>"; ?>
                          <a data-toggle="modal" data-show="true" data-target="#editjenisnilai<?php echo $no; ?>" class="btn btn-block btn-primary button-action btnedit" href="<?php echo base_url("penilaian/form_edit_jenisNilai/".$a->id_jenis_na); ?>" >Edit</a>
                          <a type="button" style="background: red ; border: red;" class="btn btn-block btn-primary button-action btnhapus " href="<?php echo base_url("/penilaian/hapus_kompetensi/".$a->id_kd); ?>" onclick="return confirm_delete();">Hapus</a>
                          <?php
                          echo "</tr>";
                          ?>

                          <div id="editjenisnilai<?php echo $no; ?>" class="modal fade " role="dialog">
                            <div class="modal-dialog modal-md" >
                              <div class="modal-content">
                                <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 class="modal-title">Edit Jenis Nilai</h4>
                               </div>
                               <div class="modal-body"> 
                               </div>
                             </div>
                           </div>

                         </div>
                         <?php
                       }
                       ?>
                     </tbody>
                   </table>
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
 
 <script type="text/javascript">
  $(document).ready(function() {
      var max_fields      = 50; //maximum input boxes allowed
      var wrapper         = $(".bigbox-mapel"); //Fields wrapper
      var add_button      = $("#tambahmapel"); //Add button ID
      var box_mapel       = `<div class="box-mapel">
      <div class="form-group formgrup jarakform">
      <label for="inputKurikulum" class="col-sm-2 control-label">Nama Jenis Nilai</label>
      <div class="col-sm-4">
      <input type="text" class="form-control" id="inputName" placeholder="Nama jenis Nilai">
      </div>
      </div>

      <i class="fa fa-minus-circle text-red tambahmapel"></i><a style="color:red" href="#" class="remove_field"> Hapus jenis</a>

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

