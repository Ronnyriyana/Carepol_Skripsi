<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik_m extends CI_Model {
	public function GetZona()
	{
		//$this->db->where(array("date(waktu_pengujian)" => $tgl));
		$data = $this->db->get("zona");
		return $data->result_array();
	}
	
	function GetZonaHistory($lat,$lon){
		$this->db->select('co,waktu_pengujian');
		$this->db->where('lat', $lat);
		$this->db->where('lon', $lon);
		$result = $this->db->get('zona_history');
		return $result->result();
	}
}
