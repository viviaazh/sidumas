<?php
    defined('BASEPATH') OR exit ('No direct script access allow');

    class login extends CI_Controller
    {
        
        public function __construct()
        {
            parent::__construct();
            // $this->load->model('user_model');
            $this->load->library('form_validation');
            $this->load->library('session');
            

            if ($this->session->userdata('level'!="admin")) 
            {
                redirect('login','refresh');   
            }

            $this->load->helper('url');
            // $this->load->helper('form');
            // $this->load->model('login_model');
        }

        public function index()
        {
            $data['title']='Login';
            $this->load->view('template/header_login',$data);
            $this->load->view('login/index');
            $this->load->view('template/footer_login');
        }


        public function proses_login()
        {

            $email=htmlspecialchars($this->input->post('uname1'));
            $password=htmlspecialchars($this->input->post('pwd1'));
            $this->load->model('login_model');

            $ceklogin=$this->login_model->login($email,$password);

            if ($ceklogin) {
                foreach($ceklogin as $row);

                $this->session->set_userdata('user',$row->email);
                $this->session->set_userdata('level',$row->level);

                if ($this->session->userdata('level')=="admin") 
                {
                    redirect('dashboard_admin');
                }
                elseif($this->session->userdata('level')=="user")
                {
                    redirect('warga');
                }
            }
            else
            {  
                $data['pesan']="Email dan Password Anda Salah";
                $data['title']='Login';
                $this->load->view('template/header_login',$data);
                $this->load->view('login/index',$data);
                $this->load->view('template/footer_login');
                //redirect('login/index','refresh');
            }
        }

        public function logout()
        {
            $this->session->sess_destroy();
            
            redirect('login','refresh');
            
        }
    }
?>