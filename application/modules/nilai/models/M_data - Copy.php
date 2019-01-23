<?php
class M_data extends CI_Model{
	function getNilai(){
		return $this->db->query("SELECT * FROM nilai_siswa n JOIN kategori_nilai k ON n.kategori_nilai_id=k.id_kategorinilai JOIN jenis_nilai_akhir j ON n.jenis_na_id=j.id_jenis_na JOIN mapel m ON n.mapel_id=m.id_namamapel JOIN siswa s ON n.NISN=s.nisn");
	}
	function getDeskripsinilai(){
		return $this->db->query("SELECT * FROM deskripsi_nilai");
	}
	function getNamasiswa(){
		return $this->db->query("SELECT * FROM siswa s JOIN siswa_kelas_reguler_berjalan k ON s.nisn=k.nisn");
	}
	function getSiswaKelas($id_kelas_reguler, $id_tahun_ajaran){
		$this->db->join('siswa_kelas_reguler_berjalan', 'siswa_kelas_reguler_berjalan.nisn = siswa.nisn');
		$this->db->join('kelas_reguler_berjalan', 'siswa_kelas_reguler_berjalan.id_kelas_reguler_berjalan = kelas_reguler_berjalan.id_kelas_reguler_berjalan');
		$this->db->where('kelas_reguler_berjalan.id_kelas_reguler', $id_kelas_reguler);
		$this->db->where('kelas_reguler_berjalan.id_tahun_ajaran', $id_tahun_ajaran);
		return $this->db->get('siswa')->result();
	}

	function getKategorinilai(){
		return $this->db->query("SELECT * FROM kategori_nilai");
	}

	function getJenisnilai(){
		return $this->db->query("SELECT * FROM jenis_nilai_akhir");
	}

	function getMapel(){
		return $this->db->query("SELECT * FROM mapel ");
	}

	function getMatapelajaran($where = array()){
		$this->db->join('mapelkkm', 'mapelkkm.id_namamapel = mapel.id_namamapel');
		$this->db->join('kelas_reguler', 'mapelkkm.id_kelas_reguler = kelas_reguler.id_kelas_reguler');
		$this->db->where($where);
		return $this->db->get("mapel")->result();
	}

	function getKatNilai() {
		return $this->db->get('kategori_nilai')->result();
	}

	function getNilaiSiswa($where = array()) {
		$this->db->select('(AVG(Nilai_siswa) * bobot) / 100 AS nilai');
		$this->db->join('kategori_nilai', 'nilai_siswa.kategori_nilai_id = kategori_nilai.id_kategorinilai');
		$this->db->where($where);
		return $this->db->get("nilai_siswa")->row();
	}

	function getKelas(){
		return $this->db->query("SELECT * FROM kelas_reguler_berjalan k JOIN kelas_reguler r ON k.id_kelas_reguler=r.id_kelas_reguler");
	}

	function setkategorinilai(){
		$this->db->insert('kategori_nilai',$data);
	}
	function editnilai($data,$id){
		
		
		$this->db->where('id_nilai_siswa',$id);
		$this->db->update('nilai_siswa',$data);
	}
	function editkategorinilai($data,$id){
		
		
		$this->db->where('id_kategorinilai',$id);
		$this->db->update('kategori_nilai',$data);
	}

	function editdesknilai($data,$id){
		
		
		$this->db->where('id_deskripsi',$id);
		$this->db->update('deskripsi_nilai',$data);
	}
	
	function editjenisnilai($data,$id){
		
		
		$this->db->where('id_jenis_na',$id);
		$this->db->update('jenis_nilai_akhir',$data);
	}
	
	public function selectNilai($id)
	{
		$this->db->where('id_nilai_siswa', $id);
		return $this->db->get('nilai_siswa')->row(); 
	}

	public function selectKatnilai($id)
	{
		$this->db->where('id_kategorinilai', $id);
		return $this->db->get('kategori_nilai')->row(); 
	}
	public function selectDesknilai($id)
	{
		$this->db->where('id_deskripsi', $id);
		return $this->db->get('deskripsi_nilai')->row(); 
	}

	public function selectJenisnilai($id)
	{
		$this->db->where('id_jenis_na', $id);
		return $this->db->get('jenis_nilai_akhir')->row(); 
	}

	function tambahdata($data,$table){
		$this->db->insert($table,$data);
	}

	function tambahdatabatch($data,$table){
		$this->db->insert_batch($table,$data);
	}

	function hapusdata($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	

	function getkaldik($tgl_awal, $tgl_akhir){
		$this->db->where("tgl_awal>='$tgl_awal' AND tgl_awal<='$tgl_akhir' OR tgl_akhir>='$tgl_awal' AND tgl_akhir<='$tgl_akhir'");
		return $this->db->get('kaldik')->result();
	}
}
?>