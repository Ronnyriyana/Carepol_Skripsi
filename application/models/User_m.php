<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
	public function Getuser()
	{
		$this->db->select("user.*, (SELECT COUNT(*) FROM alat WHERE alat.id_user=user.id_user) AS jumlah");
		$data = $this->db->get("user");
		return $data->result_array();
	}

	public function Getuserwhere($id_user)
	{
		$data = $this->db->get_where("user", array('id_user' => $id_user));
		return $data->result_array();
	}
	
	function proses_update_profile($id_user,$data){
		$this->db->where(array('id_user' => $id_user));
		$res = $this->db->update('user',$data);
		return $res;
	}
	
	function proses_delete_data($id){
		$this->db->where(array('id_user' => $id));
		$res = $this->db->delete("user");
		return $res;
	}
	
	function proses_input_data($data){
		$res = $this->db->insert("user",$data);
		return $res;
	}
}
