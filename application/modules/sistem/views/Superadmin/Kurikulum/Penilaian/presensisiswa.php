   
<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <center style="color:navy;">Presensi Pegawai SMP Yogyakarta <br></center>
      <br>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('sistem/superadmin');?>">Dashboard</a></li>
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
           <?php
           if (($this->session->userdata('jabatan') == 'Superadmin') || ($this->session->userdata('jabatan') == 'Pegawai')) {
            ?>
            <li class="active"><a href="#presensipegawai" data-toggle="tab">Presensi Pegawai</a></li>
            <?php
          }
          ?>
          <li><a href="#laporanpresensibulan" data-toggle="tab">Laporan Presensi Per Bulan</a></li>
          <li><a href="#laporanpersemester" data-toggle="tab">Laporan Presensi Per Semester</a></li>
          <li><a href="#grafik" data-toggle="tab">Grafik Kehadiran Pegawai</a></li>

        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="presensipegawai">
            <div class="box">
              <div class="box-header">
              <form method="post" action="">
                <?php 
                  $bln = date('m');
                  $thn = date('Y');
                  if ($this->input->post('bln') != "") { $bln = $this->input->post('bln'); }
                  if ($this->input->post('thn') != "") { $thn = $this->input->post('thn'); }
                ?>
               <select name="bln">
                <option value="">-</option>
                <option value="01" <?php if ($bln == '01') { echo " selected"; } ?>>Januari</option>
                <option value="02" <?php if ($bln == '02') { echo " selected"; } ?>>Februari</option>
                <option value="03" <?php if ($bln == '03') { echo " selected"; } ?>>Maret</option>
                <option value="04" <?php if ($bln == '04') { echo " selected"; } ?>>April</option>
                <option value="05" <?php if ($bln == '05') { echo " selected"; } ?>>Mei</option>
                <option value="06" <?php if ($bln == '06') { echo " selected"; } ?>>Juni</option>
                <option value="07" <?php if ($bln == '07') { echo " selected"; } ?>>Juli</option>
                <option value="08" <?php if ($bln == '08') { echo " selected"; } ?>>Agustus</option>
                <option value="09" <?php if ($bln == '09') { echo " selected"; } ?>>September</option>
                <option value="10" <?php if ($bln == '10') { echo " selected"; } ?>>Oktober</option>
                <option value="11" <?php if ($bln == '11') { echo " selected"; } ?>>November</option>
                <option value="12" <?php if ($bln == '12') { echo " selected"; } ?>>Desember</option>
              </select> 
              <select name="thn">
                <option value="">-</option>
                <option value="2016" <?php if ($thn == '2016') { echo " selected"; } ?>>2016</option>
                <option value="2017" <?php if ($thn == '2017') { echo " selected"; } ?>>2017</option>
                <option value="2018" <?php if ($thn == '2018') { echo " selected"; } ?>>2018</option>
                <option value="2019"  <?php if ($thn == '2019') { echo " selected"; } ?>>2019</option>
                <option value="2020"  <?php if ($thn == '2020') { echo " selected"; } ?>>2020</option>
              </select>
              <input type="submit" value="Lihat"/>
            </form>
              

              <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div style="overflow: auto">
                
                <form action="<?php echo site_url('sistem/superadmin/submitpresensisiswa'); ?>" method="post" accept-charset="utf-8">
                  <input type="hidden" name="bln" value="<?php echo $bln; ?>">
                  <input type="hidden" name="thn" value="<?php echo $thn; ?>">
                  <?php
                    //print_r($datpresensi);
                  ?>
                  <table  class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                      <tr class="barishari">
                        <th class="fit">No</th>
                        <th>nama Pegawai</th>
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
                      <?php
                      $j=0;
                      foreach ($datsis->result() as $rowsis) {
                        $j++;
                        ?>
                        <tr>
                          <td><?php echo $j; ?></td>
                          <td><?php echo $rowsis->nama; ?></td>
                          <?php
                          //for($i=1;$i<=date('t');$i++) {
                          for($i=1;$i<=cal_days_in_month(CAL_GREGORIAN, $bln, $thn);$i++) {
                            ?>
                            <td>
                              <?php
                                $waktu = mktime(0, 0, 0, $bln, $i, $thn);
                                $dayofweek = date('w', $waktu);
                                if (($dayofweek != $day_libur) && ($datlibur[$i] == "")) {
                              ?>
                              <?php //echo $i; ?>
                              <select class="rangkumanpegawai" name="presensi_<?php echo $rowsis->nisn; ?>_<?php echo $i; ?>">
                               <option value=""></option>
                               <option value="H" <?php if (@$datpresensi[$rowsis->nisn][$i] == "H") { echo " selected"; } ?>>H</option>
                               <option value="S" <?php if (@$datpresensi[$rowsis->nisn][$i] == "S") { echo " selected"; } ?>>S</option>
                               <option value="I" <?php if (@$datpresensi[$rowsis->nisn][$i] == "I") { echo " selected"; } ?>>I</option>
                               <option value="A" <?php if (@$datpresensi[$rowsis->nisn][$i] == "A") { echo " selected"; } ?>>A</option> 
                             </select>
                             <input type="time" name="waktu_<?php echo $rowsis->nisn; ?>_<?php echo $i; ?>" value="<?php echo @$datwaktu[$rowsis->nisn][$i]; ?>">
                             <?php
                                } else if ($datlibur[$i] != "") {
                                  echo $datlibur[$i];
                                } else {
                                  echo $hari_libur;
                                }
                             ?>
                           </td>
                           <?php
                         }
                         ?>
                       </tr>
                       <?php
                     }
                     ?>
                   </tbody>
                 </table>
                 <input class="btn btnjdwl" type="submit" value="Submit"/>
               </form>
             </div>
             


           </div>

           <div class="box-body">
            <div class="box-header"> 
            
             
              <h3 class="box-title center" style="margin-left: 35%">Presensi Pegawai Bulan <?php 
                        if ($bln == 1) {
                          echo "Januari";
                        } else if ($bln == 2) {
                          echo "Februari";
                        } else if ($bln == 3) {
                          echo "Maret";
                        } else if ($bln == 4) {
                          echo "April";
                        } else if ($bln == 5) {
                          echo "Mei";
                        } else if ($bln == 6) {
                          echo "Juni";
                        } else if ($bln == 7) {
                          echo "Juli";
                        } else if ($bln == 8) {
                          echo "Agustus";
                        } else if ($bln == 9) {
                          echo "September";
                        } else if ($bln == 10) {
                          echo "Oktober";
                        } else if ($bln == 11) {
                          echo "November";
                        } else if ($bln == 12) {
                          echo "Desember";
                        }
                        //echo $i;
                         ?></h3>
            </div>
            <div style="overflow: auto">
              <table class="table table-bordered table-striped" style="width: 100%">
                <thead>
                  <tr class="barishari" style="background-color: #53c68c">
                    <th class="fit">No</th>
                    <th>nama Pegawai</th>
                    <?php
                    for($i=1;$i<=date('t');$i++) {
                      ?>
                      <th><?php echo $i; ?></th>
                      <?php
                    }
                    ?>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $j=0;
                  foreach ($datsis->result() as $rowsis) {
                    $j++;
                    ?>
                    <tr>
                      <td><?php echo $j; ?></td>
                      <td><?php echo $rowsis->nama; ?></td>
                      <?php
                      for($i=1;$i<=date('t');$i++) {
                        ?>
                        <td>
                            <?php
                              if (($dayofweek != $day_libur) && ($datlibur[$i] == "")) {
                              ?>
                              <?php echo @$datpresensi[$rowsis->nisn][$i].'<br/>'.@$datwaktu[$rowsis->nisn][$i]; ?>
                             
                             <?php
                                } else if ($datlibur[$i] != "") {
                                  echo $datlibur[$i];
                                } else {
                                  echo $hari_libur;
                                }
                             ?>
                          
                        </td>
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
          </div>

          <!-- /.box-body -->
        </div> 
      </div>

      <!-- /.tab-pane -->
      <div class=" tab-pane" id="laporanpresensibulan">
        <div class="box">
          <div class="box-header"> 
             <form method="post" action="">
                <?php 
                  $thn = date('Y');
                  if ($this->input->post('thn') != "") { $thn = $this->input->post('thn'); }
                ?>
               
              <select name="thn">
                <option value="">-</option>
                <option value="2016" <?php if ($thn == '2016') { echo " selected"; } ?>>2016</option>
                <option value="2017" <?php if ($thn == '2017') { echo " selected"; } ?>>2017</option>
                <option value="2018" <?php if ($thn == '2018') { echo " selected"; } ?>>2018</option>
                <option value="2019" <?php if ($thn == '2019') { echo " selected"; } ?>>2019</option>
                <option value="2020" <?php if ($thn == '2020') { echo " selected"; } ?>>2020</option>
              </select>
              <input type="submit" value="Lihat"/>
            </form>
             <br>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div style="overflow: auto">
              <table  class="table table-bordered table-striped" style="width: 100%">
                <thead>
                  <tr class="barishari">
                    <th>Bulan</th>
                    
                    <th class="fit">nama Pegawai</th>
                    <th class="fit">Hadir</th>
                    <th class="fit">Sakit</th>
                    <th class="fit">Ijin</th>
                    <th class="fit">Absen</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  for ($i=1;$i<=12;$i++) {
                    $j=0;
                    $tabel_datsis = $datsis->result();
                    foreach ($tabel_datsis as $rowsis) {
                      $j++;
                      ?>
                    <tr>
                      <?php 
                      if ($j == 1) {
                      ?>
                      <td class="fit" rowspan="<?php echo count($tabel_datsis); ?>"><?php 
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
                         ?></td>
                      <?php
                      }
                      ?>
                      <td><?php echo $rowsis->nama; ?></td>
                      <td><?php echo $datpresensibulan[$rowsis->nisn][$i]['H']; ?></td>
                      <td><?php echo $datpresensibulan[$rowsis->nisn][$i]['S']; ?></td>
                      <td><?php echo $datpresensibulan[$rowsis->nisn][$i]['I']; ?></td>
                      <td><?php echo $datpresensibulan[$rowsis->nisn][$i]['A']; ?></td>
                    </tr>
                    <?php
                    }

                  }
                  ?>
                </tr>
              </tbody>
            </table>
          </div>
          <button class="btnjdwl"><i class="fa fa-print text-red "></i> Print</button>
        </div>
        <!-- /.box-body -->
      </div> 
    </div>
    <!-- /.tab-pane -->
    <div class="tab-pane" id="laporanpersemester">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Laporan Presensi Pegawai Per Semester</h3>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div style="overflow: auto">
            <table class="table table-bordered table-striped" style="width: 100%">
              <thead>
                <tr class="barishari">
                  <th>Semester</th>
                  <th class="fit">nama Pegawai</th>
                  <th class="fit">Hadir</th>
                  <th class="fit">Sakit</th>
                  <th class="fit">Ijin</th>
                  <th class="fit">Absen</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  for ($i=1;$i<=2;$i++) {
                    $j=0;
                    $tabel_datsis = $datsis->result();
                    foreach ($tabel_datsis as $rowsis) {
                      $j++;
                      ?>
                    <tr>
                      <?php 
                      if ($j == 1) {
                      ?>
                      <td class="fit" rowspan="<?php echo count($tabel_datsis); ?>"><?php 
                        if ($i == 1) {
                          echo "Ganjil";
                        } else {
                          echo "Genap";
                        }
                        //echo $i;
                         ?></td>
                      <?php
                      }
                      ?>
                      <td><?php echo $rowsis->nama; ?></td>
                      <td><?php echo $datpresensisemester[$rowsis->nisn][$i]['H']; ?></td>
                      <td><?php echo $datpresensisemester[$rowsis->nisn][$i]['S']; ?></td>
                      <td><?php echo $datpresensisemester[$rowsis->nisn][$i]['I']; ?></td>
                      <td><?php echo $datpresensisemester[$rowsis->nisn][$i]['A']; ?></td>
                    </tr>
                    <?php
                    }

                  }
                  ?>
                
              </tbody>
            </table>
          </div>
          <button class="btnjdwl"><i class="fa fa-print text-red "></i> Print</button>
        </div>

        <!-- /.box-body -->
      </div> 
    </div>

    <div class="chart tab-pane" id="grafik" style="position: relative; ">
      <div class="box box-primary">
         <div class="box-header">
           <form method="post" action="">
                <?php 
                  $thn = date('Y');
                  if ($this->input->post('thn') != "") { $thn = $this->input->post('thn'); }
                ?>
               
              <select name="thn">
                <option value="">-</option>
                <option value="2016" <?php if ($thn == '2016') { echo " selected"; } ?>>2016</option>
                <option value="2017" <?php if ($thn == '2017') { echo " selected"; } ?>>2017</option>
                <option value="2018" <?php if ($thn == '2018') { echo " selected"; } ?>>2018</option>
                <option value="2019"  <?php if ($thn == '2019') { echo " selected"; } ?>>2019</option>
                <option value="2020"  <?php if ($thn == '2020') { echo " selected"; } ?>>2020</option>
              </select>
              <input type="submit" value="Lihat"/>
            </form>
          
        </div>
    <!-- <div class="box-header with-border">
      <i class="fa fa-bar-chart-o"></i>
      <h3 class="box-title" id="Perkelas" >Grafik Perkelas</h3>
    </div> -->
    <div class="box-body">
      <div id="container" style="height: 300px;"></div>
    </div>
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