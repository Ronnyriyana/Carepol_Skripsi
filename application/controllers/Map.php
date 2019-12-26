<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {
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
		$this->load->model('maps_m','m');
	}  
	
	public function index(){
		$data = array(
			"title_page" => "Maps Zonasi",
			"marker" => $this->m->GetZona(),
			"active_menu_maps" => "active",
			"active_menu_maps_zonasi" => "active"
		);
		$this->template->isi('dashboard/maps/map_zona',$data);  
	}

	public function parameter(){
		$data = array(
			"title_page" => "Maps Parameter",
			"marker" => $this->m->Getparameter(),
			"active_menu_maps" => "active",
			"active_menu_maps_parameter" => "active"
		);
		$this->template->isi('dashboard/maps/map_parameter',$data);  
	}

	public function update_zona(){
		set_time_limit(600);
		$history = $this->m->insert_history_zona();//insert history_zona dengan data zona yg sekarang
		$zona = $this->m->GetZona();//ambil data lat & lon zona
		foreach($zona as $zonasi){
			$cek = $this->m->cari_parameter($zonasi['lat'],$zonasi['lon']);//cari parameter yg masuk zona & rata2kan
			//if($cek==!null){
				foreach($cek as $ceki){
					$update = $this->m->updateZona($zonasi['id'],$ceki['gasr']);//update zona
				}
			//}
		}
		if($update>=1){
			$this->session->set_flashdata("berhasil","Zona berhasil di-update.");
			redirect('map');
		}
		else{
			$this->session->set_flashdata("gagal","Zona gagal di-update.");
			redirect('map');
		}
	}

	public function generate_zona(){
		set_time_limit(1200);
		$lat1=-6.849251;
		$lat2=-6.970540;

		$data = array();
		while($lat1 >= $lat2){
			$lon1=107.569278;
			$lon2=107.686934;
			while($lon1 <= $lon2){
				$data = array(
					'lat' => $lat1,
					'lon' => $lon1
				);	
				$res = $this->m->generate_zona($data);
				$lon1 = $lon1 + 0.002000;
			}
			
		$lat1 = $lat1 + (-0.002000);
		}
		if($res>=1){
			$this->session->set_flashdata("berhasil","Zona berhasil di-generate.");
			redirect('map');
		}
		else{
			$this->session->set_flashdata("gagal","Zona gagal di-generate.");
			redirect('map');
		}
	}
}
