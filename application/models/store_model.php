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

	public function isStoreOwner($storeId, $userId)
	{
		$storeId = addslashes($storeId);
		$userId = addslashes($userId);

		$sql = "SELECT * 
				FROM  `store_info` 
				WHERE  `id` =  ?
				AND  `owner_id` =  ?";

		$query = $this->db->query($sql, array($storeId, $userId));

		if($query->num_rows() > 0){
			return true;
		}

		return false;
	}

	public function getStoreInfo($storeId)
	{
		$storeId = addslashes($storeId);

		$sql = "SELECT * 
				FROM  `store_info` 
				WHERE  `id` = ?";

		$query = $this->db->query($sql, array($storeId));

		return $query;
	}

	public function updateMsg($storeId, $msg)
	{
		$storeId = addslashes($storeId);

		$sql = "UPDATE  `store_info`
				SET  `coupon_msg` = ?
				WHERE  `id` = ?";

		$this->db->query($sql, array($msg, $storeId));
	}

}

