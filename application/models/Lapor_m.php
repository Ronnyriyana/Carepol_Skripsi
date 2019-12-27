<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapor_m extends CI_Model {
    public function Getlapor()
	{
        $this->db->select('a.*, b.nama_lengkap');
        $this->db->from('laporan a');
        $this->db->join('user b', 'a.id_pelapor = b.id_user');
		$data = $this->db->get();
        return $data->result_array();
	}

	public function Getlaporwhere($id)
	{
		$this->db->select('a.*, b.nama_lengkap');
        $this->db->from('laporan a');
        $this->db->join('user b', 'a.id_pelapor = b.id_user');
        $this->db->where('a.id_lapor', $id);
		$data = $this->db->get();
        return $data->result_array();
	}

	function photo($id){
		$this->db->select("photo");
		$data = $this->db->get_where("laporan", array('id_lapor' => $id));
		return $data->row();
	}

	function proses_delete($id){
		$this->db->where(array('id_lapor' => $id));
		$res = $this->db->delete("laporan");
		return $res;
	}
}
