<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_zona extends CI_Controller {
	public function __construct(){    
		parent::__construct();
		//untuk template
		$this->load->library('template');
		
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
		set_time_limit(1000);
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
			echo "Berhasil";
		}
		else{
			echo "Gagal";
		}
	}

}
