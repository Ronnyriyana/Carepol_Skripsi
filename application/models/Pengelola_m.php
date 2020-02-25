<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelola_m extends CI_Model {
    public function Getpengelola()
	{
		$this->db->where("id_pengelola != 1");
		$this->db->select("pengelola.*, (SELECT COUNT(*) FROM alat WHERE alat.pemilik_alat=pengelola.id_pengelola) AS jumlah");
		$data = $this->db->get("pengelola");
		return $data->result_array();
	}

	public function Getpengelolawhere($id_pengelola)
	{
		$this->db->select("a.*");
		$this->db->select("GROUP_CONCAT('-> <u>', b.key_alat SEPARATOR '</u><br/>') as key_alat");
		$this->db->select("(SELECT COUNT(*) FROM alat WHERE alat.pemilik_alat=a.id_pengelola) AS jumlah");
		$this->db->from('pengelola a');
		$this->db->join('alat b', 'a.id_pengelola = b.pemilik_alat');
		$this->db->where('a.id_pengelola', $id_pengelola);
		$data = $this->db->get();
		return $data->result_array();
	}
	
	function proses_update($data){
		$this->db->where(array('id_pengelola' => $data['id_pengelola']));
		$res = $this->db->update('pengelola',$data);
		return $res;
	}
	
	function proses_delete_data($id){
		$this->db->where(array('id_pengelola' => $id));
		$res = $this->db->delete("pengelola");
		return $res;
	}
	
	function proses_input_pemilik_alat($data){
		$res = $this->db->insert("pengelola",$data);
		$insert_id = $this->db->insert_id();
   		return  $insert_id;
	}
	
	function proses_input($data){
		$res = $this->db->insert("pengelola",$data);
		return $res;
	}
	
	function photo($id){
		$this->db->select("photo");
		$data = $this->db->get_where("pengelola", array('id_pengelola' => $id));
		return $data->row();
	}

	function check_username($username) {
        $this->db->where('username', $username);
        $query =  $this->db->get('pengelola');
        return $query->num_rows();
	}
	
	function check_username_edit($id_pengelola,$username) {
        $this->db->where('id_pengelola !=', $id_pengelola);
        $this->db->where('username', $username);
        $query =  $this->db->get('pengelola');
        return $query->num_rows();
    }
}
