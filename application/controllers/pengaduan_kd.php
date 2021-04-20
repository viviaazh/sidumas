<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class pengaduan_kd extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->model('pengaduan_model');
        $this->load->library('form_validation');
        $this->load->library('session');

        if($this->session->userdata('level')!="admin2"){
            redirect('login','refresh');
        }
        // $this->load->model('pengaduan_model','Pengaduan_model');
    }
 
    function index(){
        // $this->load->model('pengaduan_model');
        $data['pengaduan'] = $this->pengaduan_model->get_pengaduan();
        // $data=array(
        //     'title'=>'Daftar Pengaduan',
        //     'pengaduan'=>$this->pengaduan_model->datatables()
        // );
        $this->load->view('template/header_datatables', $data);
        $this->load->view('kepala_dinas/pengaduan/index', $data);
        $this->load->view('template/footer_datatables');
        // $data['kecamatan'] = $this->Pengaduan_model->get_kecamatan()->result();
        // $this->load->view('login/coba', $data);
    }
 
    // function add_new(){
    //     $data['kecamatan'] = $this->pengaduan_model->get_kecamatan()->result();
    //     $this->load->view('template/header_admin', $data);
    //     $this->load->view('pengaduan/tambah', $data);
    //     $this->load->view('template/footer_admin');
    // }

    function get_desa(){
        $id_kecamatan = $this->input->post('id',TRUE);
        $data = $this->pengaduan_model->get_desa($id_kecamatan)->result();
        echo json_encode($data);
    }

    public function detail($id_pengaduan){
        // $data['title']='Detail Pasien';
        $data['pengaduan']=$this->pengaduan_model->getpengaduanByID($id_pengaduan);
        $this->load->view('template/header_kd', $data);
        $this->load->view('kepala_dinas/pengaduan/detail', $data);
        $this->load->view('template/footer_admin');
    }

    function save_pengaduan(){
        $judul           = $this->input->post('judul',TRUE);
        $id_kecamatan    = $this->input->post('kecamatan',TRUE);
        $id_desa         = $this->input->post('desa',TRUE);
        $alamat          = $this->input->post('alamat',TRUE);
        $keterangan      = $this->input->post('keterangan',TRUE);
        $status          = $this->input->post('status', TRUE);
        $this->pengaduan_model->save_pengaduan($judul,$id_kecamatan,$id_desa,$alamat,$keterangan,$status);
        $this->session->set_flashdata('msg','<div class="alert alert-success">Data Berhasil Disimpan</div>');
        redirect('pengaduan_kd');
    }

    function get_edit(){
        $id_pengaduan = $this->uri->segment(3);
        $data['id_pengaduan'] = $id_pengaduan;
        $data['kecamatan'] = $this->pengaduan_model->get_kecamatan()->result();
        $get_data = $this->pengaduan_model->get_pengaduan_by_id($id_pengaduan);
        if($get_data->num_rows() > 0){
            $row = $get_data->row_array();
            $data['pengaduan_desa_id'] = $row['pengaduan_desa_id'];
        }
        $this->load->view('template/header_kd', $data);
        $this->load->view('kepala_dinas/pengaduan/edit',$data);
        $this->load->view('template/footer_admin');
    }
 
    function get_data_edit(){
        $id_pengaduan = $this->input->post('id_pengaduan',TRUE);
        $data = $this->pengaduan_model->get_pengaduan_by_id($id_pengaduan)->result();
        echo json_encode($data);
    }

    function update_pengaduan(){
        $id_pengaduan   = $this->input->post('id_pengaduan',TRUE);
        $judul          = $this->input->post('judul',TRUE);
        $id_kecamatan   = $this->input->post('kecamatan',TRUE);
        $id_desa        = $this->input->post('desa',TRUE);
        $alamat         = $this->input->post('alamat',TRUE);
        $keterangan     = $this->input->post('keterangan',TRUE);
        $status         = $this->input->post('status', TRUE);
        $this->pengaduan_model->update_pengaduan($id_pengaduan,$judul,$id_kecamatan,$id_desa,$alamat,$keterangan,$status);
        $this->session->set_flashdata('msg','<div class="alert alert-success">Data Berhasil Diperbarui</div>');
        redirect('pengaduan_kd');
    }

    //Delete Product from Database
	function delete(){
		$id_pengaduan = $this->uri->segment(3);
		$this->pengaduan_model->delete_pengaduan($id_pengaduan);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Data Dihapus</div>');
		redirect('pengaduan_kd');
	}
}