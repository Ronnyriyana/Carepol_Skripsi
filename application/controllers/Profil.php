<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
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
		$this->load->model('pengelola_m','m');
	}  
	
	public function index(){
        $id = $this->session->userdata('id_pengelola');
		$data = array(
			"title_page" => "Detail Pengelola",
			"konten" => $this->m->Getpengelolawhere($id),
			"id_pengelola" => $id
		);
		$this->template->isi('dashboard/pengelola/detail_pengelola',$data);  
	}

	function detail(){
		$id = $this->session->userdata('id_pengelola');
		$data = array(
			"title_page" => "Detail Pengelola",
			"konten" => $this->m->Getpengelolawhere($id),
			"id_pengelola" => $id
		);
		$this->template->isi('dashboard/pengelola/detail_pengelola',$data); 
	}

	public function tambah_alat(){
		$data = $this->input->post(null, true);
		if($this->alat_m->check_key($data['key_alat']) >= 1){//cek ketersediaan key alat
			$res = $this->alat_m->proses_update($data['key_alat'],$data['id_pengelola']);
			if($res>=1){
				$this->session->set_flashdata('berhasil','Key alat berhasil ditambahkan.');
				redirect('profil');
			}
			else{
				$this->session->set_flashdata("gagal","Key alat tidak ditambahkan.");
				redirect('profil');
			}  
		}else{
			$this->session->set_flashdata('gagal','Key alat tidak tersedia atau sudah digunakan.');
			redirect('profil');
		}
	}

	function hapus_alat(){
		$data = $this->input->post(null, true);
		$res = $this->alat_m->proses_update_unregistrasi($data['key_alat'],$data['id_pengelola']);
		if($res>=1){
			$this->session->set_flashdata("berhasil","Proses unregistrasi berhasil.");
			redirect('profil');
		}
		else{
			$this->session->set_flashdata("gagal","Proses unregistrasi gagal.");
			redirect('profil');
		}
	}

}
