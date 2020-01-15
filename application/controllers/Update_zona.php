<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_zona extends CI_Controller {
	public function __construct(){    
		parent::__construct();
		
		//untuk load model
		$this->load->helper('url');
		$this->load->model('maps_m','m');
	}  
	
	public function index(){
		// jika belum login redirect ke login
		if ($this->session->userdata('logged')<>1) {
			redirect(site_url('login'));
		}
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
			echo "Berhasil";
		}
		else{
			echo "Gagal";
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

}
