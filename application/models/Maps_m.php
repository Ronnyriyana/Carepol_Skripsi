<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps_m extends CI_Model {
	function insert_history_zona(){
		set_time_limit(3000);
		$res = $this->db->query("INSERT INTO zona_history (lat, lon, co, co2, suhu, kelembaban, ispu, waktu_pengujian)
								SELECT lat, lon, co, co2, suhu, kelembaban, ispu, updated_at
								FROM zona");
		return $res;
	}

	function generate_zona($data){
		$res = $this->db->insert("zona",$data);
		return $res;
	}

	public function GetZona()
	{
		//$this->db->where("id","1085");
		$data = $this->db->get("zona");
		return $data->result_array();
	}

	public function GetHistoryZona($tgl)
	{
		$this->db->where(array("date(waktu_pengujian)" => $tgl));
		$data = $this->db->get("zona_history");
		return $data->result_array();
	}

	public function cari_parameter($lat,$lon)
	{
		$this->db->select("AVG(co) AS co");
		$this->db->select("AVG(co2) AS co2");
		$this->db->select("AVG(suhu) AS suhu");
		$this->db->select("AVG(kelembaban) AS kelembaban");
		$this->db->where("(( 6371 * ACOS( COS( RADIANS($lat) ) * COS( RADIANS( lat ) ) * 
		COS( RADIANS( lon ) - RADIANS($lon) ) + SIN( RADIANS($lat) ) * SIN(RADIANS(lat)) ) )
		*1000) <= 300");
		$data = $this->db->get("parameter");
		return $data->result_array();
	}

	function updateZona($id,$data){
		set_time_limit(3000);
		$data['updated_at'] = date('Y-m-d H:i:s');
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
