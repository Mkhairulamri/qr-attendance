<?php
class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$data['menu'] = 'user'; 
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
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'nama' => $data->nama,
			'level' => $data->level,
			'menu'=>'user',
		);
		$this->load->model('user_model');

		$data['user'] = $this->user_model->getData()->result();

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/User/Index', $data);
		$this->load->view('template_administrator/footer');
	}

	function save(){

		$password = $password = md5('password');;

		$data = array(
			'nama' => $this->input->post('nama', TRUE),
			'username' => $this->input->post('username', TRUE),
			'no_hp' => $this->input->post('nohp', TRUE),
			'level' =>$this->input->post('level',TRUE),
			'email' =>$this->input->post('email',TRUE),
			'password' => $password
		);

		// var_dump($data);
		// die();

		$query = $this->user_model->save($data);

		if($query){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
			Data Kelas Berhasil Disimpan!
			<button type="button"class="close"data-dismiss="alert"aria-label="Close">
			<spanaria-hidden="true">&times;
			</span>
			</button>
			</div>');
			redirect('administrator/User');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
			Data Kelas Gagal Disimpan !
			<button type="button"class="close"data-dismiss="alert"aria-label="Close">
			<spanaria-hidden="true">&times;
			</span>
			</button>
			</div>');
			redirect('administrator/User');
		}
	}

	function update(){

		$id = $this->input->post('id');
		$password = $password = md5($this->input->post('password'));;

		$data = array(
			'nama' => $this->input->post('nama', TRUE),
			'username' => $this->input->post('username', TRUE),
			'no_hp' => $this->input->post('nohp', TRUE),
			'level' =>$this->input->post('level',TRUE),
			'email' =>$this->input->post('email',TRUE),
			'password' => $password
		);

		// var_dump($id);
		// die();

		$query = $this->user_model->update($id, $data);

		if($query){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
			Data Kelas Berhasil Diupdate!
			<button type="button"class="close"data-dismiss="alert"aria-label="Close">
			<spanaria-hidden="true">&times;
			</span>
			</button>
			</div>');
			redirect('administrator/User');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
			Data Kelas Gagal DiUpdate !
			<button type="button"class="close"data-dismiss="alert"aria-label="Close">
			<spanaria-hidden="true">&times;
			</span>
			</button>
			</div>');
			redirect('administrator/User');
		}
	}

	function hapus($id){
		$query = $this->user_model->delete($id);

		if($query){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
			Data User Berhasil Dihapus!
			<button type="button"class="close"data-dismiss="alert"aria-label="Close">
			<spanaria-hidden="true">&times;
			</span>
			</button>
			</div>');
			redirect('administrator/User');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
			Data User Gagal Dihapus !
			<button type="button"class="close"data-dismiss="alert"aria-label="Close">
			<spanaria-hidden="true">&times;
			</span>
			</button>
			</div>');
			redirect('administrator/User');
		}
	}

	public function profil()
	{

		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'nama' => $data->nama,
			'id' => $data->id,
			'level' => $data->level,
			'menu'=>'profil'
		);


		$id_user = $this->session->userdata('id');

		$data['user'] = $this->user_model->ambil_id($id_user)->result();

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/profil', $data);
		$this->load->view('template_administrator/footer');
	}

	public function edit_profil($id)
	{
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'id' => $data->id,
			'level' => $data->level,
		);

		$where = array('id' => $id);
		$data['user'] = $this->user_model->edit_data($where, 'user')->result();
		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/edit_profil', $data);
		$this->load->view('template_administrator/footer');
	}

	public function input()
	{
		$data1 = $this->user_model->ambil_data($this->session->userdata['username']);
		$data1 = array(
			'username' => $data1->username,
			'level' => $data1->level,
		);
		$data = array(
			'id_user' => set_value('id_user'),
			'nama' => set_value('nama'),
			'alamat' => set_value('alamat'),
			'email' => set_value('email'),
			'no_hp' => set_value('no_hp'),
		);
		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data1);
		// memanggil View, namun kita menambahkan $data untuk membawa data dari model ke dalam View, sehingga $data dalam view merupakan sebuah array yang berisi data dari model
		$this->load->view('administrator/tambah_user', $data);
		$this->load->view('template_administrator/footer');
	}

	public function input_aksi()
	{
		$cek = $this->db->query("SELECT * FROM user where username='" . $this->input->post('username') . "'")->num_rows();
		if ($cek <= 0) {
			$this->_rules();
			if ($this->form_validation->run() == TRUE) {
				$this->input();
				$data = array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password')),
					'email' => $this->input->post('email'),
					'level' => $this->input->post('level'),
					'blokir' => $this->input->post('blokir'),
				);
				$this->user_model->input_data($data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alertdismissible fade show" role="alert">Registrasi Berhasil Silakan Login!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('administrator/user');
			} else {
				$data1 = $this->user_model->ambil_data($this->session->userdata['username']);
				$data1 = array(
					'username' => $data1->username,
					'level' => $data1->level,
				);
				$this->session->set_flashdata('pesan_user', '<div class="alert alert-danger alertdismissible fade show" role="alert">Registrasi Gagal Username Sudah Ada!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

				$this->load->view('template_administrator/header');
				$this->load->view('template_administrator/sidebar', $data1);
				// memanggil View, namun kita menambahkan $data untuk membawa data dari model ke dalam View, sehingga $data dalam view merupakan sebuah array yang berisi data dari model
				$this->load->view('administrator/tambah_user', $data1);
				$this->load->view('template_administrator/footer');
			}
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username wajib diisi!']);
		$this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password wajib diisi!']);
		$this->form_validation->set_rules('email', 'email', 'required', ['required' => 'Email wajib diisi!']);
		$this->form_validation->set_rules('level', 'level', 'required', ['required' => 'Level wajib diisi!']);
		$this->form_validation->set_rules('blokir', 'blokir', 'required', ['required' => 'Blokir wajib diisi!']);
	}
	
	public function update_aksi()
	{
		// menangkap data yang dimasukkan kedalam text_update
		$id = $this->input->post('id'); // method post untuk mengambil data
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		if ($password == NULL) {
			$password = md5($this->input->post('passwordold'));
		}

		$email = $this->input->post('email');
		$level = $this->input->post('level');
		$blokir = $this->input->post('blokir');

		// masukkan kedalam variabel data kemudian masuk kedalam array
		$data = array(
			'nama' => $username,
			'password' => $password,
			'email' => $email,
			'level' => $level,
			'blokir' => $blokir
		);
		// variabel where untuk mengubah id nya menjadi array
		$where = array('id' => $id);
		// masukkan data kedalam tabel text melalui text_model
		// update_data merupakan function dari text_model
		$this->user_model->update_data($where, $data, 'user');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alertdismissible fade show" role="alert">Data User Berhasil Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('administrator/user');
	}

	public function edit_aksi()
	{
		// menangkap data yang dimasukkan kedalam text_update
		$id = $this->input->post('id'); // method post untuk mengambil data
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		if ($password == NULL) {
			$password = md5($this->input->post('passwordold'));
		}

		$email = $this->input->post('email');
		$level = $this->input->post('level');
		$blokir = $this->input->post('blokir');

		// masukkan kedalam variabel data kemudian masuk kedalam array
		$data = array(
			'username' => $username,
			'password' => $password,
			'email' => $email,
			'level' => $level,
			'blokir' => $blokir
		);
		// variabel where untuk mengubah id nya menjadi array
		$where = array('id' => $id);
		// masukkan data kedalam tabel text melalui text_model
		// update_data merupakan function dari text_model
		$this->user_model->update_data($where, $data, 'user');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alertdismissible fade show" role="alert">Data User Berhasil Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('administrator/user/profil');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->user_model->hapus_data($where, 'user');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alertdismissible fade show" role="alert">Data User Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('administrator/user');
	}

	function updatePassword(){
		// var_dump($this->input->post());
		// die();
		$oldPass = $this->input->post('lama');
		$newPass = $this->input->post('baru1');
		$confirmPass = $this->input->post('baru2');

		$cekPass = $this->user_model->getDataId($this->input->post('id'));

		if($cekPass->password == md5($oldPass)){

			if($newPass == $confirmPass ){
				$data = array(
					'password'=>md5($confirmPass)
				);
				$updatePass = $this->user_model->update($this->input->post('id'),$data);

				if($updatePass){
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
					Update Password anda Berhasil!
					<button type="button"class="close"data-dismiss="alert"aria-label="Close">
					<spanaria-hidden="true">&times;
					</span>
					</button>
					</div>');
					redirect('administrator/user/profil');
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
					Update Password anda Gagal!
					<button type="button"class="close"data-dismiss="alert"aria-label="Close">
					<spanaria-hidden="true">&times;
					</span>
					</button>
					</div>');
					redirect('administrator/user/profil');
				}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Konfirmasi Password anda Salah, Mohon Samakan Passwrod baru dan Konfirmasi Password!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/user/profil');

			}
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
					Password Salah, Masukkan Password lama anda dengan benar!
					<button type="button"class="close"data-dismiss="alert"aria-label="Close">
					<spanaria-hidden="true">&times;
					</span>
					</button>
					</div>');
			redirect('administrator/user/profil');
		}

	}
	function updateProfil(){
		// var_dump($this->input->post());
		// die();

		$data = array(
			'nama'=>$this->input->post('nama'),
			'username'=>$this->input->post('username'),
			'email'=>$this->input->post('email'),
			'no_hp'=>$this->input->post('nohp')
		);

		$query = $this->user_model->update($this->input->post('id'),$data);

		if($query){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
			Update Profil Berhasil!
			<button type="button"class="close"data-dismiss="alert"aria-label="Close">
			<spanaria-hidden="true">&times;
			</span>
			</button>
			</div>');
			redirect('administrator/user/profil');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
			Update Profil Gagal!
			<button type="button"class="close"data-dismiss="alert"aria-label="Close">
			<spanaria-hidden="true">&times;
			</span>
			</button>
			</div>');
			redirect('administrator/user/profil');
		}
	}
}
?>
