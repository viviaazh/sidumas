<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengaduan_model extends CI_Model{
	public function getAllpengaduan()
    {
       
        return $this->db->get('pengaduan')->result_array();
    }

	function get_kecamatan(){
		$query = $this->db->get('kecamatan');
		return $query;	
	}

	function get_desa($id_kecamatan){
		$query = $this->db->get_where('desa', array('desa_kecamatan_id' => $id_kecamatan));
		return $query;
	}
	
	function save_pengaduan($judul,$id_kecamatan,$id_desa,$alamat,$keterangan,$status){
		$data = array(
			'judul' => $judul,
			'keterangan' => $keterangan,
			'status' => $status,
			'alamat' => $alamat,
			'pengaduan_kecamatan_id' => $id_kecamatan,
			'pengaduan_desa_id' => $id_desa 
		);
		$this->db->insert('pengaduan',$data);
	}

	function get_pengaduan(){
		$this->db->select('id_pengaduan,judul,keterangan,status,nama_kecamatan,nama_desa,alamat');
		$this->db->from('pengaduan');
		$this->db->join('kecamatan','pengaduan_kecamatan_id = id_kecamatan','left');
		$this->db->join('desa','pengaduan_desa_id = id_desa','left');	
		$query = $this->db->get();
		return $query;
	}

	function get_pengaduan_by_id($id_pengaduan){
		$query = $this->db->get_where('pengaduan', array('id_pengaduan' =>  $id_pengaduan));
		return $query;
	}

	function update_pengaduan($id_pengaduan,$judul,$id_kecamatan,$id_desa,$alamat,$keterangan,$status){
		$this->db->set('judul', $judul);
		$this->db->set('keterangan', $keterangan);
		$this->db->set('status', $status);
		$this->db->set('alamat', $alamat);
		$this->db->set('pengaduan_kecamatan_id', $id_kecamatan);
		$this->db->set('pengaduan_desa_id', $id_desa);
		$this->db->where('id_pengaduan', $id_pengaduan);
		$this->db->update('pengaduan');
	}

	//Delete Product
	function delete_pengaduan($id_pengaduan){
		$this->db->delete('pengaduan', array('id_pengaduan' => $id_pengaduan));
	}

    public function datatables(){
        $query=($this->db->order_by('id_pengaduan','ASC')->get('pengaduan'));
        return $query->result();
    }

    public function getpengaduanByID($id_pengaduan){
        return $this->db->get_where('pengaduan', ['id_pengaduan'=>$id_pengaduan])->row_array();
		$this->db->from('pengaduan');
		$this->db->join('kecamatan','pengaduan_kecamatan_id = id_kecamatan','left');
		$this->db->join('desa','pengaduan_desa_id = id_desa','left');	
		$query = $this->db->get();
		return $query;
    }
	
}