<?php
class Karyawan extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('M_data');
    $this->load->model('pegawai_model');

    $this->load->view('penilaian/penilaian_header');
    if ($this->session->userdata('isLogin') != TRUE) {
      $this->session->set_flashdata("warning",'<script> swal( "Maaf Anda Belum Login!" ,  "Silahkan Login Terlebih Dahulu" ,  "error" )</script>');
      redirect('login');
      exit;
    }
    if (($this->session->userdata('jabatan') != 'Karyawan')) 
    {
      $this->session->set_flashdata("warning",'<script> swal( "Anda Tidak Berhak!" ,  "Silahkan Login dengan Akun Anda" ,  "error" )</script>');
            //$this->load->view('login');
      redirect('login');
      exit;
    }
    $this->load->view('penilaian/penilaian_footer');   
  }
  function index(){
    $data['nama'] = $this->session->Nama;
    $data['foto'] = $this->session->foto;
    $data['jabatan']= $this->session->jabatan;
    $data['username'] = $this->session->username; 
    $this->load->view('KBM/dashpresensi',$data);
  }
}
?>