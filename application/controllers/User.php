<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
		$this->load->model('user_m','m');
	}  
	
	public function index(){
		$data = array(
			"title_page" => "User",
			"konten" => $this->m->Getuser(),
			"active_menu_user" => "active"
		);
		$this->template->isi('dashboard/user/user',$data);  
	}

	function tambah(){
		$data = array(
			"title_page" => "Tambah User"
		);
		$this->template->isi('dashboard/user/tambah_user',$data); 
	}
	
	public function proses_tambah(){
		$data = $this->input->post(null, true);
		$data['password'] = md5($data['password']);
		$data['photo'] = $this->upload_foto();
		$res = $this->m->proses_input($data);
		if($res>=1){
			$this->session->set_flashdata('berhasil','Data berhasil ditambahkan.');
			redirect('user');
		}
		else{
			$this->session->set_flashdata("gagal","Data tidak ditambahkan.");
			redirect('user');
		}  
	}

	function detail($id){
		$data = array(
			"title_page" => "Detail User",
			"konten" => $this->m->Getuserwhere($id)
		);
		$this->template->isi('dashboard/user/detail_user',$data); 
	}
	
	function edit($id){
		$data = array(
			"title_page" => "Edit User",
			"konten" => $this->m->Getuserwhere($id)
		);
		$this->template->isi('dashboard/user/edit_user',$data); 
	}
	
	public function proses_edit(){
		$data = $this->input->post(null, true);

		//check password
		if(isset($data['password'])){
			if ($data['password']!==null && $data['password']!=="" ){
				$data['password'] = md5($data['password']);
			}else{
				unset($data['password']);
			}
		}

		//check photo
		if (!empty($_FILES["photo"]["name"])) {//jika photo tidak kosong -> upload & delete
			$data['photo'] = $this->upload_foto();
			$this->delete_foto($data['id_user']);
		}

		$res = $this->m->proses_update($data);
		if($res>=1){
			$this->session->set_flashdata('berhasil','Data berhasil dirubah.');
			redirect('user');
		}
		else{
			$this->session->set_flashdata("gagal","Data tidak dirubah.");
			redirect('user');
		}  
	}
	
	function proses_delete($id){
		$this->delete_foto($id);
		$res = $this->m->proses_delete($id);
		if($res>=1){
			$this->session->set_flashdata("berhasil","Data berhasil dihapus.");
			redirect('user');
		}
		else{
			$this->session->set_flashdata("gagal","Data tidak dihapus.");
			redirect('user');
		}
	}

	private function upload_foto(){
		$config = array(
			'upload_path'		=> 'assets/img/upload/user/',
			'allowed_types'		=> 'gif|jpg|png|jpeg',
			'max_size'			=> 100000,
			'encrypt_name'		=> true
		);
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('photo')) {
			return $config['upload_path'].$this->upload->data('file_name');
		}else{
			return $config['upload_path']."default.jpg";
		}
	}

	private function delete_foto($id){
		$qr = $this->m->photo($id);
		if ($qr->photo != "assets/img/upload/user/default.jpg") {
			unlink($qr->photo);
		}
	}
}
