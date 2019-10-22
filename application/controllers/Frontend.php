<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {
	public function __construct(){    
		parent::__construct();
		//untuk template
		$this->load->library('templatef');
		
		//untuk load model
		$this->load->helper('url');
		$this->load->model('maps_m');
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
			"map" => $this->maps_m->GetZona(),
			"active_menu_map" => "active"
		);
		$this->templatef->isi('frontend/halaman/map',$data);  
    }
    
    public function data(){
        if($this->uri->segment(3)==!null){
			$tgl = $this->uri->segment(3);
		}else{
			$tgl = date("Y-m-d");
		}
		$data = array(
			"title_page" => "Data",
			"konten" => $this->maps_m->GetHistoryZona($tgl),
			"active_menu_data" => "active"
		);
		$this->templatef->isi('frontend/halaman/datahistory',$data);  
	}
}
