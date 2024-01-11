<?php

	class Kelas extends CI_Controller {
		
		private $data = [];

		function __construct(){
            parent::__construct();
			$this->load->model('Kelas_model');
			$this->load->model('User_model');
			$this->data['menu'] = 'kelas';
            if (!isset($this->session->userdata['username'])) {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alertdismissible fade show" role="alert"> Anda Belum Login
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('administrator/auth');
            }
        }

		function index(){
			// echo json_encode($this->session->userdata()); die();
			$data = $this->user_model->ambil_data($this->session->userdata['username']);
			$data = array(
				'nama' => $data->nama,
				'id' => $data->id,
				'level' => $data->level,
				'menu'=>'kelas'
			);


			$data['data'] = $this->Kelas_model->getAllData()->result();
			$data['wali'] = $this->User_model->getWali()->result();

			// var_dump($data);
			// die();

			$this->load->view('template_administrator/header');
			$this->load->view('template_administrator/sidebar', $data);
			$this->load->view('administrator/kelas/index', $data);
			$this->load->view('template_administrator/footer');
		}

		function save(){
			$data = array(
				'nama_kelas' => $this->input->post('kelas', TRUE),
				'wali_kelas' => $this->input->post('wali', TRUE)
			);

			$query = $this->Kelas_model->save($data);

			if($query){
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Data Kelas Berhasil Disimpan!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/Kelas');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Data Kelas Gagal Disimpan !
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/Kelas');
			}
		}

		function update(){
			$data = array(
				'nama_kelas' => $this->input->post('kelas', TRUE),
				'wali_kelas' => $this->input->post('wali', TRUE)
			);

			
			$query = $this->Kelas_model->update($data,$this->input->post('id'));
			
			// var_dump($query);
			// die();

			if($query){
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Data Kelas Berhasil DiUpdate!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/Kelas');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Data Kelas Gagal DiUpdate !
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/Kelas');
			}
		}

		function hapus($id){
			$query = $this->Kelas_model->delete($id);

			if($query){
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
				Data Kelas Berhasil Dihapus!
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/Kelas');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
				Data Kelas Gagal Dihapus !
				<button type="button"class="close"data-dismiss="alert"aria-label="Close">
				<spanaria-hidden="true">&times;
				</span>
				</button>
				</div>');
				redirect('administrator/Kelas');
			}
		}

	}

?>
