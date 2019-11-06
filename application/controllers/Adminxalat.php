<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminxalat extends CI_Controller {
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
		$this->load->model('alat_m');
	}  
	
	public function index(){
		$data = array(
			"title_page" => "Alat",
			"konten" => $this->alat_m->Getalat(),
			"active_menu_alat" => "active"
		);
		$this->template->isi('admin/alat/alat',$data);  
	}

	function tambah_alat(){
		$data = array(
			"title_page" => "Tambah Alat"
		);
		$this->template->isi('admin/alat/tambah_alat',$data); 
	}
	
	public function proses_tambah_alat(){
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < 5; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		
		//$data['key_alat']=$randomString.date("Ymdhis").$randomString;
		$key=$randomString.date("Ymdhis").$randomString;

		$tempdir = "assets/img/qrcode/"; //<-- Nama Folder file QR Code kita nantinya akan disimpan
		if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
			mkdir($tempdir);
		
		#parameter inputan
		$isi_teks = $key;
		$namafile = $key.".png";
		$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
		$ukuran = 8; //batasan 1 paling kecil, 10 paling besar
		$padding = 0;

		$data=array (
			'key_alat' => $key,
			'qrcode' => $tempdir.$namafile
		);
		$res = $this->alat_m->proses_input_data($data);
		if($res>=1){

			include "assets/phpqrcode/qrlib.php"; //<-- LOKASI FILE UTAMA PLUGINNYA
			
			QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);


			$this->session->set_flashdata("message","
				<div class='alert alert-success'>
					<button type='button' class='close' data-dismiss='alert'>
						<span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span>
					</button>
					<span><b> Success - </b> 1 Data telah ditambah.</span>
				</div>
			");
			redirect('adminxalat');
		}
		else{
			$this->session->set_flashdata("message","
				<div class='alert alert-danger'>
					<button type='button' class='close' data-dismiss='alert'>
						<span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span>
					</button>
					<span><b> Failed - </b> Data tidak ditambah.</span>
				</div>
			");
			redirect('adminxalat');
		}  
	}
	
	function keyresult($id){
		$key_alat = array('key_alat' => $id);
		$data = array(
			"title_page" => "Tambah Alat",
			"konten" => $this->alat_m->get_data_where($key_alat)
		);
		$this->template->isi('admin/alat/keyresult',$data); 
	}
	
	function proses_delete($id){
		$id_alat = array( 'id_alat' => $id );
		$res = $this->alat_m->proses_delete_data($id_alat);
		if($res>=1){
			$this->session->set_flashdata("message","
				<div class='alert alert-success'>
					<button type='button' class='close' data-dismiss='alert'>
						<span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span>
					</button>
					<span><b> Success - </b> 1 data telah dihapus.</span>
				</div>
			");
			redirect('adminxalat');
		}
		else{
			$this->session->set_flashdata("message","
				<div class='alert alert-danger'>
					<button type='button' class='close' data-dismiss='alert'>
						<span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span>
					</button>
					<span><b> Failed - </b> Data tidak dihapus.</span>
				</div>
			");
			redirect('adminxalat');
		}
	}
}
