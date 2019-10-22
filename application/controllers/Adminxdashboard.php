<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminxdashboard extends CI_Controller {
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
		$this->load->model('grafik_m');
	}  
	
	public function index(){
		if(null !== $this->input->post('wilayah')){
			$wilayah= $this->input->post('wilayah');
		}else{
			$wilayah= "Ciroyom - Caheum";
		}
		$data = array(
			"title_page" => "Grafik",
			"konten" => $this->grafik_m->GetParameter($wilayah),
			"active_menu_dashboard" => "active",
			"wilayah" => $wilayah
		);
		$this->template->isi('admin/dashboard/dashboard',$data);  
	}
}
