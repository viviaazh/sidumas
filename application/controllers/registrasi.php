<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registrasi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('registrasi_model');
	}

	public function index()
	{
        $data['title']='Registrasi';
        $this->load->view('template/header_registrasi',$data);
		$this->load->view('login/registrasi');
        $this->load->view('template/footer_registrasi');
	}

	public function proses()
	{
        $this->form_validation->set_rules('nama', 'nama','required');
		$this->form_validation->set_rules('email', 'email','required');
		$this->form_validation->set_rules('password', 'password','required');
		
		if ($this->form_validation->run()==true)
	   	{
            $nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->registrasi_model->registrasi($nama,$email,$password);
			$this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
			redirect('login');
		}
		else
		{
            
            $this->load->view('template/header_registrasi');
            $this->load->view('login/registrasi',$data);
            $this->load->view('template/footer_registrasi');
			$this->session->set_flashdata('error', validation_errors());
			redirect('registrasi');
		}
	}
}