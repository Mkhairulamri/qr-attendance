<?php

class orangTua extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model');
		$this->load->model('Kelas_model');
		$this->load->model('User_model');
		$this->load->model('Absensi_model');
		$this->data['menu'] = 'siswa';
		if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alertdismissible fade show" role="alert"> Anda Belum Login
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
			redirect('administrator/auth');
		}
	}

	function index()
	{

		// echo json_encode($this->session->userdata()); die();
		$data = $this->siswa_model->getData($this->session->userdata['id']);

		$data = array(
			'nama'=>$data->orang_tua,
			'username' => $data->nis,
			'id' => $data->id,
			'level' => 'ortu',
			'menu' => 'dashboard'
		);

		
		$data['siswa'] = $this->Siswa_model->getAllData()->result();
		$data['kelas'] = $this->Kelas_model->getAllData()->result();
		// $data['wali'] = $this->Siswa_model->getWali()->result();
		
		$data['data'] = $this->Siswa_model->getData($data['id']);

		// var_dump($data['data']);
		// die();

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/dashboard', $data);
		$this->load->view('template_administrator/footer');
	}

	function AbsensiAnak(){

		 $data = $this->siswa_model->getData($this->session->userdata['id']);

		 // var_dump($data);
		 // die();
		 $data = array(
			'nama'=>$data->orang_tua,
			 'username' => $data->nis,
			 'id' => $data->id,
			 'level' => 'ortu',
			 'menu' => 'Absensi'
		 );
		 
		 $data['data'] = $this->Absensi_model->absensiAnak($data['id'])->result();
		 $data['user'] = $this->user_model->getData()->result();
	 
		 $this->load->view('template_administrator/header');
		 $this->load->view('template_administrator/sidebar',$data);
		 $this->load->view('administrator/Guru/laporan',$data);
		 $this->load->view('template_administrator/footer');
	}

	function UpdateQr($id){
		date_default_timezone_set("Asia/Jakarta");
		// $currentDateTime = date('dHis');
		$date = date('Y-m-d');

		$siswa = $this->Siswa_model->getData($id);

		$qr = $this->GenerateQR($siswa->nis);

		$data = array(
			'qr_code'=>$qr,
			'updated_date'=>$date
		);

		$query = $this->Siswa_model->update($data, $id);

		if ($query) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
					QR Code Penjemputan Berhasil Di Update!
					<button type="button"class="close"data-dismiss="alert"aria-label="Close">
					<spanaria-hidden="true">&times;
					</span>
					</button>
					</div>');
			redirect('OrangTua');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
					QR Code Penjemputan Berhasil Di Update !
					<button type="button"class="close"data-dismiss="alert"aria-label="Close">
					<spanaria-hidden="true">&times;
					</span>
					</button>
					</div>');
			redirect('OrangTua');
		}
	}

	function GenerateQR($nis)
	{
		$this->load->library('Ciqrcode');
		date_default_timezone_set("Asia/Jakarta");
		$date = date('Ymd');

		$save_name  = $date.$nis.'.png';

		$dir = 'assets/img/QrCode/';
		if (!file_exists($dir)) {
			mkdir($dir, 0775, true);
		}

		$config['cacheable']    = true;
		$config['imagedir']     = $dir;
		$config['quality']      = true;
		$config['size']         = '1024';
		$config['black']        = array(255, 255, 255);
		$config['white']        = array(255, 255, 255);

		$this->ciqrcode->initialize($config);

		$params['data']     = $date.$nis;
		$params['level']    = 'L';
		$params['size']     = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $save_name;

		$this->ciqrcode->generate($params);

		// var_dump($params['savename']);
		// die();

		return $save_name;
	}

}
?>
