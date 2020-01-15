<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation', 'Recaptcha'));

		$this->load->model('auth_model');
    }

    public function index() {
		// jika sudah login redirect ke halaman utama
		if(null !==$this->session->userdata('logged')){
			redirect('user');
		}
       $data = array(
            'username' => set_value('username'),
            'password' => set_value('password'),
            'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
        );

        $this->load->view('login', $data);
    }

    public function login() {
		// jika sudah login redirect ke halaman utama
		if(null !==$this->session->userdata('logged')){
			redirect('user');
		}
        // validasi form
        $this->form_validation->set_rules('username', ' ', 'trim|required');
        $this->form_validation->set_rules('password', ' ', 'trim|required');
        
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);

        if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
            $this->session->set_flashdata("message","<font color='red'>Captcha harus diisi !!!</font>");
			$this->index();
        } else {
			$password = md5($this->input->post('password'));
			$username = $this->input->post('username');
            // lakukan proses validasi login disini
            $this->load->model('auth_model');
			$login = $this->auth_model->login($username, $password);

			if ($login == 1) {
			// ambil detail data
				$row = $this->auth_model->data_login($username, $password);

			// daftarkan session
				$data = array(
					'logged' => TRUE,
					'id_pengelola' => $row->id_pengelola,
					'username' => $row->username,
					'level' => $row->level
				);
				$this->session->set_userdata($data);

			// redirect ke halaman sukses
				if($row->level=="Admin"){
					redirect(site_url('dashboard'));
				}else{
					redirect(site_url('profil'));
				}
			} else {
			// tampilkan pesan error
				$this->session->set_flashdata("message","<font color='red'>Username atau Password salah !!!</font>");
				redirect('login');
			}
        }
    }

    function logout() {
//        destroy session
        $this->session->sess_destroy();
        
//        redirect ke halaman login
        redirect(site_url('login'));
    }

	
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */