<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class laporanadmin_model extends CI_Model {

    public function getLaporanAdmin(){
       
        return $this->db->get('laporan_admin')->result_array();
    }
    function save_laporan(){
		$data = array(
            "judul"=>$this->input->post('judul',true),
			"judul"=>$this->input->post('ket',true),
			'ket_berkas' => $ket_berkas,
			'status' => $status
		);
		$this->db->insert('laporan_admin',$data);
	}
    public function datatables(){
        $query=($this->db->order_by('id_laporanadmin','ASC')->get('laporan_admin'));
        return $query->result();
    }
}