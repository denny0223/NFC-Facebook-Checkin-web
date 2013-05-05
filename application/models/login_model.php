<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

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
	public function isUserValid($username, $password)
	{
		$sql = "SELECT `id`
				FROM `account` 
				WHERE `username` = ?
				AND `password` = MD5(CONCAT(MD5(?), 'nfccheckin'))";

		$query = $this->db->query($sql , array($username, $password));

		return $query;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
