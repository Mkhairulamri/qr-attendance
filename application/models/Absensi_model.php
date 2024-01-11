<?php
class Absensi_model extends CI_Model
{

	public function getAllData()
	{
		$this->db->select('*');
		$this->db->from('mst_absensi');
		$this->db->join('mst_siswa','mst_siswa.id = mst_absensi.id_siswa');
		$this->db->join('mst_kelas', 'mst_siswa.kelas = mst_kelas.id_kelas');
		$query = $this->db->get();
		return $query;
	}

	public function save($data)
	{
		return $this->db->insert('mst_absensi', $data);
	}

	function getSiswaDaily($date){
		$this->db->select('*');
		$this->db->from('mst_absensi');
		$this->db->where('mst_absensi.tanggal_absensi',$date);
		$query = $this->db->get();
		return $query;
	}

	public function delete($id){
		$this->db->where('id_kelas',$id);
		return $this->db->delete('mst_kelas');
	}

	function join2table()
	{
		$this->db->select('*');
		$this->db->from('mst_kelas');
		$this->db->join('user', 'mst_kelas.id_kelas = user.id');
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

	public function getSiswaKelas($id){
		$this->db->select('*');
		$this->db->from('mst_siswa');
		$this->db->where('kelas',$id);
		$this->db->join('mst_kelas', 'mst_kelas.id_kelas = mst_siswa.kelas');
		$query = $this->db->get();
		return $query;
	}

	public function updateData($data, $id, $date){
		$this->db->from('mst_absensi');
		$this->db->where('id_siswa',$id);
		$this->db->where('tanggal_absensi', $date);
		return $this->db->update('mst_absensi',$data);
		// var_dump($this->db->get()->result());
		// die();
	}

	function jumlah($date){
		$this->db->from('mst_absensi');
		$this->db->where('tanggal_absensi',$date);
		$this->db->join('mst_siswa','mst_siswa.id = mst_absensi.id_siswa');
		return $this->db->get();
	}

	function absen_keluar($date){
		$this->db->select('*');
		$this->db->from('mst_absensi');
		$this->db->where('tanggal_absensi',$date);
		$this->db->where('absen_keluar IS NULL', null, false);
		$this->db->join('mst_siswa','mst_siswa.id = mst_absensi.id_siswa');
		return $this->db->get();
	}

	function cekAbsensi($nis, $date){
		$this->db->from('mst_absensi');
		$this->db->join('mst_siswa','mst_siswa.id = mst_absensi.id_siswa');
		$this->db->where('mst_siswa.nis',$nis);
		$this->db->where('mst_absensi.tanggal_absensi',$date);
		return $this->db->get();
	}

	function absensiAnak($id){
		$this->db->from('mst_absensi');
		$this->db->where('mst_absensi.id_siswa',$id);
		$this->db->join('mst_siswa','mst_siswa.id = mst_absensi.id_siswa');
		$this->db->join('mst_kelas', 'mst_siswa.kelas = mst_kelas.id_kelas');
		$query = $this->db->get();
		return $query;
	}

	function laporan($start,$end){
		$this->db->select('*');
		$this->db->from('mst_absensi');
		$this->db->where('tanggal_absensi >=',$start);
		$this->db->where('tanggal_absensi <=',$end);
		$this->db->join('mst_siswa','mst_siswa.id = mst_absensi.id_siswa');
		$this->db->join('mst_kelas','mst_siswa.kelas = mst_kelas.id_kelas');
		return $this->db->get();
	}
}
