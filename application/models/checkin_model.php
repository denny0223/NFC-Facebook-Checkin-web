<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkin_model extends CI_Model {

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

