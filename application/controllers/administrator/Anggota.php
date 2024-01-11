<?php
class Anggota extends CI_Controller{

function __construct(){
        parent::__construct();
        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alertdismissible fade show" role="alert"> Anda Belum Login
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
        'level' => $data->level,);

    
// menghubungkan controller dengan model yang kita buat
    // $data['biodata'] = $this->biodata_model->tampil_data()->result();
    $id_user = $this->session->userdata('id');
    
    $data['anggota'] = $this->anggota_model->tampil_data()->result();
    $data['simpan'] = $this->simpanan_model->tampil_data()->result();


    $this->load->view('template_administrator/header');
    $this->load->view('template_administrator/sidebar',$data);
    $this->load->view('administrator/anggota',$data);
    $this->load->view('template_administrator/footer');

}


public function input(){
    $data1 = $this->user_model->ambil_data($this->session->userdata['username']);
    $data1 = array(
        'username' => $data1->username,
        'id' => $data1->id,
        'level' => $data1->level,);

    $this->load->view('template_administrator/header');
    $this->load->view('template_administrator/sidebar',$data1);
    // memanggil View, namun kita menambahkan $data untuk membawa data dari model ke dalam View, sehingga $data dalam view merupakan sebuah array yang berisi data dari model
    $this->load->view('administrator/tambah_anggota');
    $this->load->view('template_administrator/footer');
}


public function aksi_upload(){
    $data1 = $this->user_model->ambil_data($this->session->userdata['username']);
    $data1 = array(
        'username' => $data1->username,
        'id' => $data1->id,
        'level' => $data1->level,);

    $data['anggota'] = $this->anggota_model->tampil_data()->result();
    
    $config['upload_path']          = 'upload/ktp/';
    $config['allowed_types']        = 'gif|jpg|png|';
    // $config['max_size']             = ;
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    $this->load->view('template_administrator/header');
    $this->load->view('template_administrator/sidebar',$data1);
    // memanggil View, namun kita menambahkan $data untuk membawa data dari model ke dalam View, sehingga $data dalam view merupakan sebuah array yang berisi data dari model
    $this->load->view('administrator/update_anggota',$config);
    $this->load->view('template_administrator/footer');


    $upload_gambar1 = $this->upload->do_upload('ktp');
    $data['error'] = [];
    if ($upload_gambar1){
        
        $nama_file1 = $this->upload->data('file_name');

                    $datasimpan = [

                        'ktp'=> $nama_file1,
                        'nama'=> $this->input->post('nama', TRUE),
                        'nik'=> $this->input->post('nik', TRUE),
                        'kelamin'=> $this->input->post('kelamin', TRUE),
                        'id_anggota'=> $this->input->post('id_anggota', TRUE),
                        'alamat'=> $this->input->post('alamat', TRUE),
                        'no_hp'=> $this->input->post('no_hp', TRUE),


                    ];
                    $this->anggota_model->input_data($datasimpan);
                    $this->session->set_flashdata('pesan1','<div class="alert alert-success alertdismissible fade show" role="alert">Data Anggota Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('administrator/anggota'); 

    }else{
        $this->session->set_flashdata('input','<div class="alert alert-danger alertdismissible fade show" role="alert">Isi Data Dengan Benar!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

    }
    redirect('administrator/anggota/input');
}


public function _rules()
{
    $this->form_validation->set_rules('nama','nama','required',['required' => 'Nama wajib diisi!']);
    $this->form_validation->set_rules('alamat','alamat','required',['required' => 'Alamat wajib diisi!']);
    $this->form_validation->set_rules('email','email','required',['required' => 'Email wajib diisi!']);
    $this->form_validation->set_rules('no_hp','no_hp','required',['required' => 'No Hp wajib diisi!']);
}

public function simpanan($id){
    $data1 = $this->user_model->ambil_data($this->session->userdata['username']);
    $data1 = array(
        'username' => $data1->username,
        'level' => $data1->level,);
    $where = array('id_anggota' => $id);
    $data['anggota'] = $this->anggota_model->edit_data($where,'anggota')->result();
    $data['simpan'] = $this->simpanan_model->tampil_data()->result();

    $this->load->view('template_administrator/header');
    $this->load->view('template_administrator/sidebar',$data1);
    $this->load->view('administrator/simpanan_anggota',$data);
    $this->load->view('template_administrator/footer');
}

public function tarik_simpanan($id){
    $data1 = $this->user_model->ambil_data($this->session->userdata['username']);
    $data1 = array(
        'username' => $data1->username,
        'level' => $data1->level,);
    $where = array('id_anggota' => $id);
    $data['anggota'] = $this->anggota_model->edit_data($where,'anggota')->result();
    $data['simpan'] = $this->simpanan_model->tampil_data()->result();

    $this->load->view('template_administrator/header');
    $this->load->view('template_administrator/sidebar',$data1);
    $this->load->view('administrator/tarik_simpanan',$data);
    $this->load->view('template_administrator/footer');
}

public function tarik()
{
$id_anggota=$this->input->post('id_anggota');
$id_simpanan=$this->input->post('id_simpanan');
$status="tarik";

$data=array(
    'id_riwayat'=>$this->input->post('id_simpanan',TRUE),
    'nama'=>$this->input->post('nama',TRUE),
    'no_simpan'=>$this->input->post('no_simpanan',TRUE),
    'tgl'=>$this->input->post('tanggal',TRUE),
    'jam'=>$this->input->post('jam',TRUE),
    'tipe'=>$this->input->post('jenis',TRUE),
    'status'=>$status,
    'jumlah'=>$this->input->post('jumlah',TRUE),);

date_default_timezone_set('Asia/Jakarta');
$jam = date('H:i:s');
$tanggalHariIni = new DateTime();
$tanggal = $tanggalHariIni->format('Y-m-d');
$datasimpan = [
    'status'=> $status,
    'jam'=> $jam,
    'tanggal'=> $tanggal,
];

$where = array ('id_anggota' => $id_anggota );
$this->anggota_model->update_data($where,$datasimpan,'anggota');

$where = array ('id_simpanan' => $id_simpanan );
$this->simpanan_model->update_data($where,$datasimpan,'simpan');

$this->anggota_model->riwayat($data);

$this->session->set_flashdata('pesan1','<div class="alert alert-success alertdismissible fade show" role="alert">Status Anggota Berhasil Di Update!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
redirect('administrator/anggota');

}

public function update($id){
    $data1 = $this->user_model->ambil_data($this->session->userdata['username']);
    $data1 = array(
        'username' => $data1->username,
        'level' => $data1->level,);
    
    $id_anggota=$this->input->post('id_anggota');

    $where = array('id_anggota' => $id);
    $data['anggota'] = $this->anggota_model->edit_data($where,'anggota')->result();
    $this->load->view('template_administrator/header');
    $this->load->view('template_administrator/sidebar',$data1);
    $this->load->view('administrator/update_anggota',$data);
    $this->load->view('template_administrator/footer');
}

public function update_aksi()
    {//menangkapdatayangdimasukkankedalamjurusan_update
        $data1 = $this->user_model->ambil_data($this->session->userdata['username']);
        $data1 = array(
        'username' => $data1->username,
        'id' => $data1->id,
        'level' => $data1->level,);
        
        $data['anggota'] = $this->anggota_model->tampil_data()->result();
        
        $config['upload_path']          = 'upload/ktp/';
        $config['allowed_types']        = 'gif|jpg|png|docx|pdf';
        // $config['max_size']             = ;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
    
        $this->load->library('upload', $config);
    
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar',$data1);
        // memanggil View, namun kita menambahkan $data untuk membawa data dari model ke dalam View, sehingga $data dalam view merupakan sebuah array yang berisi data dari model
        $this->load->view('administrator/update_anggota',$config);
        $this->load->view('template_administrator/footer');

    $id_anggota=$this->input->post('id_anggota');
    //methodpostuntukmengambildata
    $nama=$this->input->post('nama');
    $nik=$this->input->post('nik');
    $kelamin=$this->input->post('kelamin');
    $alamat=$this->input->post('alamat');
    $no_hp=$this->input->post('no_hp');
    
    
    $upload_gambar1 = $this->upload->do_upload('ktp');
        $data['error'] = [];
        if ($upload_gambar1){
            
            $nama_file1 = $this->upload->data('file_name');

                    $datasimpan = [

                        'ktp'=> $nama_file1,
                        'nama'=> $nama,
                        'nik'=> $nik,
                        'kelamin'=> $kelamin,
                        'alamat'=> $alamat,
                        'no_hp'=> $no_hp,

                    ];
                    
                    $where = array ('id_anggota' => $id_anggota );
                    $this->anggota_model->update_data($where,$datasimpan,'anggota');
                    $this->session->set_flashdata('pesan1','<div class="alert alert-success alert-dismissiblefadeshow"role="alert">
                    Data Anggota Berhasil Di Update!
                    <button type="button"class="close"data-dismiss="alert"aria-label="Close">
                    <spanaria-hidden="true">&times;
                    </span>
                    </button>
                    </div>');
                    redirect('administrator/anggota'); 

        }else{
            $data['error']['ktp'] = $this->upload->display_errors();
            
        }
    $this->session->set_flashdata('pesan1','<div class="alert alert-danger alert-dismissiblefadeshow"role="alert">
    Data Anggota Gagal Di Update!
    <button type="button"class="close"data-dismiss="alert"aria-label="Close">
    <spanaria-hidden="true">&times;
    </span>
    </button>
    </div>');

    redirect('administrator/anggota');
}

public function delete($id)
{
$where = array ('id_anggota' => $id);
$this->anggota_model->hapus_data($where,'anggota');
$this->session->set_flashdata('pesan','<div class="alert alert-danger alertdismissible fade show" role="alert">Data Anggota Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
redirect('administrator/anggota');
}


public function hasil()
{
    $data1 = $this->user_model->ambil_data($this->session->userdata['username']);
    $data1 = array(
        'username' => $data1->username,
        'level' => $data1->level,);
    $data2['cari'] = $this->anggota_model->cari();
    $this->load->view('template_administrator/header');
    $this->load->view('template_administrator/sidebar',$data1);
    $this->load->view('administrator/anggota_cari', $data2);
    $this->load->view('template_administrator/footer');

}

public function export_excel($id){
    $data = $this->user_model->ambil_data($this->session->userdata['username']);
    $data = array(
        'username' => $data->username,
        'level' => $data->level,);

    $data = array( 'title' => 'Rekap_Simpanan');
    $where = array('id_anggota' => $id);
    $data['anggota'] = $this->anggota_model->edit_data($where,'anggota')->result();
    $data['simpan'] = $this->simpanan_model->tampil_data()->result();
 $this->load->view('administrator/laporan_simpanan',$data);
 }

 public function riwayat($id){
    $data1 = $this->user_model->ambil_data($this->session->userdata['username']);
    $data1 = array(
        'username' => $data1->username,
        'level' => $data1->level,);
        
    $where = array('id_anggota' => $id);

    $data['anggota'] = $this->anggota_model->edit_data($where,'anggota')->result();
    $data['riwayat'] = $this->anggota_model->riwayat_data()->result();

    $this->load->view('template_administrator/header');
    $this->load->view('template_administrator/sidebar',$data1);
    $this->load->view('administrator/riwayat_anggota',$data);
    $this->load->view('template_administrator/footer');
}

}
