<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function index()
	{
		$this->load->library('session');

		var_dump($this->session->userdata('username'));
		var_dump($this->session->userdata('userId'));
		if($this->session->userdata('userId')){
			$this->load->helper('url');
			if($this->session->userdata('username') == 'mgr'){
				$tmp = 'Rootmgr';
				var_dump($tmp);
			}
			else{
				$tmp = 'NotRootMgr';
				var_dump($tmp);
			}
//			redirect('/checkin/getStoreInfo/AAAA');
		}

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('login', 'login', 'callback_isUserValid');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		}
		else {
			$this->load->view('formsuccess');
		}
	}

	public function isUserValid()
	{
		$username = addslashes($this->input->post('username'));
		$password = addslashes($this->input->post('password'));

		$this->load->model('Login_model', '', TRUE);

		$query = $this->Login_model->isUserValid($username, $password);
		
		if($query->num_rows()){

			foreach($query->result() as $row){
				$userId = $row->id;
			}

			$data = array(
				'username'	=> $username,
				'userId'	=> $userId
			);
			
			$this->session->set_userdata($data);

			return TRUE;
		}
	
		$this->form_validation->set_message('isUserValid', 'Username or Password Error!!');

		return FALSE;
	}

}
