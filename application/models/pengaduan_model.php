<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pengaduan_model extends CI_Model
{    
    public function getAllpengaduan()
    {
       
        return $this->db->get('pengaduan')->result_array();
    }

    public function cariDataPengaduan(){
        $keyword=$this->input->post('keyword');
        $this->db->like('desa',$keyword);
        $this->db->or_like('kecamatan', $keyword);
        return $this->db->get('pengaduan')->result_array();
    }

    public function datatables(){
        $query=($this->db->order_by('id_pengaduan','ASC')->get('pengaduan'));
        return $query->result();
    }

    public function getpengaduanByID($id_pengaduan){
        return $this->db->get_where('pengaduan', ['id_pengaduan'=>$id_pengaduan])->row_array();
    }
    // function get_kecamatan(){
    //     $query = $this->db->get('kecamatan');
    //     return $query;  
    // }
 
    // function get_desa($id_kecamatan){
    //     $query = $this->db->get_where('desa', array('desa_kecamatan_id' => $id_kecamatan));
    //     return $query;
    // }
}