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

	public function store($storeId = null)
	{
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('form', 'url'));
		$this->load->model("Store_model", '', TRUE);

		$userId = $this->session->userdata('userId');

		// check permission
		if(!isset($storeId) || !$this->Store_model->isStoreOwner($storeId, $userId)){
			redirect('/login');
		}

		$this->form_validation->set_rules('submit', 'submit', 'required');

		$cancel = $this->input->post('cancel');
		if($cancel == 'Cancel') redirect('/admin');

		if($this->form_validation->run() == TRUE) {
			$msg = $this->input->post('msg');
			$this->Store_model->updateMsg($storeId, $msg);
			redirect('/admin');
		}

		$query = $this->Store_model->getStoreInfo($storeId);

		$storeInfo = $query->row_array();

		$this->load->view('adminStoreModify', $storeInfo);

	}

	public function account($accountId = null)
	{
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('form', 'url'));
		$this->load->model("Account_model", '', TRUE);

		$userId = $this->session->userdata('userId');

		// Authentication
		if(!$accountId || $userId != $accountId){
			redirect('/login');
		}

		$this->form_validation->set_rules('curpwd', 'Current password', 'required|callback_isUserValid');
		$this->form_validation->set_rules('newpwd', 'New password', 'matches[newpwdconf]');
		$this->form_validation->set_rules('email', 'E-mail', '');

		$cancel = $this->input->post('cancel');
		if($cancel == 'Cancel') redirect('/admin');

		if($this->form_validation->run() == TRUE) {

			$newpwd = $this->input->post('newpwd');
			$newmail = $this->input->post('email');

			if(!empty($newpwd)){
				$resmsg .= 'Set new password successfully!<br>';
				$this->Account_model->setNewPassword($userId, $newpwd);
			}

			if($this->session->userdata('email') != $newmail){
				$resmsg .= 'Update e-mail successfully!<br>';
				$this->Account_model->updateMail($userId, $newmail);
				$this->session->set_userdata('email', $newmail);
			}

			$this->session->set_flashdata('resmsg', $resmsg);

			redirect('/admin');
		}

		$query = $this->Account_model->getAccountInfo($userId);

		$accountInfo = $query->row_array();

		$this->load->view('accountModify', $accountInfo);

	}

	public function isUserValid()
	{
		$username = $this->session->userdata('username');
		$password = $this->input->post('curpwd');

		$query = $this->Account_model->isUserValid($username, $password);

		if($query->num_rows()){
			return TRUE;
		}

		$this->form_validation->set_message('isUserValid', 'Current password error!');

		return FALSE;
	}

}
