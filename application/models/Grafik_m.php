<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik_m extends CI_Model {
	public function GetParameter($wilayah)
	{	
		$this->db->where(array('a.wilayah'=>$wilayah));
		$this->db->select('a.wilayah,b.*');
		$this->db->from('alat as a');
		$this->db->join('parameter as b', 'a.key_alat = b.key_alat');
		$data = $this->db->get();
		return $data->result_array();
	}
	
}
