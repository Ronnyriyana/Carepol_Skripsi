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
			"konten" => $this->m->GetHistoryZona(),
			"active_menu_grafik" => "active"
		);
		$this->template->isi('dashboard/grafik/grafik',$data);  
	}

	function detail($id){
		$data = array(
			"title_page" => "Detail Lapor",
			"konten" => $this->m->Getlaporwhere($id)
		);
		$this->template->isi('dashboard/lapor/detail_lapor',$data); 
	}

	public function coba(){
		$data = $this->input->post(null, true);
		if (!empty($data['Lat'])) { 
			$response = array(
				'Lat' => $data['Lat'],
				'Lon' => $data['Lon']
			);
		  
			  $this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response, JSON_PRETTY_PRINT))
				->_display();
				exit;
		} 
	}
}
