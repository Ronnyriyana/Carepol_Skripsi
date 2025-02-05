<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_m extends CI_Model {
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

	public function getjumlahzona()
	{
		return $this->db->count_all('zona');
	}

	public function getjumlahparameter()
	{
		$this->db->where('created_at >= NOW() - INTERVAL 8 HOUR');
		$this->db->from('parameter');
		return $this->db->count_all_results();
	}
	
	public function getjumlahpemilikalat()
	{
		$this->db->where('level', 'Pemilik_Alat');
		$this->db->from('pengelola');
		return $this->db->count_all_results();
	}

	public function getjumlahalat()
	{
		return $this->db->count_all('alat');
	}

	public function getdataparameter()
	{
		$this->db->where('created_at >= NOW() - INTERVAL 8 HOUR');
		$data = $this->db->get('parameter');
        return $data->result_array();
	}
}
