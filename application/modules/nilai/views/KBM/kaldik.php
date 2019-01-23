<?php

function drawCal($bln, $thn, $simbol) {
 date_default_timezone_set("Asia/Jakarta");
 $d=date('d');
 $m=date('m');
 $y=date('Y');
 $nm=date('F');
       $bln=$bln; //$_GET['bln'];
       $thn=$thn; //$_GET['thn'];
       if (($bln !="") && ($thn!=""))
       {
        $m=date('m',mktime(0,0,0,$bln,1,$thn));
        $y=date('Y',mktime(0,0,0,$bln,1,$thn));
        $nm=date('F',mktime(0,0,0,$bln,1,$thn));
      }
      $mbef=$m-1;
      $maft=$m+1;
      $nmmbef=date('M',mktime(0,0,0,$mbef,1,$thn));
      $nmmaft=date('M',mktime(0,0,0,$maft,1,$thn));
      $ybef=$y;
      $yaft=$y;
      if ($mbef<1) {$mbef=12; $ybef=$y-1;}
      if ($maft>12) {$maft=1; $yaft=$y+1;}
      $jmlkosong=date('w',mktime(0,0,0,$m,1,$y));
      ?>
      <table summary="Calendar" >
       <caption>
         <?php echo $nm;?> <?php echo $y?>
       </caption>
       <thead>
        <tr>
         <th abbr="Monday" scope="col" title="Monday">S</th>
         <th abbr="Tuesday" scope="col" title="Tuesday">S</th>
         <th abbr="Wednesday" scope="col" title="Wednesday">R</th>
         <th abbr="Thursday" scope="col" title="Thursday">K</th>
         <th abbr="Friday" scope="col" title="Friday">J</th>
         <th abbr="Saturday" scope="col" title="Saturday">S</th>
         <th abbr="Sunday" scope="col" title="Sunday">M</th>
       </tr>
     </thead>
           <!--tfoot>
            <tr>
             <td abbr="October" colspan="3" id="prev"><a href="?bln=<?php echo $mbef;?>&thn=<?php echo $ybef;?>" title="">&laquo; <?php echo $nmmbef; ?></a></td>
             <td class="pad">&nbsp;</td>
             <td abbr="December" colspan="3" id="next"><a href="?bln=<?php echo $maft;?>&thn=<?php echo $yaft;?>" title=""><?php echo $nmmaft; ?> &raquo;</a></td>
            </tr>
          </tfoot-->
          <tbody>
            <?php
            $jmlhari=date('t',mktime(0,0,0,$m,1,$y));
            for ($i=1; $i<=$jmlkosong; $i++)
            {
              echo "<td>&nbsp;</td>";
            }
            $kolom=$jmlkosong;
            for ($i=1; $i<=$jmlhari;$i++)
            {
              $kolom=$kolom+1;
              $warna="#000000";
              if ($kolom=='7') {$warna="#FF0000";}
              if (($i==date('j')) && ($m==date('m')) && ($y==date('Y')))
              {
               $warna="#0000FF";
             }
        //mysql_connect("localhost","root","");
        //mysql_select_db("toko_online");
        //$q=mysql_query ("SELECT * FROM agenda WHERE DAY(tgl) = $i AND MONTH(tgl) = $m AND YEAR(tgl) = $y");
        //echo "SELECT * FROM agenda WHERE DAY(tgl) = $i AND MONTH(tgl) = $m AND YEAR(tgl) = $y";
        //$h=mysql_fetch_array ($q);
             $clk="";
             $cur="";
        ////if ($h['jenis']=='libur') {$warna = "#FF0000"; $clk="document.location='agenda.php?tgl=$i&bln=$m&thn=$y';"; $cur="cursor:pointer";}
        //if ($h['jenis']=='meeting') {$warna = "#FFFF00"; $clk="document.location='agenda.php?tgl=$i&bln=$m&thn=$y';"; $cur="cursor:pointer";}
        //if ($h['jenis']=='keluarga') {$warna = "#00FF00"; $clk="document.location='agenda.php?tgl=$i&bln=$m&thn=$y';"; $cur="cursor:pointer";}
             ?>
             <td onClick="<?php echo $clk; ?>" style="background-size: cover; <?php echo $cur; ?>" <?php if (@$simbol[ltrim($y,'0')][ltrim($m,'0')][$i] != "") { ?>background="<?php echo base_url(); ?>assets/simbol/<?php echo @$simbol[ltrim($y,'0')][ltrim($m,'0')][$i]; ?>"<?php } ?>><font color="<?php echo $warna; ?>"><div align="center" class="style1">&nbsp;<?php echo $i;//." ".@$simbol[$y][$m][$i]; //." ".$m." ".$y; ?>&nbsp; <?php /*if (@$simbol[ltrim($y,'0')][ltrim($m,'0')][$i] != "") { ?><img src="<?php echo base_url(); ?>assets/simbol/<?php echo @$simbol[ltrim($y,'0')][ltrim($m,'0')][$i]; ?>" width="10"/><?php } */?></div></font></td>
             <?php
             if ($kolom=='7')
             {
              echo '</tr><tr>';
              $kolom=0;}
            }
            ?>
          </tbody>
        </table>
        <?php
      }
      ?>
      
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
              <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
              </form>
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
                  <li class="active"><a href="<?php echo base_url('nilai/akademik/KALDIK') ?>"><i class="fa fa-circle-o text-red "></i> <span>Kaldik</span></a></li>

                  <li><a href="<?php echo base_url('nilai/akademik/kurikulum') ?>"><i class="fa fa-circle-o text-red"></i> <span>Kurikulum</span></a></li>

                  <li><a href="<?php echo base_url('nilai/akademik/presensi') ?>"><i class="fa fa-circle-o text-red"></i> <span>Presensi Siswa</span></a></li>
                  <?php
                  if (($this->session->userdata("jabatan") == "Kurikulum") || ($this->session->userdata("jabatan") == "Guru")) {
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
                      <li class=""><a href="<?php echo base_url('nilai/penilaian/nilaisiswa') ?>"><i class="fa fa-circle-o text-red"></i> Nilai Siswa</a></li>
                      <?php
                    }
                    ?>
                    <?php
                    if (($this->session->userdata("jabatan") == "Kurikulum") || ($this->session->userdata("jabatan") == "Guru")) {
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
                    if (($this->session->userdata("jabatan") == "Kurikulum")|| ($this->session->userdata("jabatan") == "Guru") ) {
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
            <center style="color:navy;">Kalender Pendidikan SMP Yogyakarta <br></center>
            <center><small>Tahun Ajaran <?php echo $judul_tahun_ajaran; ?></small></center>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard </a></li>
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
                  <li class="active"><a href="#homekaldik" data-toggle="tab">Kalender Pendidikan</a></li>
                  <?php
                  if ($this->session->userdata("jabatan") == "Kurikulum") {
                    ?>
                    <li><a href="#tambahkaldik" data-toggle="tab">Tambah Kaldik</a></li>
                    <li><a href="#datakaldik" data-toggle="tab">Data Kaldik</a></li>
                    <?php
                  }
                  ?>
                </ul>
                <div class="tab-content">
                 <div class="active tab-pane" id="homekaldik">
                   <div class="box">
                    <div class="box-header jarakbox">
                      <div class="col-md-12">  
                        <?php
                        $bln_ajaran = date('m', strtotime($tanggal_mulai_ajaran));
                        $thn_ajaran = date('Y', strtotime($tanggal_mulai_ajaran));
                        for ($i=1;$i<=12;$i++) {
                        ?>
                        <div class="col-md-3">
                          <?php
                          drawCal($bln_ajaran, $thn_ajaran, $simbol);
                          ?>
                        </div>
                        <?php
                          $bln_ajaran++;
                          if ($bln_ajaran>12) { 
                            $bln_ajaran=1;
                            $thn_ajaran++;
                          }
                          if ((($i % 4) == 0) && ($i < 12)) {
                            ?>
                            </div>
                            <div class="col-md-12">  
                            <?php
                          }
                        }
                        ?>
                        <?php /* ?><div class="col-md-3">
                          <?php
                          drawCal(1, 2017, $simbol);
                          ?>
                        </div>
                        <div class="col-md-3">
                          <?php
                          drawCal(2, 2017, $simbol);
                          ?>
                        </div>
                        <div class="col-md-3">
                          <?php
                          drawCal(3, 2017, $simbol);
                          ?>
                        </div>
                        <div class="col-md-3">
                          <?php
                          drawCal(4, 2017, $simbol);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-12">  
                        <div class="col-md-3">
                          <?php
                          drawCal(5, 2017, $simbol);
                          ?>
                        </div>
                        <div class="col-md-3">
                          <?php
                          drawCal(6, 2017, $simbol);
                          ?>
                        </div>
                        <div class="col-md-3">
                          <?php
                          drawCal(7, 2017, $simbol);
                          ?>
                        </div>
                        <div class="col-md-3">
                          <?php
                          drawCal(8, 2017, $simbol);
                          ?>
                        </div>
                      </div>
                      <div class="col-md-12"> 
                        <div class="col-md-3">
                          <?php
                          drawCal(9, 2017, $simbol);
                          ?>
                        </div>
                        <div class="col-md-3">
                          <?php
                          drawCal(10, 2017, $simbol);
                          ?>
                        </div>
                        <div class="col-md-3">
                          <?php
                          drawCal(11, 2017, $simbol);
                          ?>
                        </div>
                        <div class="col-md-3">
                          <?php
                          drawCal(12, 2017, $simbol);
                          ?>
                        </div>
                        <?php */ ?>
                      </div>

                      <br>
                      <br>
                      <br>
                      <?php
                      // echo "<pre>";
                      // print_r($kaldik);
                      // echo "</pre>";
                      $p=0;
                      for ($o=0; $o<(count($kaldik)/5)  ; $o++) { 


                        echo "<div class='col-md-3'>";
                        while ($p < (5*($o+1))) {
                          if(!empty($kaldik[$p])) echo '<img src="'.base_url().'assets/simbol/'.$kaldik[$p]->simbol_kaldik.'" height="70" width="70"/> '.$kaldik[$p]->nama_kaldik.'<br/>';
                          $p++;
                        }
                        echo "</div>";

                      }

                        // foreach ($kaldik as $rowkaldik) {
                        // echo '<img src="'.base_url().'assets/simbol/'.$rowkaldik->simbol_kaldik.'" width="50"/> '.$rowkaldik->nama_kaldik.'<br/>';
                        // }


                      ?>
                      <div class="col-md-12">
                        <a class="pull-right" href="<?php echo site_url('cetak/printkaldik'); ?>" ><button class="btnjdwl"><i class="fa fa-upload text-red "></i> Print</button></a>
                      </div>  
                    </div>

                  </div>
                </div>

                <!-- /.tab-pane -->

                <div class="tab-pane" id="tambahkaldik">
                 <form class="form-horizontal formkaldik" action="<?php echo site_url('nilai/akademik/tambah_kaldik'); ?>" method="post" enctype="multipart/form-data">
                  <div class="bigbox-mapel"> 
                    <div class="box-mapel">

                      <div class="form-group formgrup jarakform">
                        <label for="inputKurikulum" class="col-sm-2 control-label">Nama Kaldik</label>
                        <div class="col-sm-4">
                          <input type="text" required="required" class="form-control"  name="nama_kaldik" placeholder="Nama Kaldik">
                        </div>
                      </div>

                      <div class="form-group formgrup jarakform">
                        <label for="inputKurikulum" class="col-sm-2 control-label">Simbol</label>
                        <div class="col-sm-4" >

                          <input type="file" required="required" class=""  name="simbol_kaldik" placeholder="Simbol">

                        </div>
                      </div>

                      <div class="form-group formgrup jarakform">
                        <label for="inputKurikulum" class="col-sm-2 control-label">Tanggal Awal</label>
                        <div class="col-sm-4">
                          <input type="date" required="required" class="form-control"  name="tgl_awal" placeholder="Tanggal Awal">
                        </div>
                      </div>

                      <div class="form-group formgrup jarakform">
                        <label for="inputKurikulum" class="col-sm-2 control-label">Tanggal Akhir</label>
                        <div class="col-sm-4">
                          <input type="date" required="required" class="form-control"  name="tgl_akhir" placeholder="Tanggal Akhir">
                        </div>
                      </div>


                    </div>
                  </div>
                  <!-- <div class="tambahmapel">
                    <i class="fa fa-plus-circle text-red"></i><a style="color:red" href="#" id="tambahmapel"> Tambah kategori</a>
                  </div> -->
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form> 
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="editkaldik">
               <form class="form-horizontal formkaldik">
                <div class="form-group formgrup">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-4">
                    <input type="file" class="form-control" id="inputName" placeholder="Name">
                  </div>
                </div>

                <div class="form-group" id="homekaldik">
                  <div class="col-sm-offset-2 col-sm-10">
                    <td><button type="submit" class="btn btn-danger" href="#datakaldik" data-toggle="tab">Submit</button> <button type="submit" class="btn btn-danger" href="#datakaldik" data-toggle="tab">Back</button> </td>
                  </div>
                </div>
              </form> 
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="datakaldik">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kalender Pendidikan</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th class="fit">No</th>
                        <th>Nama kaldik</th>
                        <th>Simbol</th>
                        <th>Tanggal Awal</th>
                        <th>Tanggal Akhir</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=0;
                      foreach ($kaldik as $rowkaldik) {
                        $i++;
                        ?>
                        <tr>
                          <td class="fit"><?php echo $i; ?></td>
                          <td><?php echo $rowkaldik->nama_kaldik; ?></td>
                          <td><img src="<?php echo base_url(); ?>assets/simbol/<?php echo $rowkaldik->simbol_kaldik; ?>" width="50"/></td>
                          <td><?php echo $rowkaldik->tgl_awal; ?></td>
                          <td><?php echo $rowkaldik->tgl_akhir; ?></td>
                          <td> 
                            <a data-toggle="modal" data-show="true" data-target="#editkaldik<?php echo $i; ?>" class="btn btn-block btn-primary button-action btnedit" href="<?php echo site_url("nilai/akademik/form_edit_kaldik/".$rowkaldik->id_kaldik); ?>" >Edit</a>
                            <a type="button" style="background: red ; border: red;" class="btn btn-block btn-primary button-action btnhapus " href="<?php echo site_url("nilai/akademik/hapus_kaldik/".$rowkaldik->id_kaldik); ?>" onclick="return confirm_delete();">Hapus</a>
                          </td>               
                        </tr>

                        <div id="editkaldik<?php echo $i; ?>" class="modal fade " role="dialog">
                          <div class="modal-dialog modal-md" >
                            <div class="modal-content">
                              <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <h4 class="modal-title">Edit Kaldik</h4>
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
   <!-- /modal -->
   <div class="modal fade bs-example-modal-lg" id="kaldik1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">KALDIK TAHUN AJARAN <?php echo $judul_tahun_ajaran; ?></h4>
        </div>
        <div class="modal-body">
          <center><embed src="image/kaldik1.jpg"> </embed></center>
        </div>
        <div class="modal-footer">
          <a href="#kaldik1" data-toggle="tab"><button class="btnjdwl"><i class="fa fa-print text-red "></i> Print</button></a>
        </div>
      </div>
    </div>
  </div>

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
</html>

