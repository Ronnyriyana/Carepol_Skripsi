<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
	public function GetUser($id_pengelola)
	{
		$data = $this->db->get_where("pengelola", array('id_pengelola' => $id_pengelola));
		return $data->result_array();
	}
	
	function proses_update_profile($id_pengelola,$data){
		$this->db->where(array('id_pengelola' => $id_pengelola));
		$res = $this->db->update('pengelola',$data);
		return $res;
	}
	
	function proses_delete_data($where){
		$this->db->where($where);
		$res = $this->db->delete("pengelola");
		return $res;
	}
	
	function proses_input_data($data){
		$res = $this->db->insert("pengelola",$data);
		return $res;
	}
}
