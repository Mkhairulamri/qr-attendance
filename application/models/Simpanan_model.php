<?php
    class Simpanan_model extends CI_Model{
        public function tampil_data()
        {
            // memanggil usename dari database
             return $this->db->get('simpan');
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
             $this->db->insert('simpan',$data);
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
                $data = $this->db->query("SELECT * from simpan where nama like '%$cari%' ");
                return $data->result();
            }


            public function jumlah(){
                return $this->db->query("SELECT sum(jumlah) AS total from simpan where status='masuk' ");
             }

            public function next(){
                return $this->db->query("SELECT MAX(no_simpanan) AS latestId FROM simpan");
             }

            public function show_simpan(){
                $this->db->select('*');
                $this->db->from('simpan');
                $this->db->where('status','');
                return $this->db->get();
            }

            public function cetak()
            {
                $cari = $this->input->GET('cari', TRUE);
                $data = $this->db->query("SELECT * from simpan where tanggal like '%$cari%' ");
                return $data->result();
            }
    
           
    }