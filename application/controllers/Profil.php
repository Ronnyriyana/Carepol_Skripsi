<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
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
		$this->load->model('pengelola_m','m');
	}  
	
	public function index(){
        $id = $this->session->userdata('id_pengelola');
		$data = array(
			"title_page" => "Detail Pengelola",
			"konten" => $this->m->Getpengelolawhere($id)
		);
		$this->template->isi('dashboard/pengelola/detail_pengelola',$data);  
	}

	function detail($id){
		$data = array(
			"title_page" => "Detail Pengelola",
			"konten" => $this->m->Getpengelolawhere($id)
		);
		$this->template->isi('dashboard/pengelola/detail_pengelola',$data); 
	}

}
