<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receiver_alat_m extends CI_Model {
	function input($data){
		$res = $this->db->insert("parameter",$data);
		return $res;
	}

	function check_key($key) {
        $this->db->where('key_alat', $key);
        $this->db->where('status_alat', 'registered');
        $query =  $this->db->get('alat');
        return $query->num_rows();
    }
}
