<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
	public function Getuser()
	{
		$data = $this->db->get("user");
		return $data->result_array();
	}

	public function Getuserwhere($id_user)
	{
		$data = $this->db->get_where("user", array('id_user' => $id_user));
		return $data->result_array();
	}
	
	function proses_update($data){
		$this->db->where(array('id_user' => $data['id_user']));
		$res = $this->db->update('user',$data);
		return $res;
	}
	
	function proses_delete($id){
		$this->db->where(array('id_user' => $id));
		$res = $this->db->delete("user");
		return $res;
	}
	
	function proses_input($data){
		$res = $this->db->insert("user",$data);
		return $res;
	}

	function photo($id){
		$this->db->select("photo");
		$data = $this->db->get_where("user", array('id_user' => $id));
		return $data->row();
	}
}
