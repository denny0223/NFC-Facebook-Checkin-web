<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	function index()
	{
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');

		$this->form_validation->set_rules('logout', 'logout', 'required');

		if($this->form_validation->run() == TRUE){
			$this->session->unset_userdata('userId');
			$this->session->unset_userdata('username');
			$this->session->sess_destroy();
		}

		redirect('/login');

	}

}
