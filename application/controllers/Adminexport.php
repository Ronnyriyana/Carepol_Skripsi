<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminexport extends CI_Controller {
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
		$this->load->model('zona_m');
	}  
	
	public function index(){
		$data = array(
			"title_page" => "History",
			"konten" => $this->zona_m->get_data(),
			"active_menu_export" => "active"
		);
		$this->template->isi('admin/export/export',$data);  
	}

}
