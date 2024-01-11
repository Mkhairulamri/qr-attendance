<?php
    class Guru extends CI_Controller{

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
        public function qr(){

            $data = $this->user_model->ambil_data($this->session->userdata['username']);
            $data = array(
                'nama' => $data->nama,
                'level' => $data->level,
				'menu' => 'qr'
			);

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar', $data);
            $this->load->view('administrator/Guru/Index',$data);
            $this->load->view('template_administrator/footer');

        } 

		public function kelas(){
			$data = $this->user_model->ambil_data($this->session->userdata['username']);
			$id = $data->id;
            $data = array(
                'nama' => $data->nama,
				'nama'=> $data->nama,
                'level' => $data->level,
				'menu' => 'kelas'
			);

			$data['data'] = $this->Kelas_model->getKelasWali($id)->result();

			// var_dump($data['data']);
			// die();

			$this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar', $data);
            $this->load->view('administrator/Guru/Kelas',$data);
            $this->load->view('template_administrator/footer');

		}

		public function SiswaKelas($id){
			$data = $this->user_model->ambil_data($this->session->userdata['username']);
			$kelas = $this->Kelas_model->ambil_kelas_id_siswa($id);


			$data = array(
                'username' => $data->username,
				'nama'=> $data->nama,
                'level' => $data->level,
				'menu' => 'kelas',
				'kelas' => $kelas->nama_kelas

			);

			$data['data'] = $this->Kelas_model->getSiswaKelas($id)->result();

			$date = date('Y-m-d');

			$data['absensi'] = $this->Absensi_model->getSiswaDaily($date)->result();
			// var_dump($data['absensi']);
			// die();

			$this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar', $data);
            $this->load->view('administrator/Guru/Siswa',$data);
            $this->load->view('template_administrator/footer');	
		}

		function absen_masuk($nis){

			$siswa = $this->siswa_model->getData($nis);
			$data = $this->user_model->ambil_data($this->session->userdata['username']);
			$kelas = $this->kelas;

			date_default_timezone_set("Asia/Jakarta");
			$date = date('Y-m-d');
			$time = date('h:i:sa');

			$data = array(
				'id_siswa' => $siswa->id,				
				'tanggal_absensi' => $date,
				'absen_masuk' => $time,
				'insert_by' =>$data->id
			);
	
			// var_dump($data);
			// die();
	
			$query = $this->Absensi_model->save($data);
	
			if($query){
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Data Absensi Siswa Berhasil Disimpan!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/Guru/Siswa');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Data Absensi Gagal Disimpan !
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');				
				redirect('administrator/Guru/Siswa/');

			}
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
            $this->load->view('administrator/Guru/Siswa',$data);
            $this->load->view('template_administrator/footer');	
		}


		function LaporanGuru(){
			$data = $this->user_model->ambil_data($this->session->userdata['username']);
			
			$data = array(
                'username' => $data->username,
				'nama'=> $data->nama,
                'level' => $data->level,
				'menu' => 'Laporan',
				// 'kelas' => $kelas->nama_kelas
			);

			$data['data'] = $this->Absensi_model->getAllData()->result();

			
			$data['user'] = $this->user_model->getData()->result();
			// $date = date('dd-mm-yyyy');

			// $data['absesnsi'] = $this->Absensi_model->getSiswaDaily($date)->result();
			// var_dump($data['kelas']);
			// die();

			$this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar', $data);
            $this->load->view('administrator/Guru/Laporan',$data);
            $this->load->view('template_administrator/footer');
		}

		function ScanQr(){
			$data = $this->user_model->ambil_data($this->session->userdata['username']);
            $data = array(
                'nama' => $data->nama,
                'level' => $data->level,
				'menu' => 'qr'
			);

            $this->load->view('template_administrator/header');
            $this->load->view('template_administrator/sidebar', $data);
            $this->load->view('administrator/Pegawai/Scan',$data);
            $this->load->view('template_administrator/footer');
		}
    }
