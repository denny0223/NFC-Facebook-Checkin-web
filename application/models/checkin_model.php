<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkin_model extends CI_Model {

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
	public function getStoreInfo($tagId)
	{
		$sql = "SELECT *
				FROM store_info
				WHERE tag_id = ?";

		$query = $this->db->query($sql , array($tagId));

		return $query;
	}

	public function isFBIdValid($fbId)
	{
		if($json = @file_get_contents("https://graph.facebook.com/" . $fbId)){
			$data = json_decode($json, true);
			if(isset($data['first_name']) && isset($data['last_name'])){
				return TRUE;
			}
		}
		return FALSE;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
