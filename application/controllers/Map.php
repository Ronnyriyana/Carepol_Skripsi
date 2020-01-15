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
		set_time_limit(4000);
		$history = $this->m->insert_history_zona();//insert history_zona dengan data zona yg sekarang
		$zona = $this->m->GetZona();//ambil data lat & lon zona
		foreach($zona as $zonasi){
			$cek = $this->m->cari_parameter($zonasi['lat'],$zonasi['lon']);//cari parameter yg masuk zona & rata2kan
			//if($cek==!null){
				foreach($cek as $ceki){
					$ceki['ispu'] = $this->ispu($ceki['co']);
					$update = $this->m->updateZona($zonasi['id'],$ceki);//update zona
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

	private function ispu($co){
		if($co <= 5){
			$Ia=50;
			$Ib=0;
			$Xa=5;
			$Xb=0;
		}elseif($co <= 10){
			$Ia=100;
			$Ib=50;
			$Xa=10;
			$Xb=5;
		}elseif($co <= 17){
			$Ia=200;
			$Ib=100;
			$Xa=17;
			$Xb=10;
		}elseif($co <= 34){
			$Ia=300;
			$Ib=200;
			$Xa=34;
			$Xb=17;
		}elseif($co <= 46){
			$Ia=400;
			$Ib=300;
			$Xa=46;
			$Xb=34;
		}else{
			$Ia=500;
			$Ib=400;
			$Xa=57.5;
			$Xb=46;
		}

		$I = ((($Ia-$Ib)/($Xa-$Xb))*($co-$Xb))+$Ib;
		return $I;
	}

	public function generate_zona(){
		set_time_limit(1200);
		$lat1=-6.861663;
		$lat2=-6.966835;

		$data = array();
		while($lat1 >= $lat2){
			$lon1=107.565891;
			$lon2=107.695683;
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

	public function generate_zona_meter(){
		set_time_limit(1600);
		$meter = 140;
		$coef = $meter * 0.000008983;
		$lat1=-6.943661;
		$lat2=-6.863924;

		$data = array();
		while($lat1 <= $lat2){
			$lon1=107.554920;
			$lon2=107.688104;
			while($lon1 <= $lon2){
				$data = array(
					'lat' => $lat1,
					'lon' => $lon1
				);	
				$res = $this->m->generate_zona($data);
				$lon1 = $lon1 + $coef / cos($lat1 * 0.018);
			}
			
		$lat1 = $lat1 + $coef;
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

	public function receiver(){
		$data = array(
			"title_page" => "Maps Parameter"
		);
		$this->load->view('dashboard/receiver',$data);  
	}

}
