
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <center style="color:navy;">Halaman Kelola Mata Pelajaran<br></center>
      <!-- <center><small>Tahun Ajaran 2016-2017 Kurikulum 2013</small></center> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="gurupiket">Dashboard</a></li>
    </ol>
  </section>





  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
           <li class="active" ><a href="#datanamamapel" data-toggle="tab">Data Mata Pelajaran</a></li>

           <?php
           if ($this->session->userdata('jabatan') == 'gurupiket') {
            ?>
            <li ><a href="#datakelolamapelgurupiket" data-toggle="tab"><?php if (@$edit_mapel) { echo "Edit"; } else { echo "Tambah"; } ?> Mata Pelajaran </a></li>
            <?php 
          } 
          ?>

          <?php
          if ($this->session->userdata('jabatan') == 'Kurikulum') {
            ?>
            <li ><a href="#datakelolamapelkurikulum" data-toggle="tab"><?php if (@$edit_mapel) { echo "Edit"; } else { echo "Tambah"; } ?> Mata Pelajaran </a></li>
            <?php 
          } 
          ?>

          <?php
          if ($this->session->userdata('jabatan') == 'Kesiswaan') {
            ?>
            <li ><a href="#datakelolamapelkesiswaan" data-toggle="tab"><?php if (@$edit_mapel) { echo "Edit"; } else { echo "Tambah"; } ?> Mata Pelajaran </a></li > 
             <?php 
           } 
           ?>

         </ul>

         <div class="  tab-content">
           <div class="active tab-pane" id="datanamamapel">
             <div class="box">
              <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="fit">No</th>
                    <th>Mata Pelajaran</th>
                    <th>Warna</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      // $i=0;
                      // $nama_mapel = "";
                      // $kkm = "";
                      // $jam_belajar = "";
                      // $jenjang = "";
                      // foreach ($tabel_mapel as $row_mapel) {
                      //   if (($nama_mapel != $row_mapel->nama_mapel) || ($kkm != $row_mapel->kkm) || ($jam_belajar != $row_mapel->jam_belajar) || ($jenjang != $row_mapel->jenjang)) {

                      //   $i++; 
                  ?>
                  <?php
                  $i=0;
                  foreach ($tabel_namamapel as $row_namamapel) {
                    $i++; 
                    ?>
                    <tr>

                      <td class="fit"><?php echo $i; ?></td>
                      <td><?php echo $row_namamapel->nama; ?></td>
                      <td><span style="background-color: <?php echo $row_namamapel->warna; ?>;"><?php echo $row_namamapel->warna; ?></span></td>
                      <td> 

                       <?php
                       if ($this->session->userdata('jabatan') == 'gurupiket') {
                        ?>
                        <a class="btn btn-block btn-primary button-action btnedit" href="<?php echo site_url('gurupiket/namamapel/'.$row_namamapel->id_namamapel); ?>" > Edit </a>
                        <a onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-primary button-action btnhapus" href="<?php echo site_url('gurupiket/hapusnamamapel/'.$row_namamapel->id_namamapel); ?>" > Hapus </a>
                        <?php 
                      }
                      ?>

                      <?php
                      if ($this->session->userdata('jabatan') == 'Kesiswaan') {
                        ?>

                        <a class="btn btn-block btn-primary button-action btnedit" href="<?php echo site_url('kesiswaan/namamapel/'.$row_namamapel->id_namamapel); ?>" > Edit </a>
                        <a onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-primary button-action btnhapus" href="<?php echo site_url('kesiswaan/hapusnamamapel/'.$row_namamapel->id_namamapel); ?>" > Hapus </a>
                        <?php
                      }
                      ?>

                      <?php
                      if ($this->session->userdata('jabatan') == 'Kurikulum') {
                        ?>

                        <a class="btn btn-block btn-primary button-action btnedit" href="<?php echo site_url('kurikulum/namamapel/'.$row_namamapel->id_namamapel); ?>" > Edit </a>
                        <a onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-primary button-action btnhapus" href="<?php echo site_url('kurikulum/hapusnamamapel/'.$row_namamapel->id_namamapel); ?>" > Hapus </a>
                        <?php
                      }
                      ?>
                    </td>               
                  </tr>
                  <?php
                      //     $nama_mapel = $row_mapel->nama_mapel;
                      //     $kkm = $row_mapel->kkm;
                      //     $jam_belajar = $row_mapel->jam_belajar;
                      //     $jenjang = $row_mapel->jenjang;
                      //   }
                      // }
                  ?> 
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>


        <!-- /.tab-pane -->
        <!-- Data Kelola Mapel gurupiket -->

        <div class="tab-pane" id="datakelolamapelgurupiket">
         <form id="formmapel" style="display:block;" class="form-horizontal formmapel" method="post" action="<?php echo site_url('gurupiket/simpannamamapel'); ?>">
          <input type="hidden" name="id_namamapel" id="id_namamapel"  value="<?php echo @$edit_mapel->id_namamapel; ?>"/>
          <p style="color: #ff0000"> > Isi <b>Nama Mata Pelajaran</b> dengan <b>Mata Pelajaran</b> yang ada di sekolah.<br>
            > <b>Pilih Warna</b> adalah untuk memberi warna agar berbeda pada setiap mata pelajaran (berguna pada Jadwal Mapel)

          </p>


          <div class="bigbox-mapel"> 
            <div class="box-mapel">
              <div class="form-group formgrup jarakform">
                <label for="inputKurikulum" class="col-sm-2 control-label">Nama Mata Pelajaran</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mata Pelajaran" value="<?php echo @$edit_mapel->nama; ?>">
                </div>
              </div>

              <div class="form-group formgrup jarakform">
                <label for="inputKurikulum" class="col-sm-2 control-label">Pilih Warna</label>
                <div class="col-sm-4">
                  <select type="text" class="form-control" id="warna" name="warna" placeholder="Warna" value=" style="width: 120px;">
                    <option value="">...</option>
                    <option  value="#ff0000" style="background-color: #ff0000;" <?php if (@$edit_mapel->warna == "#ff0000") { echo " selected"; } ?>>Merah</option>
                    <option  value="#00ff00" style="background-color: #00ff00;" <?php if (@$edit_mapel->warna == "#00ff00") { echo " selected"; } ?>>Hijau Tua</option>
                    <option  value="#bfed87" style="background-color: #bfed87;" <?php if (@$edit_mapel->warna == "#bfed87") { echo " selected"; } ?>>Hijau Muda</option>
                    <option  value="#0000ff" style="background-color: #0000ff;" <?php if (@$edit_mapel->warna == "#0000ff") { echo " selected"; } ?>>Biru Tua</option>
                    <option  value="#62d5db" style="background-color: #62d5db;" <?php if (@$edit_mapel->warna == "#62d5db") { echo " selected"; } ?>>Biru Muda</option>
                    <option  value="#ffff00" style="background-color: #ffff00;" <?php if (@$edit_mapel->warna == "#ffff00") { echo " selected"; } ?>>Kuning</option>
                    <option  value="#a331c6" style="background-color: #a331c6;" <?php if (@$edit_mapel->warna == "#a331c6") { echo " selected"; } ?>>Ungu Tua</option>
                    <option  value="#d38fe8" style="background-color: #d38fe8;" <?php if (@$edit_mapel->warna == "#d38fe8") { echo " selected"; } ?>>Ungu Muda</option>
                    <option  value="#cccccc" style="background-color: #cccccc;" <?php if (@$edit_mapel->warna == "#cccccc") { echo " selected"; } ?>>Abu-abu</option>
                    <option  value="#efad13" style="background-color: #efad13;" <?php if (@$edit_mapel->warna == "#efad13") { echo " selected"; } ?>>Oren</option>
                    <option  value="#e89696" style="background-color: #e89696;" <?php if (@$edit_mapel->warna == "#e89696") { echo " selected"; } ?>>Pink</option>
                    <option  value="#ba8c48" style="background-color: #ba8c48;" <?php if (@$edit_mapel->warna == "#ba8c48") { echo " selected"; } ?>>Coklat</option>
                    <option  value="#eddeb8" style="background-color: #eddeb8;" <?php if (@$edit_mapel->warna == "#eddeb8") { echo " selected"; } ?>>Krem</option>

                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-danger">Tambah</button>
            </div>
          </div>
        </form>
      </div>
      <!-- tutup data kelola mapel gurupiket -->



      <!-- Data Kelola Mapel kesiswaan -->

      <div class="tab-pane" id="datakelolamapelkesiswaan">
       <form id="formmapel" style="display:block;" class="form-horizontal formmapel" method="post" action="<?php echo site_url('kesiswaan/simpannamamapel'); ?> ">
        <input type="hidden" name="id_namamapel" id="id_namamapel"  value="<?php echo @$edit_mapel->id_namamapel; ?>"/>
        <p style="color: #ff0000"> > Isi <b>Nama Mata Pelajaran</b> dengan <b>Mata Pelajaran</b> yang ada di sekolah.<br>
          > <b>Pilih Warna</b> adalah untuk memberi warna agar berbeda pada setiap mata pelajaran (berguna pada Jadwal Mapel)

        </p>


        <div class="bigbox-mapel"> 
          <div class="box-mapel">
            <div class="form-group formgrup jarakform">
              <label for="inputKurikulum" class="col-sm-2 control-label">Nama Mata Pelajaran</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mata Pelajaran" value="<?php echo @$edit_mapel->nama; ?>">
              </div>
            </div>

            <div class="form-group formgrup jarakform">
              <label for="inputKurikulum" class="col-sm-2 control-label">Pilih Warna</label>
              <div class="col-sm-4">
                <select type="text" class="form-control" id="warna" name="warna" placeholder="Warna" value=" style="width: 120px;">
                  <option value="">...</option>
                  <option  value="#ff0000" style="background-color: #ff0000;" <?php if (@$edit_mapel->warna == "#ff0000") { echo " selected"; } ?>>Merah</option>
                  <option  value="#00ff00" style="background-color: #00ff00;" <?php if (@$edit_mapel->warna == "#00ff00") { echo " selected"; } ?>>Hijau Tua</option>
                  <option  value="#bfed87" style="background-color: #bfed87;" <?php if (@$edit_mapel->warna == "#bfed87") { echo " selected"; } ?>>Hijau Muda</option>
                  <option  value="#0000ff" style="background-color: #0000ff;" <?php if (@$edit_mapel->warna == "#0000ff") { echo " selected"; } ?>>Biru Tua</option>
                  <option  value="#62d5db" style="background-color: #62d5db;" <?php if (@$edit_mapel->warna == "#62d5db") { echo " selected"; } ?>>Biru Muda</option>
                  <option  value="#ffff00" style="background-color: #ffff00;" <?php if (@$edit_mapel->warna == "#ffff00") { echo " selected"; } ?>>Kuning</option>
                  <option  value="#a331c6" style="background-color: #a331c6;" <?php if (@$edit_mapel->warna == "#a331c6") { echo " selected"; } ?>>Ungu Tua</option>
                  <option  value="#d38fe8" style="background-color: #d38fe8;" <?php if (@$edit_mapel->warna == "#d38fe8") { echo " selected"; } ?>>Ungu Muda</option>
                  <option  value="#cccccc" style="background-color: #cccccc;" <?php if (@$edit_mapel->warna == "#cccccc") { echo " selected"; } ?>>Abu-abu</option>
                  <option  value="#efad13" style="background-color: #efad13;" <?php if (@$edit_mapel->warna == "#efad13") { echo " selected"; } ?>>Oren</option>
                  <option  value="#e89696" style="background-color: #e89696;" <?php if (@$edit_mapel->warna == "#e89696") { echo " selected"; } ?>>Pink</option>
                  <option  value="#ba8c48" style="background-color: #ba8c48;" <?php if (@$edit_mapel->warna == "#ba8c48") { echo " selected"; } ?>>Coklat</option>
                  <option  value="#eddeb8" style="background-color: #eddeb8;" <?php if (@$edit_mapel->warna == "#eddeb8") { echo " selected"; } ?>>Krem</option>

                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-danger">Tambah</button>
          </div>
        </div>
      </form>
    </div>
    <!-- tutup data kelola mapel kesiswaan-->


    <!-- Data Kelola Mapel kurikulum -->

    <div class="tab-pane" id="datakelolamapelkurikulum">
     <form id="formmapel" style="display:block;" class="form-horizontal formmapel" method="post" action="<?php echo site_url('kurikulum/simpannamamapel'); ?> ">
      <input type="hidden" name="id_namamapel" id="id_namamapel"  value="<?php echo @$edit_mapel->id_namamapel; ?>"/>
      <p style="color: #ff0000"> > Isi <b>Nama Mata Pelajaran</b> dengan <b>Mata Pelajaran</b> yang ada di sekolah.<br>
        > <b>Pilih Warna</b> adalah untuk memberi warna agar berbeda pada setiap mata pelajaran (berguna pada Jadwal Mapel)

      </p>


      <div class="bigbox-mapel"> 
        <div class="box-mapel">
          <div class="form-group formgrup jarakform">
            <label for="inputKurikulum" class="col-sm-2 control-label">Nama Mata Pelajaran</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mata Pelajaran" value="<?php echo @$edit_mapel->nama; ?>">
            </div>
          </div>

          <div class="form-group formgrup jarakform">
            <label for="inputKurikulum" class="col-sm-2 control-label">Pilih Warna</label>
            <div class="col-sm-4">
              <select type="text" class="form-control" id="warna" name="warna" placeholder="Warna" value=" style="width: 120px;">
                <option value="">...</option>
                <option  value="#ff0000" style="background-color: #ff0000;" <?php if (@$edit_mapel->warna == "#ff0000") { echo " selected"; } ?>>Merah</option>
                <option  value="#00ff00" style="background-color: #00ff00;" <?php if (@$edit_mapel->warna == "#00ff00") { echo " selected"; } ?>>Hijau Tua</option>
                <option  value="#bfed87" style="background-color: #bfed87;" <?php if (@$edit_mapel->warna == "#bfed87") { echo " selected"; } ?>>Hijau Muda</option>
                <option  value="#0000ff" style="background-color: #0000ff;" <?php if (@$edit_mapel->warna == "#0000ff") { echo " selected"; } ?>>Biru Tua</option>
                <option  value="#62d5db" style="background-color: #62d5db;" <?php if (@$edit_mapel->warna == "#62d5db") { echo " selected"; } ?>>Biru Muda</option>
                <option  value="#ffff00" style="background-color: #ffff00;" <?php if (@$edit_mapel->warna == "#ffff00") { echo " selected"; } ?>>Kuning</option>
                <option  value="#a331c6" style="background-color: #a331c6;" <?php if (@$edit_mapel->warna == "#a331c6") { echo " selected"; } ?>>Ungu Tua</option>
                <option  value="#d38fe8" style="background-color: #d38fe8;" <?php if (@$edit_mapel->warna == "#d38fe8") { echo " selected"; } ?>>Ungu Muda</option>
                <option  value="#cccccc" style="background-color: #cccccc;" <?php if (@$edit_mapel->warna == "#cccccc") { echo " selected"; } ?>>Abu-abu</option>
                <option  value="#efad13" style="background-color: #efad13;" <?php if (@$edit_mapel->warna == "#efad13") { echo " selected"; } ?>>Oren</option>
                <option  value="#e89696" style="background-color: #e89696;" <?php if (@$edit_mapel->warna == "#e89696") { echo " selected"; } ?>>Pink</option>
                <option  value="#ba8c48" style="background-color: #ba8c48;" <?php if (@$edit_mapel->warna == "#ba8c48") { echo " selected"; } ?>>Coklat</option>
                <option  value="#eddeb8" style="background-color: #eddeb8;" <?php if (@$edit_mapel->warna == "#eddeb8") { echo " selected"; } ?>>Krem</option>

              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-danger">Tambah</button>
        </div>
      </div>
    </form>
  </div>
  <!-- tutup data kelola mapel kurikulum -->

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

</section>
<!-- /.content -->
</div>