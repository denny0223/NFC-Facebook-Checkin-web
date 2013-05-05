<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function index()
	{
		$this->load->library('session');

		if($this->session->userdata('userId')){
			$this->load->helper('url');
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
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
