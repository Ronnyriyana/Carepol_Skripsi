<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model {
	public function GetUser()
	{
		$this->db->where("status != 'Admin'");
		$data = $this->db->get("pengelola");
		return $data->result_array();
	}
	
	function proses_update_profile($id_pengelola,$data){
		$this->db->where(array('id_pengelola' => $id_pengelola));
		$res = $this->db->update('pengelola',$data);
		return $res;
	}
	
	public function get_data_where($id_pengelola)
	{
		$data = $this->db->get_where("pengelola", $id_pengelola);
		return $data->result_array();
	}
}
