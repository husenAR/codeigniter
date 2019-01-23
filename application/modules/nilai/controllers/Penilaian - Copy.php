<?php
class Penilaian extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('M_data');
    $this->load->view('penilaian/penilaian_header');
    $this->load->view('penilaian/penilaian_footer');   
}


public function index()
{
 $this->load->view('penilaian/nilaisiswa');
}
public function nilaisiswa(){
    $this->load->model('M_data');

    $id_kelas_reguler_berjalan = @$this->uri->segment(3);
    $id_mapel = @$this->uri->segment(4);
    
    $id_tahun_ajaran = $this->M_data->getsetting()->id_tahun_ajaran;
    $data['kelas_reguler'] = $this->M_data->getkelasreguler(array('id_tahun_ajaran'=>$id_tahun_ajaran));
    //$data['kelas_reguler_berjalan'] = $this->M_data->getKelas()->result();
    $data['kelas_reguler_berjalan'] = $this->M_data->getKelasRegulerBerjalan($id_tahun_ajaran)->result();
    if ($id_kelas_reguler_berjalan == "") { $id_kelas_reguler_berjalan = @$data['kelas_reguler_berjalan'][0]->id_kelas_reguler_berjalan; }
    $data['id_kelas_reguler_berjalan'] = $id_kelas_reguler_berjalan;
    $data['kategori_nilai'] = $this->M_data->getKategorinilai()->result();
    $data['siswa'] = $this->M_data->getNamasiswa()->result();
    $data['jenis_nilai_akhir'] = $this->M_data->getJenisnilai()->result();
    //$data['mapel'] = $this->M_data->getMapel()->result();

    $mapel = $this->M_data->getMatapelajaran(array('kelas_reguler.id_kelas_reguler'=>'1', 'kelas_reguler.id_tahun_ajaran'=>$id_tahun_ajaran));
    if ($id_mapel == "") { $id_mapel = @$data['mapel'][0]->id_mapel; }
    $data['mapel'] = $mapel;
    $data['id_mapel'] = $id_mapel;
    $kategorinilai = $this->M_data->getKatNilai();
    $data['kategorinilai'] = $kategorinilai;
    $siswaperkelas = $this->M_data->getSiswaKelas($id_kelas_reguler_berjalan, $id_tahun_ajaran);
    //echo $this->db->last_query();
    $data['siswaperkelas'] = $siswaperkelas;
    //$data['nilai_siswa'] = $this->M_data->getNilai()->result();
    $data['nilai_siswa'] = $this->M_data->getNilaiKelasMapel($id_kelas_reguler_berjalan, $id_mapel);
    
    foreach ($siswaperkelas as $rowsiswa) {
        foreach ($mapel as $rowmapel) {
            $np = 0;
            $nk = 0;
            foreach ($kategorinilai as $rowkategorinilai) {
                $np = $np + @$this->M_data->getNilaiSiswa(array('nilai_siswa.nisn'=>$rowsiswa->nisn, 'nilai_siswa.mapel_id'=>$rowmapel->id_mapel, 'nilai_siswa.jenis_na_id'=>'1', 'id_kategorinilai' => $rowkategorinilai->id_kategorinilai))->nilai;
                $nk = $nk + @$this->M_data->getNilaiSiswa(array('nilai_siswa.nisn'=>$rowsiswa->nisn, 'nilai_siswa.mapel_id'=>$rowmapel->id_mapel, 'nilai_siswa.jenis_na_id'=>'3', 'id_kategorinilai' => $rowkategorinilai->id_kategorinilai))->nilai;    
            }
            $nilaisiswa_p[$rowsiswa->nisn][$rowmapel->id_mapel] = $np;
            $nilaisiswa_k[$rowsiswa->nisn][$rowmapel->id_mapel] = $nk;

        }
    }
    $data['nilaisiswa_p'] = @$nilaisiswa_p;
    $data['nilaisiswa_k'] = @$nilaisiswa_k;

    $this->load->view('penilaian/nilaisiswa',$data);
}


public function tambah_nilai(){
    $nisn=$this->input->post('nisn');
    $katnilai=$this->input->post('katnilai');
    $jenis_na=$this->input->post('jenis_na');
    $mapel=$this->input->post('mapel');
    $nilai=$this->input->post('nilai');
    // if ($nilai>"100") {
    //     $nilai="100";
    // }else{

    // }
    $data=array();
    $temp= count($this->input->post('nisn'));
    for ($i=0; $i <$temp ; $i++) { 
        if ($nilai[$i] == "") { 
        }else{
            $data[]= array(
                'NISN'=>$nisn[$i],
                'kategori_nilai_id'=>$katnilai,
                'jenis_na_id'=>$jenis_na,
                'mapel_id'=>$mapel,
                'Nilai_siswa'=>$nilai[$i]
            );
        }
        
    }
    
    $this->M_data->tambahdatabatch($data,'nilai_siswa');
    $this->load->view('penilaian/nilaisiswa');     
    redirect('penilaian/nilaisiswa');

}

public function ubah_nilai(){

    $nisn=$this->input->post('nisn');
    $katnilai=$this->input->post('katnilai');
    $jenis_na=$this->input->post('jenis_na');
    $mapel=$this->input->post('mapel');
    $nilai=$this->input->post('nilai');

    $data=array();
    $temp= count($this->input->post('nisn'));
    for ($i=0; $i <$temp ; $i++) { 
        if ($nilai[$i] == "") { //(is_null($nilai)) {

        }else{
            $data[]= array(
                'NISN'=>$nisn[$i],
                'kategori_nilai_id'=>$katnilai,
                'jenis_na_id'=>$jenis_na,
                'mapel_id'=>$mapel,
                'Nilai_siswa'=>$nilai[$i]
            );
        }
        
    }
    
    $this->M_data->editnilai($data,$this->uri->segment(3));
    $this->load->view('penilaian/nilaisiswa');     
    redirect('penilaian/nilaisiswa');
}

public function form_edit_nilai(){
    $this->load->model('M_data');
    $data['f']=$this->M_data->selectNilai($this->uri->segment(3));
    $this->load->view('penilaian/edit/edit_nilai',$data);
}

public function hapus_nilai($id){
    $this->load->model('M_data');
    $where= array('id_nilai_siswa'=>$id);
    $table= 'nilai_siswa';
    $this->M_data->hapusdata($where,$table);
    redirect('penilaian/nilaisiswa');
}

public function deskripsinilai(){
 $this->load->model('M_data');
 $data['deskripsi_nilai'] = $this->M_data->getDeskripsinilai()->result();
 $data1['kelas_reguler_berjalan'] = $this->M_data->getKelas()->result();
 $dataAll= $data1+$data;
 $dataAll=array_merge($data,$data1);    
 $this->load->view('penilaian/deskripsinilai',$dataAll);
}

public function tambah_desknilai(){
    $this->load->model('M_data');
    $bts_a=$this->input->post('bts_a');
    $bts_b=$this->input->post('bts_b');
    $predikat=$this->input->post('predikat');
    $deskripsi=nl2br($this->input->post('deskripsi'));

    $data= array(
        'Nilai_atas'=>$bts_a,
        'Nilai_bawah'=>$bts_b,
        'predikat'=>$predikat,
        'deskripsi'=>$deskripsi
    );
    $this->M_data->tambahdata($data,'deskripsi_nilai');
    $this->load->view('penilaian/deskripsinilai');     
    redirect('penilaian/deskripsinilai');

}

public function ubah_desknilai(){

    $this->load->model('M_data');
    $id_desk=$this->input->post('id');
    $bts_a=$this->input->post('bts_a');
    $bts_b=$this->input->post('bts_b');
    $predikat=$this->input->post('predikat');
    $deskripsi=nl2br($this->input->post('deskripsi'));
    $data= array(
        'Nilai_atas'=>$bts_a,
        'Nilai_bawah'=>$bts_b,
        'predikat'=>$predikat,
        'deskripsi'=>$deskripsi
    );
    $this->M_data->editdesknilai($data,$this->uri->segment(3));
    $this->load->view('penilaian/deskripsinilai');     
    redirect('penilaian/deskripsinilai');
}

public function form_edit_deskripsi(){
    $this->load->model('M_data');
    $data['s']=$this->M_data->selectDesknilai($this->uri->segment(3));
    $this->load->view('penilaian/edit/edit_desknilai',$data);
}


public function hapus_desknilai($id){
    $this->load->model('M_data');
    $where= array('id_deskripsi'=>$id);
    $table= 'deskripsi_nilai';
    $this->M_data->hapusdata($where,$table);
    redirect('penilaian/deskripsinilai');
}
public function kategorinilai(){
    $this->load->model('M_data');
    $data['kategori_nilai'] = $this->M_data->getKategorinilai()->result();
    $this->load->view('penilaian/kategorinilai',$data);

    
}
public function tambah_katnilai(){
    $this->load->model('M_data');
    $katnilai=$this->input->post('katnilai');
    $bobot=$this->input->post('bobot');
    $data= array(
        'kategori_nilai'=>$katnilai,
        'bobot'=>$bobot
    );
    $this->M_data->tambahdata($data,'kategori_nilai');
    $this->load->view('penilaian/kategorinilai');     
    redirect('penilaian/kategorinilai');
}

public function ubah_katnilai(){

    $this->load->model('M_data');
    $id_kat=$this->input->post('id');
    $katnilai=$this->input->post('katnilai');
    $bobot=$this->input->post('bobot');

    $data= array(
        'kategori_nilai'=>$katnilai,
        'bobot'=>$bobot
    );

    $this->M_data->editkategorinilai($data,$this->uri->segment(3));
    $this->load->view('penilaian/kategorinilai');     
    redirect('penilaian/kategorinilai');
}

public function form_edit_kategori(){
    $this->load->model('M_data');
    $data['a']=$this->M_data->selectKatnilai($this->uri->segment(3));
    $this->load->view('penilaian/edit/edit_katnilai',$data);
}

public function hapus_katnilai($id){
    $this->load->model('M_data');
    $where= array('id_kategorinilai'=>$id);
    $table= 'kategori_nilai';
    $this->M_data->hapusdata($where,$table);
    redirect('penilaian/kategorinilai');

}

public function jenisNA(){
    $this->load->model('M_data');
    $data['jenis_nilai_akhir'] = $this->M_data->getJenisnilai()->result();
    $this->load->view('penilaian/jenisnilaiakhir',$data);
}

public function tambah_jenisnilai(){
    $this->load->model('M_data');
    $nama=$this->input->post('nama');
    $data= array(
        'jenis_na'=>$nama
    );
    $this->M_data->tambahdata($data,'jenis_nilai_akhir');
    $this->load->view('penilaian/jenisnilaiakhir');     
    redirect('penilaian/jenisNA');
}


public function ubah_JenisNilai(){

    $this->load->model('M_data');
    $id_kat=$this->input->post('id');
    $jenisNA=$this->input->post('jenisnilai');

    $data= array(
        'jenis_na'=>$jenisNA,
    );

    $this->M_data->editjenisnilai($data,$this->uri->segment(3));
    $this->load->view('penilaian/jenisnilaiakhir');     
    redirect('penilaian/jenisNA');
}

public function form_edit_jenisNilai(){
    $this->load->model('M_data');
    $data['a']=$this->M_data->selectJenisnilai($this->uri->segment(3));
    $this->load->view('penilaian/edit/edit_jenisNilai',$data);
}

public function hapus_JenisNilai($id){
    $this->load->model('M_data');
    $where= array('id_jenis_na'=>$id);
    $table= 'jenis_nilai_akhir';
    $this->M_data->hapusdata($where,$table);
    redirect('penilaian/JenisNA');

}


public function rapor(){
     // $id_kelas_reguler_berjalan = @$this->uri->segment(3);
     // $id_tahun_ajaran = $this->M_data->getsetting()->id_tahun_ajaran;
     // $data['kelas_reguler'] = $this->M_data->getkelasreguler(array('id_tahun_ajaran'=>$id_tahun_ajaran));
     //    //$data['kelas_reguler_berjalan'] = $this->M_data->getKelas()->result();
     // $data['kelas_reguler_berjalan'] = $this->M_data->getKelasRegulerBerjalan($id_tahun_ajaran)->result();
     // if ($id_kelas_reguler_berjalan == "") { $id_kelas_reguler_berjalan = @$data['kelas_reguler_berjalan'][0]->id_kelas_reguler_berjalan; }
     // $data['id_kelas_reguler_berjalan'] = $id_kelas_reguler_berjalan;
     // $siswaperkelas = $this->M_data->getSiswaKelas($id_kelas_reguler_berjalan, $id_tahun_ajaran);
     //    //echo $this->db->last_query();
     // $data['siswaperkelas'] = $siswaperkelas;
     // $this->load->view('penilaian/rapor');

    $this->load->model('M_data');

    $id_kelas_reguler_berjalan = @$this->uri->segment(3);
    $id_mapel = @$this->uri->segment(4);
    
    $id_tahun_ajaran = $this->M_data->getsetting()->id_tahun_ajaran;
    $data['kelas_reguler'] = $this->M_data->getkelasreguler(array('id_tahun_ajaran'=>$id_tahun_ajaran));
    //$data['kelas_reguler_berjalan'] = $this->M_data->getKelas()->result();
    $data['kelas_reguler_berjalan'] = $this->M_data->getKelasRegulerBerjalan($id_tahun_ajaran)->result();
    if ($id_kelas_reguler_berjalan == "") { $id_kelas_reguler_berjalan = @$data['kelas_reguler_berjalan'][0]->id_kelas_reguler_berjalan; }
    $data['id_kelas_reguler_berjalan'] = $id_kelas_reguler_berjalan;
    $data['kategori_nilai'] = $this->M_data->getKategorinilai()->result();
    $data['siswa'] = $this->M_data->getNamasiswa()->result();
    $data['jenis_nilai_akhir'] = $this->M_data->getJenisnilai()->result();
    //$data['mapel'] = $this->M_data->getMapel()->result();

    $mapel = $this->M_data->getMatapelajaran(array('kelas_reguler.id_kelas_reguler'=>'1', 'kelas_reguler.id_tahun_ajaran'=>$id_tahun_ajaran));
    if ($id_mapel == "") { $id_mapel = @$data['mapel'][0]->id_mapel; }
    $data['mapel'] = $mapel;
    $data['id_mapel'] = $id_mapel;
    $kategorinilai = $this->M_data->getKatNilai();
    $data['kategorinilai'] = $kategorinilai;
    $siswaperkelas = $this->M_data->getSiswaKelas($id_kelas_reguler_berjalan, $id_tahun_ajaran);
    //echo $this->db->last_query();
    $data['siswaperkelas'] = $siswaperkelas;
    //$data['nilai_siswa'] = $this->M_data->getNilai()->result();
    // $data['nilai_siswa'] = $this->M_data->getNilaiKelasMapel($id_kelas_reguler_berjalan, $id_mapel);
    
    // foreach ($siswaperkelas as $rowsiswa) {
    //     foreach ($mapel as $rowmapel) {
    //         $np = 0;
    //         $nk = 0;
    //         foreach ($kategorinilai as $rowkategorinilai) {
    //             $np = $np + @$this->M_data->getNilaiSiswa(array('nilai_siswa.nisn'=>$rowsiswa->nisn, 'nilai_siswa.mapel_id'=>$rowmapel->id_mapel, 'nilai_siswa.jenis_na_id'=>'1', 'id_kategorinilai' => $rowkategorinilai->id_kategorinilai))->nilai;
    //             $nk = $nk + @$this->M_data->getNilaiSiswa(array('nilai_siswa.nisn'=>$rowsiswa->nisn, 'nilai_siswa.mapel_id'=>$rowmapel->id_mapel, 'nilai_siswa.jenis_na_id'=>'3', 'id_kategorinilai' => $rowkategorinilai->id_kategorinilai))->nilai;    
    //         }
    //         $nilaisiswa_p[$rowsiswa->nisn][$rowmapel->id_mapel] = $np;
    //         $nilaisiswa_k[$rowsiswa->nisn][$rowmapel->id_mapel] = $nk;

    //     }
    // }
    // $data['nilaisiswa_p'] = @$nilaisiswa_p;
    // $data['nilaisiswa_k'] = @$nilaisiswa_k;

    $this->load->view('penilaian/rapor',$data);
}

public function cetak_rapor() {
    $this->load->model('M_data');
    $nisn = @$this->uri->segment(3);
    $id_tahun_ajaran = $this->M_data->getsetting()->id_tahun_ajaran;
    $mapel = $this->M_data->getMatapelajaran(array('kelas_reguler.id_kelas_reguler'=>'1', 'kelas_reguler.id_tahun_ajaran'=>$id_tahun_ajaran));
    $data['mapel'] = $mapel;
    $kategorinilai = $this->M_data->getKatNilai();
    $data['kategorinilai'] = $kategorinilai;
    foreach ($mapel as $rowmapel) {
        $np = 0;
        $nk = 0;
        foreach ($kategorinilai as $rowkategorinilai) {
            $np = $np + @$this->M_data->getNilaiSiswa(array('nilai_siswa.nisn'=>$nisn, 'nilai_siswa.mapel_id'=>$rowmapel->id_mapel, 'nilai_siswa.jenis_na_id'=>'1', 'id_kategorinilai' => $rowkategorinilai->id_kategorinilai))->nilai;
            $nk = $nk + @$this->M_data->getNilaiSiswa(array('nilai_siswa.nisn'=>$nisn, 'nilai_siswa.mapel_id'=>$rowmapel->id_mapel, 'nilai_siswa.jenis_na_id'=>'3', 'id_kategorinilai' => $rowkategorinilai->id_kategorinilai))->nilai;    
        }
        $nilaisiswa_p[$rowmapel->id_mapel] = $np;
        $nilaisiswa_k[$rowmapel->id_mapel] = $nk;
    }
    $data['nilaisiswa_p'] = @$nilaisiswa_p;
     $data['nilaisiswa_k'] = @$nilaisiswa_k;
     //print_r($mapel);
    $this->load->view('KBM/view_rapor_excel', $data);
}

}
