<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelola_m extends CI_Model {
    public function Getpengelola()
	{
		$this->db->where("Level != 'Admin'");
		$this->db->select("pengelola.*, (SELECT COUNT(*) FROM alat WHERE alat.pemilik_alat=pengelola.id_pengelola) AS jumlah");
		$data = $this->db->get("pengelola");
		return $data->result_array();
	}

	public function Getpengelolawhere($id_pengelola)
	{
		$data = $this->db->get_where("pengelola", array('id_pengelola' => $id_pengelola));
		return $data->result_array();
	}
	
	function proses_update_profile($id_pengelola,$data){
		$this->db->where(array('id_pengelola' => $id_pengelola));
		$res = $this->db->update('pengelola',$data);
		return $res;
	}
	
	function proses_delete_data($id){
		$this->db->where(array('id_pengelola' => $id));
		$res = $this->db->delete("pengelola");
		return $res;
	}
	
	function proses_input_data($data){
		$res = $this->db->insert("pengelola",$data);
		return $res;
	}
}
