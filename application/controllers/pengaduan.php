<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class pengaduan extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->model('pengaduan_model');
        $this->load->library('form_validation');

        if($this->session->userdata('level')!="admin"){
            redirect('login','refresh');
        }
        // $this->load->model('pengaduan_model','Pengaduan_model');
    }
 
    function index(){
        $this->load->model('pengaduan_model');
        $data=array(
            'title'=>'Daftar Pengaduan',
            'pengaduan'=>$this->pengaduan_model->datatables()
        );
        $this->load->view('template/header_datatables', $data);
        $this->load->view('pengaduan/index', $data);
        $this->load->view('template/footer_datatables');
        // $data['kecamatan'] = $this->Pengaduan_model->get_kecamatan()->result();
        // $this->load->view('login/coba', $data);
    }
 
    function get_desa(){
        // $id_kecamatan = $this->input->post('id',TRUE);
        // $data = $this->Pengaduan_model->get_desa($id_kecamatan)->result();
        // echo json_encode($data);
    }

    public function detail($id_pengaduan){
        $data['title']='Detail Pasien';
        $data['pengaduan']=$this->pengaduan_model->getpengaduanByID($id_pengaduan);
        $this->load->view('template/header_admin', $data);
        $this->load->view('pengaduan/detail', $data);
        $this->load->view('template/footer_admin');
    }
}