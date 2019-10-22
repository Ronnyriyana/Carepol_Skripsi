<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Auth_model extends CI_Model {
    
//    untuk mengcek jumlah username dan password yang sesuai
    function login($username,$password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query =  $this->db->get('pengelola');
        return $query->num_rows();
    }
    
//    untuk mengambil data hasil login
    function data_login($username,$password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('pengelola')->row();
    }
	
//    untuk cek key alat
    public function cek_key_alat($key)
	{
		$data = $this->db->get_where("alat", array('key_alat' => $key));
		return $data->num_rows();
	}

//    untuk ambil id_alat
    public function ambil_keyalat($key)
	{
		$data = $this->db->get_where("alat", array('key_alat' => $key));
		return $data->result_array();
	}
	
//    untuk cek id_alat
    public function cek_keyalat_pengguna($key_alat)
	{
		$data = $this->db->get_where("pengelola", array('key_alat' => $key_alat));
		return $data->num_rows();
	}
	
	function proses_registrasi($data){
		$res = $this->db->insert("pengelola",$data);
		return $res;
	}
}
 
/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */