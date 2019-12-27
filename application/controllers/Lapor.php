<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapor extends CI_Controller {
	public function __construct(){    
		parent::__construct();
		//untuk template
		$this->load->library('template');
		
		// jika belum login redirect ke login
		if ($this->session->userdata('logged')<>1) {
			redirect(site_url('login'));
		}
		
		//untuk load model
		$this->load->helper('url');
		$this->load->model('lapor_m','m');
	}  
	
	public function index(){
		$data = array(
			"title_page" => "Laporan User",
			"konten" => $this->m->Getlapor(),
			"active_menu_lapor" => "active"
		);
		$this->template->isi('dashboard/lapor/lapor',$data);  
	}

	function detail($id){
		$data = array(
			"title_page" => "Detail Lapor",
			"konten" => $this->m->Getlaporwhere($id)
		);
		$this->template->isi('dashboard/lapor/detail_lapor',$data); 
	}

	function proses_delete($id){
		$qr = $this->m->photo($id);
		if ($qr->photo != null & "") {
			unlink($qr->photo);
		}
		$res = $this->m->proses_delete($id);
		if($res>=1){
			$this->session->set_flashdata("berhasil","Data berhasil dihapus.");
			redirect('lapor');
		}
		else{
			$this->session->set_flashdata("gagal","Data tidak dihapus.");
			redirect('lapor');
		}
	}
}
