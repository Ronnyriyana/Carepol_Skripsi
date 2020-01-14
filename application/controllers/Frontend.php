<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {
	public function __construct(){    
		parent::__construct();
		//untuk template
		$this->load->library('templatef');
		
		//untuk load model
		$this->load->helper('url');
		$this->load->model('maps_m','m');
		$this->load->model('grafik_m','g');
	}  
	
	public function index(){
		$data = array(
            "title_page" => "Home",
            "active_menu_home" => "active"
		);
		$this->templatef->isi('frontend/layout/content',$data);  
    }
    
    public function map(){
		$data = array(
			"title_page" => "Maps",
			"map" => $this->m->GetZona(),
			"active_menu_map" => "active"
		);
		$this->templatef->isi('frontend/halaman/map',$data);  
	}

	public function grafik(){
		$data = array(
			"title_page" => "Grafik Zona",
			"konten" => $this->m->GetZona(),
			"active_menu_grafik" => "active"
		);
		$this->templatef->isi('frontend/halaman/grafik',$data);  
	}
    
    public function grafikData(){
		$data = $this->input->post(null, true);
		if (!empty($data['Lat'])) { 
			$response['data'] = $this->g->GetZonaHistory($data['Lat'],$data['Lon']);
			  $this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
				exit;
		} 
	}
}
