 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_passing_grade extends CI_Model {

	public function get()
	{
		$this->db->order_by('id_grade desc');
		return $this->db->get('passing_grade')->result(); 
	}

	public function get_passing_grade($id_tahun_ajaran)
	{
		$this->db->where('id_tahun_ajaran', $id_tahun_ajaran);
		$this->db->order_by('id_grade desc');
		return $this->db->get('passing_grade')->result(); 
	}

	public function insert($data) {
		$this->db->insert('passing_grade', $data);
	}

	public function select($id)
	{
		$this->db->where('id_grade', $id);
		return $this->db->get('passing_grade')->row(); 
	}

	public function update($data, $id) {
		$this->db->where('id_grade', $id);
		$this->db->update('passing_grade', $data);
	}	

	public function delete($id) {
		$this->db->where('id_grade', $id);
		$this->db->delete('passing_grade');
	}	

	public function getpassingtahun($tahun_ajaran = NULL)
	{
		$this->db->join('tahunajaran', 'passing_grade.id_tahun_ajaran = tahunajaran.id_tahun_ajaran', 'left');
		if ($tahun_ajaran != NULL) {
			$this->db->where('tahunajaran.tahun_ajaran', $tahun_ajaran);
		}
		$this->db->order_by('id_grade desc');
		return $this->db->get('passing_grade')->result(); 
	}
}
