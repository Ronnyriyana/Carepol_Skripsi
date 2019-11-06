<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alat_m extends CI_Model {
	public function GetAlat()
	{
		$data = $this->db->get("alat");
		return $data->result_array();
	}
	
	public function get_data_where($key_alat)
	{
		$data = $this->db->get_where("alat", $key_alat);
		return $data->result_array();
	}
	
	function proses_input_data($data){
		$res = $this->db->insert("alat",$data);
		return $res;
	}
	
	function proses_delete_data($where){
		$this->db->where($where);
		$res = $this->db->delete("alat");
		return $res;
	}
}
