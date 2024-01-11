<?php
    class Dashboard extends CI_Controller{

        function __construct(){
            parent::__construct();
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
                'nama' => $data->nama,
                'level' => $data->level,
				'menu' =>'dashboard');

			date_default_timezone_set("Asia/Jakarta");
			$date = date('Y-m-d');

            $data['simpan'] = $this->simpanan_model->jumlah()->result();
            // $data['user'] = $this->user_model->jumlah()->result();
            $data['anggota'] = $this->anggota_model->jumlah()->result();
            $data['simpan'] = $this->simpanan_model->jumlah()->result();
			$data['jumlah_siswa'] = $this->siswa_model->jumlah();
			$data['jumlah_absen_masuk'] = $this->Absensi_model->jumlah($date)->num_rows();
			$data['jumlah_absen_keluar'] = $this->Absensi_model->absen_keluar($date)->num_rows();
			
            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar', $data);
            $this->load->view('administrator/dashboard',$data);
            $this->load->view('template_administrator/footer');

        } 
    }
