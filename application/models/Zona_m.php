<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zona_m extends CI_Model {
	public function get_data(){
		return $this->db->get("zona_history")->result_array();
	}
}
