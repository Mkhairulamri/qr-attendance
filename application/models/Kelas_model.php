<?php
class Kelas_model extends CI_Model
{

	public function getAllData()
	{
		$this->db->select('*');
		$this->db->from('mst_kelas');
		$query = $this->db->get();
		return $query;
	}

	public function save($data)
	{
		return $this->db->insert('mst_kelas', $data);
	}

	public function update($data, $id){
		$this->db->where('id_kelas',$id);
		return $this->db->update('mst_kelas',$data);
	}

	public function delete($id){
		$this->db->where('id_kelas',$id);
		return $this->db->delete('mst_kelas');
	}

	function join2table()
	{
		$this->db->select('*');
		$this->db->from('mst_kelas');
		$query = $this->db->get();
		return $query;
	}

	public function input_data($data)
	{
		return $this->db->insert('mst_kelas', $data);
	}
	
	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function getKelasWali($id){
		$this->db->select('*');
		$this->db->from('mst_kelas');
		$this->db->where('user.id',$id);
		$query = $this->db->get();
		return $query;
	}

	
	public function getSiswaKelas($id){
		$this->db->select('*');
		$this->db->from('mst_siswa');
		$this->db->where('mst_siswa.id',$id);
		$this->db->join('mst_kelas', 'mst_kelas.id_kelas = mst_siswa.kelas');
		$query = $this->db->get();
		return $query;
	}

	function ambil_kelas_id_siswa($idKelas){
		$this->db->select('nama_kelas');
		$this->db->from('mst_kelas');
		$this->db->where('id_kelas',$idKelas);
		$query = $this->db->get()->row();;
		return $query;
	}

}
