<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class home_kd extends CI_Controller {

        public function index( ){
            $data['title']='Home';
            //$data adalah sebuah array dengan isi arraynya adalah name dan diisi name
            //$data['name']=$name;
            $this->load->view('template/header_kd',$data);
            //tambahkan $data pada home/index
            $this->load->view('kepala_dinas/index', $data);
            $this->load->view('template/footer_admin');

            if($this->session->userdata('level')!="admin2"){
                redirect('login','refresh');
            }
        }
    
    }
    
    /*Home.php */
    
?>