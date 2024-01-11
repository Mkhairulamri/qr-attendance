<?php
class Siswa_model extends CI_Model
{
	public function getAllData()
	{
		$this->db->select('*');
		$this->db->from('mst_siswa');
		$this->db->join('mst_kelas', 'mst_siswa.kelas = mst_kelas.id_kelas');
		$query = $this->db->get();
		return $query;
	}

	public function save($data){
		return $this->db->insert('mst_siswa', $data);
	}

	public function edit($id){
		$this->db->from('mst_siswa');
		$this->db->where('id',$id);
		return $this->db->get();
	}

	public function getData($id){
		$this->db->from('mst_siswa');
		$this->db->where('mst_siswa.id',$id);
		$this->db->join('mst_kelas','mst_kelas.id_kelas = mst_siswa.kelas');
		// $this->db->join('user','mst_kelas.wali_kelas = user.id');
		return $this->db->get()->row();
	}

	public function getDataNis($nis){
		$this->db->from('mst_siswa');
		$this->db->where('mst_siswa.nis',$nis);
		$this->db->join('mst_kelas','mst_kelas.id_kelas = mst_siswa.kelas');
		// $this->db->join('user','mst_kelas.wali_kelas = user.id');
		return $this->db->get()->row();
	}

	public function update($data,$id){
		$this->db->where('id',$id);
		return $this->db->update('mst_siswa',$data);
	}

	public function delete($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('mst_siswa');
	}
	function jumlah(){
		return $this->db->count_all('mst_siswa');
	}

}
