<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <center style="color:navy;">Total Data Guru SMP Yogyakarta <br></center>
      <br>
    </h1>
  </section>
  <section class="content">
    <div class="row">

      <!-- /.col -->
      <div class="col-md-12">

        <div class="nav-tabs-custom">

          <ul class="nav nav-tabs">
            <li class="active"><a href="#datapegawai" data-toggle="tab">Lihat Data Guru</a></li>

            
          </ul>

             <!--  <div class="box-header">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#datapegawai" data-toggle="tab">Data Karyawan</a></li>
                  
                </ul>
              </div> -->

              <div class="tab-content">

                <!-- data pegawai -->
                <div class="active tab-pane" id="datapegawai">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Total Data Guru</h3>
                    </div>
                    <table id="example1" class="table table-bordered table-striped" > 
                      <thead> 
                        <tr style="background-color: #53c68c">
                          <th>No</th>
                          <th>NIP</th>
                          <th>Nama</th>
                          <th>Golongan</th> 
                          <th>Status</th>   
                          <th>Action</th>      
                        </tr>
                      </thead>
                      <tbody>
                        <!-- function datpeg -->
                        <?php
                        $no=1;
                        foreach ($datpeguru->result() as $key) { ?>
                        <tr>
                          <td><?php echo $no?></td>
                          <td><?php echo $key->NIP;?></td>
                          <td><?php echo $key->Nama;?></td>
                          <td><?php echo $key->Golongan;?></td>
                          <td><?php echo $key->Status;?></td>

                          <td> 
                            <?php
                            if ($this->session->userdata('jabatan') == 'Superadmin') {
                              ?>
                              <a  href="<?php echo site_url('sistem/superadmin/detailspegawai/');?><?php echo $key->NIP; ?>" type="button" role="button" class="btn btn-block btn-primary button-action btnedit">Details</a>
                              <?php
                            } else if ($this->session->userdata('jabatan') == 'Kepala Sekolah') {
                              ?>
                            <a > No More Details</a>
                              <?php

                            } else if ($this->session->userdata('jabatan') == 'Pegawai'){
                              ?>
                              <a  href="<?php echo site_url('sistem/pegawai/detailspegawai/');?><?php echo $key->NIP; ?>" type="button" role="button" class="btn btn-block btn-primary button-action btnedit">Details</a>
                              <?php
                            } 
                            ?>
                          </td>     
                        </tr>
                        <?php $no++; }?>
                        <!-- tutup function -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- tutup tab pegawai -->



            </div> <!-- tutup content -->

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

