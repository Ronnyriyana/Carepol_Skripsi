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
		/*$this->db->select('co,waktu_pengujian');
		$this->db->where('lat', $lat);
		$this->db->where('lon', $lon);
		$result = $this->db->get('zona_history');
		return $result->result();*/

		$result = $this->db->query("SELECT waktu_pengujian,ispu,co,co2,suhu,kelembaban FROM zona_history WHERE lat='$lat' AND lon='$lon'
		UNION
		SELECT updated_at AS waktu_pengujian,ispu,co,co2,suhu,kelembaban FROM zona WHERE lat='$lat' AND lon='$lon'");
		return $result->result();
	}
}
