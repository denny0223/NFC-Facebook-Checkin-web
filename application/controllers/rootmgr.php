<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rootmgr extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model("Account_model", '', TRUE);

		$userId = $this->session->userdata('userId');
		$username = $this->session->userdata('username');

		// Authentication
		if(!$userId || $username != 'mgr'){
			redirect('/login');
		}

		$this->load->view('rootmgr');
	}

}
