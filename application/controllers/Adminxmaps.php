<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminxmaps extends CI_Controller {
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
		$this->load->model('maps_m');
	}  
	
	public function index(){
		$data = array(
			"title_page" => "Maps",
			"marker" => $this->maps_m->GetZona(),
			"active_menu_maps" => "active"
		);
		$this->template->isi('admin/maps/mapLeaflet',$data);  
	}

	public function parameter(){
		$data = array(
			"title_page" => "Maps",
			"marker" => $this->maps_m->Getparameter(),
			"active_menu_maps" => "active"
		);
		$this->template->isi('admin/maps/mapParameter',$data);  
	}

	public function update_zona(){
		set_time_limit(600);
		$history = $this->maps_m->insert_history_zona();
		$zona = $this->maps_m->GetZona();
		foreach($zona as $zonasi){
			$cek = $this->maps_m->cekGeofencing($zonasi['lat'],$zonasi['lon']);
			//if($cek==!null){
				foreach($cek as $ceki){
					$update = $this->maps_m->updateZona($zonasi['id'],$ceki['gasr']);
				}
			//}
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
				$res = $this->maps_m->generate_zona($data);
				$lon1 = $lon1 + 0.002000;
			}
			
		$lat1 = $lat1 + (-0.002000);
		}
		//$res = $this->maps_m->generate_zona($data);
		/*if($res>=1){
			echo "Berhasil<br>";
			//echo $data;
		}
		else{
			echo "gagal";
		}  */
	}

	public function mapGas(){
		$data = array(
			"title_page" => "Maps",
			"konten" => $this->maps_m->GetGas(),
			"active_menu_maps" => "active"
		);
		$this->template->isi('admin/maps/mapgas',$data);  
	}
	
	public function mapKelembaban(){
		$data = array(
			"title_page" => "Maps",
			"konten" => $this->maps_m->GetKelembaban(),
			"active_menu_maps" => "active"
		);
		$this->template->isi('admin/maps/mapkelembaban',$data);  
	}
}
