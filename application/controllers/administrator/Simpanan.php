<?php
class Simpanan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
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
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);


		// menghubungkan controller dengan model yang kita buat
		// $data['biodata'] = $this->biodata_model->tampil_data()->result();
		$id_user = $this->session->userdata('id');

		$data['jumlah'] = $this->simpanan_model->jumlah()->result();
		$data['simpan'] = $this->simpanan_model->tampil_data()->result();

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/simpanan', $data);
		$this->load->view('template_administrator/footer');
	}


	public function input()
	{
		$data1 = $this->user_model->ambil_data($this->session->userdata['username']);
		$data1 = array(
			'username' => $data1->username,
			'id' => $data1->id,
			'level' => $data1->level,
		);

		$data['anggota'] = $this->anggota_model->tampil_data()->result();
		$data['jumlah'] = $this->simpanan_model->next()->result();

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data1);
		// memanggil View, namun kita menambahkan $data untuk membawa data dari model ke dalam View, sehingga $data dalam view merupakan sebuah array yang berisi data dari model
		$this->load->view('administrator/tambah_simpan', $data);
		$this->load->view('template_administrator/footer');
	}

	public function input_aksi()
	{

		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->input();
		} else {
			$data = array(
				'id_simpanan' => $this->input->post('id_simpanan', TRUE),
				'nama' => $this->input->post('nama', TRUE),
				'no_simpanan' => $this->input->post('no_simpanan', TRUE),
				'tanggal' => $this->input->post('tanggal', TRUE),
				'jam' => $this->input->post('jam', TRUE),
				'jenis' => $this->input->post('jenis', TRUE),
				'status' => $this->input->post('status', TRUE),
				'jumlah' => $this->input->post('jumlah', TRUE),
			);


			$this->simpanan_model->input_data($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
        Data Simpanan Berhasil Ditambahkan!
        <button type="button"class="close"data-dismiss="alert"aria-label="Close">
        <spanaria-hidden="true">&times;
        </span>
        </button>
        </div>');
			redirect('administrator/simpanan');
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required', ['required' => 'Nama Wajib Di Isi!']);
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required', ['required' => 'Tanggal Wajib Di Isi!']);
		$this->form_validation->set_rules('jumlah', 'jumlah', 'required', ['required' => 'Jumlah Wajib Di Isi!']);
		$this->form_validation->set_rules('jenis', 'jenis', 'required', ['required' => 'Jenis Wajib Di Isi!']);
	}


	public function update($id)
	{
		$data1 = $this->user_model->ambil_data($this->session->userdata['username']);
		$data1 = array(
			'username' => $data1->username,
			'level' => $data1->level,
		);

		$where = array('id_simpanan' => $id);
		$data['anggota'] = $this->anggota_model->tampil_data()->result();
		$data['simpanan'] = $this->simpanan_model->edit_data($where, 'simpan')->result();
		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data1);
		$this->load->view('administrator/update_simpan', $data);
		$this->load->view('template_administrator/footer');
	}

	public function update_aksi()
	{
		// menangkap data yang dimasukkan kedalam text_update
		$id_simpanan = $this->input->post('id_simpanan'); // method post untuk mengambil data
		$nama = $this->input->post('nama');
		$no_simpanan = $this->input->post('no_simpanan');
		$tanggal = $this->input->post('tanggal');
		$jenis = $this->input->post('jenis');
		$jumlah = $this->input->post('jumlah');

		// masukkan kedalam variabel data kemudian masuk kedalam array
		$data = array(
			'nama' => $nama,
			'no_simpanan' => $no_simpanan,
			'tanggal' => $tanggal,
			'jenis' => $jenis,
			'jumlah' => $jumlah
		);
		// variabel where untuk mengubah id nya menjadi array
		$where = array('id_simpanan' => $id_simpanan);
		// masukkan data kedalam tabel text melalui text_model
		// update_data merupakan function dari text_model
		$this->simpanan_model->update_data($where, $data, 'simpan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alertdismissible fade show" role="alert">Data Simpanan Berhasil Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('administrator/simpanan');
	}


	public function delete($id)
	{
		$where = array('id_simpanan' => $id);
		$this->simpanan_model->hapus_data($where, 'simpan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alertdismissible fade show" role="alert">Data simpanan Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('administrator/simpanan');
	}


	public function hasil()
	{
		$data1 = $this->user_model->ambil_data($this->session->userdata['username']);
		$data1 = array(
			'username' => $data1->username,
			'level' => $data1->level,
		);
		$data2['cari'] = $this->simpanan_model->cari();
		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data1);
		$this->load->view('administrator/simpanan_cari', $data2);
		$this->load->view('template_administrator/footer');
	}

	public function laporan()
	{
		// echo json_encode($this->session->userdata()); die();
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);


		// menghubungkan controller dengan model yang kita buat
		// $data['biodata'] = $this->biodata_model->tampil_data()->result();
		$id_user = $this->session->userdata('id');

		$data['jumlah'] = $this->simpanan_model->jumlah()->result();
		$data['simpan'] = $this->simpanan_model->tampil_data()->result();

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/laporan', $data);
		$this->load->view('template_administrator/footer');
	}

	public function export_excel()
	{
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'level' => $data->level,
		);


		$data = array(
			'title' => 'Rekap_Data_Simpanan',
			'simpan' => $this->excel_model->listing()
		);
		$data['jumlah'] = $this->simpanan_model->jumlah()->result();
		$this->load->view('administrator/laporan_excel', $data);
	}

	public function hasil_tahun()
	{
		$data1 = $this->user_model->ambil_data($this->session->userdata['username']);
		$data1 = array(
			'username' => $data1->username,
			'level' => $data1->level,
		);
		$data1['title'] = "Data Rekap";
		$data2 = array('title' => 'Data_Rekap_Simpanan');
		$data2['simpan'] = $this->simpanan_model->cetak();
		$data2['jumlah'] = $this->simpanan_model->jumlah()->result();


		$this->load->view('administrator/laporan_excel', $data2);
	}
}
