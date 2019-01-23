<?php
class Akademik extends CI_Controller{
  function __construct(){
        parent::__construct();
        $this->load->model('M_data');
        $this->load->view('penilaian/penilaian_header');
        $this->load->view('penilaian/penilaian_footer');   
    }

    function kaldik(){
        $kaldik = $this->M_data->getkaldik('2017-01-01', '2017-12-31');
        //echo $this->db->last_query();
        //print_r($kaldik);
        foreach ($kaldik as $rowkaldik) {
          $awal = strtotime($rowkaldik->tgl_awal);
          $akhir = strtotime($rowkaldik->tgl_akhir);
          $tgl = $awal;
          $i = 0;
          while ($tgl <= $akhir) {
            $libur[date('Y', $tgl)][date('m', $tgl)][date('d', $tgl)] = $rowkaldik->nama_kaldik;
            $simbol[date('Y', $tgl)][date('m', $tgl)][date('d', $tgl)] = $rowkaldik->simbol_kaldik;
            $tgl = $tgl + (60 * 60 * 24);
            $i++;
            if ($i>1000) { break; }
          }
        }
        //print_r($libur);
        $data['libur'] = $libur;
        $data['simbol'] = $simbol;
        $data['kaldik'] = $kaldik;
        $this->load->view('KBM/kaldik', $data);
    }
    function kurikulum(){
        $this->load->view('KBM/kurikulum');
    }
    function presensi(){
        $siswaperkelas = $this->M_data->getSiswaKelas(1, 1);
        $data['siswaperkelas'] = $siswaperkelas;
        $this->load->view('KBM/presensisiswa',$data);

    }
function tambah_kurikulum(){
    $fileName = $this->input->post('file', TRUE);

      $config['upload_path'] = './assets/kurikulum/'; 
      $config['file_name'] = $fileName;
      $config['allowed_types'] = 'doc|docx|pdf';
      $config['max_size'] = 10000;

      $this->load->library('upload', $config);
      $this->upload->initialize($config); 
  
      if (!$this->upload->do_upload('file')) {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
        redirect('Akademik/kurikulum'); 
      } else {
        $media = $this->upload->data();
        $inputFileName = 'assets/file/'.$media['file_name'];
      }
    }
  }
      ?>