
<html>
<body>

  <div class="modal-dialog " >

    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <h2 class="modal-title">Edit Nilai Siswa</h4>
    </div>
   <div class="modal-content"> 
    <form class="form-horizontal formgrup "  action="<?php echo base_url("penilaian/ubah_nilai/".$f->id_nilai_siswa); ?>" method="post" >
      <div class="bigbox-mapel" > 
        <div class="box-mapel">


        </div>
        <div class="modal-footer">
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button class="btn btn-success" type="submit">Submit</button>
              <button class="btn btn-danger" data-dismiss="modal" href="#lihatkategori" data-toggle="tab">Back</button>
            </div>
          </div>
        </div>
      </div>


    </form>
  </div>
</div>

</body>
</html>

