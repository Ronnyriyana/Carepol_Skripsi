<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik_m extends CI_Model {
	public function GetHistoryZona()
	{
		//$this->db->where(array("date(waktu_pengujian)" => $tgl));
		$data = $this->db->get("zona");
		return $data->result_array();
	}
	
}
