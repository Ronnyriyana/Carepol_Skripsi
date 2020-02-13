<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
		$this->load->model('dashboard_m','m');
	}  
	
	public function index(){
		$data = array(
			"title_page" => "Dashboard",
			"active_menu_dashboard" => "active",
			"zona" => $this->m->getjumlahzona(),
			"parameter" => $this->m->getjumlahparameter(),
			"pemilik_alat" => $this->m->getjumlahpemilikalat(),
			"alat" => $this->m->getjumlahalat()
		);
		$this->template->isi('dashboard/dashboard/dashboard',$data);  
	}

}
