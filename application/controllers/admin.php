<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model("Store_model", '', TRUE);

		$userId = $this->session->userdata('userId');
		$username = $this->session->userdata('username');

		// Authentication
		if(!$userId || $username == 'mgr'){
			redirect('/login');
		}

		$query = $this->Store_model->getOwnStore($userId);

		$stores = $query->result_array();

		$data['stores'] = $stores;

		$this->load->view('storeList', $data);

	}

}
