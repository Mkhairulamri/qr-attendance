<?php
class Absensi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Absensi_model');
		if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alertdismissible fade show" role="alert"> Anda Belum Login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
			redirect('administrator/auth');
		}
	}

	public function index()
	{
		// echo json_encode($this->session->userdata()); die();
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'nama' => $data->nama,
			'id' => $data->id,
			'level' => $data->level,
			'menu' => 'Absensi'
		);


		$data['data'] = $this->Absensi_model->getAllData()->result();
		$data['user'] = $this->user_model->getData()->result();

		

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/Guru/laporan', $data);
		$this->load->view('template_administrator/footer');
	}

	public function update_pulang()
	{

		date_default_timezone_set("Asia/Jakarta");
		$date = date('Y-m-d');
		$time = date('h:i:sa');

		$cekTgl = date('Ymd');
		$paramTgl = substr($this->input->post('nis'),0,8);
		$nis = substr($this->input->post('nis'),8);

		$user = $this->user_model->ambil_data($this->session->userdata['username']);
		$siswa = $this->siswa_model->getDataNis($nis);
		$absensi = $this->Absensi_model->cekAbsensi($nis, $paramTgl);

		// var_dump($cekTgl);
		// die();

		if($cekTgl == $paramTgl){
			if($siswa != null){
				if ($absensi->num_rows() == 0) {
					$dir = 'assets/img/penjemputan/';
					if (!file_exists($dir)) {
						mkdir($dir, 0775, true);
					}
		
					$config['upload_path']          = $dir;
					$config['allowed_types']        = 'gif|jpg|png|';
					$config['file_name'] 			= $date . '-' . $this->input->post('nis');
					$this->load->library('upload', $config);
		
		
					$upload_gambar1 = $this->upload->do_upload('penjemputan');
					$file_name = $this->upload->data('file_name');
		
					if ($upload_gambar1) {
						$data = array(
							'id_siswa' => $siswa->id,				
							'tanggal_absensi' => $date,
							'absen_masuk' => $time,
							'insert_by' =>$user->id,
							'absen_keluar' => $time,
							'updated_by' => $user->id,
							'foto_penjemputan' => $file_name
						);
					} else {
						$data = array(
							'id_siswa' => $siswa->id,				
							'tanggal_absensi' => $date,
							'absen_masuk' => $time,
							'insert_by' =>$user->id,
							'absen_keluar' => $time,
							'updated_by' => $user->id,
							'foto_penjemputan' => $file_name

						);
					}
					$query = $this->Absensi_model->save($data);
		
					if ($query) {
						$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
								Status Absensi Siswa Berhasil Berubah Menjadi Dijemput!
								<button type="button"class="close"data-dismiss="alert"aria-label="Close">
								<spanaria-hidden="true">&times;
								</span>
								</button>
								</div>');
						redirect('administrator/Pegawai');
					} else {
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
								Status Absensi Siswa Gagal Berubah Menjadi Dijemput !
								<button type="button"class="close"data-dismiss="alert"aria-label="Close">
								<spanaria-hidden="true">&times;
								</span>
								</button>
								</div>');
						redirect('administrator/Pegawai');
					}
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
						Siswa Sudah Absen Pulang Hari ini!
							<button type="button"class="close"data-dismiss="alert"aria-label="Close">
							<spanaria-hidden="true">&times;
							</span>
							</button>
							</div>');
					redirect('administrator/Pegawai');
				}	
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
						QR Code Anda Salah!
							<button type="button"class="close"data-dismiss="alert"aria-label="Close">
							<spanaria-hidden="true">&times;
							</span>
							</button>
							</div>');
					redirect('administrator/Pegawai');
			}
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
						QR Code Anda Expired, Silahkan Generate QR Untuk Hari ini!
							<button type="button"class="close"data-dismiss="alert"aria-label="Close">
							<spanaria-hidden="true">&times;
							</span>
							</button>
							</div>');
					redirect('administrator/Pegawai');
		}
	}
	function exportExcel()
	{
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'level' => $data->level,
		);

		$tanggal1 = $this->input->post('start_date');
		$tanggal2 = $this->input->post('end_date');

		$data = array('title' => 'Laporan Absensi Tanggal ' . $tanggal1 . ' Sampai ' . $tanggal2);

		$data['absensi'] = $this->Absensi_model->laporan($tanggal1, $tanggal2)->result();
		// var_dump($data);
		// die();


		$this->load->view('administrator/Report/excel', $data);
	}
}
