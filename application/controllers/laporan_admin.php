<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class laporan_admin extends CI_Controller {
	
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->model('laporanadmin_model');
        $this->load->library('form_validation');
        $this->load->library('session');

        if($this->session->userdata('level')!="admin"){
            redirect('login','refresh');
        }
    }
	public function index()
    {
        $this->load->model('laporanadmin_model');
        $data=array(
            'title'=>'Laporan Admin',
            'laporanadmin'=>$this->laporanadmin_model->datatables()
        );
        $this->load->view('template/header_datatables', $data);
        $this->load->view('laporan_admin/index', $data);
        $this->load->view('template/footer_datatables');
    }
	public function tambah(){
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('template/header_admin', $config);
			$this->load->view('laporan_admin/tambah', $error);
			$this->load->view('template/footer_admin', $config);
		}
		else{
			$data['nama_berkas']	= $this->upload->data('file_name');
			$data['judul']			= $this->input->post('judul');
			$data['ket_berkas']		= $this->input->post('ket_berkas');
			$data['status']			= $this->input->post('status');
			$data['tipe_berkas']	= $this->upload->data('file_ext');
			$data['ukuran_berkas']	= $this->upload->data('file_size');
			$this->db->insert('laporan_admin',$data);
    		$this->session->set_flashdata('msg','<div class="alert alert-success">Data Berhasil Disimpan</div>');
			redirect('laporan_admin');
		}
	}
	public function edit(){
		$id_laporanadmin = $this->input->post('id_laporanadmin');
        $config = $this->db->get_where('laporan_admin',['id_laporanadmin' => $id_laporanadmin])->row();
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
		$config['encrypt_name']			= TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('template/header_admin', $config);
			$this->load->view('laporan_admin/edit', $error);
			$this->load->view('template/footer_admin', $config);
        }
        else{
            $data['nama_berkas']	= $this->upload->data('file_name');
			$data['judul']			= $this->input->post('judul');
			$data['ket_berkas']		= $this->input->post('ket_berkas');
			$data['status']			= $this->input->post('status');
			$data['tipe_berkas']	= $this->upload->data('file_ext');
			$data['ukuran_berkas']	= $this->upload->data('file_size');
			$this->db->update('laporan_admin', $data, array('id_laporanadmin' => $id_laporanadmin));
    		$this->session->set_flashdata('msg','<div class="alert alert-success">Data Berhasil Diperbarui</div>');
			redirect('laporan_admin');
		}     
	}
	
}