<?php
    class Anggota_model extends CI_Model{
        public function tampil_data()
        {
            // memanggil usename dari database
             return $this->db->get('anggota');
        }

        function join2table($id){
            $this->db->select('*');
            $this->db->from('user');
            $this->db->join('syarat','syarat.id = user.id');
            $this->db->where('syarat.id', $id);      
            $query = $this->db->get();
            return $query;
         }

    public function input_data($data)
        {
            // insert data ke tabel jurusan
             $this->db->insert('anggota',$data);
        }
        public function edit_data($where,$table)
            {
        // untuk menampilkan data dari tabel text, karena datanya sudah di input sebelumnya
            return $this->db->get_where($table,$where);
            }
        public function update_data($where,$data,$table)
            {
            $this->db->where($where);
            $this->db->update($table,$data);
            }
            public function hapus_data($where,$table)
            {
            $this->db->where($where);
            $this->db->delete($table);
            }

           
        public function search($keyword){
                $this->db->select('*');
                $this->db->from('simpan');
                $this->db->like('nama',$keyword);
                $this->db->or_like('nisn',$keyword);
                return $this->db->get()->result();
            }

            public function cari()
            {
                $cari = $this->input->GET('cari', TRUE);
                $data = $this->db->query("SELECT * from anggota where nama like '%$cari%' ");
                return $data->result();
            }

            public function show_hadir(){
                $this->db->select('*');
                $this->db->from('guru');
                $this->db->where('status','Hadir');
                return $this->db->get();
            }

            public function jumlah(){
                return $this->db->query("SELECT count(nama) AS total from anggota");
             }

            public function riwayat_data()
             {
                 // memanggil usename dari database
                  return $this->db->get('riwayat');
             }

            public function riwayat($data)
             {
                 // insert data ke tabel jurusan
                  $this->db->insert('riwayat',$data);
             }
       

            
    }