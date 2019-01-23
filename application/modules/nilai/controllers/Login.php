<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function ceklogin()
	{
		$this->load->model('login_model');
		if (isset($_POST['login'])){
			$username = $this->input->post('username',true);
			$password = $this->input->post('password',true);
			$cek =$this->login_model->proseslogin($username,$password);
			$hasil = count($cek); 
			if ($hasil > 0){
				// $this->login_model->cekPegawai($cek);
				if($cek->id_jabatan == 8){
					$result = $this->login_model->getJabatanSiswa($cek);	
				}
				else{
					$result = $this->login_model->getJabatanById($cek);
				}
				// echo $this->db->last_query();
				// print_r($result);
				// echo $result->nama_jabatan;
				$this->session->set_userdata(array(
					'isLogin' => TRUE,
					'jabatan' => $result->nama_jabatan, 
					'username' => $username, 
					'Nama' => $result->Nama,
					'NIP' => $cek->NIP, 
					'nisn' => $cek->nisn, 
					'foto' => $result->foto,

				));
				
				redirect($result->url.'/');

			}

			else{
				// $this->session->set_flashdata("warning","<b>Kombinasi Username dan Password Anda tidak ditemukan, Pastikan Anda memasukkan Username dan Password yang benar</b>");

				$this->session->set_flashdata("warning",'<script> swal( "Maaf" ,  "Kombinasi Username dan Password Salah !" ,  "error" )</script>');



				$this->load->view('login');
			}
			
		}
	}

	
}
