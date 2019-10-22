<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receiver_alat extends CI_Controller {
	public function __construct(){    
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('receiver_alat_m');
	}  
	
	public function index(){
		$data = array();
		$data['key_alat'] =  $this->uri->segment(3);
		$data['suhu'] =  $this->uri->segment(4);
		$data['gas'] =  $this->uri->segment(5);
		$res = $this->receiver_alat_m->input($data);
		if($res>=1){
			echo "Berhasil";
		}
		else{
			echo "Gagal";
		}
	}
	
	public function store() {
		/*$data_sensor = array(
		  'jenis_sensor' => $this->input->post('sensor')      
		);*/
		if($this->input->post(null, true)==!null){
			$data = $this->input->post(null, true);
		}else{
			$data = $this->input->get(null, true);
		}
		//$data['suhu'] = "123";
		//$data = $this->input->get(null, true);
	
		$res = $this->receiver_alat_m->input($data);
		if($res>=1){
			echo "Berhasil";
		}
		else{
			echo "Gagal";
		}  
	  }
	
}
