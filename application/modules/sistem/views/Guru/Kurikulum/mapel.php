   
<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <center style="color:navy;">Presensi Pegawai SMP Yogyakarta <br></center>
      <br>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('guru');?>">Dashboard</a></li>
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
              <li class="active"><a href="#kelolamapel" data-toggle="tab"><?php if ($edit_mapel) { echo "Edit"; } else { echo "Tambah"; } ?> Mata Pelajaran</a></li>
              <li><a href="#datamapel" data-toggle="tab">Data Mata Pelajaraaaaaaaan </a></li>
            </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="presensipegawai">
            <div class="box">
              <div class="box-header">
                 <form>
                      <select name="pilihgrade" id="pilihgrade" onchange="document.getElementById('grade').value = document.getElementById('pilihgrade').value; if (document.getElementById('pilihgrade').value == 'Ekskul') { document.getElementById('formmapel').style.display = 'none'; document.getElementById('formekskul').style.display = 'block'; } else { document.getElementById('formmapel').style.display = 'block'; document.getElementById('formekskul').style.display = 'none'; }">
                        <option value="">Pilih Jenjang</option>

                        <?php
                      $i=0;
                      foreach ($tabel_kelasreguler as $row_kelasreguler) {
                        $i++;
                        ?>
                          <option value="<?php echo $row_kelasreguler->jenjang; ?>" <?php if (@$edit_mapel->jenjang == $row_kelasreguler->jenjang) { echo " selected"; } ?>> KELAS <?php echo $row_kelasreguler->jenjang; ?></option>
                        <?php
                        }
                      ?>
                      <tr>

                        <!-- <option value="kelas 7" <?php //if (@$edit_mapel->grade == "kelas 7") { echo " selected"; } ?>> KELAS 7</option>
                        <option value="kelas 8" <?php //if (@$edit_mapel->grade == "kelas 8") { echo " selected"; } ?>> KELAS 8</option>
                        <option value="kelas 9" <?php //if (@$edit_mapel->grade == "kelas 9") { echo " selected"; } ?>> KELAS 9</option> -->
                        <!-- <option value="Ekskul" <?php //if (@$edit_mapel->grade == "Ekskul") { echo " selected"; } ?>> Ekskul </option> -->
                      </select>
              </form>
              </div>
              <!-- /.box-header -->
              <!-- box body presensi pegawai-->
              <div class="box-body">

                <div style="overflow: auto">
                  <form id="formmapel" style="display:block;" class="form-horizontal formmapel" method="post" action="<?php echo site_url('guru/simpanmapel'); ?>">
                  <input type="hidden" name="id_mapel" id="id_mapel"  value="<?php echo @$edit_mapel->id_mapel; ?>"/>
                  <input type="hidden" name="id_namamapel_old" id="id_namamapel_old"  value="<?php echo @$edit_mapel->id_namamapel; ?>"/>
                  <input type="hidden" name="grade" id="grade"  value="<?php if (@$edit_mapel->jenjang != "") { echo @$edit_mapel->jenjang; } else { echo "7"; } ?>"/>
                  <div class="bigbox-mapel"> 
                    <div class="box-mapel">
                      <div class="form-group formgrup jarakform">
                        <label for="inputKurikulum" class="col-sm-2 control-label">Pilih Mata Pelajaran</label>
                        <div class="col-sm-4">
                            <select class="kodemapel" name="id_namamapel" id="id_namamapel">
                              <option value="">Pilih mapel</option>
                              <?php
                            foreach ($tabel_namamapel as $row_namamapel) {
                            ?>
                            <option value="<?php echo $row_namamapel->id_namamapel; ?>" <?php if ($row_namamapel->id_namamapel == @$edit_mapel->id_namamapel) { echo " selected"; } ?>><?php echo $row_namamapel->nama; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                          <!-- <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" placeholder="Nama Mata Pelajaran" value="<?php echo @$edit_mapel->nama_mapel; ?>"> -->
                        </div>
                      </div>

                      <div class="form-group formgrup jarakform">
                        <label for="inputKurikulum" class="col-sm-2 control-label">KKM</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="kkm" name="kkm" placeholder="KKM"  value="<?php echo @$edit_mapel->kkm; ?>">
                        </div>
                      </div>

                      <div class="form-group formgrup jarakform">
                        <label for="inputKurikulum" class="col-sm-2 control-label">Jam Belajar </br> per minggu</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="jam_belajar" name="jam_belajar" placeholder="Jam Belajar"  value="<?php echo @$edit_mapel->jam_belajar; ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                 <!--  <div class="tambahmapel">
                    <i class="fa fa-plus-circle text-red"></i><a style="color:red" href="#" id="tambahmapel"> Tambah mapel</a>
                  </div> -->
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
                </div>



              </div>


            </div> 
          </div>

          

          <!-- /.tab-pane -->
          <div class=" tab-pane" id="laporanpresensibulan">
             <div class="box">
                  <div class="box-header" style="background-color:     #5c8a8a">
                    <h3 class="box-title" style="color:white">Data Mata Pelajaran Semua Kelas</h3>
                  </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div style="overflow: auto">
               <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th class="fit">No</th>
                        <th>Mata Pelajaran</th>
                        <th>KKM</th>
                        <th>Jam Belajar per Minggu</th>
                        <th>Kelas</th>
                        <th>Jumlah Jam Belajar<br>
                        (Jam Belajar x Jumlah Kelas)</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      $i=0;
                      $nama_mapel = "";
                      $kkm = "";
                      $jam_belajar = "";
                      $jenjang = "";
                      foreach ($tabel_mapel as $row_mapel) {
                        if (($nama_mapel != $row_mapel->nama_mapel) || ($kkm != $row_mapel->kkm) || ($jam_belajar != $row_mapel->jam_belajar) || ($jenjang != $row_mapel->jenjang)) {

                        $i++;
                      ?>
                      <tr>
                        <td class="fit"><?php echo $i; ?></td>
                        <td><?php echo $row_mapel->nama_mapel; ?></td>
                        <td><?php echo $row_mapel->kkm; ?></td>
                        <td><?php echo $row_mapel->jam_belajar; ?></td>
                        <td><?php echo $row_mapel->jenjang; ?></td>
                        <td><?php echo ($row_mapel->totalkelas*$row_mapel->jam_belajar); ?></td>
                        <td> 
                          <a class="btn btn-block btn-primary button-action btnedit" href="<?php echo site_url('guru/mapel/'.$row_mapel->id_kelas_reguler.'/'.$row_mapel->jenjang.'/'.str_replace(" ", "_", $row_mapel->id_namamapel)); ?>" > Edit </a>
                          <a onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-primary button-action btnhapus" href="<?php echo site_url('guru/hapusmapelbyidjenjang/'.$row_mapel->id_kelas_reguler.'/'.$row_mapel->jenjang.'/'.str_replace(" ", "_", $row_mapel->id_namamapel)); ?>" > Hapus </a>
                        </td>               
                      </tr>
                      <?php
                          $nama_mapel = $row_mapel->nama_mapel;
                          $kkm = $row_mapel->kkm;
                          $jam_belajar = $row_mapel->jam_belajar;
                          $jenjang = $row_mapel->jenjang;
                        }
                      }
                      ?>
                      </tbody>
                    </table>
            </div>
            <!-- <button class="btnjdwl"><i class="fa fa-print text-red "></i> Print</button> -->
          </div>
          <!-- /.box-body -->
        </div> 
      </div>
      <!-- /.tab-pane -->

      <!-- /.tab-pane -->
          <div class=" tab-pane" id="laporanpersemester">
            <div class="box">
              <div class="box-header"> 
               <form method="post" action="">
                <?php 
                $thn = date('Y');
                if ($this->input->post('thn') != "") { $thn = $this->input->post('thn'); }
                ?>

                <select name="thn">
                  <option value="">-</option>
                  <?php
                  for ($i=2016; $i<=date('Y')+5; $i++) {
                  ?>
                  <option value="<?php echo $i; ?>" <?php if ($thn == $i) { echo " selected"; } ?>><?php echo $i; ?></option>
                  <?php
                  }
                  ?>
                  <!-- <option value="2016" <?php if ($thn == '2016') { echo " selected"; } ?>>2016</option>
                  <option value="2017" <?php if ($thn == '2017') { echo " selected"; } ?>>2017</option>
                  <option value="2018" <?php if ($thn == '2018') { echo " selected"; } ?>>2018</option>
                  <option value="2019" <?php if ($thn == '2019') { echo " selected"; } ?>>2019</option>
                  <option value="2020" <?php if ($thn == '2020') { echo " selected"; } ?>>2020</option> -->
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

                      <th class="fit">Nama Pegawai</th>
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
                    $tabel_datpeg = $datpeg->result();
                    foreach ($tabel_datpeg as $rowpeg) {
                      $j++;
                      ?>
                    <tr>
                      <?php 
                      if ($j == 1) {
                      ?>
                      <td class="fit" rowspan="<?php echo count($tabel_datpeg); ?>"><?php 
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
                     <td><a href="<?php echo site_url('guru/resumepresensipegawaisemester/'.$rowpeg->NIP.'/'.$thn.'/'.$i); ?>"><?php echo $rowpeg->Nama; ?></a></td>                    
                       <td><?php echo $datpresensisemester[$rowpeg->NIP][$i]['H']; ?></td>
                      <td><?php echo $datpresensisemester[$rowpeg->NIP][$i]['S']; ?></td>
                      <td><?php echo $datpresensisemester[$rowpeg->NIP][$i]['I']; ?></td>
                      <td><?php echo $datpresensisemester[$rowpeg->NIP][$i]['A']; ?></td>
                    </tr>
                    <?php
                    }

                  }
                  ?>
                
              </tbody>
              </table>
            </div>
            <!-- <button class="btnjdwl"><i class="fa fa-print text-red "></i> Print</button> -->
          </div>
          <!-- /.box-body -->
        </div> 
      </div>
      <!-- /.tab-pane -->



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