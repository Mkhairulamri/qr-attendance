<?php
class User_model extends CI_Model
{
	public function ambil_data($id)
	{
		//memanggil username dari database
		$this->db->where('username', $id);
		//mengambil data dari tabel user
		return $this->db->get('user')->row();
	}
	
	public function getDataId($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('user')->row();
	}

	public function getData(){
		return $this->db->get('user');
	}

	public function save($data)
	{
		return $this->db->insert('user', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id',$id);
		return $this->db->update('user', $data);
	}

	public function delete($id){
		$this->db->where('id',$id);
		return $this->db->delete('user');
	}

	public function getWali(){
		$this->db->from('user');
		$this->db->where('level', 'Wali');
		$query = $this->db->get();
		return $query;
	}

	function ambil_id($id)
	{

		$this->db->select('*');
		$this->db->from('user', 'user.id');
		$this->db->where('user.id', $id);
		$query = $this->db->get();
		return $query;
	}

	function login_ortu($nis, $tgl){
		$this->db->from('mst_siswa');
		$this->db->where('nis',$nis);
		$this->db->where('tanggal_lahir',$tgl);
		return $this->db->get()->row();
	}
}
