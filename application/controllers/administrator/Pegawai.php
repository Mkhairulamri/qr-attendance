<?php
    class Pegawai extends CI_Controller{

        function __construct(){
            parent::__construct();
			$this->load->model('Kelas_model');
			$this->load->model('User_model');
			$this->load->model('Absensi_model');
            if (!isset($this->session->userdata['username'])) {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alertdismissible fade show" role="alert"> Anda Belum Login
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('administrator/auth');
                }
            }
			
        public function index(){

            $data = $this->user_model->ambil_data($this->session->userdata['username']);
            $data = array(
				'nama'=>$data->nama,
                'username' => $data->username,
                'level' => $data->level,
				'menu' => 'qr'
			);

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar', $data);
            $this->load->view('administrator/Pegawai/Scan',$data);
            $this->load->view('template_administrator/footer');
        } 

	
		
		
		public function Siswa(){
			$data = $this->user_model->ambil_data($this->session->userdata['username']);
			// $kelas = $this->Kelas_model->ambil_kelas_id_siswa($id);

			$data = array(
                'username' => $data->username,
				'nama'=> $data->nama,
                'level' => $data->level,
				'menu' => 'Siswa',
				'kelas' => ''

			);

			$data['data'] = $this->siswa_model->getAllData()->result();

			
			date_default_timezone_set("Asia/Jakarta");
			$date = date('Y-m-d');

			$data['absensi'] = $this->Absensi_model->getSiswaDaily($date)->result();
			// var_dump($data['absensi']);
			// die();

			$this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar', $data);
            $this->load->view('administrator/Pegawai/Siswa',$data);
            $this->load->view('template_administrator/footer');	

		}
		
    }
