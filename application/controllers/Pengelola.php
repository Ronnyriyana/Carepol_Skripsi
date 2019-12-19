<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelola extends CI_Controller {
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
		$this->load->model('admin_m');
		$this->load->model('pengelola_m','m');
	}  
	
	public function index(){
		$data = array(
			"title_page" => "Pengelola",
			"konten" => $this->m->Getpengelola(),
			"active_menu_pengelola" => "active"
		);
		$this->template->isi('dashboard/pengelola/pengelola',$data);  
	}

	function tambah(){
		$data = array(
			"title_page" => "Tambah Pengelola",
			"top_link" => "Pengelola"
		);
		$this->template->isi('dashboard/pengelola/tambah_pengelola',$data); 
	}
	
	public function proses_tambah(){
		$data = $this->input->post(null, true);
		unset($data['key_alat']);
		$data['password'] = md5($data['password']);
		$res = $this->m->proses_input_data($data);
		if($res>=1){
			$this->session->set_flashdata('message','Berhasil');
			redirect('pengelola');
		}
		else{
			$this->session->set_flashdata('message','Gagal');
			redirect('pengelola');
		}  
	}

	function detail($id){
		$data = array(
			"title_page" => "Detail Pengelola",
			"konten" => $this->m->Getpengelolawhere($id)
		);
		$this->template->isi('dashboard/pengelola/detail_pengelola',$data); 
	}
	
	function edit($id){
		$data = array(
			"title_page" => "Edit Pengelola",
			"konten" => $this->m->Getpengelolawhere($id)
		);
		$this->template->isi('dashboard/pengelola/edit_pengelola',$data); 
	}
	
	public function proses_edit_user(){
		$tgl_lahir = $this->input->post('tahun')."/".$this->input->post('bulan')."/".$this->input->post('tanggal');
		$id_pengguna= $this->input->post('id_pengguna');
		$data = $this->input->post(null, true);
		unset($data['tahun'],$data['bulan'],$data['tanggal'],$data['id_pengguna']);
		$data['tgl_lahir']=$tgl_lahir;
		$res = $this->user_m->proses_update_profile($id_pengguna,$data);
		if($res>=1){
			$this->session->set_flashdata("message","
				<div class='alert alert-success'>
					<button type='button' class='close' data-dismiss='alert'>
						<span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span>
					</button>
					<span><b> Success - </b> Data telah diubah.</span>
				</div>
			");
			redirect('adminxuser/edit_user/'.$id_pengguna);
		}
		else{
			$this->session->set_flashdata("message","
				<div class='alert alert-danger'>
					<button type='button' class='close' data-dismiss='alert'>
						<span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span>
					</button>
					<span><b> Failed - </b> Data tidak diubah.</span>
				</div>
			");
			redirect('adminxuser/edit_user/'.$id_pengguna);
		}  
	}
	
	function proses_delete($id){
		$res = $this->m->proses_delete_data($id);
		if($res>=1){
			$this->session->set_flashdata("message","
				<div class='alert alert-success'>
					<button type='button' class='close' data-dismiss='alert'>
						<span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span>
					</button>
					<span><b> Success - </b> 1 data telah dihapus.</span>
				</div>
			");
			redirect('pengelola');
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
			redirect('pengelola');
		}
	}
}
