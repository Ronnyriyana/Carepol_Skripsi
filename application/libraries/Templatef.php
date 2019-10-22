<?php
class Templatef{
    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }
    
	function isi($content, $data = NULL){
		/*
		 * $data['headernya'] , $data['contentnya'] , $data['footernya']
		 * variabel diatas ^ nantinya akan dikirim ke file views/layout/index.php
		 * */
        //$data['navbar'] = $this->_ci->load->view('layout/navbar', $data, TRUE);
		
		//untuk membedakan menu
		
		//$data['sidebar'] = $this->_ci->load->view('layout/sidebar', $data, TRUE);
		
		$data['menu'] = $this->_ci->load->view('frontend/layout/menu', $data, TRUE);
		
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
		
		//$data['footer'] = $this->_ci->load->view('layout/footer', $data, TRUE);
        
        $this->_ci->load->view('frontend/layout/index', $data);
    }
}

