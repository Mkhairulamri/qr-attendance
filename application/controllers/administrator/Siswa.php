<?php

class Siswa extends CI_Controller
{

	private $data = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model');
		$this->load->model('Kelas_model');
		$this->load->model('User_model');
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
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'nama' => $data->nama,
			'id' => $data->id,
			'level' => $data->level,
			'menu' => 'siswa'
		);


		$data['siswa'] = $this->Siswa_model->getAllData()->result();
		$data['kelas'] = $this->Kelas_model->getAllData()->result();
		// $data['wali'] = $this->Siswa_model->getWali()->result();


		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/siswa/index', $data);
		$this->load->view('template_administrator/footer');
	}

	function save()
	{
		$config['upload_path']          = 'assets/img/uploads/';
		$config['allowed_types']        = 'gif|jpg|png|';
		$this->load->library('upload', $config);

		$data = array(
			'nama_siswa' => $this->input->post('nama', TRUE),
			'nis' => $this->input->post('nis', TRUE),
			'jenis_kelamin' => $this->input->post('kelamin', TRUE),
			'tanggal_lahir' => $this->input->post('tgl_lahir', TRUE),
			'kelas' => $this->input->post('kelas', TRUE),
			'orang_tua' => $this->input->post('ortu', TRUE),
			'alamat' => $this->input->post('alamat', TRUE),
			// 'qr_code' => $qr,
			'foto_ortu' => $uploadFotoOrtu,
			'foto_siswa' => $uploadFotoSiswa,
			'status' => 1
		);

		if ($_FILES != null) {
			$uploadDirectory = 'assets/img/uploads/';
			$uploadFotoOrtu = basename($_FILES['foto_ortu']['name']);
			$uploadFotoSiswa = basename($_FILES['foto_siswa']['name']);
			$uploadFileOrtu = $uploadDirectory . $uploadFotoOrtu;
			$uploadFileSiswa = $uploadDirectory . $uploadFotoSiswa;
			
	
			if (move_uploaded_file($_FILES['foto_ortu']['tmp_name'], $uploadFileOrtu)) {
				$data['foto_ortu'] = $uploadFotoOrtu;
			}
			if (move_uploaded_file($_FILES['foto_siswa']['tmp_name'], $uploadFileSiswa)) {
				$data['foto_siswa'] = $uploadFotoSiswa;
			}
		}

		// var_dump($this->upload->display_errors());
		// die();
		$query = $this->siswa_model->save($data);

		if ($query) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
					Data Siswa Berhasil Ditambahkan!
					<button type="button"class="close"data-dismiss="alert"aria-label="Close">
					<spanaria-hidden="true">&times;
					</span>
					</button>
					</div>');
			redirect('administrator/Siswa');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
					Data Gagal Gagal Ditambahkan !
					<button type="button"class="close"data-dismiss="alert"aria-label="Close">
					<spanaria-hidden="true">&times;
					</span>
					</button>
					</div>');
			redirect('administrator/Siswa');
		}
	}

	function update()
	{
		$config['upload_path']          = 'assets/img/uploads/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);

		$id = $this->input->post('id');

		$data = array(
			'nama_siswa' => $this->input->post('nama', TRUE),
			'nis' => $this->input->post('nis', TRUE),
			'jenis_kelamin' => $this->input->post('kelamin', TRUE),
			'tanggal_lahir' => $this->input->post('tgl_lahir', TRUE),
			'kelas' => $this->input->post('kelas', TRUE),
			'orang_tua' => $this->input->post('ortu', TRUE),
			'alamat' => $this->input->post('alamat', TRUE),
			// 'qr_code' => $qr,
			'status' => 1
		);

		if ($_FILES != null) {
			$uploadDirectory = 'assets/img/uploads/';
			$uploadFotoOrtu = basename($_FILES['foto_ortu']['name']);
			$uploadFotoSiswa = basename($_FILES['foto_siswa']['name']);
			$uploadFileOrtu = $uploadDirectory . $uploadFotoOrtu;
			$uploadFileSiswa = $uploadDirectory . $uploadFotoSiswa;
			
	
			if (move_uploaded_file($_FILES['foto_ortu']['tmp_name'], $uploadFileOrtu)) {
				$data['foto_ortu'] = $uploadFotoOrtu;
			}
			if (move_uploaded_file($_FILES['foto_siswa']['tmp_name'], $uploadFileSiswa)) {
				$data['foto_siswa'] = $uploadFotoSiswa;
			}
		}

		$query = $this->siswa_model->update($data, $id);

		if ($query) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
						Data Siswa Berhasil DiUpdate!
						<button type="button"class="close"data-dismiss="alert"aria-label="Close">
						<spanaria-hidden="true">&times;
						</span>
						</button>
						</div>');
			redirect('administrator/Siswa');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
						Data Gagal Gagal DiUpdate !
						<button type="button"class="close"data-dismiss="alert"aria-label="Close">
						<spanaria-hidden="true">&times;
						</span>
						</button>
						</div>');
			redirect('administrator/Siswa');
		}
	}

	function hapus($id)
	{
		$query = $this->siswa_model->delete($id);

		if ($query) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Data Siswa Berhasil Dihapus!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('administrator/Siswa');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Data Siswa Gagal Dihapus !
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
			redirect('administrator/Siswa');
		}
	}
	


}
