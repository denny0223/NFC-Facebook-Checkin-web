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

	public function storemodify($storeId = null)
	{
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('form', 'url'));
		$this->load->model("Account_model", '', TRUE);
		$this->load->model("Store_model", '', TRUE);

		$userId = $this->session->userdata('userId');
		$username = $this->session->userdata('username');

		// Authentication
		if(!$userId || $username != 'mgr'){
			redirect('/login');
		}

		$this->form_validation->set_rules('page_id', 'Page ID', 'required|callback__isPageIdValid');
		$this->form_validation->set_rules('tag_id', 'Tag ID', 'required');
		$this->form_validation->set_rules('feedback_url', 'Feedback url', 'required');
		$this->form_validation->set_rules('feedback_result_url', 'Feedback result url', 'required');

		$cancel = $this->input->post('cancel');
		if($cancel == 'Cancel') redirect('/rootmgr/store');

		if($this->form_validation->run() == TRUE) {
		}

		$query = $this->Store_model->getStoreInfoWithOwnerName($storeId);
		$data = $query->row_array();

		$query = $this->Account_model->getAllUsername();
		$users = Array();
		foreach($query->result_array() as $row){
			array_push($users, $row['username']);
		}
		$data['users'] = $users;

		$this->load->view('rootmgrStoreModify', $data);

	}

	public function _isPageIdValid($pageId)
	{
		$this->load->model("Store_model", '', TRUE);

		$this->form_validation->set_message('_isPageIdValid', 'Not available Page ID!');

		return $this->Store_model->isPageIdValid($pageId);
	}

}
