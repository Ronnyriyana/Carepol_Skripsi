<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alat_m extends CI_Model {
	public function GetAlat()
	{
		$this->db->select('a.*, b.nama_pengelola');
        $this->db->from('alat a');
        $this->db->join('pengelola b', 'a.pemilik_alat = b.id_pengelola', 'left');
        $this->db->order_by('a.id_alat','DESC');
		$data = $this->db->get();
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

	function proses_update($key_alat,$id_pengelola){
		$this->db->where(array('key_alat' => $key_alat));
		$res = $this->db->update('alat',array("pemilik_alat" => $id_pengelola, "status_alat" => "registered"));
		return $res;
	}

	function proses_update_delete($id_pengelola){
		$this->db->where(array('pemilik_alat' => $id_pengelola));
		$res = $this->db->update('alat',array("pemilik_alat" => "null", "status_alat" => "unregistered"));
		return $res;
	}

	function check_key($key) {
        $this->db->where('key_alat', $key);
        $this->db->where("pemilik_alat IS NULL OR pemilik_alat = '0'");
        $query =  $this->db->get('alat');
        return $query->num_rows();
    }
}
