<?php
    class Status_model extends CI_Model{
       
        public function ambil_data($id){
            //memanggil username dari database
            $this->db->where('syarat',$id);
            //mengambil data dari tabel user
            return $this->db->get('syarat')->row();
        }

        function join2table($id){
            $this->db->select('*');
            $this->db->from('user');
            $this->db->join('biodata','biodata.id = user.id');
            $this->db->where('biodata.id', $id);      
            $query = $this->db->get();
            return $query;
         }


        public function tampil_data()
        {
            // memanggil usename dari database
             return $this->db->get('syarat');

        }

    public function input_data($data)
        {
            // insert data ke tabel jurusan
             $this->db->insert('status',$data);
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
    }