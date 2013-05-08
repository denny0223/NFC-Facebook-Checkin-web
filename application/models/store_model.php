<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store_model extends CI_Model {

	public function getOwnStore($userId)
	{
		$userId = addslashes($userId);

		$sql = "SELECT *
				FROM `store_info`
				WHERE `owner_id` = ?";

		$query = $this->db->query($sql, array($userId));

		return $query;
	}

}

