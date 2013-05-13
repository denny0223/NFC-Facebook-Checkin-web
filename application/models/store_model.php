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

	public function getStoreInfoWithOwnerName($storeId)
	{
		$storeId = addslashes($storeId);

		$sql = "SELECT `account`.`username`, `store_info`.*
				FROM `store_info`
				JOIN `account`
				ON `store_info`.`owner_id` = `account`.`id`
				WHERE `store_info`.`id` = ?";

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

	public function getAllStoreWithOwnerName()
	{
		$sql = "SELECT `account`.`username`, `store_info`.*
				FROM `store_info`, `account`
				WHERE `account`.`id` = `store_info`.`owner_id`";

		$query = $this->db->query($sql);

		return $query;
	}

	public function isPageIdValid($pageId)
	{
		if($json = @file_get_contents("https://graph.facebook.com/" . $pageId)){
			$data = json_decode($json, true);
			if(isset($data['likes'])){
				return TRUE;
			}
		}
		return FALSE;
	}

}

