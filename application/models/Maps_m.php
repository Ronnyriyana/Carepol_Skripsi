<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps_m extends CI_Model {
	//n56Ybw~8
	function insert_history_zona(){
		$res = $this->db->query("INSERT INTO zona_history (lat, lon, co, waktu_pengujian)
								SELECT lat, lon, co, updated_at
								FROM zona");
		return $res;
	}

	function generate_zona($data){
		$res = $this->db->insert("zona",$data);
		return $res;
	}

	public function GetZona()
	{
		$data = $this->db->get("zona");
		return $data->result_array();
	}

	public function GetHistoryZona($tgl)
	{
		$this->db->where(array("date(waktu_pengujian)" => $tgl));
		$data = $this->db->get("zona_history");
		return $data->result_array();
	}

	public function cekGeofencing($lat,$lon)
	{
		$this->db->select("AVG(suhu) AS gasr");
		$this->db->where("(SQRT((POWER(($lat-lat),2))+(POWER(($lon-lon),2)))*111.319*1000) <= 160");
		$data = $this->db->get("parameter");
		return $data->result_array();
	}

	function updateZona($id,$gas){
		$data = array(
			'co' => $gas,
			'updated_at' => date('Y-m-d H:i:s')
		);
		$this->db->where(array('id' => $id));
		$res = $this->db->update('zona',$data);
		return $res;
	}
	
	public function GetParameter()
	{
		//$this->db->where("id_parameter = '3357'");
		$data = $this->db->get("parameter");
		return $data->result_array();
	}
}
