<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->library(array('session', 'form_validation'));

		$this->load->helper(array('form', 'url'));

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('login', 'login', 'callback__isUserValid');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		}

		if($this->session->userdata('userId')){
			$this->load->helper('url');
			if($this->session->userdata('username') == 'mgr'){
				redirect('rootmgr');
			}
			else{
				redirect('admin');
			}
		}
	}

	public function _isUserValid()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->load->model('Account_model', '', TRUE);

		$query = $this->Account_model->isUserValid($username, $password);
		
		if($query->num_rows()){

			$userInfo = $query->row_array();

			$data = array(
				'userId'	=> $userInfo['id'],
				'username'	=> $userInfo['username'],
				'email'		=> $userInfo['email']
			);
			
			$this->session->set_userdata($data);

			return TRUE;
		}
	
		$this->form_validation->set_message('isUserValid', 'Username or Password Error!!');

		return FALSE;
	}

}
