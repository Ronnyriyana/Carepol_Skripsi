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
		}else{
			if($this->session->userdata('level')!=="Admin"){
				redirect(site_url('profil'));
			}
		}
		
		//untuk load model
		$this->load->helper('url');
		$this->load->model('admin_m');
		$this->load->model('alat_m');
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
		$data['password'] = md5($data['password']);
		
		//check username
		if($this->m->check_username($data['username']) >= 1){
			$this->session->set_flashdata('username','Username <u>'.$data['username'].'</u> sudah digunakan.');
			redirect('pengelola/tambah');
		}

		if($data['level']!=="Pemilik_Alat"){//jika bukan pemilik alat
			$data['photo'] = $this->upload_foto();
			$res = $this->m->proses_input($data);//input tanpa key alat
		}else{
			if($this->alat_m->check_key($data['key_alat']) >= 1){//cek ketersediaan key alat
				$key_alat = $data['key_alat'];
				unset($data['key_alat']);
				$data['photo'] = $this->upload_foto();
				$inputlastid = $this->m->proses_input_pemilik_alat($data);//input table pengelola & ambil id
				$res = $this->alat_m->proses_update($key_alat,$inputlastid);//update pemilik alat -> table alat
			}else{
				$this->session->set_flashdata('gagal','Key alat tidak tersedia atau sudah digunakan.');
				redirect('pengelola');
			}
		}

		if($res>=1){
			$this->session->set_flashdata('berhasil','Data berhasil ditambahkan.');
			redirect('pengelola');
		}
		else{
			$this->session->set_flashdata("gagal","Data tidak ditambahkan.");
			redirect('pengelola');
		}  
	}

	function detail($id){
		$data = array(
			"title_page" => "Detail Pengelola",
			"konten" => $this->m->Getpengelolawhere($id),
			"id_pengelola" => $id
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
	
	public function proses_edit(){
		$data = $this->input->post(null, true);
		//check username
		if($this->m->check_username_edit($data['id_pengelola'],$data['username']) >= 1){
			$this->session->set_flashdata('username','Username <u>'.$data['username'].'</u> sudah digunakan.');
			redirect('pengelola/edit/'.$data['id_pengelola']);
		}

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
			$this->delete_foto($data['id_pengelola']);
		}

		$res = $this->m->proses_update($data);
		if($res>=1){
			$this->session->set_flashdata('berhasil','Data berhasil dirubah.');
			redirect('pengelola');
		}
		else{
			$this->session->set_flashdata("gagal","Data tidak dirubah.");
			redirect('pengelola');
		}  
	}
	
	function proses_delete($id){
		$this->delete_foto($id);
		$res = $this->m->proses_delete_data($id);
		$this->alat_m->proses_update_delete($id);
		if($res>=1){
			$this->session->set_flashdata("berhasil","Data berhasil dihapus.");
			redirect('pengelola');
		}
		else{
			$this->session->set_flashdata("gagal","Data tidak dihapus.");
			redirect('pengelola');
		}
	}

	private function upload_foto(){
		$config = array(
			'upload_path'		=> 'assets/img/upload/pengelola/',
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
		if ($qr->photo != "assets/img/upload/pengelola/default.jpg") {
			unlink($qr->photo);
		}
	}

	public function tambah_alat(){
		$data = $this->input->post(null, true);
		if($this->alat_m->check_key($data['key_alat']) >= 1){//cek ketersediaan key alat
			$res = $this->alat_m->proses_update($data['key_alat'],$data['id_pengelola']);
			if($res>=1){
				$this->session->set_flashdata('berhasil','Key alat berhasil ditambahkan.');
				redirect('pengelola/detail/'.$data['id_pengelola']);
			}
			else{
				$this->session->set_flashdata("gagal","Key alat tidak ditambahkan.");
				redirect('pengelola/detail/'.$data['id_pengelola']);
			}  
		}else{
			$this->session->set_flashdata('gagal','Key alat tidak tersedia atau sudah digunakan.');
			redirect('pengelola/detail/'.$data['id_pengelola']);
		}
	}

	function hapus_alat(){
		$data = $this->input->post(null, true);
		$res = $this->alat_m->proses_update_unregistrasi($data['key_alat'],$data['id_pengelola']);
		if($res>=1){
			$this->session->set_flashdata("berhasil","Proses unregistrasi berhasil.");
			redirect('pengelola/detail/'.$data['id_pengelola']);
		}
		else{
			$this->session->set_flashdata("gagal","Proses unregistrasi gagal.");
			redirect('pengelola/detail/'.$data['id_pengelola']);
		}
	}

}
