<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receiver_alat_m extends CI_Model {
	function input($data){
		$res = $this->db->insert("parameter",$data);
		return $res;
	}
}
