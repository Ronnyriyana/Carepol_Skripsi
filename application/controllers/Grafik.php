<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {
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
		$this->load->model('grafik_m','m');
	}  
	
	public function index(){
		$data = array(
			"title_page" => "Grafik Zona",
			"konten" => $this->m->GetZona(),
			"active_menu_grafik" => "active"
		);
		$this->template->isi('dashboard/grafik/grafik',$data);  
	}

	public function grafik(){
		$data = $this->input->post(null, true);
		if (!empty($data['Lat'])) { 
			$response['data'] = $this->m->GetZonaHistory($data['Lat'],$data['Lon']);
			  $this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
				exit;
		} 
	}
}
