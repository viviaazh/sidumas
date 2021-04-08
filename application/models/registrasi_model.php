<?php
defined('BASEPATH') OR exit ('No direct script access allowed');


class registrasi_model extends CI_Model 
{
	
	public function __construct()
	{
        parent::__construct();
	}
 
	function registrasi($nama,$email,$password)
	{
		$data_user = array(
            'nama'=>$nama,
			'email'=>$email,
			'password'=>password_hash($password,PASSWORD_DEFAULT),
			'level'=> 'user'
			
		);
		$this->db->insert('user',$data_user);
	}
}
?>
