<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	public function getRow($table,$where){
		$this->db->where($where);
		$result = $this->db->get($table)->row();
		return $result;
	}

	public function insertAry($table,$data){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}
}