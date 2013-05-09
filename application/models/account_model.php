<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {

	public function isUserValid($username, $password)
	{
		$username = addslashes($username);

		$sql = "SELECT `id`, `username`, `email`
				FROM `account` 
				WHERE `username` = ?
				AND `password` = MD5(CONCAT(MD5(?), 'nfccheckin'))";

		$query = $this->db->query($sql, array($username, $password));

		return $query;
	}

	public function getAccountInfo($userId)
	{
		$userId = addslashes($userId);

		$sql = "SELECT `id`, `username`, `google_account_id`
				FROM `account` 
				WHERE `id` = ?";

		$query = $this->db->query($sql, array($userId));

		return $query;
	}

	public function setNewPassword($userId, $newpwd)
	{
		$sql = "UPDATE `account`
				SET `password` = MD5(CONCAT(MD5(?), 'nfccheckin'))
				WHERE `id` = ?";

		$this->db->query($sql, array($newpwd, $userId));
	}

}

