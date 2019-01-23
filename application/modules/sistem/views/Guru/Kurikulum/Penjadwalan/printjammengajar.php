<style type="text/css">
    @media print {
      body {-webkit-print-color-adjust: exact;}
    }
  </style>
<body onload="window.print();">
	    <table  class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th >No.</th>
                                <th >Nama</th>
                                <th >NIP</th>
                                <!-- <th >Kode Guru</th> -->
                                <th >Golongan</th>
                                <th >Jabatan Guru</th>
                                <th >Ijazah</th>
                                <th >Mata pelajaran</th>
                                <th >Jam Minim Mengajar</th>
                                <th ><center>Jumlah jam</center></th>
                                <th >Action</th>

                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $i=0;
                              foreach ($tabel_jammengajar as $row_jammengajar) {
                                $i++;
                                ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $row_jammengajar->Nama; ?></td>
                                  <td><?php echo $row_jammengajar->NIP; ?></td>
                                  <!-- <td><?php echo $row_jammengajar->kode_guru; ?></td> -->
                                  <td><?php echo $row_jammengajar->Golongan; ?></td>
                                  <td><?php echo $row_jammengajar->pangkat; ?></td>
                                  <td><?php echo $row_jammengajar->Pendidikan; ?></td>
                                  <td><?php echo $row_jammengajar->nama; ?></td>
                                  <td><?php echo $row_jammengajar->jatah_minim_mgjr; ?></td>
                                  <td><?php echo substr($total_durasi[$row_jammengajar->id_jam_mgjr], 0, 5); ?></td>
                                  <td><a onclick="return confirm('Apakah Anda yakin?')" href="<?php echo site_url('guru/hapusjammengajar/'.$row_jammengajar->id_jam_mgjr); ?>" class="btn btn-danger">Hapus</a></td>

                                </tr>
                                <?php
                              }
                              ?>
                            </tbody>
                          </table>
</body>