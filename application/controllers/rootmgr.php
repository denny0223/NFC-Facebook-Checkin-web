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

	public function store()
	{
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('form', 'url'));
		$this->load->model("Store_model", '', TRUE);

		$userId = $this->session->userdata('userId');
		$username = $this->session->userdata('username');

		// Authentication
		if(!$userId || $username != 'mgr'){
			redirect('/login');
		}

		$query = $this->Store_model->getAllStoreWithOwnerName();

		$stores = $query->result_array();

		$data['stores'] = $stores;

		$this->load->view('rootmgrStoreList', $data);
	}

}
