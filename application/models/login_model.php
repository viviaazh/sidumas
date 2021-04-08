<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model{
    function login($email,$password){

        $this->db->select('email,password,level');
        $this->db->from('user');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $this->db->Limit(1);

        $query=$this->db->get();
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
    }
}