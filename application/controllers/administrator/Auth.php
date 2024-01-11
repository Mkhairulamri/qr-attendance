<?php
class Auth extends CI_Controller
{
	public function index()
	{
		$this->load->view('administrator/guess/login');
	}
	

	public function login_ortu()
	{
		$this->load->view('administrator/guess/login_ortu');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username wajib diisi!']);
		$this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password wajib diisi!']);
		$this->form_validation->set_rules('email', 'email', 'required', ['required' => 'Email wajib diisi!']);
	}


	public function proses_login()
	{
		//set rules username dan password yang wajib disi
		$this->form_validation->set_rules('username', 'usernname', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		//jika form validasi salah,maka kembali ke form login
		if ($this->form_validation->run() == false) {
			$this->load->view('administrator/guess/login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$user = $username;
			$pass = MD5($password);
			$cek = $this->login_model->cek_login($user, $pass);
			//apabila cocok maka akan di redirect ke dashboard
			if ($cek->num_rows() > 0) {
				//session username,email dan level untuk di tampilkan

				foreach ($cek->result() as $ck) {
					$sess_data['username'] = $ck->username;
					$sess_data['email'] = $ck->email;
					$sess_data['level'] = $ck->level;
					$sess_data['id'] = $ck->id;

					//memanggil session ses data
					$this->session->set_userdata($sess_data);
				}
				//cek level login untuk tiap aktor jika benar maka langsung masuk ke administrator
				if ($sess_data['level'] ==  'Admin') {
					redirect('administrator/dashboard');
				} else if ($sess_data['level'] == "Pegawai") {
					redirect('administrator/dashboard');
				} else if ($sess_data['level'] == 'Wali') {
					redirect('administrator/dashboard');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Username atau Password Salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                   </div>');
				redirect('administrator/auth');
			}
		}
	}

	public function process_login_ortu(){
		
		$data = $this->user_model->login_ortu($this->input->post('nis'),$this->input->post('tanggal_lahir'));
		
		// var_dump($data->nis);
		// die();

		if ($data != null) {
			$sess_data['username'] = $data->nis;
			$sess_data['email'] = 'null';
			$sess_data['level'] = 'ortu';
			$sess_data['id'] = $data->id;

			//memanggil session ses data
			// var_dump($sess_data);
			// die();
			$this->session->set_userdata($sess_data);
			redirect ('OrangTua');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				Nomor Induk Siswa Atau Tanggal Lahir Salah Salah!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			   </div>');
			redirect('administrator/auth/login_ortu');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('administrator/Auth');
	}

	
	function qr_ortu($id){

		$data['data'] = $this->siswa_model->edit($id)->result();

		

	}
}
