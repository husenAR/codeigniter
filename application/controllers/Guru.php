<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . '/third_party/PHPExcel/IOFactory.php';
class Guru extends CI_Controller {

	var $setting = array();

	function __construct(){
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->model('presensi_pegawai_model');
		$this->load->model('penilaian/presensi_siswa_model');
		$this->load->model('tahunajaran_model');
		$this->load->model('tanggal_libur_model');
		$this->load->model('tanggal_libur_nasional_model');
		$this->load->model('jabatan_model');
		$this->load->model('ppdb/model_pendaftar_ppdb');
		$this->load->model('ppdb/model_form_ppdb');
		$this->load->model('ppdb/model_ketentuan_ppdb');
		$this->load->model('ppdb/model_form_ujian');
		$this->load->model('ppdb/model_pengumuman_ppdb');
		$this->load->model('ppdb/model_tahunajaran');
		
		$this->load->model('ppdb/Model_siswa');
		$this->load->model('setting_model');
		$this->load->model('penjadwalan/mod_jammengajar');


		$this->load->helper('url');
		if ($this->session->userdata('isLogin') != TRUE) {
			$this->session->set_flashdata("warning",'<script> swal( "Maaf Anda Belum Login!" ,  "Silahkan Login Terlebih Dahulu" ,  "error" )</script>');
			redirect('login');
			exit;
		}
		if ($this->session->userdata('jabatan') != 'Guru') {
			$this->session->set_flashdata("warning",'<script> swal( "Anda Tidak Berhak!" ,  "Silahkan Login dengan Akun Anda" ,  "error" )</script>');
			//$this->load->view('login');
			redirect('login');
			exit;
		}
		$this->load->helper('setting_helper');
		$this->setting = get_setting();
	}
	

public function index()
	{

		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 
		$data['username'] = $this->session->username;
			$datpeg = $this->pegawai_model->Getdatpeg("Status_pensiun = '' OR Status_pensiun IS NULL");
		$data['datpeg'] = $datpeg;
		//$thn = date('Y');
		$bln = date('m');
		$thn = date('Y');
		if ($this->input->post('bln') != "") { $bln = $this->input->post('bln'); }
		if ($this->input->post('thn') != "") { $thn = $this->input->post('thn'); }
		$tgl = date('Y-m-d');
		if ($this->input->post('tgl') != "") { $tgl = $this->input->post('tgl'); }
		
		$datsemester = $this->tahunajaran_model->Getsemester();
		//print_r($datsemester);
		//print_r($datpeg->result());

		$tablepeg = $datpeg->result();
		foreach ($tablepeg as $rowpeg) {
			$datpresensi = $this->presensi_pegawai_model->getpresensi($tgl, $rowpeg->NIP);
			//echo $this->db->last_query()."<br/>";
			if ($datpresensi) {
				//echo $rowpeg->NIP."===<br/>";
				$data['presensipeg'][$rowpeg->NIP] = $datpresensi->Rangkuman_presensi;
				$data['waktupeg'][$rowpeg->NIP] = $datpresensi->Waktu_presensi;
				$data['keteranganpeg'][$rowpeg->NIP] = $datpresensi->keterangan_presensi;
			}

			//for($i=1;$i<=date('t');$i++) {
			for($i=1;$i<=cal_days_in_month(CAL_GREGORIAN, $bln, $thn);$i++) {
				//echo $rowpeg->NIP."<br/>";
				//$datpresensi = $this->presensi_pegawai_model->getpresensi(date('Y-m-').substr($i+100, 1, 2), $rowpeg->NIP);
				$datpresensi = $this->presensi_pegawai_model->getpresensi($thn.'-'.$bln.'-'.substr($i+100, 1, 2), $rowpeg->NIP);
				//echo $this->db->last_query()."<br/>";
				if ($datpresensi) {
					//echo $rowpeg->NIP."===<br/>";
					$data['datpresensi'][$rowpeg->NIP][$i] = $datpresensi->Rangkuman_presensi;
					$data['datwaktu'][$rowpeg->NIP][$i] = $datpresensi->Waktu_presensi;
				}
			}
			for ($i=1;$i<=12;$i++) {
				
				$data['datpresensibulan'][$rowpeg->NIP][$i]['H'] = @$this->presensi_pegawai_model->getpresensibulan($i, $thn, $rowpeg->NIP, 'H')->jml;
				$data['datpresensibulan'][$rowpeg->NIP][$i]['S'] = @$this->presensi_pegawai_model->getpresensibulan($i, $thn, $rowpeg->NIP, 'S')->jml;
				$data['datpresensibulan'][$rowpeg->NIP][$i]['I'] = @$this->presensi_pegawai_model->getpresensibulan($i, $thn, $rowpeg->NIP, 'I')->jml;
				$data['datpresensibulan'][$rowpeg->NIP][$i]['A'] = @$this->presensi_pegawai_model->getpresensibulan($i, $thn, $rowpeg->NIP, 'A')->jml;
			}

			for ($i=1;$i<=2;$i++) {
				
				$data['datpresensisemester'][$rowpeg->NIP][$i]['H'] = @$this->presensi_pegawai_model->getpresensisemester($datsemester[$i-1]->tanggal_mulai, $datsemester[$i-1]->tanggal_selesai, $rowpeg->NIP, 'H')->jml;
				$data['datpresensisemester'][$rowpeg->NIP][$i]['S'] = @$this->presensi_pegawai_model->getpresensisemester($datsemester[$i-1]->tanggal_mulai, $datsemester[$i-1]->tanggal_selesai, $rowpeg->NIP, 'S')->jml;
				$data['datpresensisemester'][$rowpeg->NIP][$i]['I'] = @$this->presensi_pegawai_model->getpresensisemester($datsemester[$i-1]->tanggal_mulai, $datsemester[$i-1]->tanggal_selesai, $rowpeg->NIP, 'I')->jml;
				$data['datpresensisemester'][$rowpeg->NIP][$i]['A'] = @$this->presensi_pegawai_model->getpresensisemester($datsemester[$i-1]->tanggal_mulai, $datsemester[$i-1]->tanggal_selesai, $rowpeg->NIP, 'A')->jml;
			}

		}

		for ($i=1;$i<=12;$i++) {
			
			$data['datpresensitotalbulan'][$i]['H'] = @$this->presensi_pegawai_model->getpresensitotalbulan($i, $thn, 'H')->jml;
			$data['datpresensitotalbulan'][$i]['S'] = @$this->presensi_pegawai_model->getpresensitotalbulan($i, $thn, 'S')->jml;
			$data['datpresensitotalbulan'][$i]['I'] = @$this->presensi_pegawai_model->getpresensitotalbulan($i, $thn, 'I')->jml;
			$data['datpresensitotalbulan'][$i]['A'] = @$this->presensi_pegawai_model->getpresensitotalbulan($i, $thn, 'A')->jml;

			$data['datpresensitotal'][$i] = @$this->presensi_pegawai_model->getpresensitotal($i, $thn)->jml;
			
		}

		for($i=1;$i<=cal_days_in_month(CAL_GREGORIAN, $bln, $thn);$i++) {
			$datlibur = $this->tanggal_libur_model->getlibur($thn.'-'.substr($bln+100, 1, 2).'-'.substr($i+100, 1, 2));
			if ($datlibur) {
				$data['datlibur'][$i] = $datlibur->nama_libur;
			} else {
				$data['datlibur'][$i] = "";
			}

			$datliburnasional = $this->tanggal_libur_nasional_model->getlibur($i, $bln);
			if ($datliburnasional) {
				$data['datlibur'][$i] = $data['datlibur'][$i]." ".$datliburnasional->nama_libur_nasional;
			} 
			//echo $data['datlibur'][$i]."<br/>";
			//echo $this->db->last_query()."<br/>";
		}




		$this->load->model('pegawai_model');      
		$usersNo =  $this->pegawai_model->gettotaluser();   
		$data['totaluser'] = $usersNo->no - $usersNo->ps;
		$data['totaluserlk'] = $usersNo->lk - $usersNo->ps;
		$data['totaluserpr'] = $usersNo->pr - $usersNo->ps;
		$data['totaluserps'] = $usersNo->ps ;
		$data['totaluserpg'] = $usersNo->pg - $usersNo->kp;
		$data['totaluserpk'] = $usersNo->pk - $usersNo->kg;



		$usersJabatan= $this->pegawai_model->gettotaljabatan();
		$data['totaljabatan'] = $usersJabatan->no - $usersNo->ps ;

		$userstanpaJabatan= $this->pegawai_model->gettotaltanpajabatan();
		$data['totaltanpajabatan'] = $userstanpaJabatan->no - $usersNo->ps;

		

		$data['grafikpresensipegawai'] = TRUE;
		$data['persentase'] = TRUE;
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username;
		$data['datpeg'] = $this->pegawai_model->Getdatpeg();
		$this->template->load('guru/dashboard','guru/home', $data);
	}
	
	
	
	

	public function gantipassword()
	{
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$this->template->load('guru/dashboard','guru/gantipassword', $data);
	}

	public function updatepassword() {
		$username = $this->input->post('username',true);
		$password = $this->input->post('password',true);
		$passwordbaru = $this->input->post('passwordbaru',true);
		$confirmpassword = $this->input->post('confirmpassword',true);
		if ($passwordbaru == $confirmpassword) {
			$cek =$this->login_model->proseslogin($username,$password);
			$hasil = count($cek); 
			if ($hasil > 0){
				// $this->login_model->cekPegawai($cek);
				
				$this->load->model('akun_model');
				$this->akun_model->update(array("password"=>$passwordbaru), $cek->id_akun);
				$this->session->set_flashdata('warning','<script>swal("Berhasil!", "Password Berhasil Di Ganti", "success")</script>');
				redirect('guru/gantipassword');
			}else{
				// $this->session->set_flashdata("warning","<b>Kombinasi Username dan Password Anda tidak ditemukan, Pastikan Anda memasukkan Username dan Password yang benar</b>");

				$this->session->set_flashdata("warning",'<script> swal( "Maaf" ,  "Password Lama Salah !" ,  "error" )</script>');



				redirect('guru/gantipassword');
			}
		} else {
			$this->session->set_flashdata("warning",'<script> swal( "Maaf" ,  "Password Baru Salah !" ,  "error" )</script>');

			redirect('guru/gantipassword');
		}
		
	}

	

	public function profile()
	{
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username;  
		$data['datpeg'] = $this->pegawai_model->rowPegawai($this->session->userdata('NIP'));
		$this->template->load('guru/dashboard','pegawai/profile', $data);
	}

	public function editprofil(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username;
		$data['rowpeg'] = $this->pegawai_model->rowPegawai($this->session->userdata('NIP'));
		$this->template->load('guru/dashboard','guru/editprofil', $data);
		if($this->input->post('submit')){
			$this->load->model('pegawai_model');
			$this->pegawai_model->updatedatpeg();	
			$this->session->set_flashdata('warning','<script>swal("Berhasil!", "Data Berhasil Disimpan", "success")</script>');			
			redirect('guru/editprofil');
		} 
	}

public function datapegawai()
	{
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username;// 'Kepala Sekolah';
		$data['datpeg'] = $this->pegawai_model->Getdatpeg("Status = 'Karyawan' AND (Status_pensiun = '' OR Status_pensiun IS NULL)");
		$data['datguru'] = $this->pegawai_model->Getdatpeg("Status = 'Guru' AND (Status_pensiun = '' OR Status_pensiun IS NULL)");
		$data['datpensiun'] = $this->pegawai_model->Getdatpeg("Status_pensiun = 'Pensiun' OR Status_pensiun = 'Keluar' ");
		$this->template->load('guru/dashboard','guru/pegawaibaru', $data);
	}
	
	
	public function presensipegawai()
	{
		

		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 
		$datpeg = $this->pegawai_model->Getdatpeg("Status_pensiun = '' OR Status_pensiun IS NULL");
		$data['datpeg'] = $datpeg;
		//$thn = date('Y');
		$bln = date('m');
		$thn = date('Y');
		if ($this->input->post('bln') != "") { $bln = $this->input->post('bln'); }
		if ($this->input->post('thn') != "") { $thn = $this->input->post('thn'); }
		$tgl = date('Y-m-d');
		if ($this->input->post('tgl') != "") { $tgl = $this->input->post('tgl'); }
		
		$datsemester = $this->tahunajaran_model->Getsemester();
		//print_r($datsemester);
		//print_r($datpeg->result());

		$tablepeg = $datpeg->result();
		foreach ($tablepeg as $rowpeg) {
			$datpresensi = $this->presensi_pegawai_model->getpresensi($tgl, $rowpeg->NIP);
			//echo $this->db->last_query()."<br/>";
			if ($datpresensi) {
				//echo $rowpeg->NIP."===<br/>";
				$data['presensipeg'][$rowpeg->NIP] = $datpresensi->Rangkuman_presensi;
				$data['waktupeg'][$rowpeg->NIP] = $datpresensi->Waktu_presensi;
				$data['keteranganpeg'][$rowpeg->NIP] = $datpresensi->keterangan_presensi;
			}

			//for($i=1;$i<=date('t');$i++) {
			for($i=1;$i<=cal_days_in_month(CAL_GREGORIAN, $bln, $thn);$i++) {
				//echo $rowpeg->NIP."<br/>";
				//$datpresensi = $this->presensi_pegawai_model->getpresensi(date('Y-m-').substr($i+100, 1, 2), $rowpeg->NIP);
				$datpresensi = $this->presensi_pegawai_model->getpresensi($thn.'-'.$bln.'-'.substr($i+100, 1, 2), $rowpeg->NIP);
				//echo $this->db->last_query()."<br/>";
				if ($datpresensi) {
					//echo $rowpeg->NIP."===<br/>";
					$data['datpresensi'][$rowpeg->NIP][$i] = $datpresensi->Rangkuman_presensi;
					$data['datwaktu'][$rowpeg->NIP][$i] = $datpresensi->Waktu_presensi;
				}
			}
			for ($i=1;$i<=12;$i++) {
				
				$data['datpresensibulan'][$rowpeg->NIP][$i]['H'] = @$this->presensi_pegawai_model->getpresensibulan($i, $thn, $rowpeg->NIP, 'H')->jml;
				$data['datpresensibulan'][$rowpeg->NIP][$i]['S'] = @$this->presensi_pegawai_model->getpresensibulan($i, $thn, $rowpeg->NIP, 'S')->jml;
				$data['datpresensibulan'][$rowpeg->NIP][$i]['I'] = @$this->presensi_pegawai_model->getpresensibulan($i, $thn, $rowpeg->NIP, 'I')->jml;
				$data['datpresensibulan'][$rowpeg->NIP][$i]['A'] = @$this->presensi_pegawai_model->getpresensibulan($i, $thn, $rowpeg->NIP, 'A')->jml;
			}

			for ($i=1;$i<=2;$i++) {
				
				$data['datpresensisemester'][$rowpeg->NIP][$i]['H'] = @$this->presensi_pegawai_model->getpresensisemester($datsemester[$i-1]->tanggal_mulai, $datsemester[$i-1]->tanggal_selesai, $rowpeg->NIP, 'H')->jml;
				$data['datpresensisemester'][$rowpeg->NIP][$i]['S'] = @$this->presensi_pegawai_model->getpresensisemester($datsemester[$i-1]->tanggal_mulai, $datsemester[$i-1]->tanggal_selesai, $rowpeg->NIP, 'S')->jml;
				$data['datpresensisemester'][$rowpeg->NIP][$i]['I'] = @$this->presensi_pegawai_model->getpresensisemester($datsemester[$i-1]->tanggal_mulai, $datsemester[$i-1]->tanggal_selesai, $rowpeg->NIP, 'I')->jml;
				$data['datpresensisemester'][$rowpeg->NIP][$i]['A'] = @$this->presensi_pegawai_model->getpresensisemester($datsemester[$i-1]->tanggal_mulai, $datsemester[$i-1]->tanggal_selesai, $rowpeg->NIP, 'A')->jml;
			}

		}

		for ($i=1;$i<=12;$i++) {
			
			$data['datpresensitotalbulan'][$i]['H'] = @$this->presensi_pegawai_model->getpresensitotalbulan($i, $thn, 'H')->jml;
			$data['datpresensitotalbulan'][$i]['S'] = @$this->presensi_pegawai_model->getpresensitotalbulan($i, $thn, 'S')->jml;
			$data['datpresensitotalbulan'][$i]['I'] = @$this->presensi_pegawai_model->getpresensitotalbulan($i, $thn, 'I')->jml;
			$data['datpresensitotalbulan'][$i]['A'] = @$this->presensi_pegawai_model->getpresensitotalbulan($i, $thn, 'A')->jml;

			$data['datpresensitotal'][$i] = @$this->presensi_pegawai_model->getpresensitotal($i, $thn)->jml;
			
		}

		for($i=1;$i<=cal_days_in_month(CAL_GREGORIAN, $bln, $thn);$i++) {
			$datlibur = $this->tanggal_libur_model->getlibur($thn.'-'.substr($bln+100, 1, 2).'-'.substr($i+100, 1, 2));
			if ($datlibur) {
				$data['datlibur'][$i] = $datlibur->nama_libur;
			} else {
				$data['datlibur'][$i] = "";
			}

			$datliburnasional = $this->tanggal_libur_nasional_model->getlibur($i, $bln);
			if ($datliburnasional) {
				$data['datlibur'][$i] = $data['datlibur'][$i]." ".$datliburnasional->nama_libur_nasional;
			} 
			//echo $data['datlibur'][$i]."<br/>";
			//echo $this->db->last_query()."<br/>";
		}

		$data['grafikpresensipegawai'] = TRUE;
		
		$this->template->load('guru/dashboard','guru/presensipegawai', $data);
	}


public function rekapkehadiran()
	{
		

		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 

		$tahun_ajaran = $this->tahunajaran_model->Gettahunajaran(array())->result();
		$data['tahun_ajaran'] = $tahun_ajaran;
		
		$row_aktif = $this->tahunajaran_model->gettahunajaranaktif();
	
		$id_tahun_ajaran = $this->input->post('id_tahun_ajaran');

		if ($id_tahun_ajaran == "") { $id_tahun_ajaran = $row_aktif->id_tahun_ajaran; }

		$data['id_tahun_ajaran'] = $id_tahun_ajaran;

		$row_tahun_ajaran = $this->tahunajaran_model->Gettahunajaran(array('tahunajaran.id_tahun_ajaran'=>$id_tahun_ajaran))->row();
		$data['nama_tahun_ajaran'] = "Semester ".$row_tahun_ajaran->semester." ".$row_tahun_ajaran->tahun_ajaran;
		

		$nip = $this->session->userdata('NIP');
		$datpeg = $this->pegawai_model->Getdatpeg("Status_pensiun = '' OR Status_pensiun IS NULL");
		$data['datpeg'] = $datpeg;
		//$thn = date('Y');
		$bln = date('m');
		$thn = date('Y');
		if ($this->input->post('bln') != "") { $bln = $this->input->post('bln'); }
		if ($this->input->post('thn') != "") { $thn = $this->input->post('thn'); }
		$tgl = date('Y-m-d');
		if ($this->input->post('tgl') != "") { $tgl = $this->input->post('tgl'); }
		
		
		$data['datpresensitotaltanggal']['H'] = @$this->presensi_pegawai_model->getpresensitanggal($nip, $row_tahun_ajaran->tanggal_mulai, $row_tahun_ajaran->tanggal_selesai, 'H')->jml;
		$data['datpresensitotaltanggal']['S'] = @$this->presensi_pegawai_model->getpresensitanggal($nip, $row_tahun_ajaran->tanggal_mulai, $row_tahun_ajaran->tanggal_selesai, 'S')->jml;
		$data['datpresensitotaltanggal']['I'] = @$this->presensi_pegawai_model->getpresensitanggal($nip, $row_tahun_ajaran->tanggal_mulai, $row_tahun_ajaran->tanggal_selesai, 'I')->jml;
		$data['datpresensitotaltanggal']['A'] = @$this->presensi_pegawai_model->getpresensitanggal($nip, $row_tahun_ajaran->tanggal_mulai, $row_tahun_ajaran->tanggal_selesai, 'A')->jml;

		$data['datpresensitotal'] = @$this->presensi_pegawai_model->getpresensitotaltanggal($nip, $row_tahun_ajaran->tanggal_mulai, $row_tahun_ajaran->tanggal_selesai)->jml;

		// for ($i=1;$i<=12;$i++) {
			
		// 	$data['datpresensitotalbulan'][$i]['H'] = @$this->presensi_pegawai_model->getpresensitotalbulan($i, $thn, 'H')->jml;
		// 	$data['datpresensitotalbulan'][$i]['S'] = @$this->presensi_pegawai_model->getpresensitotalbulan($i, $thn, 'S')->jml;
		// 	$data['datpresensitotalbulan'][$i]['I'] = @$this->presensi_pegawai_model->getpresensitotalbulan($i, $thn, 'I')->jml;
		// 	$data['datpresensitotalbulan'][$i]['A'] = @$this->presensi_pegawai_model->getpresensitotalbulan($i, $thn, 'A')->jml;
		// }



		$data['grafikpresensipegawai'] = TRUE;
		//$data['datpresensi'] = $this->presensi_pegawai_model->getresumepresensitahun($nip, $thn);
		$data['datpresensi'] = $this->presensi_pegawai_model->getresumepresensitahunajaran($nip, $row_tahun_ajaran->tanggal_mulai, $row_tahun_ajaran->tanggal_selesai);
		$this->template->load('guru/dashboard','guru/rekapkehadiran', $data);
	}
	

// +++++++++++++++++++++++++++++++PENJADWALAN MIA+++++++++++++++++++++++++++++++++++++++
	public function mapel($id_kelas_reguler = "", $jenjang = "", $id_namamapel = "")
	{
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 
		$data['jabatan'] = $this->session->jabatan;
		if ($id_kelas_reguler == "" ) {
			$this->load->model('penjadwalan/mod_namamapel');
			$data['tabel_namamapel'] = $this->mod_namamapel->get();
			$this->load->model('penjadwalan/mod_mapel');
			$data['tabel_mapel'] = $this->mod_mapel->getgroupbyjenjang2();
			$this->load->model('penjadwalan/mod_kelasreguler');
			$data['tabel_kelasreguler'] = $this->mod_kelasreguler->getgroupby();
			$data['edit_mapel'] = null;
			$this->template->load('guru/dashboard','guru/kurikulum/penjadwalan/mapel', $data);	
		} else {
			$this->load->model('penjadwalan/mod_namamapel');
			$data['tabel_namamapel'] = $this->mod_namamapel->get();
			$this->load->model('penjadwalan/mod_mapel');
			$data['tabel_mapel'] = $this->mod_mapel->getgroupbyjenjang2();
			$this->load->model('penjadwalan/mod_kelasreguler');
			$data['tabel_kelasreguler'] = $this->mod_kelasreguler->getgroupby();
			
			//$data['edit_mapel'] = $this->mod_mapel->selectbynamajenjang(str_replace("_", " ", $nama_mapel), $jenjang);
			$data['edit_mapel'] = $this->mod_mapel->selectbyidnamajenjang(str_replace("_", " ", $id_namamapel), $jenjang);

			$this->template->load('guru/dashboard','guru/kurikulum/penjadwalan/mapel', $data);
			
		}
		
	}

	

public function simpanmapel() {
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 
		$this->load->model('penjadwalan/mod_mapel');
		$this->load->model('penjadwalan/mod_kelasreguler');

		$tabel_kelasreguler = $this->mod_kelasreguler->getbyjenjang($this->input->post('grade'));

		//print_r($tabel_kelasreguler);

		foreach ($tabel_kelasreguler as $row_kelasreguler) {

			$data = array(
				'id_namamapel' => $this->input->post('id_namamapel'),
				'kkm' => $this->input->post('kkm'),
				'jam_belajar' => $this->input->post('jam_belajar'),
				'id_kelas_reguler' => $row_kelasreguler->id_kelas_reguler
			);

			//print_r($data);
			//echo "1";

			if ($this->input->post('id_namamapel_old') == "") {
				//echo "2";
				if ($this->mod_mapel->cekdatamapel($this->input->post('id_namamapel'), $row_kelasreguler->id_kelas_reguler) == 0) {
					//echo "3";
					$this->mod_mapel->insert($data);	
				} 

			} else {
				//echo "4";
				$this->mod_mapel->updatebyidnamaidkelasreguler($data, $row_kelasreguler->id_kelas_reguler, $this->input->post('id_namamapel_old'));
			}	
		}

		$this->session->set_flashdata("warning",'<script> swal( "Berhasil" ,  "Data tersimpan !" ,  "success" )</script>');
		redirect('guru/mapel');
	}

	public function hapusmapel() {
		$this->load->model('penjadwalan/mod_mapel');
		$this->mod_mapel->delete($this->uri->segment(3));
		redirect('guru/mapel');
	}

	public function hapusmapelbyidjenjang() {
		$this->load->model('penjadwalan/mod_kelasreguler');
		$id_kelas_reguler = $this->uri->segment(3);
		$id_namamapel = $this->uri->segment(5);
		$row_kelasreguler = $this->mod_kelasreguler->select($id_kelas_reguler);

		$this->load->model('penjadwalan/mod_mapel');
		$tabel_kelasreguler = $this->mod_kelasreguler->getbyjenjang($row_kelasreguler->jenjang);

		//print_r($tabel_kelasreguler);

		foreach ($tabel_kelasreguler as $row_kelasreguler) {
			$this->mod_mapel->deletebyidkelasregulermapel($row_kelasreguler->id_kelas_reguler, $id_namamapel);
		}
		redirect('guru/mapel');
	}






	// public function mapel($id_mapel = "")
	// {
	// 	if ($id_mapel == "" ) {
	// 		$this->load->model('penjadwalan/mod_mapel');
	// 		$data['tabel_mapel'] = $this->mod_mapel->getgroupbyjenjang();
	// 		$this->load->model('penjadwalan/mod_kelasreguler');
	// 		$data['tabel_kelasreguler'] = $this->mod_kelasreguler->getgroupby();
	// 		$data['edit_mapel'] = null;
	// 		$this->template->load('guru/dashboard_kurikulum','guru/mapel', $data);	
	// 	} else {
	// 		$this->load->model('penjadwalan/mod_mapel');
	// 		$data['tabel_mapel'] = $this->mod_mapel->getgroupbyjenjang();
	// 		$this->load->model('penjadwalan/mod_kelasreguler');
	// 		$data['tabel_kelasreguler'] = $this->mod_kelasreguler->getgroupby();
	// 		$data['edit_mapel'] = $this->mod_mapel->select($id_mapel);
	// 		$this->template->load('penjadwalan/kurikulum/dashboard_kurikulum','penjadwalan/kurikulum/mapel', $data);
	// 	}

	// }




	


	public function harirentang()
	{
		$this->load->model('penjadwalan/mod_harirentang');
		$data['tabel_hari_rentang'] = $this->mod_harirentang->get();

		$result = $this->mod_harirentang->get(array("hari"=>"Senin"));
		for ($i=1; $i<=8; $i++) {
			if (@$result[$i-1]) { $hari_rentang['senin'][$i] = $result[$i-1]; }
		}

		$result = $this->mod_harirentang->get(array("hari"=>"Selasa"));
		for ($i=1; $i<=8; $i++) {
			if (@$result[$i-1]) { $hari_rentang['selasa'][$i] = $result[$i-1]; }
		}

		$result = $this->mod_harirentang->get(array("hari"=>"Rabu"));
		for ($i=1; $i<=8; $i++) {
			if (@$result[$i-1]) { $hari_rentang['rabu'][$i] = $result[$i-1]; }
		}

		$result = $this->mod_harirentang->get(array("hari"=>"Kamis"));
		for ($i=1; $i<=8; $i++) {
			if (@$result[$i-1]) { $hari_rentang['kamis'][$i] = $result[$i-1]; }
		}

		$result = $this->mod_harirentang->get(array("hari"=>"Jumat"));
		for ($i=1; $i<=8; $i++) {
			if (@$result[$i-1]) { $hari_rentang['jumat'][$i] = $result[$i-1]; }
		}

		$result = $this->mod_harirentang->get(array("hari"=>"Sabtu"));
		for ($i=1; $i<=8; $i++) {
			if (@$result[$i-1]) { $hari_rentang['sabtu'][$i] = $result[$i-1]; }
		}

		$result = $this->mod_harirentang->get(array("hari"=>"Minggu"));
		for ($i=1; $i<=8; $i++) {
			if (@$result[$i-1]) { $hari_rentang['minggu'][$i] = $result[$i-1]; }
		}



		$data['hari_rentang'] = @$hari_rentang;
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;

		$this->template->load('guru/dashboard','guru/kurikulum/penjadwalan/harirentang', $data);
	}

	public function simpanharirentang() {
		$this->load->model('penjadwalan/mod_harirentang');

		for ($i=1; $i<=8; $i++) {
			$data = array(
				'jam_ke' => $this->input->post('jam_ke_senin_'.$i),
				'jam_mulai' => $this->input->post('jam_mulai_senin_'.$i),
				'jam_selesai' => $this->input->post('jam_selesai_senin_'.$i),
				'hari' => 'senin'
			);
			if ($this->input->post('jam_ke_senin_'.$i) != "") {
				$tabel_hari_rentang = $this->mod_harirentang->get(array("hari"=>"Senin", "jam_ke"=>$this->input->post('jam_ke_senin_'.$i)));
				//print_r($tabel_hari_rentang);
				if ($tabel_hari_rentang) {
					$this->mod_harirentang->update($data, $tabel_hari_rentang[0]->id_rentang_jam);
				} else {
					$this->mod_harirentang->insert($data);
				}
			}
		}

		for ($i=1; $i<=8; $i++) {
			$data = array(
				'jam_ke' => $this->input->post('jam_ke_selasa_'.$i),
				'jam_mulai' => $this->input->post('jam_mulai_selasa_'.$i),
				'jam_selesai' => $this->input->post('jam_selesai_selasa_'.$i),
				'hari' => 'selasa'
			);
			if ($this->input->post('jam_ke_selasa_'.$i) != "") {
				$tabel_hari_rentang = $this->mod_harirentang->get(array("hari"=>"Selasa", "jam_ke"=>$this->input->post('jam_ke_selasa_'.$i)));
				//print_r($tabel_hari_rentang);
				if ($tabel_hari_rentang) {
					$this->mod_harirentang->update($data, $tabel_hari_rentang[0]->id_rentang_jam);
				} else {
					$this->mod_harirentang->insert($data);
				}
			}
		}

		for ($i=1; $i<=8; $i++) {
			$data = array(
				'jam_ke' => $this->input->post('jam_ke_rabu_'.$i),
				'jam_mulai' => $this->input->post('jam_mulai_rabu_'.$i),
				'jam_selesai' => $this->input->post('jam_selesai_rabu_'.$i),
				'hari' => 'rabu'
			);
			if ($this->input->post('jam_ke_rabu_'.$i) != "") {
				$tabel_hari_rentang = $this->mod_harirentang->get(array("hari"=>"Rabu", "jam_ke"=>$this->input->post('jam_ke_rabu_'.$i)));
				//print_r($tabel_hari_rentang);
				if ($tabel_hari_rentang) {
					$this->mod_harirentang->update($data, $tabel_hari_rentang[0]->id_rentang_jam);
				} else {
					$this->mod_harirentang->insert($data);
				}
			}
		}

		for ($i=1; $i<=8; $i++) {
			$data = array(
				'jam_ke' => $this->input->post('jam_ke_kamis_'.$i),
				'jam_mulai' => $this->input->post('jam_mulai_kamis_'.$i),
				'jam_selesai' => $this->input->post('jam_selesai_kamis_'.$i),
				'hari' => 'kamis'
			);
			if ($this->input->post('jam_ke_kamis_'.$i) != "") {
				$tabel_hari_rentang = $this->mod_harirentang->get(array("hari"=>"Kamis", "jam_ke"=>$this->input->post('jam_ke_kamis_'.$i)));
				//print_r($tabel_hari_rentang);
				if ($tabel_hari_rentang) {
					$this->mod_harirentang->update($data, $tabel_hari_rentang[0]->id_rentang_jam);
				} else {
					$this->mod_harirentang->insert($data);
				}
			}
		}

		for ($i=1; $i<=8; $i++) {
			$data = array(
				'jam_ke' => $this->input->post('jam_ke_jumat_'.$i),
				'jam_mulai' => $this->input->post('jam_mulai_jumat_'.$i),
				'jam_selesai' => $this->input->post('jam_selesai_jumat_'.$i),
				'hari' => 'jumat'
			);
			if ($this->input->post('jam_ke_jumat_'.$i) != "") {
				$tabel_hari_rentang = $this->mod_harirentang->get(array("hari"=>"Jumat", "jam_ke"=>$this->input->post('jam_ke_jumat_'.$i)));
				//print_r($tabel_hari_rentang);
				if ($tabel_hari_rentang) {
					$this->mod_harirentang->update($data, $tabel_hari_rentang[0]->id_rentang_jam);
				} else {
					$this->mod_harirentang->insert($data);
				}
			}
		}

		for ($i=1; $i<=8; $i++) {
			$data = array(
				'jam_ke' => $this->input->post('jam_ke_sabtu_'.$i),
				'jam_mulai' => $this->input->post('jam_mulai_sabtu_'.$i),
				'jam_selesai' => $this->input->post('jam_selesai_sabtu_'.$i),
				'hari' => 'sabtu'
			);
			if ($this->input->post('jam_ke_sabtu_'.$i) != "") {
				$tabel_hari_rentang = $this->mod_harirentang->get(array("hari"=>"Sabtu", "jam_ke"=>$this->input->post('jam_ke_sabtu_'.$i)));
				//print_r($tabel_hari_rentang);
				if ($tabel_hari_rentang) {
					$this->mod_harirentang->update($data, $tabel_hari_rentang[0]->id_rentang_jam);
				} else {
					$this->mod_harirentang->insert($data);
				}
			}
		}

		for ($i=1; $i<=8; $i++) {
			$data = array(
				'jam_ke' => $this->input->post('jam_ke_minggu_'.$i),
				'jam_mulai' => $this->input->post('jam_mulai_minggu_'.$i),
				'jam_selesai' => $this->input->post('jam_selesai_minggu_'.$i),
				'hari' => 'minggu'
			);
			if ($this->input->post('jam_ke_minggu_'.$i) != "") {
				$tabel_hari_rentang = $this->mod_harirentang->get(array("hari"=>"Minggu", "jam_ke"=>$this->input->post('jam_ke_minggu_'.$i)));
				//print_r($tabel_hari_rentang);
				if ($tabel_hari_rentang) {
					$this->mod_harirentang->update($data, $tabel_hari_rentang[0]->id_rentang_jam);
				} else {
					$this->mod_harirentang->insert($data);
				}
			}
		}


		redirect('guru/harirentang');
	}

	// public function jammengajar()
	// {
	// 	$data['nama'] = $this->session->Nama;
	// 	$data['foto'] = $this->session->foto; 
	// 	$tahun_ajaran = $this->input->get('tahun_ajaran');

	// 	$tahun_aktif = NULL;
	// 	// Defaultnya ambil tahun yg aktif
	// 	$this->load->model('ppdb/model_pendaftar_ppdb');
	// 	if (empty($tahun_ajaran)) {
	// 		$id_tahun_aktif = $this->model_pendaftar_ppdb->get_tahun_ajaran_aktif()->id_tahun_ajaran;
	// 		$tahun_aktif  = $this->model_pendaftar_ppdb->get_tahun_ajaran_aktif()->tahun_ajaran;
	// 	} else if ($tahun_ajaran != 'semua') {
	// 		$tahun_aktif = $tahun_ajaran;
	// 	}

	// 	$data['tabel_pendaftar_ppdb'] = $this->model_pendaftar_ppdb->getsiswaangkatan($tahun_aktif);
	// 	$data['tahun_ajaran_selected'] = $tahun_aktif;

	// 	$this->load->model('kesiswaan/model_tahunajaran');
	// 	$data['tahun_ajaran'] = $this->model_tahunajaran->get();

	// 	$this->load->model('penjadwalan/mod_jammengajar');
	// 	$tabel_jammengajar = $this->mod_jammengajar->get(array("id_tahun_ajaran"=>$id_tahun_aktif));
	// 	$data['tabel_jammengajar'] = $tabel_jammengajar;




		
	// 	$this->load->model('penjadwalan/mod_pegawai');
	// 	$tabel_pegawai = $this->mod_pegawai->get(array("Status"=>"Guru"));
	// 	$data['tabel_pegawai'] = $tabel_pegawai;

	// 	$this->load->model('penjadwalan/mod_jadwalmapel');
		
		

	// 	$this->load->model('penjadwalan/mod_namamapel');
	// 	$data['tabel_namamapel'] = $this->mod_namamapel->get();
	// 	$this->template->load('guru/dashboard','guru/kurikulum/penjadwalan/jammengajar', $data);
	// }


public function jammengajar()
	{
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 
		
		$this->load->model('penjadwalan/setting_model');
		$id_tahun_ajaran = $this->setting_model->getsetting()->id_tahun_ajaran;

		$this->load->model('penjadwalan/mod_jammengajar');
		$tabel_jammengajar = $this->mod_jammengajar->get(array("id_tahun_ajaran"=>$id_tahun_ajaran));
		$data['tabel_jammengajar'] = $tabel_jammengajar;

		
		$this->load->model('penjadwalan/mod_pegawai');
		$tabel_pegawai = $this->mod_pegawai->get(array("Status"=>"Guru"));
		$data['tabel_pegawai'] = $tabel_pegawai;

		$this->load->model('penjadwalan/mod_jadwalmapel');
		foreach ($tabel_jammengajar as $row_jammengajar) {
			$total_durasi[$row_jammengajar->id_jam_mgjr] = $this->mod_jadwalmapel->getjadwalmapel(array("jadwal_mapel.NIP"=>$row_jammengajar->NIP, "jadwal_mapel.id_namamapel"=>$row_jammengajar->id_namamapel, "jadwal_mapel.id_tahun_ajaran"=>$row_jammengajar->id_tahun_ajaran))[0]->total_durasi;
			//echo $this->db->last_query();
		}
		$data['total_durasi'] = $total_durasi;

		$this->load->model('penjadwalan/mod_namamapel');
		$data['tabel_namamapel'] = $this->mod_namamapel->get();
		$this->template->load('guru/dashboard','guru/kurikulum/penjadwalan/jammengajar', $data);
	 }

	 public function printjammengajar()
	{
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 
		
		$this->load->model('penjadwalan/setting_model');
		$id_tahun_ajaran = $this->setting_model->getsetting()->id_tahun_ajaran;

		$this->load->model('penjadwalan/mod_jammengajar');
		$tabel_jammengajar = $this->mod_jammengajar->get(array("id_tahun_ajaran"=>$id_tahun_ajaran));
		$data['tabel_jammengajar'] = $tabel_jammengajar;

		
		$this->load->model('penjadwalan/mod_pegawai');
		$tabel_pegawai = $this->mod_pegawai->get(array("Status"=>"Guru"));
		$data['tabel_pegawai'] = $tabel_pegawai;

		$this->load->model('penjadwalan/mod_jadwalmapel');
		foreach ($tabel_jammengajar as $row_jammengajar) {
			$total_durasi[$row_jammengajar->id_jam_mgjr] = $this->mod_jadwalmapel->getjadwalmapel(array("jadwal_mapel.NIP"=>$row_jammengajar->NIP, "jadwal_mapel.id_namamapel"=>$row_jammengajar->id_namamapel, "jadwal_mapel.id_tahun_ajaran"=>$row_jammengajar->id_tahun_ajaran))[0]->total_durasi;
			//echo $this->db->last_query();
		}
		$data['total_durasi'] = $total_durasi;

		$this->load->model('penjadwalan/mod_namamapel');
		$data['tabel_namamapel'] = $this->mod_namamapel->get();
		$this->template->load('guru/dashboard','guru/kurikulum/penjadwalan/printjammengajar', $data);
	 }
	public function getinfoguru($NIP)
	{
		$this->load->model('penjadwalan/mod_pegawai');
		//$tabel_pegawai = $this->mod_pegawai->get(array("Status"=>"Guru"));
		$row_pegawai = $this->mod_pegawai->get(array("Status"=>"Guru", "NIP"=>$NIP));
		$rows = array();
		//foreach ($tabel_pegawai as $row_pegawai) {
		    //$rows[] = $row_pegawai;
		//}
		$rows = $row_pegawai;
		$data = "{\"data\":".json_encode($rows)."}";
		echo $data;
	}

	public function simpanjammengajar() 
	{
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 
		$this->load->model('penjadwalan/mod_jammengajar');

		$this->load->model('penjadwalan/setting_model');
		$setting = $this->setting_model->getsetting();
		$id_tahun_ajaran = $setting->id_tahun_ajaran;

		for ($i=1; $i<=10; $i++) {
			if (($this->input->post('NIP'.$i) != "") && ($this->input->post('id_namamapel'.$i) != "")) {
				$data = array(
					'NIP' => $this->input->post('NIP'.$i),
					'id_namamapel' => $this->input->post('id_namamapel'.$i),
					'jatah_minim_mgjr' => $this->input->post('jatah_minim_mgjr'.$i),
					'id_tahun_ajaran' => $id_tahun_ajaran
				);
				$this->mod_jammengajar->insert($data);
			}
		}
		$this->session->set_flashdata("warning",'<script> swal( "Berhasil" ,  "Data tersimpan !" ,  "success" )</script>');	
		redirect('guru/jammengajar');
	}

	public function hapusjammengajar() {
		$this->load->model('penjadwalan/mod_jammengajar');
		$this->mod_jammengajar->delete($this->uri->segment(3));
		redirect('guru/jammengajar');
	}

	public function jadwalmapel()
	{
		
		//if (@$this->uri->segment(4) == '') { $jenjang = 7; } else { $jenjang = @$this->uri->segment(4); }
		$jenjang = @$this->uri->segment(4);
		if ($jenjang == "") { $jenjang = '7'; }
		$data['jenjang'] = $jenjang;

		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 
		
		$this->load->model('penjadwalan/setting_model');
		$setting = $this->setting_model->getsetting();
		$id_tahun_ajaran = $setting->id_tahun_ajaran;

		$this->load->model('penjadwalan/mod_namamapel');
		$data['tabel_namamapel'] = $this->mod_namamapel->get();
		$this->load->model('penjadwalan/mod_mapel');
		$data['tabel_mapel'] = $this->mod_mapel->get();
		$this->load->model('penjadwalan/mod_prioritaskhusus');
		$data['tabel_prioritaskhusus'] = $this->mod_prioritaskhusus->get();
		$this->load->model('penjadwalan/mod_kelasreguler');
		$tabel_kelasreguler = $this->mod_kelasreguler->get(array("jenjang"=>$jenjang));
		$data['tabel_kelasreguler'] = $tabel_kelasreguler;
		$this->load->model('penjadwalan/mod_pegawai');
		$data['tabel_pegawai'] = $this->mod_pegawai->get(array("Status"=>"Guru"));
		$this->load->model('penjadwalan/mod_jammengajar');
		$this->load->model('penjadwalan/mod_jadwalmapel');
		$this->load->model('penjadwalan/mod_harirentang');
		


		for ($i=0; $i<=12; $i++) {
			$data['hari_rentang']['Senin'][$i] = $this->mod_harirentang->selectdata('Senin', $i);
			$data['hari_rentang']['Selasa'][$i] = $this->mod_harirentang->selectdata('Selasa', $i);
			$data['hari_rentang']['Rabu'][$i] = $this->mod_harirentang->selectdata('Rabu', $i);
			$data['hari_rentang']['Kamis'][$i] = $this->mod_harirentang->selectdata('Kamis', $i);
			$data['hari_rentang']['Jumat'][$i] = $this->mod_harirentang->selectdata('Jumat', $i);
			$data['hari_rentang']['Sabtu'][$i] = $this->mod_harirentang->selectdata('Sabtu', $i);
			$data['hari_rentang']['Minggu'][$i] = $this->mod_harirentang->selectdata('Minggu', $i);


			$data['tabel_prioritaskhusus_senin'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Senin", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_prioritaskhusus_selasa'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Selasa", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_prioritaskhusus_rabu'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Rabu", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_prioritaskhusus_kamis'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Kamis", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_prioritaskhusus_jumat'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Jumat", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_prioritaskhusus_sabtu'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Sabtu", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_prioritaskhusus_minggu'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Minggu", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));

			$data['tabel_khusus_senin'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Senin", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_khusus_selasa'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Selasa", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_khusus_rabu'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Rabu", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_khusus_kamis'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Kamis", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_khusus_jumat'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Jumat", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_khusus_sabtu'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Sabtu", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_khusus_minggu'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Minggu", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
		}

		for ($i=0; $i<=12; $i++) {
			$data['tabel_jadwalprioritas_senin'][$i] = $this->mod_prioritaskhusus->getguruprioritas(array("hari"=>"Senin", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_jadwalprioritas_selasa'][$i] = $this->mod_prioritaskhusus->getguruprioritas(array("hari"=>"Selasa", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_jadwalprioritas_rabu'][$i] = $this->mod_prioritaskhusus->getguruprioritas(array("hari"=>"Rabu", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_jadwalprioritas_kamis'][$i] = $this->mod_prioritaskhusus->getguruprioritas(array("hari"=>"Kamis", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_jadwalprioritas_jumat'][$i] = $this->mod_prioritaskhusus->getguruprioritas(array("hari"=>"Jumat", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_jadwalprioritas_sabtu'][$i] = $this->mod_prioritaskhusus->getguruprioritas(array("hari"=>"Sabtu", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_jadwalprioritas_minggu'][$i] = $this->mod_prioritaskhusus->getguruprioritas(array("hari"=>"Minggu", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));

			$data['tabel_jadwalkhusus_senin'][$i] = $this->mod_prioritaskhusus->getgurukhusus(array("hari"=>"Senin", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_jadwalkhusus_selasa'][$i] = $this->mod_prioritaskhusus->getgurukhusus(array("hari"=>"Selasa", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_jadwalkhusus_rabu'][$i] = $this->mod_prioritaskhusus->getgurukhusus(array("hari"=>"Rabu", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_jadwalkhusus_kamis'][$i] = $this->mod_prioritaskhusus->getgurukhusus(array("hari"=>"Kamis", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_jadwalkhusus_jumat'][$i] = $this->mod_prioritaskhusus->getgurukhusus(array("hari"=>"Jumat", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_jadwalkhusus_sabtu'][$i] = $this->mod_prioritaskhusus->getgurukhusus(array("hari"=>"Sabtu", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_jadwalkhusus_minggu'][$i] = $this->mod_prioritaskhusus->getgurukhusus(array("hari"=>"Minggu", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));

			foreach ($tabel_kelasreguler as $row_kelasreguler) {
				$data['tabel_jadwalmapel_senin'][$row_kelasreguler->id_kelas_reguler][$i] = $this->mod_jadwalmapel->get(array("hari"=>"Senin", "jam_ke"=>$i, "id_kelas_reguler"=>$row_kelasreguler->id_kelas_reguler));
				$data['tabel_jadwalmapel_selasa'][$row_kelasreguler->id_kelas_reguler][$i] = $this->mod_jadwalmapel->get(array("hari"=>"Selasa", "jam_ke"=>$i, "id_kelas_reguler"=>$row_kelasreguler->id_kelas_reguler));
				$data['tabel_jadwalmapel_rabu'][$row_kelasreguler->id_kelas_reguler][$i] = $this->mod_jadwalmapel->get(array("hari"=>"Rabu", "jam_ke"=>$i, "id_kelas_reguler"=>$row_kelasreguler->id_kelas_reguler));
				$data['tabel_jadwalmapel_kamis'][$row_kelasreguler->id_kelas_reguler][$i] = $this->mod_jadwalmapel->get(array("hari"=>"Kamis", "jam_ke"=>$i, "id_kelas_reguler"=>$row_kelasreguler->id_kelas_reguler));
				$data['tabel_jadwalmapel_jumat'][$row_kelasreguler->id_kelas_reguler][$i] = $this->mod_jadwalmapel->get(array("hari"=>"Jumat", "jam_ke"=>$i, "id_kelas_reguler"=>$row_kelasreguler->id_kelas_reguler));
				$data['tabel_jadwalmapel_sabtu'][$row_kelasreguler->id_kelas_reguler][$i] = $this->mod_jadwalmapel->get(array("hari"=>"Sabtu", "jam_ke"=>$i, "id_kelas_reguler"=>$row_kelasreguler->id_kelas_reguler));
				$data['tabel_jadwalmapel_minggu'][$row_kelasreguler->id_kelas_reguler][$i] = $this->mod_jadwalmapel->get(array("hari"=>"Minggu", "jam_ke"=>$i, "id_kelas_reguler"=>$row_kelasreguler->id_kelas_reguler));
							
			}
			
		}

		$data['tabel_jammengajar'] = $this->mod_jammengajar->get();		

		$this->template->load('guru/dashboard','guru/kurikulum/penjadwalan/jadwalmapel', $data);
	}


	public function exportjadwalmapel()
	{
		//if (@$this->uri->segment(4) == '') { $jenjang = 7; } else { $jenjang = @$this->uri->segment(4); }
		$jenjang = @$this->uri->segment(4);
		if ($jenjang == "") { $jenjang = '7'; }
		$data['jenjang'] = $jenjang;

		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 
		$this->load->model('penjadwalan/mod_namamapel');
		$data['tabel_namamapel'] = $this->mod_namamapel->get();
		$this->load->model('penjadwalan/mod_mapel');
		$data['tabel_mapel'] = $this->mod_mapel->get();
		$this->load->model('penjadwalan/mod_prioritaskhusus');
		$data['tabel_prioritaskhusus'] = $this->mod_prioritaskhusus->get();
		$this->load->model('penjadwalan/mod_kelasreguler');
		$tabel_kelasreguler = $this->mod_kelasreguler->get(array("jenjang"=>$jenjang));
		$data['tabel_kelasreguler'] = $tabel_kelasreguler;
		$this->load->model('penjadwalan/mod_pegawai');
		$data['tabel_pegawai'] = $this->mod_pegawai->get(array("Status"=>"Guru"));
		$this->load->model('penjadwalan/mod_jammengajar');
		$this->load->model('penjadwalan/mod_jadwalmapel');
		$this->load->model('penjadwalan/mod_harirentang');
		
		for ($i=0; $i<=12; $i++) {
			$data['hari_rentang']['Senin'][$i] = $this->mod_harirentang->selectdata('Senin', $i);
			$data['hari_rentang']['Selasa'][$i] = $this->mod_harirentang->selectdata('Selasa', $i);
			$data['hari_rentang']['Rabu'][$i] = $this->mod_harirentang->selectdata('Rabu', $i);
			$data['hari_rentang']['Kamis'][$i] = $this->mod_harirentang->selectdata('Kamis', $i);
			$data['hari_rentang']['Jumat'][$i] = $this->mod_harirentang->selectdata('Jumat', $i);
			$data['hari_rentang']['Sabtu'][$i] = $this->mod_harirentang->selectdata('Sabtu', $i);
			$data['hari_rentang']['Minggu'][$i] = $this->mod_harirentang->selectdata('Minggu', $i);

			
			$data['tabel_prioritaskhusus_senin'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Senin", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_prioritaskhusus_selasa'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Selasa", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_prioritaskhusus_rabu'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Rabu", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_prioritaskhusus_kamis'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Kamis", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_prioritaskhusus_jumat'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Jumat", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_prioritaskhusus_sabtu'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Sabtu", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_prioritaskhusus_minggu'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Minggu", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));

			$data['tabel_khusus_senin'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Senin", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_khusus_selasa'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Selasa", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_khusus_rabu'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Rabu", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_khusus_kamis'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Kamis", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_khusus_jumat'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Jumat", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_khusus_sabtu'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Sabtu", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_khusus_minggu'][$i] = $this->mod_prioritaskhusus->get(array("hari"=>"Minggu", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
		}

		for ($i=0; $i<=12; $i++) {
			$data['tabel_jadwalprioritas_senin'][$i] = $this->mod_prioritaskhusus->getguruprioritas(array("hari"=>"Senin", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_jadwalprioritas_selasa'][$i] = $this->mod_prioritaskhusus->getguruprioritas(array("hari"=>"Selasa", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_jadwalprioritas_rabu'][$i] = $this->mod_prioritaskhusus->getguruprioritas(array("hari"=>"Rabu", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_jadwalprioritas_kamis'][$i] = $this->mod_prioritaskhusus->getguruprioritas(array("hari"=>"Kamis", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_jadwalprioritas_jumat'][$i] = $this->mod_prioritaskhusus->getguruprioritas(array("hari"=>"Jumat", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_jadwalprioritas_sabtu'][$i] = $this->mod_prioritaskhusus->getguruprioritas(array("hari"=>"Sabtu", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));
			$data['tabel_jadwalprioritas_minggu'][$i] = $this->mod_prioritaskhusus->getguruprioritas(array("hari"=>"Minggu", "jam_ke"=>$i, "jenis_prkh"=>"prioritas"));

			$data['tabel_jadwalkhusus_senin'][$i] = $this->mod_prioritaskhusus->getgurukhusus(array("hari"=>"Senin", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_jadwalkhusus_selasa'][$i] = $this->mod_prioritaskhusus->getgurukhusus(array("hari"=>"Selasa", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_jadwalkhusus_rabu'][$i] = $this->mod_prioritaskhusus->getgurukhusus(array("hari"=>"Rabu", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_jadwalkhusus_kamis'][$i] = $this->mod_prioritaskhusus->getgurukhusus(array("hari"=>"Kamis", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_jadwalkhusus_jumat'][$i] = $this->mod_prioritaskhusus->getgurukhusus(array("hari"=>"Jumat", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_jadwalkhusus_sabtu'][$i] = $this->mod_prioritaskhusus->getgurukhusus(array("hari"=>"Sabtu", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));
			$data['tabel_jadwalkhusus_minggu'][$i] = $this->mod_prioritaskhusus->getgurukhusus(array("hari"=>"Minggu", "jam_ke"=>$i, "jenis_prkh"=>"khusus"));

			foreach ($tabel_kelasreguler as $row_kelasreguler) {
				$data['tabel_jadwalmapel_senin'][$row_kelasreguler->id_kelas_reguler][$i] = $this->mod_jadwalmapel->get(array("hari"=>"Senin", "jam_ke"=>$i, "id_kelas_reguler"=>$row_kelasreguler->id_kelas_reguler));
				$data['tabel_jadwalmapel_selasa'][$row_kelasreguler->id_kelas_reguler][$i] = $this->mod_jadwalmapel->get(array("hari"=>"Selasa", "jam_ke"=>$i, "id_kelas_reguler"=>$row_kelasreguler->id_kelas_reguler));
				$data['tabel_jadwalmapel_rabu'][$row_kelasreguler->id_kelas_reguler][$i] = $this->mod_jadwalmapel->get(array("hari"=>"Rabu", "jam_ke"=>$i, "id_kelas_reguler"=>$row_kelasreguler->id_kelas_reguler));
				$data['tabel_jadwalmapel_kamis'][$row_kelasreguler->id_kelas_reguler][$i] = $this->mod_jadwalmapel->get(array("hari"=>"Kamis", "jam_ke"=>$i, "id_kelas_reguler"=>$row_kelasreguler->id_kelas_reguler));
				$data['tabel_jadwalmapel_jumat'][$row_kelasreguler->id_kelas_reguler][$i] = $this->mod_jadwalmapel->get(array("hari"=>"Jumat", "jam_ke"=>$i, "id_kelas_reguler"=>$row_kelasreguler->id_kelas_reguler));
				$data['tabel_jadwalmapel_sabtu'][$row_kelasreguler->id_kelas_reguler][$i] = $this->mod_jadwalmapel->get(array("hari"=>"Sabtu", "jam_ke"=>$i, "id_kelas_reguler"=>$row_kelasreguler->id_kelas_reguler));
				$data['tabel_jadwalmapel_minggu'][$row_kelasreguler->id_kelas_reguler][$i] = $this->mod_jadwalmapel->get(array("hari"=>"Minggu", "jam_ke"=>$i, "id_kelas_reguler"=>$row_kelasreguler->id_kelas_reguler));
							
			}
			
		}

		$data['tabel_jammengajar'] = $this->mod_jammengajar->get();		

		$this->load->view('guru/kurikulum/penjadwalan/exportjadwalmapel', $data);
	}

	// public function getmapelkelas($jenjang)
	// {
	// 	$this->load->model('penjadwalan/mod_mapel');
	// 	//$tabel_pegawai = $this->mod_pegawai->get(array("Status"=>"Guru"));
	// 	$tabel_mapel = $this->mod_mapel->getmapelbyjenjang($jenjang);
	// 	$rows = array();
	// 	foreach ($tabel_mapel as $row_mapel) {
	// 	    $rows[] = $row_mapel;
	// 	}
	// 	$data = "{\"data\":".json_encode($rows)."}";
	// 	echo $data;
	// }

	public function simpanprioritas() {
		$this->load->model('penjadwalan/mod_prioritaskhusus');
		//echo "OKK";
		//print_r($this->input->post('id_namamapel_senin_0'));
		for ($i=0; $i<=8; $i++) {

			$id_namamapel_senin = $this->input->post('id_namamapel_senin_'.$i);
			//print_r($id_namamapel_senin);
			if ($id_namamapel_senin) {
				foreach ($id_namamapel_senin as $nilai) {
					if ($nilai != "") {
						$data = array(
							'jenis_prkh' => 'prioritas',
							'id_namamapel' => $nilai,
							'id_tahun_ajaran' => '1',
							'jam_ke' => "$i",
							'hari' => 'Senin'

						);	
					}
					$this->mod_prioritaskhusus->insert($data);
				}
			}
			
		}

		for ($i=0; $i<=8; $i++) {

			$id_namamapel_selasa = $this->input->post('id_namamapel_selasa_'.$i);
			if ($id_namamapel_selasa) {
				foreach ($id_namamapel_selasa as $nilai) {
					if ($nilai != "") {
						$data = array(
							'jenis_prkh' => 'prioritas',
							'id_namamapel' => $nilai,
							'id_tahun_ajaran' => '1',
							'jam_ke' => "$i",
							'hari' => 'Selasa'

						);	
					}
					$this->mod_prioritaskhusus->insert($data);
				}
			}
			
		}

		for ($i=0; $i<=8; $i++) {

			$id_namamapel_rabu = $this->input->post('id_namamapel_rabu_'.$i);
			//print_r($id_namamapel_senin);
			if ($id_namamapel_rabu) {
				foreach ($id_namamapel_rabu as $nilai) {
					if ($nilai != "") {
						$data = array(
							'jenis_prkh' => 'prioritas',
							'id_namamapel' => $nilai,
							'id_tahun_ajaran' => '1',
							'jam_ke' => "$i",
							'hari' => 'Rabu'

						);	
					}
					$this->mod_prioritaskhusus->insert($data);
				}
			}
			
		}

		for ($i=0; $i<=8; $i++) {

			$id_namamapel_kamis = $this->input->post('id_namamapel_kamis_'.$i);
			//print_r($id_namamapel_senin);
			if ($id_namamapel_kamis) {
				foreach ($id_namamapel_kamis as $nilai) {
					if ($nilai != "") {
						$data = array(
							'jenis_prkh' => 'prioritas',
							'id_namamapel' => $nilai,
							'id_tahun_ajaran' => '1',
							'jam_ke' => "$i",
							'hari' => 'Kamis'

						);	
					}
					$this->mod_prioritaskhusus->insert($data);
				}
			}
			
		}

		for ($i=0; $i<=8; $i++) {

			$id_namamapel_jumat = $this->input->post('id_namamapel_jumat_'.$i);
			//print_r($id_namamapel_senin);
			if ($id_namamapel_jumat) {
				foreach ($id_namamapel_jumat as $nilai) {
					if ($nilai != "") {
						$data = array(
							'jenis_prkh' => 'prioritas',
							'id_namamapel' => $nilai,
							'id_tahun_ajaran' => '1',
							'jam_ke' => "$i",
							'hari' => 'Jumat'

						);	
					}
					$this->mod_prioritaskhusus->insert($data);
				}
			}
			
		}

		for ($i=0; $i<=8; $i++) {

			$id_namamapel_sabtu = $this->input->post('id_namamapel_sabtu_'.$i);
			//print_r($id_namamapel_senin);
			if ($id_namamapel_sabtu) {
				foreach ($id_namamapel_sabtu as $nilai) {
					if ($nilai != "") {
						$data = array(
							'jenis_prkh' => 'prioritas',
							'id_namamapel' => $nilai,
							'id_tahun_ajaran' => '1',
							'jam_ke' => "$i",
							'hari' => 'Sabtu'

						);	
					}
					$this->mod_prioritaskhusus->insert($data);
				}
			}
			
		}

		for ($i=0; $i<=8; $i++) {

			$id_namamapel_minggu = $this->input->post('id_namamapel_minggu_'.$i);
			//print_r($id_namamapel_senin);
			if ($id_namamapel_minggu) {
				foreach ($id_namamapel_minggu as $nilai) {
					if ($nilai != "") {
						$data = array(
							'jenis_prkh' => 'prioritas',
							'id_namamapel' => $nilai,
							'id_tahun_ajaran' => '1',
							'jam_ke' => "$i",
							'hari' => 'Minggu'

						);	
					}
					$this->mod_prioritaskhusus->insert($data);
				}
			}
			
		}
		redirect('guru/jadwalmapel');
	}

	public function hapusprioritas() {
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 
		$this->load->model('penjadwalan/mod_prioritaskhusus');
		$this->mod_prioritaskhusus->delete($this->uri->segment(3));
		$this->session->set_flashdata("warning",'<script> swal( "Berhasil" ,  "Data terhapus !" ,  "success" )</script>');
		redirect('guru/jadwalmapel');
	}



	public function simpanjadwalguru($hari, $jenjang){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 
		$this->load->model('penjadwalan/mod_jadwalmapel');
		$this->load->model('penjadwalan/mod_kelasreguler');
		$this->load->model('penjadwalan/mod_harirentang');

		$this->load->model('penjadwalan/setting_model');
		$setting = $this->setting_model->getsetting();
		$id_tahun_ajaran = $setting->id_tahun_ajaran;

		$tabel_kelasreguler = $this->mod_kelasreguler->get(array("jenjang"=>$jenjang));
		$data['tabel_kelasreguler'] = $tabel_kelasreguler;

		for ($i=0; $i<=12; $i++) {
			foreach ($tabel_kelasreguler as $row_kelasreguler) {
				$inputpost = $this->input->post('jadwal_'.$hari.'_'.$row_kelasreguler->id_kelas_reguler.'_'.$i);
				if ($inputpost != '') {
					$arrinput = explode("_", $inputpost);
					$NIP = $arrinput[0];
					$id_namamapel = $arrinput[1];
					$cek = array(
							'id_kelas_reguler'=>$row_kelasreguler->id_kelas_reguler,
							'id_tahun_ajaran' => $id_tahun_ajaran,
							'jam_ke' => "$i",
							'hari' => ucfirst($hari)

						);
					$data = array(
							'id_namamapel' => $id_namamapel,
							'id_kelas_reguler'=>$row_kelasreguler->id_kelas_reguler,
							'NIP' => $NIP,
							'id_tahun_ajaran' => $id_tahun_ajaran,
							'jam_ke' => "$i",
							'hari' => ucfirst($hari)

						);
					$tabel_jadwalmapel = $this->mod_jadwalmapel->get($cek);
					if ($tabel_jadwalmapel) {
						$this->mod_jadwalmapel->update($data, $tabel_jadwalmapel[0]->id_jadwal_mapel);
						
						$row_harirentang = $this->mod_harirentang->selectdata(ucfirst($hari), "$i");
						$this->mod_jadwalmapel->update(array("id_rentang_jam"=>@$row_harirentang->id_rentang_jam), $tabel_jadwalmapel[0]->id_jadwal_mapel);
						
					} else {
						$this->mod_jadwalmapel->insert($data);	
						$id_jadwal_mapel = $this->db->insert_id();
						
						$row_harirentang = $this->mod_harirentang->selectdata(ucfirst($hari), "$i");
						$this->mod_jadwalmapel->update(array("id_rentang_jam"=>@$row_harirentang->id_rentang_jam), $id_jadwal_mapel);
					}
				} else {
					$data = array(
							'id_kelas_reguler'=>$row_kelasreguler->id_kelas_reguler,
							'id_tahun_ajaran' => $id_tahun_ajaran,
							'jam_ke' => "$i",
							'hari' => ucfirst($hari)

						);
					$this->mod_jadwalmapel->deletejadwal($data);
				}
			}

		}

		redirect('guru/jadwalmapel');

	}

	public function simpankhusus(){
		$this->load->model('penjadwalan/mod_prioritaskhusus');

		for ($i=0; $i<=8; $i++) {

			$NIP_senin = $this->input->post('NIP_senin_'.$i);
			if ($NIP_senin) {
				foreach ($NIP_senin as $hasil) {
					if ($hasil != "") {
						$data = array(
							'jenis_prkh' => 'khusus',
							'NIP' => $hasil,
							'id_tahun_ajaran' => '1',
							'jam_ke' => "$i",
							'hari' => 'Senin'

						);	
					}
					$this->mod_prioritaskhusus->insert($data);
				}
			}
			
		}

		for ($i=0; $i<=8; $i++) {

			$NIP_selasa = $this->input->post('NIP_selasa_'.$i);
			if ($NIP_selasa) {
				foreach ($NIP_selasa as $hasil) {
					if ($hasil != "") {
						$data = array(
							'jenis_prkh' => 'khusus',
							'NIP' => $hasil,
							'id_tahun_ajaran' => '1',
							'jam_ke' => "$i",
							'hari' => 'Selasa'

						);	
					}
					$this->mod_prioritaskhusus->insert($data);
				}
			}
			
		}

		for ($i=0; $i<=8; $i++) {

			$NIP_rabu = $this->input->post('NIP_rabu_'.$i);
			if ($NIP_rabu) {
				foreach ($NIP_rabu as $hasil) {
					if ($hasil != "") {
						$data = array(
							'jenis_prkh' => 'khusus',
							'NIP' => $hasil,
							'id_tahun_ajaran' => '1',
							'jam_ke' => "$i",
							'hari' => 'Rabu'

						);	
					}
					$this->mod_prioritaskhusus->insert($data);
				}
			}
			
		}

		for ($i=0; $i<=8; $i++) {

			$NIP_kamis = $this->input->post('NIP_kamis_'.$i);
			if ($NIP_kamis) {
				foreach ($NIP_kamis as $hasil) {
					if ($hasil != "") {
						$data = array(
							'jenis_prkh' => 'khusus',
							'NIP' => $hasil,
							'id_tahun_ajaran' => '1',
							'jam_ke' => "$i",
							'hari' => 'Kamis'

						);	
					}
					$this->mod_prioritaskhusus->insert($data);
				}
			}
			
		}

		for ($i=0; $i<=8; $i++) {

			$NIP_jumat = $this->input->post('NIP_jumat_'.$i);
			if ($NIP_jumat) {
				foreach ($NIP_jumat as $hasil) {
					if ($hasil != "") {
						$data = array(
							'jenis_prkh' => 'khusus',
							'NIP' => $hasil,
							'id_tahun_ajaran' => '1',
							'jam_ke' => "$i",
							'hari' => 'Jumat'

						);	
					}
					$this->mod_prioritaskhusus->insert($data);
				}
			}
			
		}

		for ($i=0; $i<=8; $i++) {

			$NIP_sabtu = $this->input->post('NIP_sabtu_'.$i);
			if ($NIP_sabtu) {
				foreach ($NIP_sabtu as $hasil) {
					if ($hasil != "") {
						$data = array(
							'jenis_prkh' => 'khusus',
							'NIP' => $hasil,
							'id_tahun_ajaran' => '1',
							'jam_ke' => "$i",
							'hari' => 'Sabtu'

						);	
					}
					$this->mod_prioritaskhusus->insert($data);
				}
			}
			
		}

		for ($i=0; $i<=8; $i++) {

			$NIP_minggu = $this->input->post('NIP_minggu_'.$i);
			if ($NIP_minggu) {
				foreach ($NIP_minggu as $hasil) {
					if ($hasil != "") {
						$data = array(
							'jenis_prkh' => 'khusus',
							'NIP' => $hasil,
							'id_tahun_ajaran' => '1',
							'jam_ke' => "$i",
							'hari' => 'Minggu'

						);	
					}
					$this->mod_prioritaskhusus->insert($data);
				}
			}
			
		}

		redirect('guru/jadwalmapel');

	}



	
	public function jadwalpiketguru()
	{
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 

		$this->load->model('penjadwalan/setting_model');
		$id_tahun_ajaran = $this->setting_model->getsetting()->id_tahun_ajaran;
		
		if (@$this->uri->segment(3) != "") { $id_tahun_ajaran = @$this->uri->segment(3); }

		$data['id_tahun_ajaran'] = $id_tahun_ajaran;

		$this->load->model('penjadwalan/mod_pegawai');
		$data['tabel_pegawai'] = $this->mod_pegawai->get();
		
		$this->load->model('penjadwalan/mod_jadwalpiketguru');
		$data['tabel_jadwalpiketguru'] = $this->mod_jadwalpiketguru->get();

		$this->load->model('penjadwalan/mod_tahunajaran');
		$data['tabel_tahunajaran'] = $this->mod_tahunajaran->get();

		$data['tabel_jadwalpiketguru_senin'] = $this->mod_jadwalpiketguru->get(array("hari"=>"Senin","id_tahun_ajaran"=>$id_tahun_ajaran));
		$data['tabel_jadwalpiketguru_selasa'] = $this->mod_jadwalpiketguru->get(array("hari"=>"Selasa","id_tahun_ajaran"=>$id_tahun_ajaran));
		$data['tabel_jadwalpiketguru_rabu'] = $this->mod_jadwalpiketguru->get(array("hari"=>"Rabu","id_tahun_ajaran"=>$id_tahun_ajaran));
		$data['tabel_jadwalpiketguru_kamis'] = $this->mod_jadwalpiketguru->get(array("hari"=>"Kamis","id_tahun_ajaran"=>$id_tahun_ajaran));
		$data['tabel_jadwalpiketguru_jumat'] = $this->mod_jadwalpiketguru->get(array("hari"=>"Jumat","id_tahun_ajaran"=>$id_tahun_ajaran));
		$data['tabel_jadwalpiketguru_sabtu'] = $this->mod_jadwalpiketguru->get(array("hari"=>"Sabtu","id_tahun_ajaran"=>$id_tahun_ajaran));
		$data['tabel_jadwalpiketguru_minggu'] = $this->mod_jadwalpiketguru->get(array("hari"=>"Minggu","id_tahun_ajaran"=>$id_tahun_ajaran));

		$this->template->load('guru/dashboard','guru/kurikulum/penjadwalan/jadwalpiketguru', $data);
	}

	public function simpanjadwalpiketguru() 
	{
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 
		$this->load->model('penjadwalan/mod_jadwalpiketguru');

		$this->mod_jadwalpiketguru->deletebytahunajaran($this->input->post('id_tahun_ajaran'));

		for ($i=1; $i<=7; $i++) {
			if (($this->input->post('NIP_senin'.$i) != "")) { // && ($this->input->post('tgl_piketguru_senin') != "")) {
				$data = array(
					'NIP' => $this->input->post('NIP_senin'.$i),
					'hari' => 'Senin',
					'id_tahun_ajaran' => $this->input->post('id_tahun_ajaran'),
				);
				$this->mod_jadwalpiketguru->insert($data);
			}
			if (($this->input->post('NIP_selasa'.$i) != "")) { // && ($this->input->post('tgl_piketguru_selasa') != "")) {

				$data = array(
					'NIP' => $this->input->post('NIP_selasa'.$i),
					'hari' => 'Selasa',
					'id_tahun_ajaran' => $this->input->post('id_tahun_ajaran')
				);
				$this->mod_jadwalpiketguru->insert($data);
			}
			if (($this->input->post('NIP_rabu'.$i) != "")) { // && ($this->input->post('tgl_piketguru_rabu') != "")) {

				$data = array(
					'NIP' => $this->input->post('NIP_rabu'.$i),
					'hari' => 'Rabu',
					'id_tahun_ajaran' => $this->input->post('id_tahun_ajaran')
				);
				$this->mod_jadwalpiketguru->insert($data);
			}
			if (($this->input->post('NIP_kamis'.$i) != "")) { // && ($this->input->post('tgl_piketguru_kamis') != "")) {

				$data = array(
					'NIP' => $this->input->post('NIP_kamis'.$i),
					'hari' => 'Kamis',
					'id_tahun_ajaran' => $this->input->post('id_tahun_ajaran')
				);
				$this->mod_jadwalpiketguru->insert($data);
			}
			if (($this->input->post('NIP_jumat'.$i) != "")) { // && ($this->input->post('tgl_piketguru_jumat') != "")) {

				$data = array(
					'NIP' => $this->input->post('NIP_jumat'.$i),
					'hari' => 'Jumat',
					'id_tahun_ajaran' => $this->input->post('id_tahun_ajaran')
				);
				$this->mod_jadwalpiketguru->insert($data);
			}
			if (($this->input->post('NIP_sabtu'.$i) != "")) { // && ($this->input->post('tgl_piketguru_sabtu') != "")) {

				$data = array(
					'NIP' => $this->input->post('NIP_sabtu'.$i),
					'hari' => 'Sabtu',
					'id_tahun_ajaran' => $this->input->post('id_tahun_ajaran')
				);
				$this->mod_jadwalpiketguru->insert($data);
			}
			if (($this->input->post('NIP_minggu'.$i) != "")) { // && ($this->input->post('tgl_piketguru_minggu') != "")) {

				$data = array(
					'NIP' => $this->input->post('NIP_minggu'.$i),
					'hari' => 'Minggu',
					'id_tahun_ajaran' => $this->input->post('id_tahun_ajaran')
				);
				$this->mod_jadwalpiketguru->insert($data);
			}
		}
				
		redirect('guru/jadwalpiketguru');
	}
	public function printjadwalpiketguru() //$id_tahun_ajaran="")
	{
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 

		$this->load->model('penjadwalan/setting_model');
		$id_tahun_ajaran = $this->setting_model->getsetting()->id_tahun_ajaran;
		
		if (@$this->uri->segment(3) != "") { $id_tahun_ajaran = @$this->uri->segment(3); }

		$data['id_tahun_ajaran'] = $id_tahun_ajaran;

		$this->load->model('penjadwalan/mod_pegawai');
		$data['tabel_pegawai'] = $this->mod_pegawai->get();
		
		$this->load->model('penjadwalan/mod_jadwalpiketguru');
		$data['tabel_jadwalpiketguru'] = $this->mod_jadwalpiketguru->get();

		$this->load->model('penjadwalan/mod_tahunajaran');
		$data['tabel_tahunajaran'] = $this->mod_tahunajaran->get();

		$data['tabel_jadwalpiketguru_senin'] = $this->mod_jadwalpiketguru->get(array("hari"=>"Senin","id_tahun_ajaran"=>$id_tahun_ajaran));
		$data['tabel_jadwalpiketguru_selasa'] = $this->mod_jadwalpiketguru->get(array("hari"=>"Selasa","id_tahun_ajaran"=>$id_tahun_ajaran));
		$data['tabel_jadwalpiketguru_rabu'] = $this->mod_jadwalpiketguru->get(array("hari"=>"Rabu","id_tahun_ajaran"=>$id_tahun_ajaran));
		$data['tabel_jadwalpiketguru_kamis'] = $this->mod_jadwalpiketguru->get(array("hari"=>"Kamis","id_tahun_ajaran"=>$id_tahun_ajaran));
		$data['tabel_jadwalpiketguru_jumat'] = $this->mod_jadwalpiketguru->get(array("hari"=>"Jumat","id_tahun_ajaran"=>$id_tahun_ajaran));
		$data['tabel_jadwalpiketguru_sabtu'] = $this->mod_jadwalpiketguru->get(array("hari"=>"Sabtu","id_tahun_ajaran"=>$id_tahun_ajaran));
		$data['tabel_jadwalpiketguru_minggu'] = $this->mod_jadwalpiketguru->get(array("hari"=>"Minggu","id_tahun_ajaran"=>$id_tahun_ajaran));

		//$this->load->view('penjadwalan/kurikulum/printjadwalpiketguru', $data);
		$this->template->load('guru/dashboard','guru/kurikulum/penjadwalan/printjadwalpiketguru', $data);
	}

	public function jadwaltambahan($id_jadwal_tambahan = "")
	{

		if ($id_jadwal_tambahan == "" ) {
			$this->load->model('penjadwalan/mod_kelastambahan');
			$data['tabel_kelastambahan'] = $this->mod_kelastambahan->get();
			$this->load->model('penjadwalan/mod_namamapel');
			$data['tabel_namamapel'] = $this->mod_namamapel->get();
			$this->load->model('penjadwalan/mod_pegawai');
			$data['tabel_pegawai'] = $this->mod_pegawai->get();
			$this->load->model('penjadwalan/mod_jadwaltambahan');
			$data['tabel_jadwaltambahan'] = $this->mod_jadwaltambahan->get();
			$data['edit_jadwaltambahan'] = null;
			
			$data['nama'] = $this->session->Nama;
			$data['foto'] = $this->session->foto;
			$this->template->load('guru/dashboard','guru/kurikulum/penjadwalan/jadwaltambahan', $data);
		} else {
			$this->load->model('penjadwalan/mod_kelastambahan');
			$data['tabel_kelastambahan'] = $this->mod_kelastambahan->get();
			$this->load->model('penjadwalan/mod_namamapel');
			$data['tabel_namamapel'] = $this->mod_namamapel->get();
			$this->load->model('penjadwalan/mod_pegawai');
			$data['tabel_pegawai'] = $this->mod_pegawai->get();
			$this->load->model('penjadwalan/mod_jadwaltambahan');
			$data['tabel_jadwaltambahan'] = $this->mod_jadwaltambahan->get();
			$data['edit_jadwaltambahan'] = $this->mod_jadwaltambahan->select($id_jadwal_tambahan);
			$data['nama'] = $this->session->Nama;
			$data['foto'] = $this->session->foto;

			$this->template->load('guru/dashboard','guru/kurikulum/penjadwalan/jadwaltambahan', $data);
		}

		
	}

	public function hapusjadwaltambahan() {
		$this->load->model('penjadwalan/mod_jadwaltambahan');
		$this->mod_jadwaltambahan->delete($this->uri->segment(3));
		redirect('guru/jadwaltambahan');
	}

	public function getmapelkelastambahan()
	{
		$id = $this->input->post('id');
		$this->load->model('penjadwalan/mod_mapel');
		$data['tabel_pegawai'] = $this->mod_mapel->get();
		$this->template->load('guru/dashboard','guru/jadwaltambahan', $data);
	}

	public function simpanjadwaltambahan()
	{
		$this->load->model('penjadwalan/mod_jadwaltambahan');
		
		
		$data = array(
			'NIP' => $this->input->post('NIP'),
			'id_kelas_tambahan' => $this->input->post('id_kelas_tambahan'),
			'jam_mulai' => $this->input->post('jam_mulai'),
			'jam_selesai' => $this->input->post('jam_selesai'),
			'tgl_tambahan' => $this->input->post('tgl_tambahan'),
				'id_tahun_ajaran' => 1, //$this->input->post('id_tahun_ajaran'),
				'id_namamapel' => $this->input->post('id_namamapel')
			);

			//print_r($data);
			//echo "1";

		if ($this->input->post('id_jadwal_tambahan') == "") {
				//echo "2";
				//if ($this->mod_mapel->cekdatamapel($this->input->post('nama_mapel'), $row_kelasreguler->id_kelas_reguler) == 0) {
					//echo "3";
			$this->mod_jadwaltambahan->insert($data);	
				//} 

		} else {
				//echo "4";
			$this->mod_jadwaltambahan->update($data, $this->input->post('id_jadwal_tambahan'));
		}	
		
		redirect('guru/jadwaltambahan');
	}

	public function delharirentang() 
	{
		$id = $this->uri->segment(3);
		$this->load->model('penjadwalan/mod_harirentang');
		$this->mod_harirentang->delete($id);
		redirect('guru/harirentang');
	}

	public function ekstrakurikuler($id_jadwal_ekskul = "")
	{
		if ($id_jadwal_ekskul == "" ) {
			$data['nama'] = $this->session->Nama;
			$data['foto'] = $this->session->foto;
			$this->load->model('penjadwalan/mod_jadwalekskul');
			$data['tabel_jadwalekskul'] = $this->mod_jadwalekskul->get();

			$this->load->model('penjadwalan/mod_jenisklstambahan');
			$data['tabel_jenisklstambahan'] = $this->mod_jenisklstambahan->get();

			$this->load->model('penjadwalan/mod_pembimbing');
			$data['tabel_pembimbing'] = $this->mod_pembimbing->get();
			$data['edit_jadwalekskul'] = null;
			
			$this->template->load('guru/dashboard','guru/kurikulum/penjadwalan/ekstrakurikuler', $data);
		} else {
			$this->load->model('penjadwalan/mod_jadwalekskul');
			$data['tabel_jadwalekskul'] = $this->mod_jadwalekskul->get();
			$data['nama'] = $this->session->Nama;
			$data['foto'] = $this->session->foto;

			$this->load->model('penjadwalan/mod_jenisklstambahan');
			$data['tabel_jenisklstambahan'] = $this->mod_jenisklstambahan->get();

			$this->load->model('penjadwalan/mod_pembimbing');
			$data['tabel_pembimbing'] = $this->mod_pembimbing->get();
			$data['tabel_jadwalekskul'] = $this->mod_jadwalekskul->get();
			$data['edit_jadwalekskul'] = $this->mod_jadwalekskul->select($id_jadwal_ekskul);

			$this->template->load('guru/dashboard','guru/kurikulum/penjadwalan/ekstrakurikuler', $data);
		}
		

		// redirect('guru/ekstrakurikuler');
	}

	public function hapusjadwalekskul() {
		$this->load->model('penjadwalan/mod_jadwalekskul');
		$this->mod_jadwalekskul->delete($this->uri->segment(3));
		redirect('guru/ekstrakurikuler');
	}


	public function simpanjadwalekskul()
	{
		$this->load->model('penjadwalan/mod_jadwalekskul');
		
		
		$data = array(
			'hari' => $this->input->post('hari'),
			'jam_mulai' => $this->input->post('jam_mulai'),
			'jam_selesai' => $this->input->post('jam_selesai'),
			'tempat' => $this->input->post('tempat'),
			'id_jenis_kls_tambahan' => $this->input->post('id_jenis_kls_tambahan'),
			'id_pembimbing' => $this->input->post('id_pembimbing'),
				'id_tahun_ajaran' => 1, //$this->input->post('id_tahun_ajaran'),
				
			);

			//print_r($data);
			//echo "1";

		if ($this->input->post('id_jadwal_ekskul') == "") {
				//echo "2";
				//if ($this->mod_mapel->cekdatamapel($this->input->post('nama_mapel'), $row_kelasreguler->id_kelas_reguler) == 0) {
					//echo "3";
			$this->mod_jadwalekskul->insert($data);	
				//} 

		} else {
				//echo "4";
			$this->mod_jadwalekskul->update($data, $this->input->post('id_jadwal_ekskul'));
		}	
		
		redirect('guru/ekstrakurikuler');
	}

	public function namamapel($id_namamapel = "")
	{
		if ($id_namamapel == "" ) {
			$data['edit_mapel'] = null;

			$this->load->model('penjadwalan/mod_namamapel');
			$data['tabel_namamapel'] = $this->mod_namamapel->get();
			$data['nama'] = $this->session->Nama;
			$data['foto'] = $this->session->foto; 

			$this->template->load('guru/dashboard','guru/kurikulum/penjadwalan/namamapel', $data);
		} else {
			$this->load->model('penjadwalan/mod_namamapel');
			$data['edit_mapel'] = $this->mod_namamapel->select($id_namamapel);
			$data['tabel_namamapel'] = $this->mod_namamapel->get();
			$data['nama'] = $this->session->Nama;
			$data['foto'] = $this->session->foto; 

			$this->template->load('guru/dashboard','guru/kurikulum/penjadwalan/namamapel', $data);
		}


		
	}

		public function simpannamamapel()
	{
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto; 
		$this->load->model('penjadwalan/mod_namamapel');
		
		
		$data = array(
			'nama' => $this->input->post('nama'),
			'warna' => $this->input->post('warna')
		);

			//print_r($data);
			//echo "1";

		if ($this->input->post('id_namamapel') == "") {
				//echo "2";
				//if ($this->mod_mapel->cekdatamapel($this->input->post('nama_mapel'), $row_kelasreguler->id_kelas_reguler) == 0) {
					//echo "3";
			$this->mod_namamapel->insert($data);	
				//} 

		} else {
				//echo "4";
			$this->mod_namamapel->update($data, $this->input->post('id_namamapel'));
		}	

		$this->session->set_flashdata("warning",'<script> swal( "Berhasil" ,  "Data tersimpan !" ,  "success" )</script>');
		redirect('guru/namamapel');
	}


	public function hapusnamamapel() {
		$this->load->model('penjadwalan/mod_namamapel');
		$this->mod_namamapel->delete($this->uri->segment(3));
		redirect('guru/namamapel');
	}


// +++++++++++++++++++++++++++++++TUTUP PENJADWALAN MIA++++++++++++++++++++++++++++++++++++





	// Non AKADEMIK NOVEN
	// Pembimbing

	public function pendaftaran(){

		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$this->template->load('guru/dashboard','guru/pembimbing/pendaftaran', $data);
	}

	public function jadwal(){

		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$this->template->load('guru/dashboard','guru/pembimbing/jadwal', $data);
	}

	public function presensi(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$this->template->load('guru/dashboard','guru/pembimbing/presensi', $data);
	}

	public function nilai(){

		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$this->template->load('guru/dashboard','guru/pembimbing/nilai', $data);
	}

	public function pembayaran(){

		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$this->template->load('guru/dashboard','guru/pembimbing/pembayaran', $data);
	}
	// TUTUP PEMBIMBING

	// Konseling

	public function keterlambatan(){

		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$this->template->load('guru/dashboard','guru/konseling/keterlambatan', $data);
	}

	public function absensi_harian(){

		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$this->template->load('guru/dashboard','guru/konseling/absensi_harian', $data);
	}

	public function pelanggaran(){

		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$this->template->load('guru/dashboard','guru/konseling/pelanggaran', $data);
	}

	public function prestasi(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$this->template->load('guru/dashboard','guru/konseling/prestasi', $data);
	}

	// Tutup Konseling

	// Penilaian Hafiz

	public function kaldik(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username;
		$this->template->load('guru/dashboard', 'kepsek/rancang/kaldik',$data);
	}

	public function kurikulum(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$this->template->load('guru/dashboard', 'kepsek/rancang/kurikulum',$data);
	}

	public function nilaisiswa(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$this->template->load('guru/dashboard', 'kepsek/rancang/nilaisiswa',$data);
	}


	public function kategorinilai(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$this->template->load('guru/dashboard', 'kepsek/rancang/kategorinilai',$data);
	}

	public function jenisnilaiakhir(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$this->template->load('guru/dashboard', 'kepsek/rancang/jenisnilaiakhir',$data);
	}

	public function deskripsinilai(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$this->template->load('guru/dashboard', 'kepsek/rancang/deskripsinilai',$data);
	}

	public function rapor(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$this->template->load('guru/dashboard', 'kepsek/rancang/Rapor',$data);
	}



	public function presensi_siswa()
	{
		$day_libur = 0;
		if ($this->setting->hari_libur == "Senin") {
			$day_libur = 1;
		}
		else if ($this->setting->hari_libur == "Selasa") {
			$day_libur = 2;
		}
		else if ($this->setting->hari_libur == "Rabu") {
			$day_libur = 3;
		}
		else if ($this->setting->hari_libur == "Kamis") {
			$day_libur = 4;
		}
		else if ($this->setting->hari_libur == "Jumat") {
			$day_libur = 5;
		}
		else if ($this->setting->hari_libur == "Sabtu") {
			$day_libur = 6;
		}
		else { // ($this->setting->hari_libur == "Minggu") {
			$day_libur = 0;
		}
		$data['day_libur'] = $day_libur;
		$data['hari_libur'] = $this->setting->hari_libur;

		//echo date('w');

		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username; 
		$datsis = $this->Model_siswa->Getdatsis();
		$data['datsis'] = $datsis;
		// $data['rowsis'] = $this->model_siswa->rowsiswa($this->session->userdata('nisn'));
		//$thn = date('Y');
		$bln = date('m');
		$thn = date('Y');
		if ($this->input->post('bln') != "") { $bln = $this->input->post('bln'); }
		if ($this->input->post('thn') != "") { $thn = $this->input->post('thn'); }

		$datsemester = $this->tahunajaran_model->Getsemester();
		//print_r($datsemester);
		//print_r($datpeg->result());

		$tablesis = $datsis->result();
		foreach ($tablesis as $rowsis) {

			//for($i=1;$i<=date('t');$i++) {
			for($i=1;$i<=cal_days_in_month(CAL_GREGORIAN, $bln, $thn);$i++) {
				//echo $rowpeg->NIP."<br/>";
				//$datpresensi = $this->presensi_pegawai_model->getpresensi(date('Y-m-').substr($i+100, 1, 2), $rowpeg->NIP);
				$datpresensi = $this->presensi_siswa_model->getpresensi($thn.'-'.$bln.'-'.substr($i+100, 1, 2), $rowsis->nisn);
				//echo $this->db->last_query()."<br/>";
				if ($datpresensi) {
					//echo $rowpeg->NIP."===<br/>";
					$data['datpresensi'][$rowsis->nisn][$i] = $datpresensi->Rangkuman_presensisiswa;
					$data['datwaktu'][$rowsis->nisn][$i] = $datpresensi->Waktu_presensisiswa;
				}
			}
			for ($i=1;$i<=12;$i++) {
				
				$data['datpresensibulan'][$rowsis->nisn][$i]['H'] = @$this->presensi_siswa_model->getpresensibulan($i, $thn, $rowsis->nisn, 'H')->jml;
				$data['datpresensibulan'][$rowsis->nisn][$i]['S'] = @$this->presensi_siswa_model->getpresensibulan($i, $thn, $rowsis->nisn, 'S')->jml;
				$data['datpresensibulan'][$rowsis->nisn][$i]['I'] = @$this->presensi_siswa_model->getpresensibulan($i, $thn, $rowsis->nisn, 'I')->jml;
				$data['datpresensibulan'][$rowsis->nisn][$i]['A'] = @$this->presensi_siswa_model->getpresensibulan($i, $thn, $rowsis->nisn, 'A')->jml;
			}

			for ($i=1;$i<=2;$i++) {
				
				$data['datpresensisemester'][$rowsis->nisn][$i]['H'] = @$this->presensi_siswa_model->getpresensisemester($datsemester[$i-1]->tanggal_mulai, $datsemester[$i-1]->tanggal_selesai, $rowsis->nisn, 'H')->jml;
				$data['datpresensisemester'][$rowsis->nisn][$i]['S'] = @$this->presensi_siswa_model->getpresensisemester($datsemester[$i-1]->tanggal_mulai, $datsemester[$i-1]->tanggal_selesai, $rowsis->nisn, 'S')->jml;
				$data['datpresensisemester'][$rowsis->nisn][$i]['I'] = @$this->presensi_siswa_model->getpresensisemester($datsemester[$i-1]->tanggal_mulai, $datsemester[$i-1]->tanggal_selesai, $rowsis->nisn, 'I')->jml;
				$data['datpresensisemester'][$rowsis->nisn][$i]['A'] = @$this->presensi_siswa_model->getpresensisemester($datsemester[$i-1]->tanggal_mulai, $datsemester[$i-1]->tanggal_selesai, $rowsis->nisn, 'A')->jml;
			}

		}

		for ($i=1;$i<=12;$i++) {
			
			$data['datpresensitotalbulan'][$i]['H'] = @$this->presensi_siswa_model->getpresensitotalbulan($i, $thn, 'H')->jml;
			$data['datpresensitotalbulan'][$i]['S'] = @$this->presensi_siswa_model->getpresensitotalbulan($i, $thn, 'S')->jml;
			$data['datpresensitotalbulan'][$i]['I'] = @$this->presensi_siswa_model->getpresensitotalbulan($i, $thn, 'I')->jml;
			$data['datpresensitotalbulan'][$i]['A'] = @$this->presensi_siswa_model->getpresensitotalbulan($i, $thn, 'A')->jml;
		}

		for($i=1;$i<=cal_days_in_month(CAL_GREGORIAN, $bln, $thn);$i++) {
			$datlibur = $this->tanggal_libur_model->getlibur($thn.'-'.substr($bln+100, 1, 2).'-'.substr($i+100, 1, 2));
			if ($datlibur) {
				$data['datlibur'][$i] = $datlibur->nama_libur;
			} else {
				$data['datlibur'][$i] = "";
			}

			$datliburnasional = $this->tanggal_libur_nasional_model->getlibur($i, $bln);
			if ($datliburnasional) {
				$data['datlibur'][$i] = $data['datlibur'][$i]." ".$datliburnasional->nama_libur_nasional;
			} 
			//echo $data['datlibur'][$i]."<br/>";
			//echo $this->db->last_query()."<br/>";
		}

		$data['grafikpresensipegawai'] = TRUE;
		
		$this->template->load('guru/dashboard','guru/kurikulum/penilaian/presensisiswa', $data);
	}
	

// SIA ANggrek
	public function ppdbujian(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username;

		$tahun_ajaran = $this->input->get('tahun_ajaran');

		$tahun_aktif = NULL;
		// Defaultnya ambil tahun yg aktif
		if (empty($tahun_ajaran)) {
			$tahun_aktif  = $this->model_pendaftar_ppdb->get_tahun_ajaran_aktif()->tahun_ajaran;
		} else if ($tahun_ajaran != 'semua') {
			$tahun_aktif = $tahun_ajaran;
		}

		$data['tabel_pendaftar_ppdb'] = $this->model_pendaftar_ppdb->getsiswaangkatan($tahun_aktif);
		$data['tahun_ajaran_selected'] = $tahun_aktif;

		$this->load->model('kesiswaan/model_tahunajaran');
		$data['tahun_ajaran'] = $this->model_tahunajaran->get();

		$this->load->model('kesiswaan/model_pendaftar_ppdb');
		$data['tabel_pendaftar_ppdb_lolos'] = $this->model_pendaftar_ppdb->getlolos($tahun_aktif);
		$this->template->load('guru/dashboard','kepsek/kesiswaan/ppdbujian', $data);
	}

	

	public function ubahstatus() 
	{
		$this->load->model('ppdb/model_pendaftar_ppdb');
		foreach ($this->input->post('nisn_ubah') as $nisn_siswa) {
			$arrdata=array("status_siswa" => $this->input->post('button'));
			$this->model_pendaftar_ppdb->update($arrdata, $nisn_siswa);	
		}
		$this->session->set_flashdata('status', "<script>alert('Status siswa berhasil diubah!');</script>");
		redirect('guru/ppdbujian');

	}

	public function ppdbneg(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username;

		$tahun_ajaran = $this->input->get('tahun_ajaran');

		$tahun_aktif = NULL;
		// Defaultnya ambil tahun yg aktif
		if (empty($tahun_ajaran)) {
			$tahun_aktif  = $this->model_pendaftar_ppdb->get_tahun_ajaran_aktif()->tahun_ajaran;
		} else if ($tahun_ajaran != 'semua') {
			$tahun_aktif = $tahun_ajaran;
		}

		$data['tabel_pendaftar_ppdb'] = $this->model_pendaftar_ppdb->getsiswaangkatan($tahun_aktif);
		$data['tahun_ajaran_selected'] = $tahun_aktif;

		$this->load->model('kesiswaan/model_tahunajaran');
		$data['tahun_ajaran'] = $this->model_tahunajaran->get();

		$this->load->model('kesiswaan/model_pendaftar_ppdb');
		$data['tabel_pendaftar_ppdb_lolos'] = $this->model_pendaftar_ppdb->getlolos($tahun_aktif);
		$this->template->load('guru/dashboard','kepsek/kesiswaan/ppdbneg', $data);
	}
	
	public function daftarulang(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username;

		$tahun_ajaran = $this->input->get('tahun_ajaran');

		$tahun_aktif = NULL;
		// Defaultnya ambil tahun yg aktif
		if (empty($tahun_ajaran)) {
			$tahun_aktif  = $this->model_pendaftar_ppdb->get_tahun_ajaran_aktif()->tahun_ajaran;
		} else if ($tahun_ajaran != 'semua') {
			$tahun_aktif = $tahun_ajaran;
		}

		$data['tabel_pendaftar_ppdb'] = $this->model_pendaftar_ppdb->getsiswaangkatan($tahun_aktif);
		$data['tahun_ajaran_selected'] = $tahun_aktif;

		$this->load->model('kesiswaan/model_tahunajaran');
		$data['tahun_ajaran'] = $this->model_tahunajaran->get();

		$this->load->model('kesiswaan/model_pendaftar_ppdb');
		$data['tabel_pendaftar_ppdb_lolos'] = $this->model_pendaftar_ppdb->getlolos($tahun_aktif);
		$this->template->load('guru/dashboard','kepsek/kesiswaan/daftarulang', $data);

	}
	
	public function daftarkenaikan(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username;

		$tahun_ajaran = $this->input->get('tahun_ajaran');

		$tahun_aktif = NULL;
		// Defaultnya ambil tahun yg aktif
		if (empty($tahun_ajaran)) {
			$tahun_aktif  = $this->model_pendaftar_ppdb->get_tahun_ajaran_aktif()->tahun_ajaran;
		} else if ($tahun_ajaran != 'semua') {
			$tahun_aktif = $tahun_ajaran;
		}

		$data['tabel_pendaftar_ppdb'] = $this->model_pendaftar_ppdb->getsiswaangkatan($tahun_aktif);
		$data['tahun_ajaran_selected'] = $tahun_aktif;

		$this->load->model('kesiswaan/model_tahunajaran');
		$data['tahun_ajaran'] = $this->model_tahunajaran->get();

		$this->load->model('kesiswaan/model_pendaftar_ppdb');
		$data['tabel_pendaftar_ppdb_lolos'] = $this->model_pendaftar_ppdb->getlolos($tahun_aktif);
		$this->template->load('guru/dashboard','kepsek/kesiswaan/daftarkenaikan', $data);

	}




	public function bukuinduk(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username;

		$tahun_ajaran = $this->input->get('tahun_ajaran');

		$tahun_aktif = NULL;
		// Defaultnya ambil tahun yg aktif
		if (empty($tahun_ajaran)) {
			$tahun_aktif  = $this->model_pendaftar_ppdb->get_tahun_ajaran_aktif()->tahun_ajaran;
		} else if ($tahun_ajaran != 'semua') {
			$tahun_aktif = $tahun_ajaran;
		}

		$data['tabel_pendaftar_ppdb'] = $this->model_pendaftar_ppdb->getsiswaangkatan($tahun_aktif);
		$data['tahun_ajaran_selected'] = $tahun_aktif;

		$this->load->model('kesiswaan/model_tahunajaran');
		$data['tahun_ajaran'] = $this->model_tahunajaran->get();

		$this->load->model('kesiswaan/model_pendaftar_ppdb');
		$data['tabel_pendaftar_ppdb_lolos'] = $this->model_pendaftar_ppdb->getlolos($tahun_aktif);
		$this->template->load('guru/dashboard','guru/kesiswaan/bukuinduk', $data);
	}



// Nadya Aya 



	public function distribusi_reg(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username;
		$this->template->load('guru/dashboard','kepsek/rancang/distribusi_reg', $data);
	}

	public function distribusi_tam(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username;
		$this->template->load('guru/dashboard','kepsek/rancang/distribusi_tam', $data);
	}

	public function klinik_un(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username;
		$this->template->load('guru/dashboard','kepsek/rancang/klinik_un', $data);
	}

	public function mutasi_masuk(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username;
		$this->template->load('guru/dashboard','kepsek/rancang/mutasi_masuk', $data);
	}

	public function mutasi_keluar(){
		$data['nama'] = $this->session->Nama;
		$data['foto'] = $this->session->foto;
		$data['username'] = $this->session->username;
		$this->template->load('guru/dashboard','kepsek/rancang/mutasi_keluar', $data);
	}


	



	
	
}
